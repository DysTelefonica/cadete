<?php

    use ControllerGeneral\GeneralController;

    use ControllerProyectosMejora\ProyectosMejoraController;
    use ControllerPlanesAccion\PlanesAccionController;
    use ControllerObjetivos\ObjetivosController;
    use ControllerRiesgosOportunidades\RiesgosOportunidadesController;


        $router->get('/planificacion',                                                      [GeneralController::class, 'planificacion']);

    //Riesgos y Oportuniaddes del Sistema
        $router->get('/planificacion' . '/proyectos-mejora',                                [ProyectosMejoraController::class, 'proyectos_mejora']);

        $router->get('/planificacion' . '/proyectos-mejora' . '/read',                      [ProyectosMejoraController::class, 'read__ProyectoMejora']);
        $router->get('/planificacion' . '/proyectos-mejora' . '/readAjax',                  [ProyectosMejoraController::class, 'readAjax__ProyectoMejora']);

        $router->get ('/planificacion' . '/proyectos-mejora' . '/create',                   [ProyectosMejoraController::class, 'create__ProyectoMejora']);
        $router->post('/planificacion' . '/proyectos-mejora' . '/create',                   [ProyectosMejoraController::class, 'create__ProyectoMejora']);
        $router->prot('/planificacion' . '/proyectos-mejora' . '/create');

        $router->get ('/planificacion' . '/proyectos-mejora' . '/update',                   [ProyectosMejoraController::class, 'update__ProyectoMejora']);
        $router->post('/planificacion' . '/proyectos-mejora' . '/update',                   [ProyectosMejoraController::class, 'update__ProyectoMejora']);
        $router->prot('/planificacion' . '/proyectos-mejora' . '/update');

        $router->post('/planificacion' . '/proyectos-mejora' . '/delete',                   [ProyectosMejoraController::class, 'delete__ProyectoMejora']);
        $router->prot('/planificacion' . '/proyectos-mejora' . '/delete');

    //Planificación de los cambios
        $router->get('/planificacion' . '/planificacion-cambios',                           [PlanesAccionController::class, 'planificacion_cambios']);

        $router->get('/planificacion' . '/planificacion-cambios' . '/read',                 [PlanesAccionController::class, 'read__PlanAccion']);

        $router->get ('/planificacion' . '/planificacion-cambios' . '/create',              [PlanesAccionController::class, 'create__PlanAccion']);
        $router->post('/planificacion' . '/planificacion-cambios' . '/create',              [PlanesAccionController::class, 'create__PlanAccion']);

        $router->get ('/planificacion' . '/planificacion-cambios' . '/update',              [PlanesAccionController::class, 'update__PlanAccion']);
        $router->post('/planificacion' . '/planificacion-cambios' . '/update',              [PlanesAccionController::class, 'update__PlanAccion']);

        $router->post('/planificacion' . '/planificacion-cambios' . '/delete',              [PlanesAccionController::class, 'delete__PlanAccion']);

        $router->get('/planificacion' . '/planificacion-cambios' . '/accion'. '/read',      [PlanesAccionController::class, 'read__Accion']);

        $router->get ('/planificacion' . '/planificacion-cambios' . '/accion'. '/create',   [PlanesAccionController::class, 'create__Accion']);
        $router->post('/planificacion' . '/planificacion-cambios' . '/accion'. '/create',   [PlanesAccionController::class, 'create__Accion']);

        $router->get ('/planificacion' . '/planificacion-cambios' . '/accion'. '/update',   [PlanesAccionController::class, 'update__Accion']);
        $router->post('/planificacion' . '/planificacion-cambios' . '/accion'. '/update',   [PlanesAccionController::class, 'update__Accion']);

        $router->post('/planificacion' . '/planificacion-cambios' . '/accion'. '/delete',   [PlanesAccionController::class, 'delete__Accion']);

    //Riesgos y Oportuniaddes del Sistema
        $router->get('/planificacion' . '/riesgos-oportunidades',                           [RiesgosOportunidadesController::class, 'riesgos_oportunidades']);

        $router->get('/planificacion' . '/riesgos-oportunidades' . '/read',                 [RiesgosOportunidadesController::class, 'read__RiesgoOportunidad']);

        $router->get ('/planificacion' . '/riesgos-oportunidades' . '/create',              [RiesgosOportunidadesController::class, 'create__RiesgoOportunidad']);
        $router->post('/planificacion' . '/riesgos-oportunidades' . '/create',              [RiesgosOportunidadesController::class, 'create__RiesgoOportunidad']);

        $router->get ('/planificacion' . '/riesgos-oportunidades' . '/update',              [RiesgosOportunidadesController::class, 'update__RiesgoOportunidad']);
        $router->post('/planificacion' . '/riesgos-oportunidades' . '/update',              [RiesgosOportunidadesController::class, 'update__RiesgoOportunidad']);

        $router->post('/planificacion' . '/riesgos-oportunidades' . '/delete',              [RiesgosOportunidadesController::class, 'delete__RiesgoOportunidad']);

        $router->get('/planificacion' . '/riesgos-oportunidades' . '/revisiones',           [RiesgosOportunidadesController::class, 'revision__RiesgoOportunidad']);

    //Objetivos
        $router->get('/planificacion' . '/objetivos',                                       [ObjetivosController::class, 'objetivos']);       