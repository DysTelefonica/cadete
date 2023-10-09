<?php

    use ControllerGeneral\GeneralController;

    use ControllerComunicados\ComunicadosController;
    use ControllerInformacionDocumentada\InformacionDocumentadaController;
    use ControllerDocumentacionExterna\DocumentacionExternaController;
    use ControllerRecursos\RecursosController;
    use ControllerRecursos\PersonalController;

        $router->get('/apoyo',                                                                              [GeneralController::class, 'apoyo']);
        
        //Comunicados
            $router->get('/apoyo' . '/comunicados',                                                         [ComunicadosController::class, 'comunicados']);
            $router->get('/apoyo' . '/comunicados' . '/comunicado',                                         [ComunicadosController::class, 'leer__comunicado']);

            $router->get('/apoyo' . '/comunicados' . '/gestorComunicados',                                  [ComunicadosController::class, 'gestionar__comunicado']);
            $router->prot('/apoyo' . '/comunicados' . '/gestorComunicados');

            $router->post('/apoyo' . '/comunicados' . '/gestorComunicados' . '/priorizarComunicados',       [ComunicadosController::class, 'priorizar__comunicado']);
            $router->prot('/apoyo' . '/comunicados' . '/gestorComunicados' . '/priorizarComunicados');

            $router->get('/apoyo' . '/comunicados' . '/gestorComunicados'.  '/reestablecerGestor',          [ComunicadosController::class, 'reestablecer__gestor']);
            $router->prot('/apoyo' . '/comunicados' . '/gestorComunicados'. '/reestablecerGestor');

            $router->get('/apoyo' . '/comunicados' . '/read',                                               [ComunicadosController::class, 'read__Comunicado']);

            $router->get ('/apoyo' . '/comunicados' . '/create',                                            [ComunicadosController::class, 'create__Comunicado']);
            $router->post('/apoyo' . '/comunicados' . '/create',                                            [ComunicadosController::class, 'create__Comunicado']);
            $router->prot('/apoyo' . '/comunicados' . '/create');

            $router->get ('/apoyo' . '/comunicados' . '/crearDirectorio',                                   [ComunicadosController::class, 'crearDirectorio__Comunicado']);
            $router->post('/apoyo' . '/comunicados' . '/crearDirectorio',                                   [ComunicadosController::class, 'crearDirectorio__Comunicado']);
            $router->prot('/apoyo' . '/comunicados' . '/crearDirectorio');
    
            $router->get ('/apoyo' . '/comunicados' . '/update',                                            [ComunicadosController::class, 'update__Comunicado']);
            $router->post('/apoyo' . '/comunicados' . '/update',                                            [ComunicadosController::class, 'update__Comunicado']);
            $router->prot('/apoyo' . '/comunicados' . '/update');
    
            $router->post('/apoyo' . '/comunicados' . '/delete',                                            [ComunicadosController::class, 'delete__Comunicado']);
            $router->prot('/apoyo' . '/comunicados' . '/delete');

        //Información documentada
            $router->get('/apoyo' . '/informacion-documentada',                                                         [InformacionDocumentadaController::class, 'informacion_documentada']);
            $router->get('/apoyo' . '/informacion-documentada' . '/read',                                               [InformacionDocumentadaController::class, 'read__informacion_documentada']);

            $router->get('/apoyo' . '/informacion-documentada' . '/documentacion-externa' . '/iso_9001_2015',             [DocumentacionExternaController::class, 'iso_9001_2015']);
            $router->get('/apoyo' . '/informacion-documentada' . '/documentacion-externa' . '/pecal_2110_4',              [DocumentacionExternaController::class, 'pecal_2110_4']);

        //Recursos
            $router->get('/apoyo' . '/recursos' . '/personal',                                                         [PersonalController::class, 'personal']);

        //Personal
            $router->get('/apoyo' . '/recursos' . '/personal' . '/read',                                                [PersonalController::class, 'read']);
            $router->get('/apoyo' . '/recursos' . '/personal' . '/create',                                              [PersonalController::class, 'create']);
            $router->post('/apoyo' . '/recursos' . '/personal' . '/create',                                              [PersonalController::class, 'create']);
            $router->prot('/apoyo' . '/recursos' . '/personal' . '/create',                                              [PersonalController::class, 'create']);

            $router->get('/personal/update',                                                                            [PersonalController::class, 'update']);
            $router->post('/personal/update',                                                                           [PersonalController::class, 'update']);
            $router->prot('/personal/update');