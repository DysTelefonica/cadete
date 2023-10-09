<?php

    namespace ControllerPartesInteresadas;
        
    //Router
        use MVC\Router;

    //Partes interesadas
        use ModelParteInteresada\ContenedorParteInteresada;
        use ModelParteInteresada\ParteInteresada;
        use ModelParteInteresada\TipoParteInteresada;
        use ModelParteInteresada\RevisionParteInteresada;
        use ModelParteInteresada\HistoricoParteInteresada;

    //Adjuntos
        Use ModelGeneral\Adjuntos;
        Use ModelGeneral\Relacion;
        Use ModelGeneral\Bitacora;
        Use ModelGeneral\Log;
        Use ModelGeneral\Codigo;

    class PartesInteresadasController {

        //region RUTAS

            public static function partesInteresadas(Router $router) {
                
                //Definimos la acción CRUD
                    $crud = 2;

                    //Cargamos los datos y lo guardamos en una variable, que luego pasaremos por al router
                        $contenedor = ContenedorParteInteresada::cargarContenedorPI();

                        $pii = ParteInteresada::cargarPII();
                        $pie = ParteInteresada::cargarPIE();

                        //Buscamos la última revisión de esos contenedores

                        foreach ($contenedor as $c) {

                            $revisiones = RevisionParteInteresada::cargarUltimaRevision($c);

                            if(empty($revisiones[0]) || $revisiones[0]->fecha == ""){
                                $c->revision = 'Sin revisiones';
                                
                            }else{

                                $c->revision = $revisiones[0]->revision . " (" . transformarFecha($revisiones[0]->fecha) . ")";
                            }   

                        }

                    //Invovamos el método router
                        $router->render('/04/PartesInteresadas/partesinteresadas' , [

                            //Ahora le pasamos los datos
                                'contenedor' => $contenedor,
                                'pii' => $pii,
                                'pie' => $pie,
                                'crud' => $crud    

                        ]);

            }

    //endregion

        //region CREATE

            public static function create__ContenedorParteInteresada(Router $router){

                //Creamos una nueva instancia del modelo que vamos a crear, que luego pasaremos por al router
                    $contenedor = new ContenedorParteInteresada;

                //Arreglo con mensajes de error
                    $errores = ContenedorParteInteresada::getErrores();
                    
                //Definimos la acción CRUD
                    $crud = 1;
                    $h = false;

                //Obtenemos el valor del código para que se muestre en el formulario
                    $codigoCalculado = ContenedorParteInteresada::calcularCodigo();

                //Definimos que ocurre con el método POST
                    if($_SERVER['REQUEST_METHOD'] === 'POST') {

                        $contenedor = new ContenedorParteInteresada($_POST);

                    //Reasignamos el valor del código interno, por si se han subido varias cosas a la vez
                        $contenedor->codigo_interno = ContenedorParteInteresada::calcularCodigo();

                    //Asignamos un id al nuevo análisis de contexto
                        $contenedor->id = Codigo::generarId("Contenedor Parte Interesada");

                        //Validamos los datos
                            $errores = $contenedor->validar();
                            
                        //Si no hay ningún error, guardamos
                            if(empty($errores)) {

                                    //debuguear($contenedor);

                                //Creamos el registro en la BBDD
                                    $contenedor->create();

                                //registramos el control de cambios
                                    Log::createLog($contenedor);

                                //Registramos la bitácora
                                    Bitacora::create__BitacoraAutomatica(
                                        "Creado Contenedor Partes Interesadas " . $contenedor->codigo_interno,
                                        "Calidad",
                                        "04. Contexto de la organización", 
                                        "Contenedor Partes Interesadas", 
                                        $analisisContexto->id
                                    );

                                //Redirigimos a la página principal
                                    header('Location:/contexto/partesinteresadas');
                            }    
                    }

                //Invovamos el método router
                    $router->render('/04/PartesInteresadas/partesinteresadas_contenedor' , [

                        //Ahora le pasamos los datos
                            'crud' => $crud,
                            'contenedor' => $contenedor,
                            'errores' => $errores,
                            'codigoCalculado' => $codigoCalculado,
                            'h' => $h
                
                    ]);
            }
            
            public static function create__ParteInteresada(Router $router){

                //Cargamos los datos y lo guardamos en una variable, que luego pasaremos por al router
                    $parteInteresada = new ParteInteresada;
                    $tipospartesInteresadas = TipoParteInteresada::readAll(); 

                    $contenedor = ContenedorParteInteresada::find($_GET['c']);
                    $contenedores = ContenedorParteInteresada::readAll(); 

                    $rev = RevisionParteInteresada::cargarVersionViva();

                    $codigoCalculado = ParteInteresada::calcularCodigo($_GET['type'], $contenedor->id);

                //Definimos la acción CRUD
                    $crud = 1;

                //Definimos que ocurre con el método POST
                    if($_SERVER['REQUEST_METHOD'] === 'POST') {                       

                        $parteInteresada = new ParteInteresada($_POST);                      

                        //Añadimos los datos que faltan
                            $parteInteresada->codigo_interno = ParteInteresada::calcularCodigo($parteInteresada->tipo, $contenedor->id);

                        //Especificamos el tipo de elemento del sistema que es para calcular el id
                            switch ($parteInteresada->tipo) {      
                                case 1: $elementoSistema = "Parte Interesada Interna"; break;
                                case 2: $elementoSistema = "Parte Interesada Externa"; break;
                            };

                            //Asignamos un id a la nueva parte interesada
                                $parteInteresada->id = Codigo::generarId($elementoSistema);

                            //Le asignamos por defecto el estado "Vigente"
                                $parteInteresada->estado = 1;

                            //Validamos los datos
                                $errores = $parteInteresada->validar();
                                
                            //Si no hay ningún error, guardamos
                                if(empty($errores)) {

                                    //Creamos el registro en la BBDD
                                        $parteInteresada->create();

                                    //registramos el control de cambios
                                        Log::createLog($parteInteresada);

                                    //Registramos la bitácora 

                                        switch ($parteInteresada->tipo) {

                                            case 1:
                                                $bitacora = Bitacora::create__BitacoraAutomatica(
                                                    "Nueva Parte Interesada Interna con código " . $parteInteresada->codigo_interno,
                                                    "Calidad",
                                                    "04. Contexto de la organización", 
                                                    "Parte Interesada Interna",
                                                    $parteInteresada->id
                                                );
                                            break;

                                            case 2:
                                                $bitacora = Bitacora::create__BitacoraAutomatica(
                                                    "Nueva Parte Interesada Externa con código " . $parteInteresada->codigo_interno,
                                                    "Calidad",
                                                    "04. Contexto de la organización", 
                                                    "Parte Interesada Externa",
                                                    $parteInteresada->id
                                                );
                                            break;   

                                        };

                                    //Redirigimos a la página principal
                                        header('Location:/contexto/partesinteresadas');
                                }    
                        }

                //Invovamos el método router
                    $router->render('/04/PartesInteresadas/partesinteresadas_form' , [

                        //Ahora le pasamos los datos
                            'crud' => $crud,
                            'parteInteresada' => $parteInteresada,               
                            'tipospartesInteresadas' => $tipospartesInteresadas,         
                            'tipo' => $_GET['type'],  
                            'codigoCalculado' => $codigoCalculado,         
                            'contenedor' => $contenedor,        
                            'rev' => $rev,     
                    ]);
            }

            public static function create__RevisionParteInteresada(Router $router){

                //Definimos que ocurre con el método POST
                    if($_SERVER['REQUEST_METHOD'] === 'POST') {

                        //Calculamos los datos del histórico
                            $revision = new RevisionParteInteresada($_POST);
                            $revision->contenedor = $_POST['id'];
                            $revision->fecha = $_POST['fecha'];
                            $revision->denominador = "Revisión " . $_POST['revision'] . " de las partes interesadas - " . $_POST['fecha'];
                            $revision->id = Codigo::generarId("Revisión partes interesadas");   

                        //Replicamos las partes interesadas
                            $pi = ParteInteresada::readAll(); 
                            HistoricoParteInteresada::prepararRevision($pi, $revision);

                        //Validamos los datos
                            $errores = $revision->validar();
                            
                        //Si no hay ningún error, guardamos
                            if(empty($errores)) {

                                //Creamos el registro en la BBDD
                                    $revision->create();

                                //Registramos la bitácora
                                    $bitacora = Bitacora::create__BitacoraAutomatica(
                                    "Se ha dado de alta la edicion " . $revision->edicion . " de las partes interesadas",
                                    "Calidad",
                                    "04. Contexto de la organización", 
                                    "Revisión partes interesadas", 
                                    $revision->id
                                );

                                //Redirigimos a la página principal
                                    header('Location:' . $_POST['url']);
                            }    
                    }
            }

        //endregion

        //region READ

            public static function read__ParteInteresada(Router $router){

                //Obtenemos el id que hemos pasado por el método get en la url
                    $id = $_GET['id'];

                //Cargamos los datos y lo guardamos en una variable, que luego pasaremos por al router
                    
                    $parteInteresada = ParteInteresada::find($id);   
                    $tipospartesInteresadas = TipoParteInteresada::readAll();   
                    $tipo = $parteInteresada->tipo;

                //Cargamos los datos del contenedor a la que pertenece
                    $contenedor = ContenedorParteInteresada::find($parteInteresada->contenedor);

                //cargamos las revisiones de esa parte interesada
                    $revisiones = HistoricoParteInteresada::cargarRevisionesDesdeOriginal($id);

                //Cargamos otro datos
                    $pii = ParteInteresada::cargarPII();
                    $pie = ParteInteresada::cargarPIE();

                //Validamos los datos
                    $errores = $parteInteresada->validar();

                //Definimos la acción CRUD
                    $crud = 2;

                //Invovamos el método router
                    $router->render('/04/PartesInteresadas/partesinteresadas_form' , [

                        //Ahora le pasamos los datos
                            'crud' => $crud,
                            'parteInteresada' => $parteInteresada,
                            'tipo' => $tipo,
                            'tipospartesInteresadas' => $tipospartesInteresadas,    
                            'pii' => $pii,    
                            'pie' => $pie,    
                            'contenedor' => $contenedor,         
                            'revisiones' => $revisiones,                        
                            'errores' => $errores,
                
                    ]);
            }

            public static function read__ContenedorParteInteresada(Router $router){

                //Cargamos los datos del contenedor
                    $contenedor = ContenedorParteInteresada::find($_GET['id']);

                //Cargamos las partes interesadas de ese contenedor
                    $pii = ParteInteresada::cargarPIIContenedor($_GET['id']);
                    $pie = ParteInteresada::cargarPIEContenedor($_GET['id']);

                //cargamos las revisiones de ese contenedor
                    $revisiones = RevisionParteInteresada::cargarRevisionesContenedor($contenedor);
                    $ultimaRevision = RevisionParteInteresada::cargarUltimaRevision($contenedor);

                //Validamos los datos
                    $errores = $contenedor->validar();

                //Definimos la acción CRUD
                    $crud = 2;
                    $h = false;

                //Invovamos el método router
                    $router->render('/04/PartesInteresadas/partesinteresadas_contenedor' , [

                        //Ahora le pasamos los datos
                            'crud' => $crud,
                            'contenedor' => $contenedor,    
                            'pii' => $pii,    
                            'pie' => $pie,    
                            'revisiones' => $revisiones,    
                            'ultimaRevision' => $ultimaRevision, 
                            'errores' => $errores,
                            'h' => $h,  
                
                    ]);
            }

            public static function read__ContenedorHistoricoParteInteresada(Router $router){

                //Obtenemos el id que hemos pasado por el método get en la url
                    $id = $_GET['id'];

                //Cargamos los datos del contenedor
                    $contenedor = RevisionParteInteresada::find($id);
                    $contenedor_original = ContenedorParteInteresada::find($contenedor->contenedor);

                //Cargamos las partes interesadas de ese contenedor
                    $pii = HistoricoParteInteresada::cargarPII($id);
                    $pie = HistoricoParteInteresada::cargarPIE($id);

                //cargamos las revisiones de ese contenedor
                    $revisiones = RevisionParteInteresada::cargarRevisionesContenedor($contenedor_original);

                //Validamos los datos
                    $errores = $contenedor->validar();

                //Definimos la acción CRUD
                    $crud = 2;
                    $h = true;

                //Invovamos el método router
                    $router->render('/04/PartesInteresadas/partesinteresadas_contenedor' , [

                        //Ahora le pasamos los datos
                            'crud' => $crud,
                            'contenedor' => $contenedor,    
                            'contenedor_original' => $contenedor_original, 
                            'pii' => $pii,    
                            'pie' => $pie,    
                            'revisiones' => $revisiones,    
                            'errores' => $errores,
                            'h' => $h,  
                
                    ]);
            }

            public static function read__HistoricoPartesInteresadas(Router $router) {
                
                //Obtenemos el id que hemos pasado por el método get en la url
                    $id = $_GET['id'];

                //Cargamos los datos de la PI y de la revisión que queremos consultar
                    $parteInteresada = HistoricoParteInteresada::find($id);   
                    $parteInteresada_original =ParteInteresada::find($parteInteresada->id_original);

                    $tipospartesInteresadas = TipoParteInteresada::readAll();   
                    $tipo = $parteInteresada->tipo;

                //Cargamos los datos del contenedor a la que pertenece
                    $contenedor = ContenedorParteInteresada::find($parteInteresada_original->contenedor);

                //Cargamos los datos de la revisión
                    $revision = RevisionParteInteresada::find($parteInteresada->revision);

                //Cargamos las revisiones de dicha parte interesada
                    $revisiones = HistoricoParteInteresada::cargarRevisionesDesdeOriginal($parteInteresada_original->id);
                    $versionviva = RevisionParteInteresada::cargarVersionViva();

                //Validamos los datos
                    $errores = $parteInteresada->validar();

                //Definimos la acción CRUD
                    $crud = 2;
                    $h = true;

                //Invovamos el método router
                    $router->render('/04/PartesInteresadas/partesinteresadas_form' , [

                        //Ahora le pasamos los datos
                            'parteInteresada' => $parteInteresada,
                            'parteInteresada_original' => $parteInteresada_original,
                            'tipospartesInteresadas' => $tipospartesInteresadas,
                            'tipo' => $tipo,
                            'contenedor' => $contenedor,
                            'revisiones' => $revisiones,
                            'revision' => $revision,
                            'versionviva' => $versionviva, 
                            'crud' => $crud,
                            'h' => $h    

                    ]);

            }

        //endregion

        //region UPDATE

            public static function update__contenedorParteInteresada(Router $router){

                //Obtenemos el id que hemos pasado por el método get en la url
                    $id = $_GET['id'];

                    $contenedor = ContenedorParteInteresada::find($id);

                //Validamos los datos
                    $errores = $contenedor->validar();

                //Definimos la acción CRUD
                    $crud = 3;
                    $h = false;

                //Definimos que ocurre con el método POST
                    if($_SERVER['REQUEST_METHOD'] === 'POST') {

                        //Asignamos los atributos
                            $args = $_POST;

                        //registramos el control de cambios
                            Log::updateLog($contenedor, array_diff_assoc($args, get_object_vars($contenedor)));
                            
                        //Sincronizamos
                            $contenedor->sincronizar($args);

                        //Validamos los datos
                            $errores = $contenedor->validar();
                            
                        //Si no hay ningún error, guardamos
                            if(empty($errores)) {

                                //Creamos el registro en la BBDD
                                    $contenedor->update();

                                //Redirigimos a la página principal
                                    header('Location:/contexto/partesinteresadas/estudio/read?id=' . $contenedor->id);

                            }    
                    }

                //Invovamos el método router
                    $router->render('/04/PartesInteresadas/partesinteresadas_contenedor' , [

                        //Ahora le pasamos los datos
                            'crud' => $crud,       
                            'contenedor' => $contenedor, 
                            'h' => $h,            
                            'errores' => $errores,
                
                    ]);
            }

            public static function update__ParteInteresada(Router $router){

                //Obtenemos el id que hemos pasado por el método get en la url
                    $id = $_GET['id'];

                //Cargamos los datos y lo guardamos en una variable, que luego pasaremos por al router
                    $tipospartesInteresadas = TipoParteInteresada::readAll();   
                    
                    $parteInteresada = ParteInteresada::find($id); 

                    $tipo = $parteInteresada->tipo;

                    $contenedor = ContenedorParteInteresada::find($parteInteresada->contenedor);

                //Validamos los datos
                    $errores = $parteInteresada->validar();

                //Definimos la acción CRUD
                    $crud = 3;

                //Definimos que ocurre con el método POST
                    if($_SERVER['REQUEST_METHOD'] === 'POST') {

                        //Asignamos los atributos
                            $args = $_POST;

                        //registramos el control de cambios
                            Log::updateLog($parteInteresada, array_diff_assoc($args, get_object_vars($parteInteresada)));
                            
                        //Sincronizamos
                            $parteInteresada->sincronizar($args);

                        //Validamos los datos
                            $errores = $parteInteresada->validar();
                            
                        //Si no hay ningún error, guardamos
                            if(empty($errores)) {

                                //Creamos el registro en la BBDD
                                    $parteInteresada->update();

                                //Redirigimos a la página principal
                                    header('Location:/contexto/partesinteresadas/pi/read?id=' . $parteInteresada->id);

                            }    
                    }

                //Invovamos el método router
                    $router->render('/04/PartesInteresadas/partesinteresadas_form' , [

                        //Ahora le pasamos los datos
                            'crud' => $crud,
                            'parteInteresada' => $parteInteresada,
                            'tipo' => $tipo,
                            'tipospartesInteresadas' => $tipospartesInteresadas,         
                            'contenedor' => $contenedor,       
                            'errores' => $errores,
                
                    ]);
            }


        //endregion

        //region DELETE

            public static function delete__ContenedorParteInteresada(Router $router){

                //Definimos que ocurre con el método POST
                    if($_SERVER['REQUEST_METHOD'] === 'POST') {

                        //Obtenemos el registro
                            $id = $_POST['id'];
                            $contenedor = ContenedorParteInteresada::find($id);
                        
                        //Eliminamos el registro
                            Adjuntos::EliminarAdjuntosPorItem($id);
                            Relacion::EliminarRelacionPorItem($id);
                            $contenedor->delete($id);

                        //Eliminamos todo lo asociado
                            $pi = ParteInteresada::cargarPIContenedor($contenedor->id);

                            foreach ($pi as $key ) {
                                Adjuntos::EliminarAdjuntosPorItem($key->id);
                                Relacion::EliminarRelacionPorItem($key->id);
                                $key->delete();
                            }

                        //Registramos el control de cambios  
                            Log::deleteLog($contenedor);

                        //Registramos la bitácora
                            $bitacora = Bitacora::create__BitacoraAutomatica(
                                "Eliminado Contenedor Partes Interesadas " . $contenedor->codigo_interno,
                                "Calidad",
                                "04. Contexto de la organización", 
                                "Contenedor Parte Interesada", 
                                $contenedor->id
                            );          
                    
                        //Redirigimos a la página principal
                            header('Location:/contexto/partesinteresadas');
                
                    };
            }

            public static function delete__ParteInteresada(Router $router){

                //Definimos que ocurre con el método POST
                    if($_SERVER['REQUEST_METHOD'] === 'POST') {

                        //Obtenemos el registro
                            $id = $_POST['id'];
                            $parteInteresada = ParteInteresada::find($id);
                        
                        //Eliminamos el registro
                            Adjuntos::EliminarAdjuntosPorItem($id);
                            Relacion::EliminarRelacionPorItem($id);
                            $parteInteresada->delete($id);

                        //Registramos el control de cambios  
                            Log::deleteLog($parteInteresada);

                        //Registramos la bitácora

                            switch ($parteInteresada->tipo) {
                                
                                case '1':

                                    $bitacora = Bitacora::create__BitacoraAutomatica(
                                        "Eliminada Parte Interesada Interna " . $parteInteresada->codigo_interno,
                                        "Calidad",
                                        "04. Contexto de la organización", 
                                        "Parte Interesada Interna", 
                                        $parteInteresada->id
                                    );

                                    break;
                                
                                case '2':

                                    $bitacora = Bitacora::create__BitacoraAutomatica(
                                        "Eliminada Parte Interesada Externa " . $parteInteresada->codigo_interno,
                                        "Calidad",
                                        "04. Contexto de la organización", 
                                        "Parte Interesada Externa", 
                                        $parteInteresada->id
                                    );

                                    break;
                            }            
                       
                        //Redirigimos a la página principal
                            header('Location:/contexto/partesinteresadas');
                
                    };
            }

            public static function delete__RevisionParteInteresada(Router $router){

                //Definimos que ocurre con el método POST
                    if($_SERVER['REQUEST_METHOD'] === 'POST') {

                        //Obtenemos los datos de la revisión
                            $id = $_POST['id'];
                            $revisionParteInteresada = RevisionParteInteresada::find($id);

                        //Eliminamos todo lo relacionado con el histórico del DAFO de dicha revisión
                            $historicoParteInteresada = HistoricoParteInteresada::cargarHistorico($revisionParteInteresada->id);

                            foreach ($historicoParteInteresada as $key ) {
                                Adjuntos::EliminarAdjuntosPorItem($key->id);
                                Relacion::EliminarRelacionPorItem($key->id);
                                $key->delete();
                            }

                        //Eliminamos los datos de la revisión
                            Adjuntos::EliminarAdjuntosPorItem($id);
                            Relacion::EliminarRelacionPorItem($id);
                            $revisionParteInteresada->delete($id);

                        //Registramos el control de cambios
                            Cambio::delete__Cambio($revisionParteInteresada);

                        //Redirigimos a la página principal
                            header('Location://contexto/partesinteresadas/estudio/read?id=' . $revisionParteInteresada->contenedor);
                
                    };
            }

        //endregion

    }