<?php

    namespace ControllerRiesgosOportunidades;
    use MVC\Router;

    //Riesgos y Oportunidades
        use ModelRiesgoOportunidad\RiesgoOportunidad;
        use ModelRiesgoOportunidad\DecisionRiesgoOportunidad;
        use ModelRiesgoOportunidad\TipoRiesgoOportunidad;
        use ModelRiesgoOportunidad\EstadoRiesgoOportunidad;
        use ModelRiesgoOportunidad\RevisionRiesgoOportunidad;
        use ModelRiesgoOportunidad\RiesgoOportunidadHistorico;

    //General
        use ModelGeneral\Personal;
        Use ModelGeneral\Adjuntos;
        Use ModelGeneral\Relacion;
        Use ModelGeneral\Bitacora;
        Use ModelGeneral\Log;
        Use ModelGeneral\Codigo;

    class RiesgosOportunidadesController{

        //RUTAS
            public static function riesgos_oportunidades(Router $router) {
                
                $crud = 2;

                $riesgos = RiesgoOportunidad::cargarRiesgos();
                $oportunidades= RiesgoOportunidad::cargarOportunidades();
                $revisiones = RevisionRiesgoOportunidad::cargarRevisiones();
                
                $estadosRO = EstadoRiesgoOportunidad::readAll();

                foreach ($riesgos as $r) {
                    $r->indicador = EstadoRiesgoOportunidad::asignarIndicador($r->estado, $estadosRO);
                }

                foreach ($oportunidades as $o) {
                    $o->indicador = EstadoRiesgoOportunidad::asignarIndicador($o->estado, $estadosRO);
                }

                //Invovamos el método router
                    $router->render('/06/RiesgosOportunidades/riesgos-oportunidades', [
                        
                        'riesgos_sistema' => $riesgos,
                        'oportunidades_sistema' => $oportunidades,
                        'revisiones' => $revisiones,
                        'crud' => $crud

                    ]);

            }

        //HISTÓRICO
            public static function revision__RiesgoOportunidad(Router $router) {
                    
                $crud = 2;
                $rev = RevisionRiesgoOportunidad::find($_GET['id']);
                $riesgos = RiesgoOportunidadHistorico::cargarRiesgos($_GET['id']);
                $oportunidades = RiesgoOportunidadHistorico::cargarOportunidades($_GET['id']);

                $ficha_con_tabs = true;

                //Invovamos el método router
                    $router->render('/appCalidad/planificacion/riesgo-oportunidad_historico', [
                        
                        'rev' => $rev,
                        'riesgos' => $riesgos,
                        'oportunidades' => $oportunidades,
                        'ficha_con_tabs' => $ficha_con_tabs,
                        'crud' => $crud

                    ]);

            }


        //CREATE

            public static function create__RiesgoOportunidad(Router $router){

                //Creamos una nueva instancia del modelo que vamos a crear, que luego pasaremos por al router
                    $ro = new RiesgoOportunidad;

                //Arreglo con mensajes de error
                    $errores = RiesgoOportunidad::getErrores();

                //Cargamos los tipos que hay
                    $tiposRO = TipoRiesgoOportunidad::readAll();

                //Cargamos los estados que hay
                    $estadosRO = EstadoRiesgoOportunidad::readAll();

                //Cargamos las decisiones y calculamos el código
                    if(isset($_GET['tipo']) && ($_GET['tipo'] == 1 || $_GET['tipo'] == 2)){

                        $ro->tipo = TipoRiesgoOportunidad::find($_GET['tipo'])->tipo;
                        $codigoCalculado = RiesgoOportunidad::calcularCodigo($ro->tipo);
                        $decisionesRO = DecisionRiesgoOportunidad::cargarDecision($ro->tipo);                    
 
                    }
                    // else{
                    //     //Si el tipo no coincide, te devuelve a la página anterior
                    //         header('Location:/planificacion/riesgos-oportunidades');
                    // }               
                    
                //Definimos la acción CRUD
                    $crud = 1;

                //Definimos que ocurre con el método POST
                    if($_SERVER['REQUEST_METHOD'] === 'POST') {

                        $ro = new RiesgoOportunidad($_POST);

                        $ro->contenedor = '060100.230606.121511.947678';

                        //Reasignamos el valor del código interno, por si se han subido varias cosas a la vez
                            //$ro->codigo_interno = RiesgoOportunidad::calcularCodigo($ro->tipo);
                            
                         //Prefijamos datos de las fechas en caso de que no se haya hecho
                            if($ro->fecha_deteccion == NULL || $ro->fecha_deteccion == ''){
                                $ro->fecha_deteccion = obtenerFecha();
                            }

                            if($ro->estado == 'Cerrado'){
                                $ro->fecha_cierre = obtenerFecha();
                            }

                        //Asignamos un id al nuevo análisis de contexto
                            if($ro->tipo == "1"){
                                $ro->id = Codigo::generarId("Riesgo del sistema");
                            }elseif($ro->tipo == "2"){
                                $ro->id = Codigo::generarId("Oportunidad del sistema");
                            }
                       
                        //Validamos los datos
                            $errores = $ro->validar();
                            
                        //Si no hay ningún error, guardamos
                            if(empty($errores)) {

                                //Creamos el registro en la BBDD
                                    $ro->create();

                                //registramos el control de cambios
                                    Log::createLog($pa);

                                //Registramos la bitácora
                                
                                    switch ($ro->tipo) {

                                        case 'Riesgo':

                                            Bitacora::create__BitacoraAutomatica(

                                                "Creado Riesgo del sistema " . $ro->codigo_interno,
                                                "Calidad",
                                                "06. Riesgos y oportunidades del sistema", 
                                                "Riesgo del sistema", 
                                                $ro->id

                                            );
                                        
                                        case 'Oportunidad':

                                            Bitacora::create__BitacoraAutomatica(

                                                "Creada Oportunidad del sistema " . $ro->codigo_interno,
                                                "Calidad",
                                                "06. Riesgos y oportunidades del sistema", 
                                                "Oportunidad del sistema", 
                                                $ro->id

                                            );
                                    }


                                //Redirigimos a la página principal
                                    header('Location:/planificacion/riesgos-oportunidades');
                            }    
                    }

                //Invovamos el método router
                    $router->render('/06/RiesgosOportunidades/riesgo-oportunidad_form' , [

                        //Ahora le pasamos los datos
                            'crud' => $crud,
                            'ro' => $ro,
                            'errores' => $errores,
                            'codigoCalculado' => $codigoCalculado,
                            'tiposRO' => $tiposRO,
                            'decisionesRO' => $decisionesRO,
                            'estadosRO' => $estadosRO,
                
                    ]);
            }

        //READ

            public static function read__RiesgoOportunidad(Router $router){

                //Cargamos los datos y lo guardamos en una variable, que luego pasaremos por al router
                    $ro = RiesgoOportunidad::cargarRegistro($_GET['id']);  
                    $tiposRO = TipoRiesgoOportunidad::readAll();
                    $decisionesRO = DecisionRiesgoOportunidad::cargarDecision($ro->tipo);

                    //debuguear($decisionesRO);

                //Asignamos un indicador en base a su estado
                    $estadosRO = EstadoRiesgoOportunidad::readAll();
                    $ro->indicador = EstadoRiesgoOportunidad::asignarIndicador($ro->estado, $estadosRO);

                //Cargamos las revisiónes de RyO
                    $revisiones = RevisionRiesgoOportunidad::cargarRevisiones();

                //Validamos los datos
                    $errores = $ro->validar();

                //Definimos la acción CRUD
                    $crud = 2;

                //Invovamos el método router
                    $router->render('/06/RiesgosOportunidades/riesgo-oportunidad_form' , [

                        //Ahora le pasamos los datos
                            'crud' => $crud,
                            'ro' => $ro,         
                            'errores' => $errores,
                            'tiposRO' => $tiposRO,
                            'decisionesRO' => $decisionesRO,
                            'estadosRO' => $estadosRO,
                            'revisiones' => $revisiones
                
                    ]);
            }
        
        //UPDATE

            public static function update__RiesgoOportunidad(Router $router){
                    
                    $ro = RiesgoOportunidad::cargarRegistro($_GET['id']);
                    $tiposRO = TipoRiesgoOportunidad::readAll();
                    $estadosRO = EstadoRiesgoOportunidad::readAll();

                    if(isset($ro->tipo)){

                        switch ($ro->tipo) {

                            case 'Riesgo':
                                $decisionesRO = DecisionRiesgoOportunidad::cargarDecision($ro->tipo);
                                break;
                            
                            case 'Oportunidad':
                                $decisionesRO = DecisionRiesgoOportunidad::cargarDecision($ro->tipo);
                                break;
                        }  
                    };    

                    $errores = RiesgoOportunidad::getErrores();

                //Cargamos las decisiones

                    switch ($ro->tipo) {

                        case "Riesgo":
                            $decisionesRO = DecisionRiesgoOportunidad::cargarDecision("Riesgo");
                            break;
                        
                        case "Oportuniadd":
                            $decisionesRO = DecisionRiesgoOportunidad::cargarDecision("Oportunidad");
                            break;
                    }  
                       
                    
                //Definimos la acción CRUD
                    $crud = 3;

                //Definimos que ocurre con el método POST
                    if($_SERVER['REQUEST_METHOD'] === 'POST') {

                        //Asignamos los atributos
                            $args = $_POST;
                            
                        //Sincronizamos
                            $ro->sincronizar($args);

                            if($ro->estado == 'Cerrado' && $ro->fecha_cierre == ''){
                                $ro->fecha_cierre = obtenerFecha();
                            }

                            if($ro->estado == 'Abierto' && $ro->fecha_cierre != ''){
                                $ro->fecha_cierre = '';
                            }

                        //Validamos los datos
                            $errores = $ro->validar();
                            
                        //Si no hay ningún error, guardamos
                            if(empty($errores)) {

                                //Creamos el registro en la BBDD
                                    $ro->update();

                                //Redirigimos a la página principal
                                    header('Location:/planificacion/riesgos-oportunidades/read?id=' . $ro->id);

                            }    
                    }


                //Invovamos el método router
                    $router->render('/06/RiesgosOportunidades/riesgo-oportunidad_form' , [

                        //Ahora le pasamos los datos
                            'crud' => $crud,
                            'ro' => $ro,
                            'errores' => $errores,
                            'tiposRO' => $tiposRO,
                            'decisionesRO' => $decisionesRO,
                            'estadosRO' => $estadosRO
                
                    ]);
            }

        //DELETE

            public static function delete__RiesgoOportunidad(Router $router){

                //Definimos que ocurre con el método POST
                    if($_SERVER['REQUEST_METHOD'] === 'POST') {

                        //Obtenemos las variables con el método post
                            $id = $_POST['id'];

                        //Localizamos el registro
                            $ro = RiesgoOportunidad::find($id);
                        
                        //Primero eliminamos los adjuntos y las relaciones
                            Adjuntos::EliminarAdjuntosPorItem($id);
                            Relacion::EliminarRelacionPorItem($id);

                        //Eliminamos las acciones asociadas
                            //PTE

                        //Eliminamos el registro
                            $ro->delete($id);

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
                            header('Location:/planificacion/riesgos-oportunidades');
                
                    };
            }
    }