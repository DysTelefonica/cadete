<?php

    namespace MVC;

    //El Router se va a encargar de tener todas las rutas y controladores, y hacer llamar a ciertos métodos

    class Router{

        //Con GET viajamos entre páginas
        //con POST realizamos interacciones con la bbdd
        //Con PROT protegemos rutas para asegurarnos que solo se pueden acceder a ellas si estás autorizado
            public $rutasGET = [];
            public $rutasPOST = [];
            public $rutasPROT = [];

        //Creamos la función GET. que recibe como parámetros la url actual que estemos visitando, y la función asociada a esa URL.
            public function get($url, $fn) {

                $this->rutasGET[$url] = $fn;

            }

            public function post($url, $fn) {

                $this->rutasPOST[$url] = $fn;

            }

            public function prot($url) {

                $this->rutasPROT[] = $url;

            }

            public function comprobarRutas() {  

                //Iniciamos la sesión y vemos si el usuario está logado
                    $login = iniciarSesion();
                    $auth = asignarPermisos($login);
                    $_SESSION['auth'] = asignarPermisos($login);

                //Revisa que las rutas estén definidas en el router, así como validar el tipo de request (GET o POST)
                    $urlActual = $_SERVER['PATH_INFO'] ?? '/';
                    $metodo = $_SERVER['REQUEST_METHOD'];

                //Comprobamos que las rutas están definidas
                    if($metodo === 'GET') {
                        $fn = $this->rutasGET[$urlActual] ?? null;
                    }
                    else {
                        $fn = $this->rutasPOST[$urlActual] ?? null;
                    }

                //Comprobamos desde donde se está conectando, para pedir login o no
                    if(!$login & $_SERVER["REQUEST_URI"] <> '/login'){
                        comprobarIP();
                    }

                //Si es una ruta protegida, verificamos si el usuario está logado
                    if(in_Array($urlActual, $this->rutasPROT) && !$auth) {

                        //En el caso de que sea una ruta protegida y no estemos logados, nos envía a la página de login
                            ob_start();     //Almacenamos los siguientes datos en memoria
                            include_once __DIR__ . "/views/404.php";
                            $contenido = ob_get_clean();    //Limpia el buffer
                            include_once __DIR__ . "/views/layout.php";

                    }

                if($fn) {    
                    //La url existe y hay una función asociada
                        call_user_func($fn, $this);
                }
                else
                {
                    ob_start();                                             //Almacenamos los siguientes datos en memoria
                    include_once __DIR__ . "/views/404.php";
                    $contenido = ob_get_clean();                            //Limpia el buffer
                    include_once __DIR__ . "/views/layout.php";
                }
            }

        //Creamos función para mostrar vistas
            public function render($view, $datos=[]) {
                
                //Obtenemos los datos del array
                    foreach($datos as $key => $value) {

                        //El doble signo de $$ signfinica 'variable de variable'
                            $$key = $value;
                    }

                //Validamos el inicio de sesión y  la variable auth

                    if(!isset($_SESSION)){
                        session_start();
                    }
            
                    $login = iniciarSesion();
                    $auth = asignarPermisos($login);

                //Configuramos el contenido
                    ob_start();     //Almacenamos los siguientes datos en memoria
                    include_once __DIR__ . "/views/$view.php";

                    $contenido = ob_get_clean();    //Limpia el buffer

                    include_once __DIR__ . "/views/layout.php";

            }

    }

?>