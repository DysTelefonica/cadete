<?php

    namespace ModelGeneral;

    //Definimos la clase
    class Indice extends ActiveRecord{

        //region PROPIEDADES
            public $id;
            public $codigo_interno;
            public $denominador;
            public $comentarios;
            public $rutaIndex;
            public $ico;
            public $elementoSistema;

        //endregion

        //region BASE DE DATOS
            protected static $db;
            protected static $tabla = '00_indice';
            protected static $columnasDB = ['id', 'codigo_interno', 'denominador', 'comentarios', 'rutaIndex', 'ico', 'elementoSistema'];    

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

    }
