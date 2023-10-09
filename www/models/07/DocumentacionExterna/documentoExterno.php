<?php

    namespace ModelDocumentacionExterna;
    use \ModelGeneral\ActiveRecord as ActiveRecord;

    use \ModelGeneral\Adjuntos as Adjuntos;
    use \ModelGeneral\Personal as Personal;
    use ModelGeneral\Codigo as Codigo;

    //Definimos la clase
    class DocumentoExterno extends ActiveRecord{

        //region PROPIEDADES
            public $id;
            public $codigo_interno;
            public $denominador;
            public $tipo;
            public $estado;
            public $comentarios;

        //endregion

        //region BASE DE DATOS

            protected static $db;
            protected static $tabla = '07_documentosexternos';
            protected static $columnasDB = ['id', 'codigo_interno', 'denominador', 'tipo', 'estado', 'comentarios'];    

        //endregion

        //region CONSTRUCTOR

            //Definimos el constructor y las propiedades del mismo
                public function __construct($args = []){

                    $this->id = $args['id'] ?? '';
                    $this->codigo_interno = $args['codigo_interno'] ?? '';
                    $this->denominador =  $args['denominador'] ?? '';
                    $this->tipo =  $args['tipo'] ?? '';
                    $this->estado =  $args['estado'] ?? '';
                    $this->comentarios =  $args['comentarios'] ?? '';
                }
        //endregion
        
        //region VALIDACIÓN

            //Definimos un método para la validación de datos
                public function validar(){

                }

        //endregion

        //region READ

            public static function readAllDESC(){

                $query = 
                    " SELECT * " .
                    " FROM " . static::$tabla .
                    " ORDER BY fecha DESC";

                $result = static::consultarSQL($query);

                return $result;

            }

            public static function cargarFormatosAII(){

                $q = 
                    " SELECT    id,
                                codigo_interno,
                                denominador,
                                tipo,
                                estado,
                                comentarios" .

                    " FROM " . static::$tabla .

                    " WHERE tipo = 'Formatos AII' " .

                    " AND estado = 1 ";                

                $r = static::consultarSQL($q);

                return $r;

            }

            public static function cargarNormativaExterna(){

                $q = 
                    " SELECT    id,
                                codigo_interno,
                                denominador,
                                tipo,
                                estado,
                                comentarios" .

                    " FROM " . static::$tabla .

                    " WHERE tipo = 'Normativa' " .

                    " AND estado = 1 ";                

                $r = static::consultarSQL($q);

                return $r;

            }

            public static function cargarOtraNormativaTelefonica(){

                $q = 
                    " SELECT    id,
                                codigo_interno,
                                denominador,
                                tipo,
                                estado,
                                comentarios" .

                    " FROM " . static::$tabla .

                    " WHERE tipo = 'Otra noramtiva Telefónica' " .

                    " AND estado = 1 ";                

                $r = static::consultarSQL($q);

                return $r;

            }

            public static function cargarOtraDocumentacion(){

                $q = 
                    " SELECT    id,
                                codigo_interno,
                                denominador,
                                tipo,
                                estado,
                                comentarios" .

                    " FROM " . static::$tabla .

                    " WHERE tipo = 'Otra documentación' " .

                    " AND estado = 1 ";                

                $r = static::consultarSQL($q);

                return $r;

            }

            public function read__searchAjax(){

                $q =
                " SELECT    
                            id,
                            codigo_interno,
                            denominador,
                            comentarios" .

                " FROM " . static::$tabla;
            
                $r = static::consultarSQL($q);
                
                $r = Codigo::obtenerDatosElementoSistema($r);

                return $r;

            }

        //endregion
       
    }

?>