<?php

    namespace ControllerPlanesAccion;
    use MVC\Router;

    //Planes Acción
        use ModelPlanAccion\PlanAccion;
        use ModelPlanAccion\Accion;
        use ModelPlanAccion\TareaCircular;
        use ModelPlanAccion\TipoPlanAccion;
        use ModelPlanAccion\EstadoPlanAccion;

    //General
        use ModelGeneral\Personal;
        Use ModelGeneral\Adjuntos;
        Use ModelGeneral\Relacion;
        Use ModelGeneral\Bitacora;
        Use ModelGeneral\Log;
        Use ModelGeneral\Codigo;

    class PlanesAccionController {

        //RUTAS

            public static function planificacion_cambios(Router $router) {
                
                $crud = 2;

                $planesAccion = PlanAccion::readAll_estado();
                $tareascirculares= TareaCircular::readAll();
                $estadosPlanAccion = EstadoPlanAccion::readAll();

                foreach ($planesAccion as $pa) {
                    $pa->indicador = EstadoPlanAccion::asignarIndicador($pa->estado, $estadosPlanAccion);

                    $pa->r = Personal::find_WithAvatar($pa->responsable);
                    
                }               

                foreach ($tareascirculares as $tc) {
                    $tc->indicador = EstadoPlanAccion::asignarIndicador($tc->estado, $estadosPlanAccion);
                    $tc->r = Personal::find_WithAvatar($tc->responsable);
                    
                }

                //Invovamos el método router
                    $router->render('/06/PlanesAccion/planificacion-cambios', [
                        
                        'planesAccion' => $planesAccion,
                        'tareascirculares' => $tareascirculares,
                        'crud' => $crud

                    ]);

            }

        //CREATE

            public static function create__PlanAccion(Router $router){

                //Creamos una nueva instancia del modelo que vamos a crear, que luego pasaremos por al router
                    $pa = new PlanAccion;

                //Arreglo con mensajes de error
                    $errores = PlanAccion::getErrores();

                //Cargamos los estados
                    $estadosPlanAccion = EstadoPlanAccion::readAll();

                //Cargamos los posibles responsables
                    $responsables = Personal::permisoProyectosMejora();

                //Calculamos el código

                    if(isset($_GET['tipo'])){

                        switch ($_GET['tipo']) {
                            case 1:
                                $codigoCalculado = PlanAccion::calcularCodigo();
                                break;
                            
                            case 2:
                                $codigoCalculado = TareaCircular::calcularCodigo();
                                break;
                        }

                    }                    
                    
                //Definimos la acción CRUD
                    $crud = 1;

                //Definimos que ocurre con el método POST
                    if($_SERVER['REQUEST_METHOD'] === 'POST') {

                        $pa = new PlanAccion($_POST);

                        //Validamos los datos
                            $errores = $pa->validar();
                            
                        //Si no hay ningún error, guardamos
                            if(empty($errores)) {

                                //Reasignamos el valor del código interno, por si se han subido varias cosas a la vez
                                    $pa->codigo_interno = PlanAccion::calcularCodigo();

                                //Asignamos un id al nuevo análisis de contexto
                                    $pa->id = Codigo::generarId("Plan de Acción");

                                //Creamos el registro en la BBDD
                                    $pa->create();

                                //registramos el control de cambios
                                    Log::createLog($pa);

                                //Registramos la bitácora
                                    Bitacora::create__BitacoraAutomatica(                                
                                        "Creado Plan de Acción " . $pa->codigo_interno,
                                        "Calidad",
                                        "06. Planes de Acción", 
                                        "Plan de Acción", 
                                        $pa->id
                             
                                    );

                                //Redirigimos a la página principal
                                    header('Location:/planificacion/planificacion-cambios');
                            }    
                    }

                //Invovamos el método router
                    $router->render('/06/PlanesAccion/planaccion_form' , [

                        //Ahora le pasamos los datos
                            'crud' => $crud,
                            'pa' => $pa,
                            'errores' => $errores,
                            'codigoCalculado' => $codigoCalculado,
                            'responsables' => $responsables,
                            'estadosPlanAccion' => $estadosPlanAccion
                
                    ]);
            }

            public static function create__Accion(Router $router){

                //Creamos una nueva instancia del modelo que vamos a crear, que luego pasaremos por al router
                    $a = new Accion;
                    $pa = PlanAccion::find($_GET['pa']);
                    $a->planAccion = $pa->id;

                //Arreglo con mensajes de error
                    $errores = Accion::getErrores();

                //Cargamos los posibles responsables
                    $responsables = Personal::permisoProyectosMejora();

                //Calculamos el código
                    $codigoCalculado = Accion::calcularCodigo($pa->id);
                    
                //Definimos la acción CRUD
                    $crud = 1;

                //Definimos que ocurre con el método POST
                    if($_SERVER['REQUEST_METHOD'] === 'POST') {

                        $a = new Accion($_POST);

                        //Validamos los datos
                            $errores = $a->validar();
                            
                        //Si no hay ningún error, guardamos
                            if(empty($errores)) {

                                //Reasignamos el valor del código interno, por si se han subido varias cosas a la vez
                                    $a->codigo_interno = Accion::calcularCodigo($pa->id);

                                //Asignamos un id al nuevo análisis de contexto
                                    $a->id = Codigo::generarId("Acción derivada de Plan de acción");
                                    $a->planAccion = $pa->id;

                                //Creamos el registro en la BBDD
                                    $a->create();

                                //Registramos el log y la bitácora
                                    Log::createLog($a);

                                    Bitacora::create__BitacoraAutomatica(
                                    
                                        "Creada Acción " . $a->codigo_interno,
                                        "Calidad",
                                        "06. Planes de Acción", 
                                        "Acción", 
                                        $a->id
                             
                                    );

                                //Redirigimos a la página principal
                                    header('Location:/planificacion/planificacion-cambios/read?id=' . $pa->id);
                            }    
                    }

                //Invovamos el método router
                    $router->render('/06/PlanesAccion/accion_form' , [

                        //Ahora le pasamos los datos
                            'crud' => $crud,
                            'a' => $a,
                            'errores' => $errores,
                            'codigoCalculado' => $codigoCalculado,
                            'responsables' => $responsables,
                            'pa' => $pa,
                    ]);
            }

        //READ

            public static function read__PlanAccion(Router $router){

                //Cargamos los datos y lo guardamos en una variable, que luego pasaremos por al router
                    $pa = PlanAccion::find_estado($_GET['id']);  

                //Cargamos los estados
                    $estadosPlanAccion = EstadoPlanAccion::readAll();

                //Asignamos el indicador
                    $pa->indicador = EstadoPlanAccion::asignarIndicador($pa->estado, $estadosPlanAccion);

                //acciones
                    $pa->acciones = Accion::readAll_PlanAccion($pa->id);

                //Cargamos los posibles responsables
                    $responsables = Personal::permisoProyectosMejora();
                    $responsable = Personal::find($pa->responsable);
                    if(isset($responsable) && !empty($responsable)){
                        $responsable->avatar = '/build/img/users/' . $responsable->id . '.jpg';
                    }

                //Validamos los datos
                    $errores = $pa->validar();

                //Definimos la acción CRUD
                    $crud = 2;

                //Invovamos el método router
                    $router->render('/06/PlanesAccion/planaccion_form' , [

                        //Ahora le pasamos los datos
                            'crud' => $crud,
                            'pa' => $pa,         
                            'errores' => $errores,
                            'responsables' => $responsables,
                            'responsable' => $responsable,
                            'estadosPlanAccion' => $estadosPlanAccion
                
                    ]);
            }

            public static function read__Accion(Router $router){

                //Cargamos los datos y lo guardamos en una variable, que luego pasaremos por al router
                    $a = Accion::find($_GET['id']);  
                    $pa = PlanAccion::find($a->planAccion);  

                //Cargamos los posibles responsables
                    $responsables = Personal::permisoProyectosMejora();
                    $responsable = Personal::find($a->responsable);

                //Validamos los datos
                    $errores = $a->validar();

                //Definimos la acción CRUD
                    $crud = 2;

                //Invovamos el método router
                    $router->render('/06/PlanesAccion/accion_form' , [

                        //Ahora le pasamos los datos
                            'crud' => $crud,
                            'a' => $a,       
                            'pa' => $pa,      
                            'errores' => $errores,
                            'responsables' => $responsables,
                            'responsable' => $responsable,
                
                    ]);
            }
        
        //UPDATE
            public static function update__PlanAccion(Router $router){

                //Cargamos los datos y lo guardamos en una variable, que luego pasaremos por al router
                    $pa = PlanAccion::find_estado($_GET['id']);  

                //Cargamos los estados
                    $estadosPlanAccion = EstadoPlanAccion::readAll();
                    $pa->indicador = EstadoPlanAccion::asignarIndicador($pa->estado, $estadosPlanAccion);

                //Cargamos los posibles responsables
                    $responsables = Personal::permisoProyectosMejora();

                //Validamos los datos
                    $errores = $pa->validar();

                //Definimos la acción CRUD
                    $crud = 3;

                //Definimos que ocurre con el método POST
                    if($_SERVER['REQUEST_METHOD'] === 'POST') {

                        //Asignamos los atributos
                            $args = $_POST;
                            
                        //Sincronizamos
                            $pa->sincronizar($args);

                        //Validamos los datos
                            $errores = $pa->validar();
                            
                        //Si no hay ningún error, guardamos
                            if(empty($errores)) {

                                //Creamos el registro en la BBDD
                                    $pa->update();

                                //Redirigimos a la página principal
                                    header('Location:/planificacion/planificacion-cambios/read?id=' . $pa->id);

                            }    
                    }

                //Invovamos el método router
                    $router->render('/06/PlanesAccion/planaccion_form' , [

                        //Ahora le pasamos los datos
                            'crud' => $crud,
                            'pa' => $pa,      
                            'errores' => $errores,
                            'responsables' => $responsables,
                            'estadosPlanAccion' => $estadosPlanAccion
                
                    ]);
            }

            public static function update__Accion(Router $router){

                //Cargamos los datos y lo guardamos en una variable, que luego pasaremos por al router
                    $a = Accion::find($_GET['id']);  
                    $pa = PlanAccion::find($a->planAccion);  

                //Cargamos los posibles responsables
                    $responsables = Personal::permisoProyectosMejora();
                    $responsable = Personal::find($a->responsable);

                //Validamos los datos
                    $errores = $pa->validar();

                //Definimos la acción CRUD
                    $crud = 3;

                //Definimos que ocurre con el método POST
                    if($_SERVER['REQUEST_METHOD'] === 'POST') {

                        //Asignamos los atributos
                            $args = $_POST;

                            Log::updateLog($a, array_diff_assoc($args, get_object_vars($a)));
                            
                        //Sincronizamos
                            $a->sincronizar($args);

                        //Validamos los datos
                            $errores = $a->validar();
                            
                        //Si no hay ningún error, guardamos
                            if(empty($errores)) {

                                //Creamos el registro en la BBDD
                                    $a->update();

                                //Redirigimos a la página principal
                                    header('Location:/planificacion/planificacion-cambios/accion/read?id=' . $a->id);

                            }    
                    }

                //Invovamos el método router
                    $router->render('/06/PlanesAccion/accion_form' , [

                        //Ahora le pasamos los datos
                            'crud' => $crud,
                            'a' => $a,     
                            'pa' => $pa,      
                            'errores' => $errores,
                            'responsables' => $responsables,
                            'responsable' => $responsable
                
                    ]);
            }

        //DELETE
            public static function delete__PlanAccion(Router $router){

                //Definimos que ocurre con el método POST
                    if($_SERVER['REQUEST_METHOD'] === 'POST') {

                        //Localizamos el registro
                            $pa = PlanAccion::find($_POST['id']);
                        
                        //Primero eliminamos los adjuntos y las relaciones
                            Adjuntos::EliminarAdjuntosPorItem($_POST['id']);
                            Relacion::EliminarRelacionPorItem($_POST['id']);

                        //Eliminamos las acciones asociadas

                            $pa->acciones = Accion::readAll_PlanAccion($pa->id);

                            foreach ($pa->acciones as $key ) {
                                Adjuntos::EliminarAdjuntosPorItem($key->id);
                                Relacion::EliminarRelacionPorItem($key->id);
                                $key->delete();
                            }

                        //Eliminamos el registro
                            $pa->delete($_POST['id']);

                        //Registramos el control de cambios
                            Log::deleteLog($pa);

                        //Registramos la bitácora
                            $bitacora = Bitacora::create__BitacoraAutomatica(
                                "Eliminado Plan de Acción " . $pa->codigo_interno,
                                "Calidad",
                                "06. Planes de Acción", 
                                "Plan de Acción", 
                                $pa->id
                            );

                        //Redirigimos a la página principal
                            header('Location:/planificacion/planificacion-cambios');
                
                    };
            }

            public static function delete__Accion(Router $router){

                //Definimos que ocurre con el método POST
                    if($_SERVER['REQUEST_METHOD'] === 'POST') {

                        //Localizamos el registro
                            $a = Accion::find($_POST['id']);
                        
                        //Primero eliminamos los adjuntos y las relaciones
                            Adjuntos::EliminarAdjuntosPorItem($_POST['id']);
                            Relacion::EliminarRelacionPorItem($_POST['id']);

                        //Eliminamos el registro
                            $a->delete($_POST['id']);

                        //Registramos el control de cambios
                            Log::deleteLog($a);

                        //Registramos la bitácora
                            $bitacora = Bitacora::create__BitacoraAutomatica(
                                "Eliminada la Acción " . $a->codigo_interno,
                                "Calidad",
                                "06. Planes de Acción", 
                                "Acción", 
                                $a->id
                            );

                        //Redirigimos a la página principal
                            header('Location:/planificacion/planificacion-cambios/read?id='. $a->planAccion);
                
                    };
            }

    }