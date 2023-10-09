<?php

    namespace ControllerDocumentacionExterna;
    use MVC\Router;

    //Modelos
        Use ModelDocumentacionExterna\ISO_9001_2015;
        Use ModelDocumentacionExterna\PECAL_2110_4;
        
        Use ModelGeneral\Codigo;
        Use ModelGeneral\Adjuntos;
        Use ModelGeneral\Relacion;
        Use ModelGeneral\Bitacora;
        Use ModelGeneral\Cambio;

        Use ControllerGeneral\GeneralController;

    class DocumentacionExternaController {

        //region RUTAS

            public static function iso_9001_2015(Router $router) {
                            
                $c = 2;

                $i = ISO_9001_2015::cargarNorma();

                if(isset($_GET['id'])){
                    $a = ISO_9001_2015::find($_GET['id']);
                }                  

                //Invovamos el método router
                    $router->render('/07/DocumentacionExterna/iso_9001_2015', [
                        'crud' => $c,
                        'apartado' => $a,
                        'iso' => $i

                    ]);               

            }

            public static function pecal_2110_4(Router $router) {
                            
                $c = 2;

                $p =  PECAL_2110_4::cargarNorma();

                if(isset($_GET['id'])){
                    $a = PECAL_2110_4::find($_GET['id']);
                }                  

                //Invovamos el método router
                    $router->render('/07/DocumentacionExterna/pecal_2110_4', [
                        'crud' => $c,
                        'apartado' => $a,
                        'pecal' => $p

                    ]);               

            }

        //endregion
    }