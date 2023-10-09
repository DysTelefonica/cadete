<?php

    namespace ControllerProyectosMejora;
    use MVC\Router;

    //Proyectos de Mejora
        use ModelProyectoMejora\ProyectoMejora;
        use ModelProyectoMejora\EstadoProyectoMejora;

    //Planes Acción
        use ModelPlanAccion\PlanAccion;

    //General
        use ModelGeneral\Personal;
        Use ModelGeneral\Adjuntos;
        Use ModelGeneral\Relacion;
        Use ModelGeneral\Bitacora;
        Use ModelGeneral\Log;
        Use ModelGeneral\Codigo;

    class ProyectosMejoraController {

        //RUTAS

            public static function proyectos_mejora(Router $router) {
                
                $crud = 2;
                $proyectosMejora = ProyectoMejora::readAll_estado();
                $estadosProyectosMejora = EstadoProyectoMejora::readAll();

                foreach ($proyectosMejora as $pm) {
                    $pm->indicador = EstadoProyectoMejora::asignarIndicador($pm->estado, $estadosProyectosMejora);
                }

                //Invovamos el método router
                    $router->render('/06/ProyectosMejora/proyectos-mejora', [
                        
                        'proyectosMejora' => $proyectosMejora,
                        'estadosProyectosMejora' => $estadosProyectosMejora,
                        'crud' => $crud

                    ]);

            }

        //CREATE

            public static function create__ProyectoMejora(Router $router){

                //Creamos una nueva instancia del modelo que vamos a crear, que luego pasaremos por al router
                    $proyectoMejora = new ProyectoMejora;

                //Cargamos los estados
                    $estadosProyectosMejora = EstadoProyectoMejora::readAll();

                //Calculamos el código
                    $codigoCalculado = ProyectoMejora::calcularCodigo();
                    
                //Definimos la acción CRUD
                    $crud = 1;

                //Definimos que ocurre con el método POST
                    if($_SERVER['REQUEST_METHOD'] === 'POST') {

                        $proyectoMejora = new ProyectoMejora($_POST);

                        //Validamos los datos
                            $errores = $proyectoMejora->validar();
                            
                        //Si no hay ningún error, guardamos
                            if(empty($errores)) {

                                //Reasignamos el valor del código interno, por si se han subido varias cosas a la vez
                                    $proyectoMejora->codigo_interno = ProyectoMejora::calcularCodigo();

                                //Asignamos un id al nuevo análisis de contexto
                                    $proyectoMejora->id = Codigo::generarId("Proyecto de Mejora");
                                    $proyectoMejora->fechaDeteccion = obtenerFecha();

                                //Creamos el registro en la BBDD
                                    $proyectoMejora->create();

                                //Registramos el log
                                    Log::createLog($proyectoMejora);

                                //Registramos la bitácora
                                    Bitacora::create__BitacoraAutomatica(
                                    
                                        "Creado Proyecto de Mejora " . $proyectoMejora->codigo_interno,
                                        "Calidad",
                                        "06. Proyectos de Mejora", 
                                        "Proyecto de mejora", 
                                        $proyectoMejora->id
                                
                                    );                                    

                                //Creamos el plan de acción
                                    if($_POST['decision'] == 1){

                                        if($proyectoMejora->estado == 3 || $proyectoMejora->estado == 4){

                                            $pa = new PlanAccion();
    
                                            $pa->id = Codigo::generarId("Plan de Acción");
                                            $pa->codigo_interno = PlanAccion::calcularCodigo();
                                            $pa->denominador = $proyectoMejora->denominador;
                                            $pa->origen = "Proyecto de mejora " . $proyectoMejora->codigo_interno;
                                            $pa->fechaInicio = $proyectoMejora->fechaDeteccion;
    
                                            if($proyectoMejora->estado == 3){
                                                $pa->estado = 2;
                                            }
                                            elseif($proyectoMejora->estado == 4){
                                                $pa->estado = 3;
                                            }
    
                                            $pa->fechaInicio = $proyectoMejora->fechaDeteccion;
    
                                            $pa->create();

                                            //registramos el log
                                                Log::createLog($pa);
    
                                            //Creamos la relación
                                                $relacion = new Relacion();
                                                $relacion->id = Codigo::generarId("Relación");
                                                $relacion->id_item1 = $proyectoMejora->id;
                                                $relacion->id_item2 = $pa->id;
                                                $relacion->create(); 

                                                //registramos el log
                                                    Log::relationLog($relacion);
    
                                        }

                                    }
                                

                                //Redirigimos a la página principal
                                    header('Location:/planificacion/proyectos-mejora');
                            }    
                    }

                //Invovamos el método router
                    $router->render('/06/ProyectosMejora/proyectos-mejora_form' , [

                        //Ahora le pasamos los datos
                            'crud' => $crud,
                            'proyectoMejora' => $proyectoMejora,
                            'codigoCalculado' => $codigoCalculado,
                            'estadosProyectosMejora' => $estadosProyectosMejora
                
                    ]);
            }

        //READ

            public static function read__ProyectoMejora(Router $router){

                //Cargamos los datos y lo guardamos en una variable, que luego pasaremos por al router
                    $proyectoMejora = ProyectoMejora::find_estado($_GET['id']);  

               //Cargamos los estados
                    $estadosProyectosMejora = EstadoProyectoMejora::readAll();

                //Asignamos el indicador
                    $proyectoMejora->indicador = EstadoProyectoMejora::asignarIndicador($proyectoMejora->estado, $estadosProyectosMejora);

                //Cargamos los posibles responsables
                    $responsables = Personal::readAll();

                //Validamos los datos
                    // $errores = $proyectoMejora->validar();

                //Definimos la acción CRUD
                    $crud = 2;

                //Invovamos el método router
                    $router->render('/06/ProyectosMejora/proyectos-mejora_form' , [

                        //Ahora le pasamos los datos
                            'crud' => $crud,
                            'proyectoMejora' => $proyectoMejora,         
                            'estadosProyectosMejora' => $estadosProyectosMejora,
                
                    ]);
            }

            public static function readAjax__ProyectoMejora(Router $router) {

                $crud = 2;
                $proyectosMejora = ProyectoMejora::readAll_filterbyestado($estado);
                $estadosProyectosMejora = EstadoProyectoMejora::readAll();

                foreach ($proyectosMejora as $pm) {
                    $pm->indicador = EstadoProyectoMejora::asignarIndicador($pm->estado, $estadosProyectosMejora);
                }
    
            }
        
        //UPDATE
            public static function update__ProyectoMejora(Router $router){

                //Cargamos los datos y lo guardamos en una variable, que luego pasaremos por al router
                    $proyectoMejora = ProyectoMejora::find_estado($_GET['id']);  

                //Cargamos los estados
                    $estadosProyectosMejora = EstadoProyectoMejora::readAll();

                //Validamos los datos
                    $errores = $proyectoMejora->validar();

                //Definimos la acción CRUD
                    $crud = 3;

                //Definimos que ocurre con el método POST
                    if($_SERVER['REQUEST_METHOD'] === 'POST') {

                        //Asignamos los atributos
                            $args = $_POST;

                        //registramos el log
                            Log::updateLog($proyectoMejora, array_diff_assoc($args, get_object_vars($proyectoMejora)));

                        //Sincronizamos
                            $proyectoMejora->sincronizar($args);

                        //Validamos los datos
                            $errores = $proyectoMejora->validar();
                            
                        //Si no hay ningún error, guardamos
                            if(empty($errores)) {

                                //Creamos el registro en la BBDD
                                    $proyectoMejora->update();

                                //Creamos el plan de acción
                                    if($_POST['decision'] == 1){

                                        if($proyectoMejora->estado == 3 || $proyectoMejora->estado == 4){

                                            $pa = new PlanAccion();
    
                                            $pa->id = Codigo::generarId("Plan de Acción");
                                            $pa->codigo_interno = PlanAccion::calcularCodigo();
                                            $pa->denominador = $proyectoMejora->denominador;
                                            $pa->origen = "Proyecto de mejora " . $proyectoMejora->codigo_interno;
                                            $pa->fechaInicio = $proyectoMejora->fechaDeteccion;
    
                                            if($proyectoMejora->estado == 3){
                                                $pa->estado = 2;
                                            }
                                            elseif($proyectoMejora->estado == 4){
                                                $pa->estado = 3;
                                            }
    
                                            $pa->fechaInicio = $proyectoMejora->fechaDeteccion;
    
                                            $pa->create();
    
                                            //Creamos la relación
                                                $relacion = new Relacion();
                                                $relacion->id = Codigo::generarId("Relación");
                                                $relacion->id_item1 = $proyectoMejora->id;
                                                $relacion->id_item2 = $pa->id;
                                                $relacion->create(); 
    
                                        }

                                    }

                                //Redirigimos a la página principal
                                    header('Location:/planificacion/proyectos-mejora/read?id=' . $proyectoMejora->id);

                            }    
                    }

                //Invovamos el método router
                    $router->render('/06/ProyectosMejora/proyectos-mejora_form' , [

                        //Ahora le pasamos los datos
                            'crud' => $crud,
                            'proyectoMejora' => $proyectoMejora,      
                            'errores' => $errores,
                            'estadosProyectosMejora' => $estadosProyectosMejora
                
                    ]);
            }

        //DELETE
            public static function delete__ProyectoMejora(Router $router){

                //Cargamos los datos y lo guardamos en una variable, que luego pasaremos por al router
                    $proyectoMejora = ProyectoMejora::find($_GET['id']);  
                        
                //Primero eliminamos los adjuntos y las relaciones
                    Adjuntos::EliminarAdjuntosPorItem($_GET['id']);
                    Relacion::EliminarRelacionPorItem($_GET['id']);

                //Eliminamos el registro
                    $proyectoMejora->delete($_GET['id']);

                //Registramos el control de cambios
                    //Cambio::delete__Cambio($pa);

                //Registramos la bitácora
                    // $bitacora = Bitacora::create__BitacoraAutomatica(
                    //     "Eliminado Plan de Acción " . $pa->codigo_interno,
                    //     "Calidad",
                    //     "06. Planes de Acción", 
                    //     "Plan de Acción", 
                    //     $pa->id
                    // );

                //Redirigimos a la página principal
                    header('Location:/planificacion/proyectos-mejora');
            
            }

    }