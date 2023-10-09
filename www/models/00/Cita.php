<?php

    namespace ModelGeneral;

    //Definimos la clase
    class Cita extends ActiveRecord{

        //region PROPIEDADES
            public $id;    
            public $denominador;
            public $personal;
            public $fecha;

        //endregion

        //region BASE DE DATOS

            protected static $db;
            protected static $tabla = '00_citas';
            protected static $columnasDB = ['id', 'denominador','personal', 'fecha'];    

        //endregion

        //region CONSTRUCTOR

            //Definimos el constructor y las propiedades del mismo
                public function __construct($args = []){

                    $this->id = $args['id'] ?? '';
                    $this->denominador = $args['denominador'] ?? '';
                    $this->personal = $args['personal'] ?? '';
                    $this->fecha =  $args['fecha'] ?? '';

                }
        //endregion
        
        //region VALIDACIÓN

            //Definimos un método para la validación de datos
                public function validar(){

                    if(!$this->id){
                        $errores[] = "El campo ID es obligatorio";
                    }

                }

                

        //endregion

         //#region OTROS MÉTODOS

            public function cargarCitaAlAzar(){

                //Declaramos el query
                    $query = 
                    " SELECT * " .

                    " FROM " . static::$tabla .

                    " WHERE mostrarWeb = 1" .
                    " ORDER BY RAND()" .
                    " LIMIT 1";

                    $result = static::consultarSQL($query);
                    
                    return $result;

            }

            public function cargarCitasAlAzar(){

                //Declaramos el query

                    $query = 
                    " SELECT * " .

                    " FROM " . static::$tabla .
                    
                    " WHERE mostrarWeb = 1" .

                    " ORDER BY RAND()";

                    $result = static::consultarSQL($query);
                    
                    return $result;

            }

        //#endregion

    }

?>