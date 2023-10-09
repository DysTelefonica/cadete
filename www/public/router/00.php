<?php

    use ControllerGeneral\GeneralController;
    
    use ControllerLog\LogController;

    use ControllerGeneral\DashboardController;
    use ControllerGeneral\LoginController;  
    use ControllerGeneral\AdjuntosController;  
    use ControllerGeneral\RelacionController;  
    use ControllerGeneral\BitacoraController;  
    use ControllerGeneral\CitasController;  
    use ControllerGeneral\SearchController;  
    use ControllerGeneral\HelpController;  
    use ControllerGeneral\BuzonController;  

    use ControllerRecursos\PersonalController; 

        //General
            $router->get('/',                                                                               [GeneralController::class, 'index']);
            $router->get('/versiones',                                                                      [GeneralController::class, 'versiones']);
            $router->get('/obras',                                                                          [GeneralController::class, 'obras']);
            $router->get('/alarmas',                                                                        [DashboardController::class, 'dashboard']);
            $router->get('/citas',                                                                          [CitasController::class, 'citas']);

            $router->get('/searchAjax',                                                                     [SearchController::class, 'searchAjax']);
            $router->get('/helpAjax',                                                                       [HelpController::class, 'helpAjax']);

        //Login y autentificación
            $router->get('/login',                                                      [LoginController::class, 'login']);
            $router->post('/login',                                                     [LoginController::class, 'login']);
            $router->get('/logout',                                                     [LoginController::class, 'logout']);

            $router->get('/crearUsuario',                                               [LoginController::class, 'crearUsuario']);
            $router->prot('/crearUsuario');

            $router->post('/comprobarPass',                                             [LoginController::class, 'comprobarPass']);
            $router->get('/reestablecerPassword',                                      [LoginController::class, 'reestablecerPassword']);
            $router->prot('/reestablecerPassword');

            $router->post('/modificarPass',                                     [LoginController::class, 'modificarPass']);
            $router->post('/modificarAvatar',                                   [LoginController::class, 'modificarAvatar']);
            $router->post('/validarPass',                                       [LoginController::class, 'validarPass']);

        //Adjuntos
            // $router->get('/gestorArchivos',                                     [AdjuntosController::class, 'cargarAdjuntos']);
            $router->get('/gestorArchivos',                                     [AdjuntosController::class, 'AbrirAdjunto']);
            $router->post('/gestorArchivos',                                    [AdjuntosController::class, 'guardarAdjuntos']);
            $router->post('/gestorArchivos/d',                                  [AdjuntosController::class, 'eliminarAdjunto']);
            $router->post('/gestorArchivos/ajax',                               [AdjuntosController::class, 'cargarAdjuntosAjax']);
            $router->post('/fetchAdjuntAjax',                                   [AdjuntosController::class, 'fetchAdjuntAjax']);
            $router->get('/fetchAdjuntAjax',                                     [AdjuntosController::class, 'fetchAdjuntAjax']);

        //Relaciones
            $router->get(   '/relaciones',                                        [RelacionController::class, 'cargarRelaciones']);
            $router->post(  '/relaciones',                                        [RelacionController::class, 'crearRelaciones']);
            $router->post(  '/relaciones/d',                                      [RelacionController::class, 'eliminarRelacion']);
            $router->post(  '/cargarCategorias',                                  [RelacionController::class, 'cargarCategorias']);
            $router->post(  '/cargarSubcategorias',                               [RelacionController::class, 'cargarSubcategorias']);
            $router->post(  '/cargarElementos',                                   [RelacionController::class, 'cargarElementos']);
            $router->post(  '/relaciones/ajax',                                   [RelacionController::class, 'cargarRelacionesAjax']);

        //Bitácora
            $router->get(   '/bitacora',                                          [BitacoraController::class, 'bitacora']);

            $router->get(   '/bitacora' . '/read',                                [BitacoraController::class, 'read__Bitacora']);

            $router->get(   '/bitacora' . '/update',                              [BitacoraController::class, 'update__Bitacora']);
            $router->post(  '/bitacora' . '/update',                              [BitacoraController::class, 'update__Bitacora']);
            $router->prot(  '/bitacora' . '/update');
            
            $router->post(  '/bitacora' . '/create',                              [BitacoraController::class, 'create__Bitacora']);
            $router->prot(  '/bitacora' . '/create');

            $router->post(  '/bitacora' . '/delete',                              [BitacoraController::class, 'delete__Bitacora']);
            $router->prot(  '/bitacora' . '/delete');

            $router->post(  '/bitacora' . '/cargarCategorias',                    [BitacoraController::class, 'cargarCategorias']);
            $router->post(  '/bitacora' . '/cargarSubcategorias',                 [BitacoraController::class, 'cargarSubcategorias']);
            $router->post(  '/bitacora' . '/cargarElementos',                     [BitacoraController::class, 'cargarElementos']);


        //Cambios
            $router->post('/log/ajax',                                            [LogController::class, 'cargarLogAjax']);

        //Buzon
            $router->get('/buzon',                                                      [BuzonController::class, 'read__Buzon']);
            $router->post('/buzon/create',                                                 [BuzonController::class, 'create__Buzon']);

        //Debug
            $router->get('/debug',                                                    [GeneralController::class, 'debug']);
    
    //endregion