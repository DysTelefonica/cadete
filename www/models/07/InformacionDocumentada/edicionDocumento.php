<?php

    namespace ModelInformacionDocumentada;
    use \ModelGeneral\ActiveRecord as ActiveRecord;

    use ModelDocumento;
    use \ModelGeneral\Adjuntos as Adjuntos;
    use \ModelGeneral\Personal as Personal;

    //Definimos la clase
    class EdicionDocumento extends ActiveRecord{

        //region PROPIEDADES
            public $id;
            public $id_doc;
            public $codigo_interno;
            public $denominador;
            public $edicion;
            public $fecha;
            public $elaborado;
            public $revisado;
            public $aprobado;
            public $cambios;
            public $paginas;
            public $comentarios;

        //endregion

        //region BASE DE DATOS

            protected static $db;
            protected static $tabla = '07_documentacion_ediciones';
            protected static $columnasDB = ['id', 'id_doc', 'codigo_interno', 'denominador', 'edicion', 'fecha', 'elaborado', 'revisado', 'aprobado', 'cambios', 'paginas', 'comentarios'];    

        //endregion

        //region CONSTRUCTOR

            //Definimos el constructor y las propiedades del mismo
                public function __construct($args = []){

                    $this->id = $args['id'] ?? '';
                    $this->id_doc = $args['id_doc'] ?? '';
                    $this->codigo_interno = $args['codigo_interno'] ?? '';
                    $this->denominador =  $args['denominador'] ?? '';
                    $this->edicion =  $args['edicion'] ?? '';
                    $this->fecha =  $args['fecha'] ?? '';
                    $this->elaborado =  $args['elaborado'] ?? '';
                    $this->revisado =  $args['revisado'] ?? '';
                    $this->aprobado =  $args['aprobado'] ?? '';
                    $this->cambios =  $args['cambios'] ?? '';
                    $this->paginas =  $args['paginas'] ?? '';
                    $this->comentarios =  $args['comentarios'] ?? '';
                }
        //endregion
        
        //region VALIDACIÓN

            //Definimos un método para la validación de datos
                public function validar(){

                }

        //endregion

        //region READ

            public static function cargarUltimaEdicion($id){

                $q = 
                    " SELECT 
                            id,
                            codigo_interno,
                            denominador,
                            edicion,
                            fecha,
                            comentarios" .

                    " FROM " . 
                            static::$tabla .

                    " WHERE " .
                            "id_doc = '${id}'" . 

                    " ORDER BY " .
                            "fecha DESC" . 
                        
                    " LIMIT " .
                            "1";                    
                            
                $r = static::consultarSQL($q);     

                $r = array_shift($r);
                     
                return $r;

            }

            public static function cargarTodasEdiciones($id){

                $q = 
                    " SELECT 
                            *" .

                    " FROM " . 
                            static::$tabla .

                    " WHERE " .
                            "id_doc = '${id}'" . 

                    " ORDER BY " .
                            "fecha DESC";                    
                            
                $r = static::consultarSQL($q);     

                 //Cargamos el archivo adjunto a cada última edición
                 for ($i=0; $i < count($r); $i++) { 

                    $adj = Adjuntos::cargarAdjuntos($r[$i]->id);

                    if(!empty($adj) ){
                        $r[$i]->adjunto = array_shift($adj);
                    }

                    //Buscamos los responsables y los reemplazamos
                    $r[$i]->elaborado = Personal::find_WithAvatar($r[$i]->elaborado);
                    $r[$i]->revisado = Personal::find_WithAvatar($r[$i]->revisado);
                    $r[$i]->aprobado = Personal::find_WithAvatar($r[$i]->aprobado);
                    
                };
                     
                return $r;

            }


        //endregion
       
    }

?>