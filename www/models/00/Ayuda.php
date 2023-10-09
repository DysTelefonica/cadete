<?php

    namespace ModelGeneral;

    //Definimos la clase
    class Ayuda extends ActiveRecord{

        //region PROPIEDADES
            public $ruta;    
            public $texto;

        //endregion

        //region BASE DE DATOS

            protected static $db;
            protected static $tabla = '00_ayuda';
            protected static $columnasDB = ['ruta', 'texto'];    

        //endregion

        //region CONSTRUCTOR

            //Definimos el constructor y las propiedades del mismo
                public function __construct($args = []){

                    $this->ruta = $args['ruta'] ?? '';
                    $this->texto = $args['texto'] ?? '';

                }
        //endregion
        
        //region VALIDACIÓN

            //Definimos un método para la validación de datos
                public function validar(){}

        //endregion

        //region READ

            //Definimos un método para buscar las rutas
            public function findByUri(){

                //Declaramos el query
                    $q = 
                    ' SELECT * ' .

                    ' FROM ' . static::$tabla .

                    ' WHERE ruta = "' . $_SERVER["REQUEST_URI"] . '" ';    

                    $r = static::consultarSQL($q);

                    return array_shift($r);

            }

        //endregion

    }

?>