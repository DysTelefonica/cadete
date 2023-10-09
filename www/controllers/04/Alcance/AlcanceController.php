<?php

    namespace ControllerAlcance;
        
    //Router
        use MVC\Router;

    //Procesos
        use ModelAlcance\Alcance;

    //Adjuntos
        Use ModelGeneral\Adjuntos;
        Use ModelGeneral\Relacion;
        Use ModelGeneral\Bitacora;
        Use ModelGeneral\Cambio;
        Use ModelGeneral\Codigo;

    class AlcanceController {

        //region RUTAS

            public static function alcance(Router $router) {
                
                $crud = 2;    
                $alcance = Alcance::cargarAlcanceDyS();

                //Invovamos el método router
                    $router->render('/04/Alcance/alcance' , [
                        'crud' => $crud,
                        'alcance' => $alcance,
                    ]);
            }

    //endregion

        //region CREATE


        //endregion

        //region READ


        //endregion

        //region UPDATE


        //endregion

        //region DELETE


        //endregion

    }