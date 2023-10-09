<?php

    namespace ModelComite;
    use \ModelGeneral\ActiveRecord as ActiveRecord;

    //Definimos la clase
    class Comite extends ActiveRecord{

        //region PROPIEDADES 
            public $id;      
            public $codigo_interno;   
            public $denominador;
            public $personal;

        //endregion

        //region BASE DE DATOS

            protected static $db;
            protected static $tabla = '05_comite';
            protected static $columnasDB = ['id', 'codigo_interno', 'denominador', 'personal'];    

        //endregion

        //region CONSTRUCTOR

            //Definimos el constructor y las propiedades del mismo
                public function __construct($args = []){

                    $this->id = $args['id'] ?? '';
                    $this->codigo_interno =  $args['codigo_interno'] ?? '';
                    $this->denominador =  $args['denominador'] ?? '';
                    $this->personal =  $args['personal'] ?? '';

                }

        //endregion
        
        //region VALIDACIÓN

            //Definimos un método para la validación de datos
                public function validar(){}

        //endregion
        
    }

?>