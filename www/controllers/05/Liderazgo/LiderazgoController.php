<?php

    namespace ControllerLiderazgo;
    use MVC\Router;
    
    use ModelGeneral\Personal;
    use ModelComite\Comite;

    class LiderazgoController {

        public static function liderazgo(Router $router) {

            $comite = Comite::readAll();

            foreach ($comite as $c) {
        
                $c->personal = Personal::find($c->personal);
                $c->personal->avatar = '/build/img/users/' . $c->personal->id . '.jpg';

            }
            
            //Invovamos el método router
            $router->render('/05/Liderazgo/liderazgo', [

                'comite' => $comite,
            ]);

        }

    }