<?php

    namespace ControllerGeneral;
    use MVC\Router;

    //General
        Use ModelGeneral\Relacion;
        Use ModelGeneral\Codigo;
        Use ModelGeneral\Log;

    class RelacionController {

        public static function cargarRelaciones(Router $router) {           

             //Obtenemos los datos del item1, obtenemos sus datos y lo hacemos objeto
                $array = Codigo::analizarId($_GET['id']);            
                $modelo = $array[0]->namespace . '\\' . $array[0]->modelo;
                $item1 = new $modelo;

                $item1 = $item1::find($_GET['id']);
                $item1->elementoSistema = $array[0]->elementoSistema;

            //Obtenemos todas las relaciones de item1
                $relaciones = Relacion::cargarRelaciones($item1->id);

            //Obtenemos todos los apartados
                $apartados = Codigo::cargarApartados();
            
            //Definimos la acción CRUD
                $crud = 3;

             //Invovamos el método router
                $router->render('/relaciones/relaciones', [
                
                    //Ahora le pasamos los datos
                        'item1' => $item1,
                        'relaciones' => $relaciones,
                        'apartados' => $apartados,
                        'crud' => $crud
                
                ]);

        }

       public static function cargarRelacionesAjax(Router $router) {           

            //Obtenemos los datos del item1, obtenemos sus datos y lo hacemos objeto
                $array = Codigo::analizarId($_POST['id']);    
                $modelo = $array->namespace . '\\' . $array->modelo;
                
                $item1 = new $modelo;

                $item1 = $item1::find($_POST['id']);
                $item1->elementoSistema = $array->elementoSistema;

           //Obtenemos todas las relaciones de item1
               $relaciones = Relacion::cargarRelaciones($item1->id);

               //debuguear($relaciones);

           //Obtenemos todos los apartados
                $url_recarga = $_POST['url_recarga'];
           
           //Definimos la acción CRUD
               $crud = 2;

               $auth = $_POST['auth'];

            ?>

                <div class="relation__area">

                    <div class="relation__header">

                        <div class="title">

                            <h2>
                                <svg class="ico ico__conexiones b"></svg>
                                Relaciones
                            </h2>

                        </div>

                        <?php if($auth && $crud == 2): ?>

                            <div class="button">

                                <div class="newRelation__button">

                                    <button 
                                        type="button" 
                                        class="button button__primary button__regular button__blue w100"
                                        onclick="showRelaciones('<?php echo $_POST['id'] ?>')"
                                    > 
                                        <svg class="ico ico__conexiones w"></svg>
                                        <span>Añadir relación</span>
                                    </button>

                                </div>   

                            </div>      
                        
                        <?php endif; ?>

                    </div>

                    <?php if(isset($relaciones) && !empty($relaciones)):?>

                        <div class="relation__body">

                            <ul class="download__list">

                                <?php foreach ($relaciones as $relacion): ?>

                                    <li class="download__item">

                                        <div class="download__archive">

                                            <a 
                                                href='<?php echo $relacion->rutaIndex; ?>' 
                                            >
                                                <div class="download__title">
                                                    <svg class="ico <?php echo $relacion->ico?> d icoChange"></svg>
                                                    <?php echo $relacion->descripcion ?>
                                                </div>

                                                <div class="download__info">
                                                    <?php echo $relacion->codigo_interno ?>
                                                    |
                                                    <?php echo $relacion->elementoSistema ?>                       
                                                </div>                                   

                                            </a>

                                            <?php if($auth): ?>

                                                <div class="download__buttons">

                                                    <form 
                                                        method="POST" 
                                                        action="/relaciones/d" 
                                                        id="formEliminarRelacion"
                                                    >

                                                        <input type="hidden" name="id" value="<?php echo $relacion->id; ?>">
                                                        <input type="hidden" name="url" value="<?php echo($url_recarga) ?>">

                                                            <div class="tooltip">

                                                                <button 
                                                                    type="button" 
                                                                    class="button button__primary button__small button__red"
                                                                    onclick="confirmarEliminarRelacion(this.form)"
                                                                > 
                                                                    <svg class="ico ico__papelera w"></svg>
                                                                </button>     
                                                                
                                                                <span class="tooltiptext">Eliminar relación</span>
                                                                
                                                            </div>
                                                    </form>

                                                </div>

                                            <?php endif; ?>

                                        </div>

                                    </li>
                                
                                <?php endforeach; ?>

                            </ul>

                        </div>     

                    <?php else: ?>

                        <div class="relation__body">
                            <p> No se han encontrado relaciones con otros elementos del sistema. </p>
                        </div>   
                        
                    <?php endif; ?>

                </div>

    <?php

       } 

        public static function crearRelaciones(Router $router) {          

            //Definimos que ocurre con el método POST
                if($_SERVER['REQUEST_METHOD'] === 'POST') {

                    //Obtenemos las variables del archivo
                        $_POST['id'] = Codigo::generarId("Relación");      

                    //Creamos el registro en la BBDD
                        $nuevaRelacion = new Relacion($_POST);
                        $nuevaRelacion->create();         

                    //registramos el control de cambios
                        Log::relationLog($nuevaRelacion);

                    //Redirigimos a la página principal
                        if($_POST['irl'] = ""){
                            header('Location:' . '/'); 
                        }
                        
                        header('Location:' . $_POST['url']);   

                }

        }

        public static function cargarCategorias(Router $router) {           
            
            //Obtenemos todos los subapartados
                if($_POST['origen'] =='Calidad'){
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

            $codigos = Codigo::cargarElementos($_POST['subcategoria']); ?>

            <!-- Ahora definimos el HTML que se va a pasar  ¡Fuera de PHP! -->

                <option selected value=''>Seleccione el elemento...</option> 

                    <?php foreach($codigos as $codigo) { ?>
                    
                        <option value='<?php echo s($codigo->id);?>' >
                            
                            <?php 
                                echo s("["); 
                                echo s($codigo->codigo_interno); 
                                echo s("] "); 
                                echo s($codigo->denominador); 
                            ?> 
            
                        </option>
            
                    <?php } ?>

            <?php
            
        }

        public static function eliminarRelacion(Router $router) {

            //Definimos que ocurre con el método POST
                if($_SERVER['REQUEST_METHOD'] === 'POST') {

                    //Obtenemos las variables con el método post
                        $id = $_POST['id'];

                    //Localizamos el registro
                        $relacion = Relacion::find($id);

                    //Eliminamos el registro
                        $relacion->delete($id);

                    //registramos el control de cambios
                        Log::deleterelationLog($relacion);

                    //Redirigimos a la página principal
                        header('Location:' . $_POST['url']);
            
                };
        }

    }   
    
?>