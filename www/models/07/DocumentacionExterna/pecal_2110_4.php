<?php

    namespace ModelDocumentacionExterna;
    use \ModelGeneral\ActiveRecord as ActiveRecord;

    use ModelDocumento;

    //Definimos la clase
    class PECAL_2110_4 extends ActiveRecord{

        //region PROPIEDADES
            public $id;
            public $denominador;
            public $contenido;
            public $orden;
            public $indice;

        //endregion

        //region BASE DE DATOS

            protected static $db;
            protected static $tabla = '07_PECAL_2110_4';
            protected static $columnasDB = ['id', 'denominador', 'contenido', 'orden', 'indice'];     

        //endregion

        //region CONSTRUCTOR

            //Definimos el constructor y las propiedades del mismo
                public function __construct($args = []){

                    $this->id = $args['id'] ?? '';
                    $this->denominador =  $args['denominador'] ?? '';
                    $this->contenido =  $args['contenido'] ?? '';
                    $this->orden =  $args['orden'] ?? '';
                    $this->indice =  $args['indice'] ?? '';
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
            
            //endregion
       
    }

?>