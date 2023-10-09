<?php

    namespace ControllerGeneral;
    use MVC\Router;

        //00
            use ModelGeneral\Personal;   
            use ModelGeneral\Codigo;     
            use ModelGeneral\Indice;     
            use ModelGeneral\Trazabilidad_ISO;

    class HelpController {

        public static function help(Router $router) {

            $ruta= $_SERVER["REQUEST_URI"];

            $iso = Trazabilidad_ISO::buscarRuta($ruta);
 
            echo(json_encode($ruta));

        }


        public static function helpAjax(Router $router) {

            $ruta= $_GET['r'];

            $help['text']= '';
            $help['iso'] = Trazabilidad_ISO::buscarRuta($ruta); 
            $help['pecal'] = '';           

            echo(json_encode($help));

        }

    }