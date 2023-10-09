<?php

    namespace ControllerPolitica;
    use MVC\Router;

    //Modelos
        use ModelPolitica\Politica;

    class PoliticaController {

        public static function politica(Router $router) {

            $crud = 2;
            
            $politicaCalidad = Politica::cargarPoliticaCalidad();
            $politicaAmbiental = Politica::cargarPoliticaAmbiental();

            //Invovamos el método router
            $router->render('/05/Politica/politica', [

                'politicaCalidad' => $politicaCalidad,
                'politicaAmbiental' => $politicaAmbiental,
                'crud' => $crud   

            ]);

        }


    }