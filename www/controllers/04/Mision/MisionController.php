<?php

    namespace ControllerMision;
        
    //Router
        use MVC\Router;

    //General
        Use ModelGeneral\Adjuntos;
        Use ModelGeneral\Relacion;
        Use ModelGeneral\Bitacora;
        Use ModelGeneral\Cambio;
        Use ModelGeneral\Codigo;

    class MisionController {

        //region RUTAS

            public static function mision(Router $router) {
                
                //Invovamos el método router
                    $router->render('/04/Mision/mision' , []);
            }

    //endregion

    }