<?php

    namespace ModelComunicado;
    use \ModelGeneral\ActiveRecord as ActiveRecord;

    //Definimos la clase
    class GestorComunicado extends ActiveRecord{

        //region PROPIEDADES
            public $id;
            public $tipo;

        //endregion

        //region BASE DE DATOS

            protected static $db;
            protected static $tabla = '07_comunicados_gestor';
            protected static $columnasDB = ['id', 'prioridad'];    

        //endregion

        //region CONSTRUCTOR

            //Definimos el constructor y las propiedades del mismo
                public function __construct($args = []){

                    $this->id = $args['id'] ?? '';
                    $this->prioridad =  $args['prioridad'] ?? '';

                }
        //endregion
        

        //region DELETE

        public static function delete_priorizacion(){

            $query = 
            " UPDATE " . static::$tabla .
            " SET prioridad = 0 ";

            static::$db->query($query);

        }

        //endregion
       
    }

?>