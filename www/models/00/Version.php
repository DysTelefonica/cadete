<?php

    namespace ModelGeneral;

    //Definimos la clase
    class Version extends ActiveRecord{

        //region PROPIEDADES
            public $id;
            public $fecha;
            public $control_cambios;

        //endregion

        //region BASE DE DATOS
            protected static $db;
            protected static $tabla = '00_versiones';
            protected static $columnasDB = ['id', 'fecha', 'control_cambios', 'date'];    

        //endregion

        //region CONSTRUCTOR

            //Definimos el constructor y las propiedades del mismo
                public function __construct($args = []){

                    $this->id = $args['id'] ?? '';
                    $this->fecha = $args['fecha'] ?? '';
                    $this->control_cambios = $args['control_cambios'] ?? '';
                    $this->date = $args['date'] ?? '';
                }
                
        //endregion       

        //region VALIDACIÓN

            //Definimos un método para la validación de datos
                public function validar(){

                }

        //endregion

        public function cargarVersionesPorFecha(){

            $query = "SELECT * FROM " . static::$tabla .  
            " ORDER BY date DESC";
              
            $result = static::consultarSQL($query);

            return $result;
        }

        public function cargarUltimaVersion(){

            $query = "SELECT * FROM " . static::$tabla .  
            " ORDER BY date DESC" .
            " LIMIT 1";             
            
            $result = static::consultarSQL($query);

            return $result;
        }
        
    }

?>