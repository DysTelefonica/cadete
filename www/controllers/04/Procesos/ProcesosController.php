<?php

    namespace ControllerProcesos;
        
    //Router
        use MVC\Router;

    //Procesos
        use ModelProceso\Proceso;

    //General
        Use ModelGeneral\Adjuntos;
        Use ModelGeneral\Relacion;
        Use ModelGeneral\Bitacora;
        Use ModelGeneral\Cambio;
        Use ModelGeneral\Codigo;

    class ProcesosController {

        //region RUTAS

            public static function procesos(Router $router) {
                
                //Definimos la acción CRUD
                     $crud = 2;

                //Cargamos los datos y lo guardamos en una variable, que luego pasaremos por al router
                    $procesosDYS = Proceso::cargarProcesosDYS();
                    $procesosTDE = Proceso::cargarProcesosTDE();

                //Invovamos el método router
                    $router->render('/04/Procesos/procesos' , [

                        //Ahora le pasamos los datos
                            'procesosDYS' => $procesosDYS,
                            'procesosTDE' => $procesosTDE,
                            'crud' => $crud    
                
                    ]);

            }

    //endregion

        //region CREATE

            public static function create__Proceso(Router $router){

                //Cargamos los datos y lo guardamos en una variable, que luego pasaremos por al router
                    $proceso = new Proceso;

                //Definimos la acción CRUD
                    $crud = 1;

                //Definimos que ocurre con el método POST
                    if($_SERVER['REQUEST_METHOD'] === 'POST') {

                        $proceso = new Proceso($_POST);

                        //Especificamos el tipo de elemento del sistema que es para calcular el id
                            $elementoSistema = "Proceso";  

                            //Asignamos un id al nuevo análisis de contexto
                                $proceso->id = Codigo::generarId($elementoSistema);
                                $proceso->estado = 1;

                            //Validamos los datos
                                $errores = $proceso->validar();
                                
                            //Si no hay ningún error, guardamos
                                if(empty($errores)) {

                                    //Creamos el registro en la BBDD
                                        $proceso->create();

                                    //registramos el control de cambios
                                        Cambio::create__Cambio($proceso);

                                    //Registramos la bitácora
                                        $bitacora = Bitacora::create__BitacoraAutomatica(
                                            "Se ha dado de alta el proceso " . $proceso->codigo_interno,
                                            "Calidad",
                                            "04. Contexto de la organización", 
                                            "Proceso", 
                                            $proceso->id
                                        );

                                    //Redirigimos a la página principal
                                        header('Location:/contexto/procesos');
                                }    
                        }

                //Invovamos el método router
                    $router->render('/04/Procesos/procesos_form' , [

                        //Ahora le pasamos los datos
                            'crud' => $crud,
                            'proceso' => $proceso,                
                    ]);
            }

        //endregion

        //region READ

            public static function read__Proceso(Router $router) {
            
                //Definimos la acción CRUD
                        $crud = 2;

                //Cargamos los datos y lo guardamos en una variable, que luego pasaremos por al router
                    $proceso = Proceso::find($_GET['id']);

                //Cargamos los archivos adjuntos y las relaciones
                    $archivosAdjuntos = Adjuntos::cargarAdjuntos($_GET['id']);
                    $relaciones = Relacion::cargarRelaciones($_GET['id']);

                //Invovamos el método router
                    $router->render('/04/Procesos/procesos_form' , [

                        //Ahora le pasamos los datos
                            'proceso' => $proceso,
                            'archivosAdjuntos' => $archivosAdjuntos,    
                            'relaciones' => $relaciones,       
                            'crud' => $crud    
                
                    ]);

            }

        //endregion

        //region UPDATE

            public static function update__Proceso(Router $router){

                //Obtenemos el id que hemos pasado por el método get en la url
                    $id = $_GET['id'];

                //Cargamos los datos y lo guardamos en una variable, que luego pasaremos por al router
                    $proceso = Proceso::find($_GET['id']);

                //Validamos los datos
                    $errores = $proceso->validar();

                //Definimos la acción CRUD
                    $crud = 3;

                //Definimos que ocurre con el método POST
                    if($_SERVER['REQUEST_METHOD'] === 'POST') {
                        
                        //Asignamos los atributos
                            $args = $_POST;        
                            
                        //registramos el control de cambios
                            Cambio::update__Cambio($proceso, array_diff_assoc($args, get_object_vars($proceso)));
                            
                        //Sincronizamos
                            $proceso->sincronizar($args);

                        //Validamos los datos
                            $errores = $proceso->validar();
                            
                        //Si no hay ningún error, guardamos
                            if(empty($errores)) {

                                //Creamos el registro en la BBDD
                                    $proceso->update();

                                //Redirigimos a la página principal
                                    header('Location:/contexto/procesos/read?id=' . $proceso->id);

                            }    
                    }

                    //Invovamos el método router
                        $router->render('/04/Procesos/procesos_form' , [

                            //Ahora le pasamos los datos
                                'proceso' => $proceso,
                                'crud' => $crud    

                        ]);
            }

        //endregion

        //region DELETE

            public static function delete__Proceso(Router $router){

                //Definimos que ocurre con el método POST
                    if($_SERVER['REQUEST_METHOD'] === 'POST') {

                        //Localizamos el registro
                            $id = $_POST['id'];
                            $proceso = Proceso::find($id);
                        
                        //Eliminamos el registro
                            Adjuntos::EliminarAdjuntosPorItem($id);
                            Relacion::EliminarRelacionPorItem($id);       
                            $proceso->delete($id);

                        //Registramos el control de cambios  
                            Cambio::delete__Cambio($proceso);

                        //Registramos la bitácora
                            $bitacora = Bitacora::create__BitacoraAutomatica(
                                "Eliminado Proceso " . $proceso->codigo_interno,
                                "Calidad",
                                "04. Contexto de la organización", 
                                "Proceso", 
                                $proceso->id
                            );

                        //Redirigimos a la página principal
                            header('Location:/contexto/procesos');
                
                    };
            }

        //endregion

    }