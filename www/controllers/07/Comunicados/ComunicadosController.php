<?php

    namespace ControllerComunicados;
    use MVC\Router;

    //Modelos
        Use ModelComunicado\Comunicado;
        Use ModelComunicado\TipoComunicado;
        Use ModelComunicado\GestorComunicado;
        use ModelGeneral\Personal;
        
        Use ModelGeneral\Codigo;
        Use ModelGeneral\Adjuntos;
        Use ModelGeneral\Relacion;
        Use ModelGeneral\Bitacora;
        Use ModelGeneral\Cambio;

        Use ControllerGeneral\GeneralController;

    class ComunicadosController {

        //region RUTAS

            public static function comunicados(Router $router) {
                    
                $crud = 2;

                $comunicados = Comunicado::readAllDESC();

                //Invovamos el método router
                    $router->render('/07/comunicados/comunicados', [
                    
                        'crud' => $crud,
                        'comunicados' => $comunicados

                    ]);

            }

        //endregion

        //region RUTAS

            public static function create__Comunicado(Router $router) {

                //Invovamos el método router
                    $router->render('00/obras', ['']);

            }
    
        //endregion

        //region READ

            public static function read__Comunicado(Router $router){
                    
                //cargamos el histórico
                    $com = Comunicado::find_estado($_GET['id']);
                    $com->ruta = '../../apoyo/comunicados/comunicado?id=' . $com->id;
                    $com->codigo_fuente = $_SERVER['DOCUMENT_ROOT'] . "/../com/" . Comunicado::asignarRuta($com) . ".php";

                    $autor = Personal::find_WithAvatar($com->autor);
                    $autores = Personal::readAll();

                    $tipos = TipoComunicado::readAll();

                //Validamos los datos
                    $errores = $com->validar();

                //Definimos la acción CRUD
                    $crud = 2;

                //Invovamos el método router
                    $router->render('/07/comunicados/comunicados_form' , [

                        //Ahora le pasamos los datos
                            'com' => $com,
                            'crud' => $crud,
                            'tipos' => $tipos,
                            'autor' => $autor,
                            'autores' => $autores,
                
                    ]);
            }

            public static function leer__comunicado(Router $router){

                    $tipos = TipoComunicado::readAll();

                    $comunicado = Comunicado::find_estado($_GET['id']);
                    $comunicado->indicador = TipoComunicado::asignarIndicador($comunicado->tipo, $tipos);

                    $otrosComunicados = Comunicado::cargarRelacionados();

                    foreach ($otrosComunicados as $o) {
                        $o->ruta = '../../apoyo/comunicados/comunicado?id=' . $o->id;
                        $o->portada = Comunicado::asignarPortada($o);
                        $o->indicador = TipoComunicado::asignarIndicador($o->tipo, $tipos);

                    }

                    $autor = Personal::find_WithAvatar($comunicado->autor);

                    $archivosAdjuntos = Adjuntos::cargarAdjuntos($comunicado->id);
                    $relaciones = Relacion::cargarRelaciones($comunicado->id);

                    //Asignamos la dirección en la que tiene que buscar el comunicado
                        $direccion = Comunicado::asignarRuta($comunicado);

                    //Construimos el breadcrumb
                        $breadcrumb = Comunicado::construirBreadcrumb($comunicado->id, $comunicado->codigo_interno);

                  //Invovamos el método router
                    $router->render('../com/comunicado', [

                        //Ahora le pasamos los datos
                            'comunicado' => $comunicado,
                            'otrosComunicados' => $otrosComunicados,
                            'breadcrumb' => $breadcrumb,
                            'autor' => $autor,
                            'direccion' => $direccion,
                            'archivosAdjuntos' => $archivosAdjuntos,
                            'relaciones' => $relaciones,
                
                    ]);
            }

            public static function gestionar__comunicado(Router $router){

                $comunicados = Comunicado::readAllDESC();
                $portadas = Comunicado::CargarComunicadosPrioridad();

                //Invovamos el método router
                    $router->render('07/comunicados/gestorComunicados' , [

                        //Ahora le pasamos los datos
                            'comunicados' => $comunicados,
                            'portadas' => $portadas,

                
                    ]);
            }

            public static function priorizar__comunicado(Router $router){

                //Definimos que ocurre con el método POST
                    if($_SERVER['REQUEST_METHOD'] === 'POST') {

                        //Borramos todAS las priorizaciones anteriores
                            GestorComunicado::delete_priorizacion();

                            $i = 1;

                            foreach ($_POST as $p) {

                                $gestor = GestorComunicado::find($p);

                                $comunicado->id = $p;
                                $comunicado->prioridad = $i;

                                //Sincronizamos
                                    $gestor->sincronizar($comunicado);

                                //Creamos el registro en la BBDD
                                    $gestor->update();

                                    $i++;

                            };

                            //Redirigimos a la página principal
                                header('Location:/');

                    }

                    $portada = Comunicado::CargarComunicadosPortada();

                //Invovamos el método router
                    $router->render('/index' , [

                        //Ahora le pasamos los datos
                            'portada' => $portada
                
                    ]);
            }

        //endregion


        //region OTROS

            public static function reestablecer__gestor(Router $router){

                Comunicado::reestablecerGestor();

                GeneralController::index($router);

            }

            public static function crearDirectorio__Comunicado(Router $router){

                comunicado::crearDirectorio(Comunicado::find_estado($_GET['id']));

                header('Location:/apoyo/comunicados/read?id=' . $_GET['id']);

            }

        //endregion
    }