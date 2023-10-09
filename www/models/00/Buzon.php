<?php

    namespace ModelGeneral;

    //Definimos la clase
    class Buzon extends ActiveRecord{

        //region PROPIEDADES
            public $id;
            public $user;
            public $date;
            public $selector;
            public $reporte;
            public $atendida;

        //endregion

        //region BASE DE DATOS
            protected static $db;
            protected static $tabla = '00_buzon';
            protected static $columnasDB = ['id', 'user', 'date', 'selector', 'reporte', 'atendida'];    

        //endregion

        //region CONSTRUCTOR

            //Definimos el constructor y las propiedades del mismo
                public function __construct($args = []){

                    $this->id = $args['id'] ?? '';
                }
                
        //endregion       

        //region VALIDACIÓN

            //Definimos un método para la validación de datos
                public function validar(){

                }

        //endregion


        public function readAllDesatendidas(){

            $query = 
            " SELECT * " .
            " FROM " . static::$tabla .
            " WHERE atendida = 0 " .
            " ORDER BY date DESC";

            $result = static::consultarSQL($query);

            return $result;

        }

        public function readAllSugerencias(){

            $query = 
            " SELECT * " .
            " FROM " . static::$tabla .
            " WHERE selector = 'Sugerencia' " .
            " ORDER BY date DESC";

            $result = static::consultarSQL($query);

            return $result;

        }

        public function readAllErrores(){

            $query = 
            " SELECT * " .
            " FROM " . static::$tabla .
            " WHERE selector = 'Error' " .
            " ORDER BY date DESC";

            $result = static::consultarSQL($query);

            return $result;

        }

    }
