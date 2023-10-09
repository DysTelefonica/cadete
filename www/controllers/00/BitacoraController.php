<?php

    namespace ControllerGeneral;
    use MVC\Router;

    //General
        Use ModelGeneral\Bitacora;
        Use ModelGeneral\Codigo;
        Use ModelGeneral\Personal;
        Use ModelGeneral\Adjuntos;
        Use ModelGeneral\Relacion;

    class BitacoraController {

    //RUTAS
        public static function bitacora(Router $router){

            //Definimos la acción CRUD
                $crud = 2;

            //Cargamos los datos y lo guardamos en una variable, que luego pasaremos por al router
                $bitacora = Bitacora::readAll();

            //Obtenemos los datos de la referencia, obtenemos sus datos y lo hacemos objeto
               
                //Emepzamos con el contador a 0
                $i =0;

                foreach ($bitacora as $entrada) {

                    if($entrada->referencia != "N/A") {          

                        //Obtenemos el tipo de modelo que es
                            $array = Codigo::analizarId($entrada->referencia); 

                        //Le asignamos los valores 
                            $bitacora[$i]->rutaIndex = $array->rutaIndex;
                            $bitacora[$i]->ico = $array->ico;

                        //Aumentamos el contador
                            $i++;

                    }
                  
                }

                

            //Invovamos el método router
                $router->render('/00/Bitacora/bitacora' , [

                    //Ahora le pasamos los datos
                        'bitacora' => $bitacora,
                        'crud' => $crud    

                ]);
        }

    //CREATE
        public static function create__Bitacora(Router $router) {           
                    
            //Definimos que ocurre con el método POST
            if($_SERVER['REQUEST_METHOD'] === 'POST') {

                //Obtenemos las variables del archivo
                    $_POST['id'] = Codigo::generarId("Bitácora");      

                //Creamos el registro en la BBDD
                    $nuevaBitacora = new Bitacora($_POST);

                    $nuevaBitacora->usuario = Personal::findByEmail($_SESSION['usuario'])->id;

                    $nuevaBitacora->categoria = $_POST['selector2'];
                    $nuevaBitacora->subcategoria = $_POST['selector3'];
                    $nuevaBitacora->referencia = $_POST['referencia'];
                    $nuevaBitacora->estado = 1;

                    $nuevaBitacora->create();         

                //Redirigimos a la página principal
                    header('Location:' . $_POST['url']);   

            }

        }

    //READ
        public static function read__bitacora(Router $router){

            //Obtenemos el id que hemos pasado por el método get en la url
                $id = $_GET['id'];

            //Cargamos los datos y lo guardamos en una variable, que luego pasaremos por al router
                $bitacora = Bitacora::find($id);

            //Obtenemos el tipo de modelo que es
                $array = Codigo::analizarId($bitacora->referencia); 

            //Le asignamos los valores 
                $bitacora->rutaIndex = $array[0]->rutaIndex;
                $bitacora->ico = $array[0]->ico;

            //Cargamos todos los selectores
                $categorias = Codigo::cargarCategoria($bitacora->origen);
                $subcategorias = Codigo::cargarSubcategorias($bitacora->categoria);
                $referencias = Codigo::cargarElementos($bitacora->subcategoria);

            //Cargamos los archivos adjuntos y las relaciones
                $archivosAdjuntos = Adjuntos::cargarAdjuntos($id);
                $relaciones = Relacion::cargarRelaciones($id);

            //Validamos los datos
                $errores = $bitacora->validar();

            //Definimos la acción CRUD
                $crud = 2;

            //Invovamos el método router
                $router->render('/00/Bitacora/bitacora_form' , [

                    //Ahora le pasamos los datos
                        'crud' => $crud,
                        'bitacora' => $bitacora,
                        'categorias' => $categorias,
                        'subcategorias' => $subcategorias,
                        'referencias' => $referencias,
                        'archivosAdjuntos' => $archivosAdjuntos,    
                        'relaciones' => $relaciones,              
                        'errores' => $errores,

                ]);
        }

    //UPDATE
        public static function update__bitacora(Router $router){

            //Obtenemos el id que hemos pasado por el método get en la url
                $id = $_GET['id'];

            //Cargamos los datos y lo guardamos en una variable, que luego pasaremos por al router
                $bitacora = Bitacora::find($id);

                //Obtenemos el tipo de modelo que es
                    $array = Codigo::analizarId($bitacora->referencia); 

                //Le asignamos los valores 
                    $bitacora->rutaIndex = $array[0]->rutaIndex;
                    $bitacora->ico = $array[0]->ico;

                //Cargamos todos los selectores
                    $categorias = Codigo::cargarCategoria($bitacora->origen);
                    $subcategorias = Codigo::cargarSubcategorias($bitacora->categoria);
                    $referencias = Codigo::cargarElementos($bitacora->subcategoria);

            //Cargamos los archivos adjuntos y las relaciones
                $archivosAdjuntos = Adjuntos::cargarAdjuntos($id);
                $relaciones = Relacion::cargarRelaciones($id);

            //Validamos los datos
                $errores = $bitacora->validar();

            //Definimos la acción CRUD
                $crud = 3;

            //Definimos que ocurre con el método POST
                if($_SERVER['REQUEST_METHOD'] === 'POST') {

                    //Asignamos los atributos
                        $args = $_POST;
                        
                    //Sincronizamos
                        $bitacora->sincronizar($args);

                    //Validamos los datos
                        $errores = $bitacora->validar();
                        
                    //Si no hay ningún error, guardamos
                        if(empty($errores)) {

                            //Creamos el registro en la BBDD
                                $bitacora->update();

                            //Redirigimos a la página principal
                                header('Location:/bitacora/read?id=' . $bitacora->id);

                        }    
                }

            //Invovamos el método router
                $router->render('/00/Bitacora/bitacora_form' , [

                    //Ahora le pasamos los datos
                        'crud' => $crud,
                        'bitacora' => $bitacora,
                        'categorias' => $categorias,
                        'subcategorias' => $subcategorias,
                        'referencias' => $referencias,
                        'archivosAdjuntos' => $archivosAdjuntos,    
                        'relaciones' => $relaciones,              
                        'errores' => $errores,

                ]);
        }

    //region DELETE
        public static function delete__bitacora(Router $router){

            //Definimos que ocurre con el método POST
                if($_SERVER['REQUEST_METHOD'] === 'POST') {

                    //Obtenemos las variables con el método post
                        $id = $_POST['id'];

                    //Localizamos el registro
                        $bitacora = Bitacora::find($id);
                    
                    //Primero eliminamos los adjuntos y las relaciones
                        $adjuntos = Adjuntos::EliminarAdjuntosPorItem($id);
                        $relacion = Relacion::EliminarRelacionPorItem($id);

                    //Eliminamos el registro
                        $bitacora->delete($id);

                    //Redirigimos a la página principal
                        header('Location:/bitacora');
            
                };
        }

    //AJAX
        public static function cargarCategorias(Router $router) {           
                
            //Obtenemos todos los subapartados
                if($_POST['origen'] = 'Calidad'){
                    $categorias = Codigo::cargarCategoria($_POST['origen']);
                }
                else{
                    $categorias = '';
                };

                ?>

                <!-- Ahora definimos el HTML que se va a pasar  ¡Fuera de PHP! -->

                    <option selected value=''>Seleccione la categoría...</option> 

                        <?php foreach($categorias as $categoria) { ?>
                        
                            <option value='<?php echo s($categoria->apartado);?>' >
                                
                                <?php echo s($categoria->apartado); ?> 
                
                            </option>
                
                        <?php } ?>

                <?php
                
        }
        
        public static function cargarSubcategorias(Router $router) {           

            //Obtenemos todos los subapartados
            $subcategorias = Codigo::cargarSubcategorias($_POST['categoria']);

                ?>

                <!-- Ahora definimos el HTML que se va a pasar  ¡Fuera de PHP! -->

                    <option selected value=''>Seleccione la subcategoria...</option> 

                <?php foreach($subcategorias as $subcategoria) { ?>
                
                    <option value='<?php echo s($subcategoria->elementoSistema);?>' >
                        
                        <?php echo s($subcategoria->elementoSistema); ?> 
        
                    </option>
        
                <?php } ?>

                <?php
                
        }

        public static function cargarElementos(Router $router) {           

            $codigos = Codigo::cargarElementos($_POST['subcategoria']); 

            ?>

            <!-- Ahora definimos el HTML que se va a pasar  ¡Fuera de PHP! -->

                        <option selected value=''>Seleccione el elemento...</option> 

                    <?php foreach($codigos as $codigo) { ?>
                    
                        <option value='<?php echo s($codigo->id);?>' >

                            <?php 

                                if(isset($codigo->codigo_interno)){
                                    echo s($codigo->codigo_interno); 
                                    echo s(" - "); 
                                }
                                else{
                                    echo s($codigo->id); 
                                    echo s(" - "); 
                                };

                                if(isset($codigo->denominador)){
                                    echo s($codigo->denominador); 
                                };

                            ?> 
            
                        </option>
            
                    <?php } ?>

            <?php
            
        }

    }