<?php

    use ControllerGeneral\GeneralController;

    $router->get('/operacion',                                          [GeneralController::class, 'operacion']);
