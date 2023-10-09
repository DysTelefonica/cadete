<?php

    namespace ControllerRoles;
    use MVC\Router;

    class RolesController {

        public static function roles(Router $router) {

            //Invovamos el método router
            $router->render('/05/Roles/roles', ['']);

        }

    }