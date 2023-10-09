<?php

    namespace ControllerGeneral;
    use MVC\Router;

    //Modelos
        use ModelGeneral\Cita;

    class CitasController {

        public static function citas(Router $router) {

            //Cargamos la cita indivual
                if(isset($_GET['id']) && $_GET['id'] <> ""){
                    $cita = Cita::find($_GET['id']);
                }else{
                    $cita = Cita::cargarCitaAlAzar();
                    $cita = $cita[0];
                }

            //Cargamos el resto de citas
                $citas = Cita::cargarCitasAlAzar();
             
            //Invovamos el método router
                $router->render('00/Citas/citas', [

                    //Ahora le pasamos los datos
                        'cita' => $cita,     
                        'citas' => $citas, 
            
                ]);

        }

    }