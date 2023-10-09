<?php

    namespace ControllerAnalisisContexto;
        
    //Router
        use MVC\Router;

    //Analisis contexto
        use ModelAnalisisContexto\AnalisisContexto;
        use ModelAnalisisContexto\TipoAnalisisContexto;
        use ModelAnalisisContexto\RevisionAnalisisContexto;

    //AnálisisDAFO
        use ModelAnalisisContexto\AnalisisDAFO;
        use ModelAnalisisContexto\TipoAnalisisDAFO;  
        use ModelAnalisisContexto\HistoricoAnalisisDAFO;  

    //Otros
        Use ModelGeneral\Adjuntos;
        Use ModelGeneral\Relacion;
        Use ModelGeneral\Bitacora;
        Use ModelGeneral\Log;
        Use ModelGeneral\Codigo;

    class AnalisisContextoController {

        //region RUTAS

            public static function analisisContexto(Router $router){

                //Definimos la acción CRUD
                    $crud = 2;

                //Cargamos los datos y lo guardamos en una variable, que luego pasaremos por al router
                    $analisisDAFO = AnalisisContexto::cargarAnalisisDAFO();
                    $otrosAnalisisContexto = AnalisisContexto::cargarOtrosAnalisisContexto();

                //Cargamos el DAFO
                    if(isset($analisisDAFO[0])){
                        $debilidades = AnalisisDAFO::cargarDebilidades($analisisDAFO[0]->id); 
                        $amenazas = AnalisisDAFO::cargarAmenazas($analisisDAFO[0]->id); 
                        $fortalezas = AnalisisDAFO::cargarFortalezas($analisisDAFO[0]->id); 
                        $oportunidades = AnalisisDAFO::cargarOportunidades($analisisDAFO[0]->id); 
                    }
                    else{
                        $debilidades = ""; 
                        $amenazas = ""; 
                        $fortalezas = ""; 
                        $oportunidades =""; 
                    }

                //Invovamos el método router
                    $router->render('/04/AnalisisContexto/analisisContexto' , [

                        //Ahora le pasamos los datos
                            'analisisDAFO' => $analisisDAFO,
                            'otrosAnalisisContexto' => $otrosAnalisisContexto,
                            'crud' => $crud,
                            'debilidades' => $debilidades,
                            'amenazas' => $amenazas,
                            'fortalezas' => $fortalezas,
                            'oportunidades' => $oportunidades,
                
                    ]);
            }

    //endregion

        //region CREATE

            public static function create__AnalisisContexto(Router $router){

                //Creamos una nueva instancia del modelo que vamos a crear, que luego pasaremos por al router
                    $analisisContexto = new AnalisisContexto;

                //Arreglo con mensajes de error
                    $errores = AnalisisContexto::getErrores();

                //Cargamos los tipos de análisis que hay
                    $tiposAnalisisContexto = TipoAnalisisContexto::readAll();
                    
                //Definimos la acción CRUD
                    $crud = 1;
                    $h = false;

                //Obtenemos el valor del código para que se muestre en el formulario
                    $codigoCalculado = AnalisisContexto::calcularCodigo();

                //Definimos que ocurre con el método POST
                    if($_SERVER['REQUEST_METHOD'] === 'POST') {

                        $analisisContexto = new AnalisisContexto($_POST);

                    //Reasignamos el valor del código interno, por si se han subido varias cosas a la vez
                        $analisisContexto->codigo_interno = AnalisisContexto::calcularCodigo();

                    //Asignamos un id al nuevo análisis de contexto
                        $analisisContexto->id = Codigo::generarId("Análisis de Contexto");

                        //Validamos los datos
                            $errores = $analisisContexto->validar();
                            
                        //Si no hay ningún error, guardamos
                            if(empty($errores)) {

                                //Creamos el registro en la BBDD
                                    $analisisContexto->create();

                                //registramos el control de cambios
                                    Log::createLog($analisisContexto);

                                //Registramos la bitácora
                                    Bitacora::create__BitacoraAutomatica(
                                        "Creado Análisis de Contexto " . $analisisContexto->codigo_interno,
                                        "Calidad",
                                        "04. Contexto de la organización", 
                                        "Análisis de Contexto", 
                                        $analisisContexto->id
                                    );

                                //Redirigimos a la página principal
                                    header('Location:/contexto/analisisContexto');
                            }    
                    }

                //Invovamos el método router
                    $router->render('/04/AnalisisContexto/analisisContexto_form' , [

                        //Ahora le pasamos los datos
                            'crud' => $crud,
                            'analisisContexto' => $analisisContexto,
                            'errores' => $errores,
                            'tiposAnalisisContexto' => $tiposAnalisisContexto,
                            'codigoCalculado' => $codigoCalculado,
                            'h' => $h
                
                    ]);
            }

            public static function create__RevisionAnalisisContexto(Router $router){

                //Definimos que ocurre con el método POST
                    if($_SERVER['REQUEST_METHOD'] === 'POST') {

                        $analisisContexto = AnalisisContexto::find($_POST['id']);

                        //Calculamos los datos del histórico
                            $RevisionAnalisisContexto = new RevisionAnalisisContexto($_POST); 
                            $RevisionAnalisisContexto->analisisContexto = $analisisContexto->id;
                            $RevisionAnalisisContexto->id = Codigo::generarId("Revisión Análisis Contexto");    
                            $RevisionAnalisisContexto->fecha = $_POST['fecha'];
                            $RevisionAnalisisContexto->denominador = "Revisión " . $RevisionAnalisisContexto->revision . " del Análisis de Contexto " . $analisisContexto->codigo_interno;                                                  
                            $RevisionAnalisisContexto->tipo = '1';

                        //Replicamos el DAFO y creamos un registro nuevo por cada item
                            $DAFO = AnalisisDAFO::cargarDAFO($analisisContexto->id);
                            HistoricoAnalisisDAFO::prepararRevision($DAFO, $RevisionAnalisisContexto);

                        //Calculamos el control de cambios

                            //Obtenemos la fecha de la última revisión y todo el histórico posterior a esa fecha
                                $ultimoHistorico = RevisionAnalisisContexto::cargarUltimoHistorico($analisisContexto->codigo_interno);

                                $cambiosposthistorico = Log::obtenerCambiosPosterioresAFecha($ultimoHistorico);

                            //De ese histórico, comprobamos los cambios que ha habido en el Análisis de Contexto
                                $r = array();

                                foreach ($cambiosposthistorico as $key => $value) {

                                    if (in_array($analisisContexto->id, (array) $value)) {
                                        $r[] = $cambiosposthistorico[$key];
                                    }

                                }

                            //Luego, obtenemos los cambios que han ocurrido en el DAFO.
                                $r2 = array();

                                foreach ($cambiosposthistorico as $key => $value) {

                                    for($i = 0; $i < count($DAFO); $i++){

                                        if (in_array($DAFO[$i]->id, (array) $value)) {
                                            $r2[] = $cambiosposthistorico[$key];
                                        } 

                                    }
                                }

                            //unimos ambos arrays
                                $r_final = array_merge($r, $r2);

                            //Creamos un string con todos los cambios
                                $stringCambios = Log::crearStringCambios($r_final);

                                $RevisionAnalisisContexto->control_cambios = $stringCambios;

                        //Validamos los datos
                            $errores = $RevisionAnalisisContexto->validar();
                            
                        //Si no hay ningún error, guardamos
                            if(empty($errores)) {

                                //Creamos el registro en la BBDD
                                    $RevisionAnalisisContexto->create();

                                //registramos el control de cambios
                                    Log::createLog($RevisionAnalisisContexto);

                                //Registramos la bitácora
                                    $bitacora = Bitacora::create__BitacoraAutomatica(
                                        "Se ha dado de alta la revisión " . $RevisionAnalisisContexto->revision . " del análisis de contexto " . $RevisionAnalisisContexto->codigo_interno,
                                        "Calidad",
                                        "04. Contexto de la organización", 
                                        "Revisión Análisis Contexto", 
                                        $RevisionAnalisisContexto->id
                                    );

                                //Redirigimos a la página principal
                                    header('Location:'.$_POST['url']);
                            }    
                    }
            }

            public static function create__AnalisisDAFO(Router $router){

                //Obtenemos el id que hemos pasado por el método get en la url
                    if(isset( $_GET['analisisContexto'])){
                        $id = $_GET['analisisContexto'];
                        $analisisContexto = AnalisisContexto::find($id);
                        
                    }

                    if(isset( $_GET['tipo'])){
                        $tipo = $_GET['tipo'];
                        $codigoCalculado = AnalisisDAFO::calcularCodigo($tipo, $analisisContexto->id);
                    }

                //Cargamos los datos y lo guardamos en una variable, que luego pasaremos por al router
                    $analisisDAFO = new AnalisisDAFO;
                    $tipoAnalisisDAFO = TipoAnalisisDAFO::readAll();

                //Definimos la acción CRUD
                    $crud = 1;              
                    $h = false;

                //Definimos que ocurre con el método POST
                    if($_SERVER['REQUEST_METHOD'] === 'POST') {

                        $analisisDAFO = new AnalisisDAFO($_POST);

                        //Especificamos el tipo de elemento del sistema que es para calcular el id

                            $elementoSistema = "";

                            switch ($analisisDAFO->tipo) {

                                case '1':
                                    $elementoSistema = "Debilidad [Análisis DAFO]";
                                    break;

                                case '2':
                                    $elementoSistema = "Amenaza [Análisis DAFO]";
                                    break;

                                case '3':
                                    $elementoSistema = "Fortaleza [Análisis DAFO]";
                                    break;

                                case '4':
                                    $elementoSistema = "Oportunidad [Análisis DAFO]";
                                    break;
                            };

                            //Asignamos un id al nuevo análisis DAFO
                                $analisisDAFO->id = Codigo::generarId($elementoSistema);

                            //Reafirmamos que el código interno es este
                                $analisisDAFO->codigo_interno = AnalisisDAFO::calcularCodigo($analisisDAFO->tipo, $analisisContexto->id);

                            //Al ser un registro nuevo, asumimos que el estado es vigente
                                $analisisDAFO->estado = "Vigente";

                            //Validamos los datos
                                $errores = $analisisDAFO->validar();
                                
                            //Si no hay ningún error, guardamos
                                if(empty($errores)) {

                                    //Creamos el registro en la BBDD
                                        $analisisDAFO->create();
                                        
                                    //registramos el control de cambios
                                        Log::createLog($analisisDAFO);

                                    //Registramos la bitácora
                                        $bitacora = Bitacora::create__BitacoraAutomatica(
                                            "Nueva " . $analisisDAFO->tipo . " con código " .  $analisisDAFO->codigo_interno,
                                            "Calidad",
                                            "04. Contexto de la organización", 
                                            "Análisis DAFO", 
                                            $analisisDAFO->id
                                        );

                                    //Redirigimos a la página principal
                                        header('Location:/contexto/analisisContexto/read?id=' . $analisisContexto->id);
                                }    
                        }

                //Invovamos el método router
                    $router->render('/04/AnalisisContexto/analisisDAFO_form' , [

                        //Ahora le pasamos los datos
                            'crud' => $crud,
                            'analisisDAFO' => $analisisDAFO,
                            'codigoCalculado' => $codigoCalculado,
                            'analisisContexto' => $analisisContexto,
                            'tipoAnalisisDAFO' => $tipoAnalisisDAFO,        
                            'tipo' => $tipo,    
                            'h' => $h,     
                
                    ]);
            }

        //endregion

        //region READ

            public static function read__AnalisisContexto(Router $router){

                //Obtenemos el id que hemos pasado por el método get en la url
                    $id = $_GET['id'];

                //Cargamos los datos y lo guardamos en una variable, que luego pasaremos por al router
                    $analisisContexto = AnalisisContexto::find($id);  

                //Cargamos los tipos de análisis que hay
                    $tiposAnalisisContexto = TipoAnalisisContexto::readAll();

                //Cargamos el DAFO
                    $debilidades =      AnalisisDAFO::cargarDebilidades($analisisContexto->id); 
                    $amenazas =         AnalisisDAFO::cargarAmenazas($analisisContexto->id); 
                    $fortalezas =       AnalisisDAFO::cargarFortalezas($analisisContexto->id); 
                    $oportunidades =    AnalisisDAFO::cargarOportunidades($analisisContexto->id); 
                    
                //cargamos el histórico
                    $historico = RevisionAnalisisContexto::cargarHistorico($analisisContexto->codigo_interno);
                    $ultimaRevision = RevisionAnalisisContexto::cargarUltimoHistorico($analisisContexto->codigo_interno);

                //Definimos la acción CRUD
                    $crud = 2;                

                //Indicamos si el form soporta datos históricos o no
                    $h = false;

                //Validamos los datos
                    $errores = $analisisContexto->validar();

                //Invovamos el método router
                    $router->render('/04/AnalisisContexto/analisisContexto_form' , [

                        //Ahora le pasamos los datos
                            'crud' => $crud,
                            'analisisContexto' => $analisisContexto,
                            
                            'tiposAnalisisContexto' => $tiposAnalisisContexto,
                            'debilidades' => $debilidades,
                            'amenazas' => $amenazas,
                            'fortalezas' => $fortalezas,
                            'oportunidades' => $oportunidades,

                            'historico' => $historico, 
                            'ultimaRevision' => $ultimaRevision, 
                            'h' => $h,          
                            'errores' => $errores,
                
                    ]);
            }

            public static function read__RevisionAnalisisContexto(Router $router){

                //Cargamos los datos y lo guardamos en una variable, que luego pasaremos por al router
                    $analisisContexto = RevisionAnalisisContexto::find($_GET['id']);  
                    
                //Cargamos los tipos de análisis que hay
                    $tiposAnalisisContexto = TipoAnalisisContexto::readAll();    
                    
                //Cargamos el histórico del DAFO
                    $debilidades =      HistoricoAnalisisDAFO::cargarDebilidades($analisisContexto->id); 
                    $amenazas =         HistoricoAnalisisDAFO::cargarAmenazas($analisisContexto->id); 
                    $fortalezas =       HistoricoAnalisisDAFO::cargarFortalezas($analisisContexto->id); 
                    $oportunidades =    HistoricoAnalisisDAFO::cargarOportunidades($analisisContexto->id); 

                //cargamos el histórico de revisiones
                    $historico = RevisionAnalisisContexto::cargarHistorico($analisisContexto->codigo_interno);

                    $ultimaRevision = RevisionAnalisisContexto::cargarUltimoHistorico($analisisContexto->codigo_interno);
                
                //Indicamos si el form soporta datos históricos o no
                    $h = true;

                //Cargamos el análsis de contexto vivo
                    $analisisContexto__fuente = AnalisisContexto::find($analisisContexto->analisisContexto); 

                //Definimos la acción CRUD
                    $crud = 2;

                //Validamos los datos
                    $errores = $analisisContexto->validar();

                //Invovamos el método router
                    $router->render('/04/AnalisisContexto/analisisContexto_form' , [

                        //Ahora le pasamos los datos
                            'crud' => $crud,
                            'analisisContexto' => $analisisContexto,
                            'tiposAnalisisContexto' => $tiposAnalisisContexto,
                            
                            'debilidades' => $debilidades,
                            'amenazas' => $amenazas,
                            'fortalezas' => $fortalezas,
                            'oportunidades' => $oportunidades,  

                            'historico' => $historico, 
                            'ultimaRevision' => $ultimaRevision, 

                            'h' => $h, 
                            'analisisContexto__fuente' => $analisisContexto__fuente
                
                    ]);
            }

            public static function read__AnalisisDAFO(Router $router){

                //Obtenemos el id que hemos pasado por el método get en la url
                    $id = $_GET['id'];
                    $modelo = Codigo::analizarId($id);
                
                    $analisisDAFO = AnalisisDAFO::find($id);  
                    $analisisContexto = AnalisisContexto::find($analisisDAFO->analisisContexto);

                //Cargamos los datos y lo guardamos en una variable, que luego pasaremos por al routerW   
                    $tipoAnalisisDAFO = TipoAnalisisDAFO::readAll();                        
                    $tipo = $analisisDAFO->tipo;

                //Validamos los datos
                    $errores = $analisisDAFO->validar();

                //Definimos la acción CRUD
                    $crud = 2;

                    $h = false;

                //Invovamos el método router
                    $router->render('/04/AnalisisContexto/analisisDAFO_form' , [

                        //Ahora le pasamos los datos
                            'crud' => $crud,
                            'analisisDAFO' => $analisisDAFO,
                            'analisisContexto' => $analisisContexto,
                            'tipo' => $tipo,
                            'tipoAnalisisDAFO' => $tipoAnalisisDAFO,                 
                            'errores' => $errores,
                            'h' => $h,
                    ]);
            }

            public static function read__RevisionAnalisisDAFO(Router $router){

                //Obtenemos el id que hemos pasado por el método get en la url
                    $id = $_GET['id'];
                    $modelo = Codigo::analizarId($id);
                
                    $analisisDAFO = HistoricoAnalisisDAFO::find($id);  
                    $analisisContexto = AnalisisContexto::find($analisisDAFO->analisisContexto);
                    $revision = RevisionAnalisisContexto::find($analisisDAFO->revisionAnalisisContexto);

                //Cargamos los datos y lo guardamos en una variable, que luego pasaremos por al routerW   
                    $tipoAnalisisDAFO = TipoAnalisisDAFO::readAll();                        
                    $tipo = $analisisDAFO->tipo;

                //Validamos los datos
                    $errores = $analisisDAFO->validar();

                //Definimos la acción CRUD
                    $crud = 2;

                    $h = true;

                //Invovamos el método router
                    $router->render('/04/AnalisisContexto/analisisDAFO_form' , [

                        //Ahora le pasamos los datos
                            'crud' => $crud,
                            'analisisDAFO' => $analisisDAFO,
                            'analisisContexto' => $analisisContexto,
                            'revision' => $revision,     
                            'tipo' => $tipo,
                            'tipoAnalisisDAFO' => $tipoAnalisisDAFO,                 
                            'errores' => $errores,
                            'h' => $h,
                    ]);
            }

        //endregion

        //region UPDATE

            public static function update__AnalisisContexto(Router $router){

                //Obtenemos el id que hemos pasado por el método get en la url
                    $id = $_GET['id'];

                //Cargamos los tipos de análisis que hay
                    $tiposAnalisisContexto = TipoAnalisisContexto::readAll();

                //Cargamos los datos y lo guardamos en una variable, que luego pasaremos por al router
                    $analisisContexto = AnalisisContexto::find($id);  

                //Validamos los datos
                    $errores = $analisisContexto->validar();

                //Definimos la acción CRUD
                    $crud = 3;
                    $h = false;

                //Definimos que ocurre con el método POST
                    if($_SERVER['REQUEST_METHOD'] === 'POST') {

                        //Asignamos los atributos
                            $args = $_POST;
                            
                        //registramos el control de cambios
                            Log::updateLog($analisisContexto, array_diff_assoc($args, get_object_vars($analisisContexto)));
                        
                        //Sincronizamos los datos
                            $analisisContexto->sincronizar($args);

                        //Validamos los datos
                            $errores = $analisisContexto->validar();
                            
                        //Si no hay ningún error, guardamos
                            if(empty($errores)) {

                                //Creamos el registro en la BBDD
                                    $analisisContexto->update(); 

                                //Redirigimos a la página principal
                                    header('Location:/contexto/analisisContexto/read?id=' . $analisisContexto->id);

                            }    
                    }

                //Invovamos el método router
                    $router->render('/04/AnalisisContexto/analisisContexto_form' , [

                        //Ahora le pasamos los datos
                            'crud' => $crud,
                            'tiposAnalisisContexto' => $tiposAnalisisContexto,
                            'analisisContexto' => $analisisContexto,
                            'h' => $h,
                            'errores' => $errores
                
                    ]);
            }

            public static function update__RevisionAnalisisContexto(Router $router){

                //Obtenemos el id que hemos pasado por el método get en la url
                    $id = $_GET['id'];

                //Cargamos los tipos de análisis que hay
                    $tiposAnalisisContexto = TipoAnalisisContexto::readAll();

                //Cargamos los datos y lo guardamos en una variable, que luego pasaremos por al router
                    $analisisContexto = AnalisisContexto::find($id);  

                //Validamos los datos
                    $errores = $analisisContexto->validar();

                //Definimos la acción CRUD
                    $crud = 3;

                //Definimos que ocurre con el método POST
                    if($_SERVER['REQUEST_METHOD'] === 'POST') {

                        //Asignamos los atributos
                            $args = $_POST;
                            
                        //Sincronizamos
                            $analisisContexto->sincronizar($args);

                        //Validamos los datos
                            $errores = $analisisContexto->validar();
                            
                        //Si no hay ningún error, guardamos
                            if(empty($errores)) {

                                //Creamos el registro en la BBDD
                                    $analisisContexto->update();

                                //Redirigimos a la página principal
                                    header('Location:/contexto/analisisContexto/read?id=' . $analisisContexto->id);

                            }    
                    }

                //Invovamos el método router
                    $router->render('/04/AnalisisContexto/analisisContexto_form' , [

                        //Ahora le pasamos los datos
                            'crud' => $crud,
                            'tiposAnalisisContexto' => $tiposAnalisisContexto,
                            'analisisContexto' => $analisisContexto,
                            'errores' => $errores
                
                    ]);
            }

            public static function update__AnalisisDAFO(Router $router){

                //Obtenemos el id que hemos pasado por el método get en la url
                    $id = $_GET['id'];

                //Cargamos los datos y lo guardamos en una variable, que luego pasaremos por al router
                    $tipoAnalisisDAFO = TipoAnalisisDAFO::readAll();

                    $analisisDAFO = AnalisisDAFO::find($id);   
                    $tipo = $analisisDAFO->tipo;

                    $analisisContexto = AnalisisContexto::find($analisisDAFO->analisisContexto);

                //Validamos los datos
                    $errores = $analisisDAFO->validar();

                //Definimos la acción CRUD
                    $crud = 3;
                    $h = false;

                //Definimos que ocurre con el método POST
                    if($_SERVER['REQUEST_METHOD'] === 'POST') {
                        
                        //Asignamos los atributos
                            $args = $_POST;     

                        //Log
                            Log::updateLog($analisisDAFO, array_diff_assoc($args, get_object_vars($analisisDAFO)));
                             
                        //Sincronizamos
                            $analisisDAFO->sincronizar($args);

                        //Validamos los datos
                            $errores = $analisisDAFO->validar();
                            
                        //Si no hay ningún error, guardamos
                            if(empty($errores)) {

                                //Creamos el registro en la BBDD
                                    $analisisDAFO->update();

                                //Redirigimos a la página principal
                                    header('Location:/contexto/analisisContexto/AnalisisDAFO/read?id=' . $analisisDAFO->id);

                            }    
                    }

                //Invovamos el método router
                    $router->render('/04/AnalisisContexto/analisisDAFO_form' , [

                        //Ahora le pasamos los datos
                            'crud' => $crud,
                            'analisisDAFO' => $analisisDAFO,
                            'analisisContexto' => $analisisContexto,
                            'tipo' => $tipo,
                            'tipoAnalisisDAFO' => $tipoAnalisisDAFO,      
                            'errores' => $errores,
                            'h' => $h,
                
                    ]);
            }

        //endregion

        //region DELETE

            public static function delete__AnalisisContexto(Router $router){

                //Definimos que ocurre con el método POST
                    if($_SERVER['REQUEST_METHOD'] === 'POST') {

                        //Obtenemos las variables con el método post
                            $id = $_POST['id'];
                            $analisisContexto = AnalisisContexto::find($id);  

                        //Eliminamos todo lo relacionado con los análisis DAFO
                            $analisisDAFO = AnalisisDAFO::cargarDAFO($analisisContexto->id);

                            foreach ($analisisDAFO as $key ) {
                                Adjuntos::EliminarAdjuntosPorItem($key->id);
                                Relacion::EliminarRelacionPorItem($key->id);
                                $key->delete();
                            }

                        //Eliminamos todo lo relacionado con el histórico del DAFO
                            $historicoanalisisDAFO = HistoricoAnalisisDAFO::cargarDAFO($analisisContexto->id);

                            foreach ($historicoanalisisDAFO as $key ) {
                                Adjuntos::EliminarAdjuntosPorItem($key->id);
                                Relacion::EliminarRelacionPorItem($key->id);
                                $key->delete();
                            }
                            
                        //Eliminamos las revisiones
                            $RevisionAnalisisContexto = RevisionAnalisisContexto::cargarHistorico($analisisContexto->codigo_interno);

                            foreach ($RevisionAnalisisContexto as $key ) {
                                Adjuntos::EliminarAdjuntosPorItem($key->id);
                                Relacion::EliminarRelacionPorItem($key->id);
                                $key->delete();
                            }

                        //Eliminamos todo lo relacionado al Análisis de contexto
                            Adjuntos::EliminarAdjuntosPorItem($id);
                            Relacion::EliminarRelacionPorItem($id);
                            $analisisContexto->delete($id);

                        //Registramos el control de cambios
                            Log::deleteLog($analisisContexto);

                        //Registramos la bitácora
                          $bitacora = Bitacora::create__BitacoraAutomatica(
                            "Eliminado Análisis de Contexto " . $analisisContexto->codigo_interno,
                            "Calidad",
                            "04. Contexto de la organización", 
                            "Análisis de Contexto", 
                            $analisisContexto->id
                        );

                        //Redirigimos a la página principal
                            header('Location:/contexto/analisisContexto');
                
                    };
            }

            public static function delete__AnalisisDAFO(Router $router){

                //Definimos que ocurre con el método POST
                    if($_SERVER['REQUEST_METHOD'] === 'POST') {

                        //Obtenemos el registro
                            $id = $_POST['id'];
                            $analisisDAFO = AnalisisDAFO::find($id);
                        
                        //Eliminamos todo lo relacionado al Análisis DAFO
                            Adjuntos::EliminarAdjuntosPorItem($id);
                            Relacion::EliminarRelacionPorItem($id);
                            $analisisDAFO->delete($id);

                        //Registramos el control de cambios
                            Log::deleteLog($analisisDAFO);

                        //Registramos la bitácora
                            $bitacora = Bitacora::create__BitacoraAutomatica(
                                "Eliminado Análisis de Contexto " . $analisisDAFO->codigo_interno,
                                "Calidad",
                                "04. Contexto de la organización", 
                                "Análisis de Contexto", 
                                $analisisDAFO->id
                            );

                        //Redirigimos a la página principal
                            header('Location:/contexto/analisisContexto/read?id=' . $analisisDAFO->analisisContexto);
                
                    };
            }

            public static function delete__RevisionAnalisisContexto(Router $router){

                //Definimos que ocurre con el método POST
                    if($_SERVER['REQUEST_METHOD'] === 'POST') {

                        //Obtenemos los datos de la revisión
                            $id = $_POST['id'];
                            $RevisionAnalisisContexto = RevisionAnalisisContexto::find($id);

                        //Eliminamos todo lo relacionado con el histórico del DAFO de dicha revisión
                            $historicoanalisisDAFO = HistoricoAnalisisDAFO::cargarDAFO($RevisionAnalisisContexto->id);

                            foreach ($historicoanalisisDAFO as $key ) {
                                Adjuntos::EliminarAdjuntosPorItem($key->id);
                                Relacion::EliminarRelacionPorItem($key->id);
                                $key->delete();
                            }

                        //Eliminamos los datos de la revisión
                            Adjuntos::EliminarAdjuntosPorItem($id);
                            Relacion::EliminarRelacionPorItem($id);
                            $RevisionAnalisisContexto->delete($id);

                        //Registramos el control de cambios
                            Log::deleteLog($RevisionAnalisisContexto);

                        //Redirigimos a la página principal
                            header('Location:/contexto/analisisContexto/read?id=' . $RevisionAnalisisContexto->analisisContexto);
                
                    };
            }

        //endregion

    }