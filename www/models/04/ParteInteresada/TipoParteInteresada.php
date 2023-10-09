<?php

    namespace ModelParteInteresada;
    use \ModelGeneral\ActiveRecord as ActiveRecord;

    //Definimos la clase
    class TipoParteInteresada extends ActiveRecord{

        //region PROPIEDADES
            
            public $id;
            public $tipo;

        //endregion

        //region BASE DE DATOS

            protected static $db;
            protected static $tabla = '04_partesinteresadas_tipos';
            protected static $columnasDB = ['id', 'tipo'];    

        //endregion

        //region CONSTRUCTOR

            //Definimos el constructor y las propiedades del mismo
                public function __construct($args = []){

                    $this->id = $args['id'] ?? '';
                    $this->tipo =  $args['tipo'] ?? '';

                }
        //endregion
        
        //region VALIDACIÓN

            //Definimos un método para la validación de datos
                public function validar(){

                    if(!$this->id){
                        $errores[] = "El campo id es obligatorio";
                    }

                    if(!$this->tipo){
                        $errores[] = "El campo Tipo es obligatorio";
                    }

                }

        //endregion
    }

?>