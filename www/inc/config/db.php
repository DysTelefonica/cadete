<?php

        function conectar_db($dataBase) : mysqli {

            //Asignamos la conexión
                // $db = new mysqli('database', 'user', 'PMU36r7PKDs/[8E9', $dataBase);
                $db = new mysqli('database', $_ENV['MYSQL_USER'], $_ENV['MYSQL_PASSWORD'], $dataBase);
                
            //Si no se conecta, devuelve un error
                if(!$db){

                    echo "No se pudo conectar a la base de datos.";
                    exit;
                }
        
            //Si se conecta a la base de datos, retorna la conexión    
                return $db;

        }

?>