<?php

    namespace ControllerGeneral;

    use MVC\Router;

    //General
        use ModelGeneral\Login;
        use ModelGeneral\Personal;
        use ModelGeneral\Codigo;

    class LoginController {

        public static function login(Router $router) {

            $errores = [];

            //Si el método es POST sigue esta ruta
                if($_SERVER['REQUEST_METHOD'] === 'POST') {

                    //Creamos una nueva instancia de la clase Admin con los datos del POST
                        $login = new Login($_POST);
                        
                        $errores = $login->validar();

                        if(empty($errores)){

                            //Verificamos si el usuario existe
                                $result = $login->existeUsuario();

                                    if(!$result) { //Si no existe
                                        
                                        $errores = Login::getErrores();

                                        if(strpos($_POST['urlAuth'], '?')){
                                            header('Location:' . $_POST['urlAuth'] . "&auth=error");
                                        }
                                        else{
                                            header('Location:' . $_POST['urlAuth'] . "?auth=error");
                                        }

                                    }
                               
                                    else {  //Si existe

                                        //Verificamos el password

                                            $autenticado = $login->comprobarPassword($result);

                                            if($autenticado) { //Si la contraseña es correcta

                                                //Si todo es correcto, se autentica al usuario
                                                    $login->autenticar();

                                                //Cargamos los datos del usuario
                                                    $usuario = Personal::findByEmail($_SESSION['usuario']);
          
                                                    $_SESSION['id_user'] = $usuario->user;
                                                    $_SESSION['nombre'] = $usuario->nombre . " " . $usuario->primer_apellido . " " . $usuario->segundo_apellido;
                                                    $_SESSION['avatar'] = "/build/img/users/" . $usuario->id . ".jpg";
                                                    $_SESSION['rol'] = $usuario->rol;

                                                //Redirigimos a la página principal

                                                    $_POST['urlAuth'] = str_replace("&auth=error", '', $_POST['urlAuth']);
                                                    $_POST['urlAuth'] = str_replace("?auth=error", '', $_POST['urlAuth']);

                                                    header('Location:' . $_POST['urlAuth'] );

                                            }
                                            else {  //Si la contraseña no es correcta
                                                
                                                //Si el password es incorrecto genera mensaje de error
                                                    $errores = Login::getErrores();

                                                    if(strpos($_POST['urlAuth'], '?')){
                                                        header('Location:' . $_POST['urlAuth'] . "&auth=error");
                                                    }
                                                    else{
                                                        header('Location:' . $_POST['urlAuth'] . "?auth=error");
                                                    }     
                                                    
                                                                                            
                                            }
                                    }
                        }
                }
            //Si el método es GET sigue esta ruta
                else{

                    $router->render('index', [

                        'errores'=> $errores,
                    ] );
                }             
        }

        public static function logout(){
            
            //Iniciamos la sesión
                session_start();
                $url = $_GET['url'];

            //Limpiamos la variable $_SESSION
                $_SESSION = [];

            //Redirigmos al menú principal
                header('Location:'. $url);
        }

        public static function crearUsuario(){

            //Creamos una nueva instancia del modelo
            $nuevoUsuario = new Login();
            
            //Asignamos los valores
            $nuevoUsuario->id = Codigo::generarId('Usuarios');
            $nuevoUsuario->user = $_GET['user'];
            $nuevoUsuario->password = password_hash('Cliente123', PASSWORD_DEFAULT);

            //Validamos los datos
            $errores = $nuevoUsuario->validar();
                        
            //Si no hay ningún error, guardamos
            if(empty($errores)) {

                //Creamos el registro en la BBDD
                    $nuevoUsuario->create();

                //Asignamos el id al personal
                    Personal::crearUsuario($nuevoUsuario->user, $nuevoUsuario->id);
            
            }    



            //Redirigimos a la página principal
            header('Location:' . $_GET['url']);        
            
        }

        public static function validarPass(){

            //Buscamos al usuario
            $user = Login::find($_POST['user']);

            if (!$user) {
                // El usuario no se encontró, manejar el error según sea necesario
                $check = false;
            } else {
                // Checkeamos la contraseña con la hash en la base de datos
                $check = password_verify($_POST['pass'], $user->password ?? 'default');
            }

            //Definimos un array data

            $data = array(
                'user' => $_POST['user'],
                'pass' => $_POST['pass'],
                'check' => $check
            );

            //Devolvemos el resultado
            echo(json_encode($data));

        }

        public static function modificarPass(){

            $user = Login::find($_GET['id']);
            $personal = Personal::findByEmail($user->user);

            if($_SERVER['REQUEST_METHOD'] === 'POST') {

                $args = $_POST;

                $user_nuevapass = $user;
                $user_nuevapass->password = password_hash($args['pass_nueva'], PASSWORD_DEFAULT);

                //Validamos los datos
                $errores = $user->validar();
                        
                //Si no hay ningún error, guardamos
                if(empty($errores)) {

                    //Creamos el registro en la BBDD
                    $user->update(); 

                    //Redirigimos a la página principal
                    header('Location:/apoyo/recursos/personal/read?id=' . $personal->id . '&passModificada=True');

                }  
                
            }

        }

        public static function reestablecerPassword(){

            $user = Login::findByUser($_GET['user']);
            $personal = Personal::findByEmail($user->user);

            $user->password = password_hash('Cliente123', PASSWORD_DEFAULT);

            //Validamos los datos
            $errores = $user->validar();
                    
            //Si no hay ningún error, guardamos
            if(empty($errores)) {

                //Creamos el registro en la BBDD
                $user->update(); 

                //Redirigimos a la página principal
                header('Location:/apoyo/recursos/personal/read?id=' . $personal->id . '&passModificada=True');

            }  

        }

        public static function modificarAvatar(){

            $personal = Personal::find($_GET['id']);         

            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                  
                //Comprobamos si se ha subido el archivo
                if(is_uploaded_file($_FILES['avatar']['tmp_name'])){

                    $extension = pathinfo($_FILES['avatar']['tmp_name'], PATHINFO_EXTENSION);

                    //Si no están creadas previamente, creamos las carpetas del directrio
                    $carpeta = "/build/img/users/";

                    //Asignamos la ruta
                    $rutaTemporal = $_FILES['avatar']['tmp_name'];
                    $ruta = $_SERVER['DOCUMENT_ROOT'].$carpeta . $personal->id . ".jpg";   

                    //Borramos el antiguo
                    if( file_exists($ruta) ){     //file_exists únicamente funciona con filesystem paths, no HTTP addresses

                        //Cambiamos los permisos
                        if(chmod($ruta, 0755)){ 

                            //Eliminamos el archivo 
                            unlink($ruta);      

                        };    

                    }

                    //Movemos el archivo a su ubicación
                    move_uploaded_file($rutaTemporal, $ruta);   

                    //Redirigimos a la página principal
                    header('Location:/apoyo/recursos/personal/read?id=' . $personal->id. '&avatarModificado=True');


                }

            }
        }
    }