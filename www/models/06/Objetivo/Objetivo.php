<?php

    namespace ModelObjetivo;
    use \ModelGeneral\ActiveRecord as ActiveRecord;

    //Definimos la clase
    class Objetivo extends ActiveRecord{

        //region PROPIEDADES 
            public $id;

        //endregion

        //region BASE DE DATOS

            protected static $db;
            protected static $tabla = '06_objetivos';
            protected static $columnasDB = ['id'];    

        //endregion

        //region CONSTRUCTOR

            //Definimos el constructor y las propiedades del mismo
                public function __construct($args = []){
                    $this->id =  $args['id'] ?? '';

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

    }

?>