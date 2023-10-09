<?php

    namespace ControllerGeneral;
    use MVC\Router;

    //Modelos
        use ModelGeneral\Buzon;
        Use ModelGeneral\Codigo;

    class BuzonController {

        public static function create__Buzon(Router $router) {           
                    
            //Definimos que ocurre con el método POST
            if($_SERVER['REQUEST_METHOD'] === 'POST') {

                //Obtenemos las variables del archivo
                    $_POST['id'] = Codigo::generarId("Buzón");      

                //Creamos el registro en la BBDD
                    $buzon = new Buzon($_POST);

                    $buzon->user = $_POST['user'];
                    $buzon->selector = $_POST['selector'];
                    $buzon->reporte = $_POST['reporte'];
                    $buzon->date = $_POST['date'];
                    $buzon->atendida = 0;

                    $buzon->create();    

                //Redirigimos a la página principal
                    header('Location:' . $_POST['url']);   

            }

        }

        public static function read__Buzon(Router $router) {

            $sugerencias = Buzon::readAllSugerencias();
            $errores = Buzon::readAllErrores();

             //Invovamos el método router
             $router->render('/00/Buzon/buzon', [
                    
                'sugerencias' => $sugerencias,
                'errores' => $errores,
            ]);

        }

    }