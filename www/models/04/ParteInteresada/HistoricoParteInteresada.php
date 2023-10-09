<?php

    namespace ModelParteInteresada;
    use \ModelGeneral\ActiveRecord as ActiveRecord;
    use \ModelGeneral\Codigo;

    //Definimos la clase
    class HistoricoParteInteresada extends ActiveRecord{

        //region PROPIEDADES
            public $id;    
            public $id_original;    
            public $codigo_interno;
            public $tipo;
            public $denominador;
            public $revision;
            public $fechaDeteccion;
            public $estado;
            public $comentarios;


        //endregion

        //region BASE DE DATOS

            protected static $db;
            protected static $tabla = '04_partesinteresadas_historico';
            protected static $columnasDB = ['id', 'id_original', 'codigo_interno', 'tipo', 'denominador', 'revision', 'fechaDeteccion', 'estado', 'comentarios'];    

        //endregion

        //region CONSTRUCTOR

            //Definimos el constructor y las propiedades del mismo
                public function __construct($args = []){

                    $this->id = $args['id'] ?? '';
                    $this->id_original = $args['id_original'] ?? '';
                    $this->codigo_interno = $args['codigo_interno'] ?? '';
                    $this->tipo =  $args['tipo'] ?? '';
                    $this->denominador =  $args['denominador'] ?? '';
                    $this->revision =  $args['revision'] ?? '';
                    $this->fechaDeteccion =  $args['fechaDeteccion'] ?? '';
                    $this->estado =  $args['estado'] ?? '';
                    $this->comentarios =  $args['comentarios'] ?? '';

                }
        //endregion
        
        //region VALIDACIÓN

            //Definimos un método para la validación de datos
                public function validar(){

                    if(!$this->codigo_interno){
                        $errores[] = "El campo Código es obligatorio";
                    }

                    if(!$this->tipo){
                        $errores[] = "El campo Tipo es obligatorio";
                    }

                    if(!$this->denominador){
                        $errores[] = "El denominador es obligatorio";
                    }

                    if(!$this->fechaDeteccion){
                        $errores[] = "La fecha es obligatorio";
                    }

                    if(!$this->estado){
                        $errores[] = "El campo Estado es obligatorio";
                    }

                    if(!$this->comentarios){
                        $errores[] = "El campo comentarios es obligatorio";
                    }

                    if(!$this->revision){
                        $errores[] = "El campo revisión es obligatorio";
                    }

                }

        //endregion

        //region CREATE

            public function prepararRevision($pi, $revision){

                //Por cada registro asignamos un id. Para ello, recorremos un buble for en el que analizamos el tipo y le asignamos un id dependiendo del mismo
                    for($i = 0; $i < count($pi); $i++){

                        $pi_original = $pi[$i]->id;

                        //Asginamos el id al registro
                            switch ($pi[$i]->tipo) {

                                case 1:
                                    $pi[$i]->id = Codigo::generarId("Histórico Parte Interesada Interna");
                                    break;

                                case 2:
                                    $pi[$i]->id = Codigo::generarId("Histórico Parte Interesada Externa");
                                    break;

                            };
                        
                        //Creamos el registro y le asignamos el código de la revisión 
                            $historicoPI = new HistoricoParteInteresada((array)$pi[$i]);             
                            $historicoPI->id_original = $pi_originalTf202212;
                            $historicoPI->revision = $revision->id;
                        
                        //Creamos un array y lo alimentamos
                            $array[] = $historicoPI;
                        
                    };

                //Recorremos todo el array y creamos cada registro
                    for($i = 0; $i < count($array); $i++){

                        $array[$i]->create();

                    }
                
            }

        //endregion

        public function cargarRevisionesDesdeOriginal($id_original){

            //Declaramos el query
                $query = 
                " SELECT * " .
                " FROM " . static::$tabla .
                " WHERE id_original='${id_original}'";
                
                $result = static::consultarSQL($query);

                return $result;
        }

        public function cargarOriginalDesdeRevision($id_revision){

            //Declaramos el query
                $query = 
                " SELECT id_original " .
                " FROM " . static::$tabla .
                " WHERE id='${id_revision}'" .
                " LIMIT 1";               ;
                
                $result = static::consultarSQL($query);

                return $result;
        }

        public function cargarPII($revision){

            //Declaramos el query
                $query = 
                " SELECT 
                    04_partesinteresadas_historico.id, 
                    04_partesinteresadas_historico.codigo_interno, 
                    04_partesinteresadas_historico.denominador, 
                    04_partesinteresadas_historico.tipo, 
                    04_partesinteresadas_tipos.tipo " .

                " FROM " . static::$tabla .
                " JOIN 04_partesinteresadas_tipos" .
                " ON 04_partesinteresadas_historico.tipo = 04_partesinteresadas_tipos.id" .
                " WHERE 04_partesinteresadas_historico.tipo=1" .
                " AND 04_partesinteresadas_historico.revision='${revision}'";
                
                $result = static::consultarSQL($query);

                return $result;
        }

        public function cargarPIE($revision){

            //Declaramos el query
                $query = 
                " SELECT 
                    04_partesinteresadas_historico.id, 
                    04_partesinteresadas_historico.codigo_interno, 
                    04_partesinteresadas_historico.denominador, 
                    04_partesinteresadas_historico.tipo, 
                    04_partesinteresadas_tipos.tipo " .

                " FROM " . static::$tabla .
                " JOIN 04_partesinteresadas_tipos" .
                " ON 04_partesinteresadas_historico.tipo = 04_partesinteresadas_tipos.id" .
                " WHERE 04_partesinteresadas_historico.tipo=2" .
                " AND 04_partesinteresadas_historico.revision='${revision}'";
                
                $result = static::consultarSQL($query);

                return $result;
        }

        public function cargarHistorico($revision){

            //Declaramos el query
                $query = 
                " SELECT * " .
                " FROM " . static::$tabla .
                " WHERE revision='${revision}'";
                
                $result = static::consultarSQL($query);

                return $result;
        }

    }

?>