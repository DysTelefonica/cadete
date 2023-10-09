<?php

    //Incluimos las funciones trasversales a todo el proyecto
    require_once 'rutas.php';

    //Incluimos las funciones trasversales a todo el proyecto
    require_once 'ip.php';
    require_once 'funciones.php';

    //Incluimos las conexiones a las bases de datos
    require_once 'config/db.php';
        
    //Incluimos las clases con el autoload de composer
    if (file_exists(__DIR__ . '/../vendor/autoload.php')) {
        require_once __DIR__ . '/../vendor/autoload.php';
    }

    //Cargamos los archivos con variables de entorno
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
        
    //Nos conectamos a las bases de datos
    require_once 'config/conn.php';        