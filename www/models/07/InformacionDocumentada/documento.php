<?php

    namespace ModelInformacionDocumentada;
    use \ModelGeneral\ActiveRecord as ActiveRecord;
    use \ModelDocumento\EdicionComunicado as EdicionComunicado;
    use \ModelGeneral\Adjuntos as Adjuntos;
    use \ModelGeneral\Personal as Personal;
    use ModelGeneral\Codigo as Codigo;

    use ModelDocumento;

    //Definimos la clase
    class Documento extends ActiveRecord{

        //region PROPIEDADES
            public $id;
            public $codigo_interno;
            public $denominador;
            public $tipo;
            public $estado;
            public $juridica;
            public $area;
            public $repositorio;
            public $comentarios;

        //endregion

        //region BASE DE DATOS

            protected static $db;
            protected static $tabla = '07_documentacion';
            protected static $columnasDB = ['id', 'codigo_interno', 'denominador', 'tipo', 'estado', 'juridica', 'area', 'repositorio', 'comentarios'];    

        //endregion

        //region CONSTRUCTOR

            //Definimos el constructor y las propiedades del mismo
                public function __construct($args = []){

                    $this->id = $args['id'] ?? '';
                    $this->codigo_interno = $args['codigo_interno'] ?? '';
                    $this->denominador =  $args['denominador'] ?? '';
                    $this->tipo =  $args['tipo'] ?? '';
                    $this->estado =  $args['estado'] ?? '';
                    $this->juridica =  $args['juridica'] ?? '';
                    $this->area =  $args['area'] ?? '';
                    $this->repositorio =  $args['repositorio'] ?? '';
                    $this->comentarios =  $args['comentarios'] ?? '';
                }
        //endregion
        
        //region VALIDACIÓN

            //Definimos un método para la validación de datos
                public function validar(){

                }

        //endregion

        //region READ

            public static function find_edicion($id){

                //Buscamos la edición
                $edicion = edicionDocumento::find($id);

                $id_doc = $edicion->id_doc;

                //Buscamos el documento raiz
                    $q = 
                        " SELECT 
                                * " .

                        " FROM " . static::$tabla .

                        " WHERE id = '${id_doc}'"; ;

                    $r = static::consultarSQL($q);

                    $r = array_shift($r);

                    //Juntamos ambos arrays

                    if($edicion !== '' && $edicion !== null){

                        $r->edicion = $edicion;

                        //Buscamos los responsables y los reemplazamos
                        $r->edicion->elaborado = Personal::find_WithAvatar($r->edicion->elaborado);
                        $r->edicion->revisado = Personal::find_WithAvatar($r->edicion->revisado);
                        $r->edicion->aprobado = Personal::find_WithAvatar($r->edicion->aprobado);
                    }  

                    

                    //Devolvemos el array completo
                    return $r;

            }

            public static function readAllDESC(){

                $query = 
                    " SELECT * " .
                    " FROM " . static::$tabla .
                    " ORDER BY fecha DESC";

                $result = static::consultarSQL($query);

                return $result;

            }

            public static function cargarDocumentacion(){

                $q = 
                    " SELECT    id,
                                codigo_interno,
                                (select denominador from 07_documentacion_ediciones where 07_documentacion.id = 07_documentacion_ediciones.id_doc and fecha = (select MAX(fecha) from 07_documentacion_ediciones where 07_documentacion.id = 07_documentacion_ediciones.id_doc)) as denominador,
                                (select tipo from 07_documentacion_tipos where 07_documentacion.tipo = 07_documentacion_tipos.id) as tipo,
                                (select juridica from 07_documentacion_juridicas where 07_documentacion.juridica = 07_documentacion_juridicas.id) as juridica,
                                area,
                                repositorio,
                                comentarios" .

                    " FROM " . static::$tabla .

                    " WHERE tipo = 2 " .

                    " AND estado = 1 " .

                    " ORDER BY codigo_interno ASC";

                $r = static::consultarSQL($q);

                return $r;

            }

            public static function cargarManuales(){

                $q = 
                    " SELECT    id,
                                codigo_interno,
                                (select denominador from 07_documentacion_ediciones where 07_documentacion.id = 07_documentacion_ediciones.id_doc and fecha = (select MAX(fecha) from 07_documentacion_ediciones where 07_documentacion.id = 07_documentacion_ediciones.id_doc)) as denominador,
                                (select tipo from 07_documentacion_tipos where 07_documentacion.tipo = 07_documentacion_tipos.id) as tipo,
                                (select juridica from 07_documentacion_juridicas where 07_documentacion.juridica = 07_documentacion_juridicas.id) as juridica,
                                area,
                                repositorio,
                                comentarios " .

                    " FROM " . static::$tabla .

                    " WHERE tipo = 1 " .

                    " AND estado = 1 " .

                    " ORDER BY codigo_interno ASC";

                $r = static::consultarSQL($q);

                //Cargamos la última Edición
                for ($i=0; $i < count($r); $i++) { 

                    $r[$i]->edicion = EdicionDocumento::cargarUltimaEdicion($r[$i]->id);

                };

                //Cargamos el archivo adjunto a cada última edición
                for ($i=0; $i < count($r); $i++) { 

                    $adj = Adjuntos::cargarAdjuntos($r[$i]->edicion->id);

                    if(!empty($adj) ){
                        $r[$i]->adjunto = array_shift($adj);
                    }

                };

                return $r;

            }

            public static function cargarProcedimientos(){

                $q = 
                    " SELECT    id,
                                codigo_interno,
                                (select denominador from 07_documentacion_ediciones where 07_documentacion.id = 07_documentacion_ediciones.id_doc and fecha = (select MAX(fecha) from 07_documentacion_ediciones where 07_documentacion.id = 07_documentacion_ediciones.id_doc)) as denominador,
                                (select tipo from 07_documentacion_tipos where 07_documentacion.tipo = 07_documentacion_tipos.id) as tipo,
                                (select juridica from 07_documentacion_juridicas where 07_documentacion.juridica = 07_documentacion_juridicas.id) as juridica,
                                area,
                                repositorio,
                                comentarios " .

                    " FROM " . static::$tabla .

                    " WHERE tipo = 2 " .

                    " AND estado = 1 " .

                    " ORDER BY codigo_interno ASC";

                $r = static::consultarSQL($q);

                //Cargamos la última Edición
                for ($i=0; $i < count($r); $i++) { 

                    $r[$i]->edicion = EdicionDocumento::cargarUltimaEdicion($r[$i]->id);

                };

                //Cargamos el archivo adjunto a cada última edición
                for ($i=0; $i < count($r); $i++) { 

                    $adj = Adjuntos::cargarAdjuntos($r[$i]->edicion->id);

                    if(!empty($adj) ){
                        $r[$i]->adjunto = $adj;
                    }

                };

                return $r;

            }

            public static function cargarProcedimientosSeguridad(){

                $q = 
                    " SELECT    id,
                                codigo_interno,
                                (select denominador from 07_documentacion_ediciones where 07_documentacion.id = 07_documentacion_ediciones.id_doc and fecha = (select MAX(fecha) from 07_documentacion_ediciones where 07_documentacion.id = 07_documentacion_ediciones.id_doc)) as denominador,
                                (select tipo from 07_documentacion_tipos where 07_documentacion.tipo = 07_documentacion_tipos.id) as tipo,
                                (select juridica from 07_documentacion_juridicas where 07_documentacion.juridica = 07_documentacion_juridicas.id) as juridica,
                                area,
                                repositorio,
                                comentarios " .

                    " FROM " . static::$tabla .

                    " WHERE tipo = 10 " .

                    " AND estado = 1 " .

                    " ORDER BY codigo_interno ASC";

                $r = static::consultarSQL($q);

                //Cargamos la última Edición
                for ($i=0; $i < count($r); $i++) { 

                    $r[$i]->edicion = EdicionDocumento::cargarUltimaEdicion($r[$i]->id);

                };

                //Cargamos el archivo adjunto a cada última edición
                for ($i=0; $i < count($r); $i++) { 

                    $adj = Adjuntos::cargarAdjuntos($r[$i]->edicion->id);

                    if(!empty($adj) ){
                        $r[$i]->adjunto = array_shift($adj);
                    }

                };

                return $r;

            }

            public static function cargarInstrucciones(){

                $q = 
                    " SELECT    id,
                                codigo_interno,
                                (select denominador from 07_documentacion_ediciones where 07_documentacion.id = 07_documentacion_ediciones.id_doc and fecha = (select MAX(fecha) from 07_documentacion_ediciones where 07_documentacion.id = 07_documentacion_ediciones.id_doc)) as denominador,
                                (select tipo from 07_documentacion_tipos where 07_documentacion.tipo = 07_documentacion_tipos.id) as tipo,
                                (select juridica from 07_documentacion_juridicas where 07_documentacion.juridica = 07_documentacion_juridicas.id) as juridica,
                                area,
                                repositorio,
                                comentarios " .

                    " FROM " . static::$tabla .

                    " WHERE tipo = 3 " .

                    " AND estado = 1 " .

                    " ORDER BY codigo_interno ASC";

                $r = static::consultarSQL($q);

                //Cargamos la última Edición
                for ($i=0; $i < count($r); $i++) { 

                    $r[$i]->edicion = EdicionDocumento::cargarUltimaEdicion($r[$i]->id);

                };

                //Cargamos el archivo adjunto a cada última edición
                for ($i=0; $i < count($r); $i++) { 

                    $adj = Adjuntos::cargarAdjuntos($r[$i]->edicion->id);

                    if(!empty($adj) ){
                        $r[$i]->adjunto = array_shift($adj);
                    }

                };

                return $r;

            }

            public static function cargarGuias(){

                $q = 
                " SELECT    id,
                            codigo_interno,
                            (select denominador from 07_documentacion_ediciones where 07_documentacion.id = 07_documentacion_ediciones.id_doc and fecha = (select MAX(fecha) from 07_documentacion_ediciones where 07_documentacion.id = 07_documentacion_ediciones.id_doc)) as denominador,
                            (select tipo from 07_documentacion_tipos where 07_documentacion.tipo = 07_documentacion_tipos.id) as tipo,
                            (select juridica from 07_documentacion_juridicas where 07_documentacion.juridica = 07_documentacion_juridicas.id) as juridica,
                            area,
                            repositorio,
                            comentarios " .

                " FROM " . static::$tabla .

                " WHERE tipo = 4 " .

                " AND estado = 1 " .

                " ORDER BY codigo_interno ASC";

                $r = static::consultarSQL($q);

                //Cargamos la última Edición
                for ($i=0; $i < count($r); $i++) { 

                    $r[$i]->edicion = EdicionDocumento::cargarUltimaEdicion($r[$i]->id);

                };

                //Cargamos el archivo adjunto a cada última edición
                for ($i=0; $i < count($r); $i++) { 

                    $adj = Adjuntos::cargarAdjuntos($r[$i]->edicion->id);

                    if(!empty($adj) ){
                        $r[$i]->adjunto = array_shift($adj);
                    }

                };

                return $r;

            }

            public static function cargarFormatos(){

                $q = 
                    " SELECT    id,
                                codigo_interno,
                                (select denominador from 07_documentacion_ediciones where 07_documentacion.id = 07_documentacion_ediciones.id_doc and fecha = (select MAX(fecha) from 07_documentacion_ediciones where 07_documentacion.id = 07_documentacion_ediciones.id_doc)) as denominador,
                                (select tipo from 07_documentacion_tipos where 07_documentacion.tipo = 07_documentacion_tipos.id) as tipo,
                                (select juridica from 07_documentacion_juridicas where 07_documentacion.juridica = 07_documentacion_juridicas.id) as juridica,
                                area,
                                repositorio,
                                comentarios " .

                    " FROM " . static::$tabla .

                    " WHERE tipo = 5 " .

                    " AND estado = 1 " .

                    " ORDER BY codigo_interno ASC";

                $r = static::consultarSQL($q);

                //Cargamos la última Edición
                for ($i=0; $i < count($r); $i++) { 

                    $r[$i]->edicion = EdicionDocumento::cargarUltimaEdicion($r[$i]->id);

                };

                //Cargamos el archivo adjunto a cada última edición
                for ($i=0; $i < count($r); $i++) { 

                    $adj = Adjuntos::cargarAdjuntos($r[$i]->edicion->id);

                    if(!empty($adj) ){
                        $r[$i]->adjunto = array_shift($adj);
                    }

                };

                return $r;

            }

            public static function cargarPlantillas(){

                $q = 
                    " SELECT    id,
                                codigo_interno,
                                (select denominador from 07_documentacion_ediciones where 07_documentacion.id = 07_documentacion_ediciones.id_doc and fecha = (select MAX(fecha) from 07_documentacion_ediciones where 07_documentacion.id = 07_documentacion_ediciones.id_doc)) as denominador,
                                (select tipo from 07_documentacion_tipos where 07_documentacion.tipo = 07_documentacion_tipos.id) as tipo,
                                (select juridica from 07_documentacion_juridicas where 07_documentacion.juridica = 07_documentacion_juridicas.id) as juridica,
                                area,
                                repositorio,
                                comentarios " .

                    " FROM " . static::$tabla .

                    " WHERE tipo = 6 " .

                    " AND estado = 1 " .

                    " ORDER BY codigo_interno ASC";

                $r = static::consultarSQL($q);

                //Cargamos la última Edición
                for ($i=0; $i < count($r); $i++) { 

                    $r[$i]->edicion = EdicionDocumento::cargarUltimaEdicion($r[$i]->id);

                };

                //Cargamos el archivo adjunto a cada última edición
                for ($i=0; $i < count($r); $i++) { 

                    $adj = Adjuntos::cargarAdjuntos($r[$i]->edicion->id);

                    if(!empty($adj) ){
                        $r[$i]->adjunto = array_shift($adj);
                    }

                };

                return $r;

            }

            public static function cargarDocApoyo(){

                $q = 
                    " SELECT    id,
                                codigo_interno,
                                (select denominador from 07_documentacion_ediciones where 07_documentacion.id = 07_documentacion_ediciones.id_doc and fecha = (select MAX(fecha) from 07_documentacion_ediciones where 07_documentacion.id = 07_documentacion_ediciones.id_doc)) as denominador,
                                (select tipo from 07_documentacion_tipos where 07_documentacion.tipo = 07_documentacion_tipos.id) as tipo,
                                (select juridica from 07_documentacion_juridicas where 07_documentacion.juridica = 07_documentacion_juridicas.id) as juridica,
                                area,
                                repositorio,
                                comentarios " .

                    " FROM " . static::$tabla .

                    " WHERE tipo = 7 " .

                    " AND estado = 1 " .

                    " ORDER BY codigo_interno ASC";

                $r = static::consultarSQL($q);

                //Cargamos la última Edición
                for ($i=0; $i < count($r); $i++) { 

                    $r[$i]->edicion = EdicionDocumento::cargarUltimaEdicion($r[$i]->id);

                };

                //Cargamos el archivo adjunto a cada última edición
                for ($i=0; $i < count($r); $i++) { 

                    $adj = Adjuntos::cargarAdjuntos($r[$i]->edicion->id);

                    if(!empty($adj) ){
                        $r[$i]->adjunto = array_shift($adj);
                    }

                };

                return $r;

            }

            public static function read__searchAjax2(){

                $q =
                " SELECT    
                            (select id from 07_documentacion_ediciones where 07_documentacion.id = 07_documentacion_ediciones.id_doc and fecha = (select MAX(fecha) from 07_documentacion_ediciones where 07_documentacion.id = 07_documentacion_ediciones.id_doc)) as id,
                            codigo_interno,
                            (select denominador from 07_documentacion_ediciones where 07_documentacion.id = 07_documentacion_ediciones.id_doc and fecha = (select MAX(fecha) from 07_documentacion_ediciones where 07_documentacion.id = 07_documentacion_ediciones.id_doc)) as denominador,
                            comentarios" .

                " FROM " . static::$tabla;
            
                $r = static::consultarSQL($q);
                
                $r = Codigo::obtenerDatosElementoSistema($r);

                return $r;

            }

        //endregion
       
    }

?>