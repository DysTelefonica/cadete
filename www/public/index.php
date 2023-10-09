<?php
  
    //Definimos un par de variables para $_SESSION

        if(!isset($_SESSION)){
            session_start();
        }

        $_SESSION["nombreApp"] = 'Telefónica CADETE';
        
    require_once __DIR__ . '/../inc/app.php';

    use MVC\Router;
    $router = new Router();
    
    //region Router
        
        //Debido al alto volumen de links, se ha decidido dividir en varias partes
            require_once 'router/00.php';
            require_once 'router/04.php';
            require_once 'router/05.php';
            require_once 'router/06.php';
            require_once 'router/07.php';
            require_once 'router/08.php';
            require_once 'router/09.php';
            require_once 'router/10.php';

    //endregion

    //Comprobamos las rutas del router
        $router->comprobarRutas();

?>