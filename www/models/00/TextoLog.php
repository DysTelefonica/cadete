<?php

    namespace ModelGeneral;

    //Definimos la clase
    class TextoLog extends ActiveRecord{

        //region PROPIEDADES
            public $elementoSistema;    
            public $texto_create;
            public $texto_update;
            public $texto_delete;

        //endregion

        //region BASE DE DATOS

            protected static $db;
            protected static $tabla = '00_log_text';
            protected static $columnasDB = ['elementoSistema', 'texto_create', 'texto_update', 'texto_delete'];    

        //endregion

        //region CONSTRUCTOR

            //Definimos el constructor y las propiedades del mismo
                public function __construct($args = []){

                    $this->elementoSistema = $args['elementoSistema'] ?? '';
                    $this->texto_create =  $args['texto_create'] ?? '';
                    $this->texto_update =  $args['texto_update'] ?? '';
                    $this->texto_delete =  $args['texto_delete'] ?? '';

                }
        //endregion
        
        //region VALIDACIÓN

            //Definimos un método para la validación de datos
                public function validar(){

                   

                }

        //endregion

    }

?>