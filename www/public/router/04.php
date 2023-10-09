<?php

    use ControllerGeneral\GeneralController;
    
    use ControllerAnalisisContexto\AnalisisContextoController;
    use ControllerPartesInteresadas\PartesInteresadasController;
    use ControllerAlcance\AlcanceController;
    use ControllerProcesos\ProcesosController;
    use ControllerMision\MisionController; 

        $router->get( '/contexto',                                                                      [GeneralController::class, 'contexto']);

    //Analisis contexto
        $router->get(   '/contexto' . '/analisisContexto',                                          [AnalisisContextoController::class, 'analisisContexto']);
        $router->get(   '/contexto' . '/analisisContexto' . '/read',                                [AnalisisContextoController::class, 'read__AnalisisContexto']);
        $router->get(   '/contexto' . '/analisisContexto' . '/read-historico',                      [AnalisisContextoController::class, 'read__RevisionAnalisisContexto']);

        $router->get(   '/contexto' . '/analisisContexto' . '/create',                              [AnalisisContextoController::class, 'create__AnalisisContexto']);
        $router->post(  '/contexto' . '/analisisContexto' . '/create',                              [AnalisisContextoController::class, 'create__AnalisisContexto']);
        $router->prot(  '/contexto' . '/analisisContexto' . '/create');

        $router->get(   '/contexto' . '/analisisContexto' . '/update',                              [AnalisisContextoController::class, 'update__AnalisisContexto']);
        $router->post(  '/contexto' . '/analisisContexto' . '/update',                              [AnalisisContextoController::class, 'update__AnalisisContexto']);
        $router->prot(  '/contexto' . '/analisisContexto' . '/update');
        $router->post(  '/contexto' . '/analisisContexto' . '/update-historical',                   [AnalisisContextoController::class, 'update__RevisionAnalisisContexto']);
        $router->prot(  '/contexto' . '/analisisContexto' . '/update-historical');

        $router->post(  '/contexto' . '/analisisContexto' . '/delete',                              [AnalisisContextoController::class, 'delete__AnalisisContexto']);
        $router->post(  '/contexto' . '/analisisContexto' . '/delete-historical',                   [AnalisisContextoController::class, 'delete__RevisionAnalisisContexto']);
        $router->prot(  '/contexto' . '/analisisContexto' . '/delete');
        $router->prot(  '/contexto' . '/analisisContexto' . '/delete-historical');

        $router->post(  '/contexto' . '/analisisContexto' . '/create-revision',                     [AnalisisContextoController::class, 'create__RevisionAnalisisContexto']);
        $router->prot(  '/contexto' . '/analisisContexto' . '/create-revision');

    //AnalisisDAFO
        $router->get(   '/contexto' . '/analisisContexto' . '/AnalisisDAFO',                        [AnalisisContextoController::class, 'analisisDAFO']);
        $router->get(   '/contexto' . '/analisisContexto' . '/AnalisisDAFO' . '/read',              [AnalisisContextoController::class, 'read__AnalisisDAFO']);
        $router->get(   '/contexto' . '/analisisContexto' . '/AnalisisDAFO' . '/read-historico',    [AnalisisContextoController::class, 'read__RevisionAnalisisDAFO']);

        $router->get(   '/contexto' . '/analisisContexto' . '/AnalisisDAFO' . '/create',            [AnalisisContextoController::class, 'create__AnalisisDAFO']);
        $router->post(  '/contexto' . '/analisisContexto' . '/AnalisisDAFO' . '/create',            [AnalisisContextoController::class, 'create__AnalisisDAFO']);
        $router->prot(  '/contexto' . '/analisisContexto' . '/AnalisisDAFO' . '/create');

        $router->get(   '/contexto' . '/analisisContexto' . '/AnalisisDAFO' . '/update',            [AnalisisContextoController::class, 'update__AnalisisDAFO']);
        $router->post(  '/contexto' . '/analisisContexto' . '/AnalisisDAFO' . '/update',            [AnalisisContextoController::class, 'update__AnalisisDAFO']);
        $router->prot(  '/contexto' . '/analisisContexto' . '/AnalisisDAFO' . '/update');

        $router->post(  '/contexto' . '/analisisContexto' . '/AnalisisDAFO' . '/delete',            [AnalisisContextoController::class, 'delete__AnalisisDAFO']);
        $router->prot(  '/contexto' . '/analisisContexto' . '/AnalisisDAFO' . '/delete');

    //Partes interesadas

        //Contenedor
        $router->get(   '/contexto' . '/partesinteresadas',                                         [PartesInteresadasController::class, 'partesInteresadas']);

        $router->get(   '/contexto' . '/partesinteresadas' . '/estudio' . '/read',                  [PartesInteresadasController::class, 'read__ContenedorParteInteresada']);

        $router->get(   '/contexto' . '/partesinteresadas' . '/estudio' . '/create',                [PartesInteresadasController::class, 'create__ContenedorParteInteresada']);
        $router->post(  '/contexto' . '/partesinteresadas' . '/estudio' . '/create',                [PartesInteresadasController::class, 'create__ContenedorParteInteresada']);
        $router->prot(  '/contexto' . '/partesinteresadas' . '/estudio' . '/create');

        $router->get(   '/contexto' . '/partesinteresadas' . '/estudio' . '/update',                [PartesInteresadasController::class, 'update__ContenedorParteInteresada']);
        $router->post(  '/contexto' . '/partesinteresadas' . '/estudio' . '/update',                [PartesInteresadasController::class, 'update__ContenedorParteInteresada']);
        $router->prot(  '/contexto' . '/partesinteresadas' . '/estudio' . '/update');

        $router->post(  '/contexto' . '/partesinteresadas' . '/estudio' . '/delete',                [PartesInteresadasController::class, 'delete__ContenedorParteInteresada']);
        $router->prot(  '/contexto' . '/partesinteresadas' . '/estudio' . '/delete');

        //Partes interesadas
        $router->get(   '/contexto' . '/partesinteresadas' . '/pi' . '/read',                       [PartesInteresadasController::class, 'read__ParteInteresada']);

        $router->get(   '/contexto' . '/partesinteresadas' . '/pi' . '/create',                     [PartesInteresadasController::class, 'create__ParteInteresada']);
        $router->post(  '/contexto' . '/partesinteresadas' . '/pi' . '/create',                     [PartesInteresadasController::class, 'create__ParteInteresada']);
        $router->prot(  '/contexto' . '/partesinteresadas' . '/pi' . '/create');

        $router->get(   '/contexto' . '/partesinteresadas' . '/pi' . '/update',                     [PartesInteresadasController::class, 'update__ParteInteresada']);
        $router->post(  '/contexto' . '/partesinteresadas' . '/pi' . '/update',                     [PartesInteresadasController::class, 'update__ParteInteresada']);
        $router->prot(  '/contexto' . '/partesinteresadas' . '/pi' . '/update');

        $router->post(  '/contexto' . '/partesinteresadas' . '/pi' . '/delete',                     [PartesInteresadasController::class, 'delete__ParteInteresada']);
        $router->prot(  '/contexto' . '/partesinteresadas' . '/pi' . '/delete');

        //Revisión
        $router->get(   '/contexto' . '/partesinteresadas' . '/estudio' . '/revision'   . '/read',    [PartesInteresadasController::class, 'read__ContenedorHistoricoParteInteresada']);
        
        $router->get(   '/contexto' . '/partesinteresadas' . '/pi'      . '/historico'  . '/read',    [PartesInteresadasController::class, 'read__HistoricoPartesInteresadas']);

        $router->post(  '/contexto' . '/partesinteresadas' . '/create-revision',                      [PartesInteresadasController::class, 'create__RevisionParteInteresada']);
        $router->prot(  '/contexto' . '/partesinteresadas' . '/create-revision');

        $router->post(  '/contexto' . '/partesinteresadas' . '/delete-historical',                   [PartesInteresadasController::class, 'delete__RevisionParteInteresada']);
        $router->prot(  '/contexto' . '/partesinteresadas' . '/delete-historical');

    //Alcance
        $router->get(   '/contexto' . '/alcance',                                                   [AlcanceController::class, 'alcance']);

    //Procesos
        $router->get(   '/contexto' . '/procesos',                                                  [ProcesosController::class, 'procesos']);

        $router->get(   '/contexto' . '/procesos' . '/read',                                        [ProcesosController::class, 'read__Proceso']);

        $router->get(   '/contexto' . '/procesos' . '/create',                                      [ProcesosController::class, 'create__Proceso']);
        $router->post(  '/contexto' . '/procesos' . '/create',                                      [ProcesosController::class, 'create__Proceso']);
        $router->prot(  '/contexto' . '/procesos' . '/create');

        $router->get(   '/contexto' . '/procesos' . '/update',                                      [ProcesosController::class, 'update__Proceso']);
        $router->post(  '/contexto' . '/procesos' . '/update',                                      [ProcesosController::class, 'update__Proceso']);
        $router->prot(  '/contexto' . '/procesos' . '/update');

        $router->post(  '/contexto' . '/procesos' . '/delete',                                      [ProcesosController ::class, 'delete__Proceso']);
        $router->prot(  '/contexto' . '/procesos' . '/delete');

    //Misión y visión
        $router->get('/contexto' . '/mision',                                                       [MisionController::class, 'mision']);