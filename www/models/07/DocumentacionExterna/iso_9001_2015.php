<?php

    namespace ModelDocumentacionExterna;
    use \ModelGeneral\ActiveRecord as ActiveRecord;

    use ModelDocumento;

    //Definimos la clase
    class ISO_9001_2015 extends ActiveRecord{

        //region PROPIEDADES
            public $id;
            public $denominador;
            public $codigo_interno;
            public $contenido;
            public $orden;
            public $indice;
            public $comentarios;

        //endregion

        //region BASE DE DATOS

            protected static $db;
            protected static $tabla = '07_ISO_9001_2015';
            protected static $columnasDB = ['id', 'codigo_interno', 'denominador', 'contenido', 'orden', 'indice', 'comentarios'];    

        //endregion

        //region CONSTRUCTOR

            //Definimos el constructor y las propiedades del mismo
                public function __construct($args = []){

                    $this->id = $args['id'] ?? '';
                    $this->codigo_interno = $args['codigo_interno'] ?? '';
                    $this->denominador =  $args['denominador'] ?? '';
                    $this->contenido =  $args['contenido'] ?? '';
                    $this->orden =  $args['orden'] ?? '';
                    $this->indice =  $args['indice'] ?? '';
                    $this->comentarios =  $args['comentarios'] ?? '';
                }
        //endregion
        
        //region VALIDACIÓN

            //Definimos un método para la validación de datos
                public function validar(){

                }

        //endregion

        //region READ

            public function cargarNorma(){

                //Declaramos el query
                    $query = 
                    " SELECT * " .

                    " FROM " . static::$tabla .

                    " WHERE orden <> 0 " .

                    " AND indice <> 0 " .

                    " ORDER BY orden ASC";

                $result = static::consultarSQL($query);

                return $result;

            }

            public function buscarApartado($c){

                //Declaramos el query
                    $q = 
                    " SELECT * " .

                    " FROM " . static::$tabla .

                    " WHERE codigo_interno = '${c}'";

                $r = static::consultarSQL($q);

                return $r;

            }
        
        //endregion
       
    }

?>