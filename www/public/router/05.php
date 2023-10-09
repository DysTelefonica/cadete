<?php

    use ControllerGeneral\GeneralController;
    
    use ControllerLiderazgo\LiderazgoController;
    use ControllerPolitica\PoliticaController;
    use ControllerRoles\RolesController;

    $router->get('/liderazgo',                                                                  [GeneralController::class, 'liderazgo']);
        
    //Liderazgo
        $router->get('/liderazgo' . '/liderazgo',                                               [LiderazgoController::class, 'liderazgo']);
    
    //Política
        $router->get('/liderazgo' . '/politica',                                                [PoliticaController::class, 'politica']);
    
    //roles
        $router->get('/liderazgo' . '/roles',                                                   [RolesController::class, 'roles']);