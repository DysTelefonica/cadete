<?php

    namespace ControllerRecursos;
    use MVC\Router;

    //General
        Use ModelGeneral\Codigo;
        Use ModelGeneral\Adjuntos;
        Use ModelGeneral\Relacion;
        Use ModelGeneral\Bitacora;
        Use ModelGeneral\Cambio;
        Use ModelGeneral\Personal;

    class PersonalController {

        public static function personal(Router $router) {
                    
            $personal = Personal::readAll_activos();

            //Invovamos el método router
                $router->render('/07/Recursos/personal', [
                
                    'personal' => $personal,

                ]);

        }

        public static function create(Router $router) {

            //Creamos una nueva instancia del modelo que vamos a crear, que luego pasaremos por al router
                $personal = new Personal;

            //Arreglo con mensajes de error
                $errores = Personal::getErrores();

            //Definimos la acción CRUD
                $crud = 1;

            //Definimos que ocurre con el método POST
            if($_SERVER['REQUEST_METHOD'] === 'POST') {

                $personal = new Personal($_POST);

                //Validamos los datos
                    $errores = $personal->validar();
                    
                //Si no hay ningún error, guardamos
                    if(empty($errores)) {
                        
                        //Creamos el registro en la BBDD
                            $personal->create();

                        //Redirigimos a la página principal
                            header('Location:/appCalidad');
                    }    
            }

            //Invovamos el método router
                $router->render('/07/Recursos/personal_form' , [

                    //Ahora le pasamos los datos
                        'crud' => $crud,
                        'personal' => $personal,
                        'errores' => $errores  
                ]);
        }

        public static function read(Router $router) {

            //Cargamos los datos y lo guardamos en una variable, que luego pasaremos por al router
                $personal = Personal::find_WithAvatar( $_GET['id']);

            //Definimos la acción CRUD
                $crud = 2;

            //Invovamos el método router               
                $router->render('/07/Recursos/personal_form' , [

                    //Ahora le pasamos los datos
                        'crud' => $crud,
                        'personal' => $personal
            
                ]);
        }

        public static function read2(Router $router) {

            if(isset($_SESSION['usuario'])):

                //Cargamos los datos y lo guardamos en una variable, que luego pasaremos por al router
                    $usuario = Usuario::findByEmail($_SESSION['usuario']);

                //Definimos la acción CRUD
                    $crud = 2;

                //Invovamos el método router               

                    $router->render('/00/Usuario/index' , [

                        //Ahora le pasamos los datos
                            'crud' => $crud,
                            'usuario' => $usuario
                
                    ]);

            else:

                $router->render('/00/Usuario/index' , []);

            endif;
        }

        public static function update(Router $router){

            //Cargamos los datos y lo guardamos en una variable, que luego pasaremos por al router
                $usuario = Usuario::findByEmail($_SESSION['usuario']);

            //Validamos los datos
                $errores = $usuario->validar();

            //Definimos la acción CRUD
                $crud = 3;

            //Invovamos el método router
                $router->render('/appCalidad/usuario/index' , [

                    //Ahora le pasamos los datos
                        'crud' => $crud,
                        'usuario' => $usuario,
                        'errores' => $errores  
                ]);
        }       

    }