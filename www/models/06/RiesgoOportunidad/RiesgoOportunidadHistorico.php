<?php

    namespace ModelRiesgoOportunidad;
    use \ModelGeneral\ActiveRecord as ActiveRecord;

    //Definimos la clase
    class RiesgoOportunidadHistorico extends ActiveRecord{

        //region PROPIEDADES 
            public $id;   
            public $revision;     
            public $codigo_interno;
            public $denominador;
            public $tipo;
            public $descripcion;
            public $fecha_deteccion;
            public $decision;
            public $justificacion;
            public $estado;
            public $fecha_cierre;
            public $comentarios;

        //endregion

        //region BASE DE DATOS

            protected static $db;
            protected static $tabla = '06_riesgooportunidad_historico';
            protected static $columnasDB = ['id', 'revision', 'codigo_interno', 'denominador', 'tipo', 'descripcion', 'fecha_deteccion','decision', 'justificacion', 'fecha_cierre', 'estado', 'comentarios',];    

        //endregion

        //region CONSTRUCTOR

            //Definimos el constructor y las propiedades del mismo
                public function __construct($args = []){

                    $this->id = $args['id'] ?? '';
                    $this->revision = $args['revision'] ?? '';
                    $this->codigo_interno = $args['codigo_interno'] ?? '';
                    $this->denominador =  $args['denominador'] ?? '';
                    $this->tipo =  $args['tipo'] ?? '';
                    $this->descripcion =  $args['descripcion'] ?? '';
                    $this->fecha_deteccion =  $args['fecha_deteccion'] ?? '';
                    $this->decision =  $args['decision'] ?? '';
                    $this->justificacion =  $args['justificacion'] ?? '';
                    $this->estado =  $args['estado'] ?? '';
                    $this->fecha_cierre =  $args['fecha_cierre'] ?? '';
                    $this->comentarios =  $args['comentarios'] ?? '';
                }
        //endregion
        
        //region VALIDACIÓN

            //Definimos un método para la validación de datos
                public function validar(){

                    if(!$this->codigo_interno){
                        $errores[] = "El campo Código es obligatorio";
                    }

                }

        //endregion

        //region READ

            public function cargarRiesgos($rev){

                //Declaramos el query
                    $query = 
                    " SELECT *" .
                    " FROM " . static::$tabla .
                    " WHERE tipo='Riesgo'" . 
                    " AND revision='${rev}'";

                    $result = static::consultarSQL($query);
                    
                    return $result;

            }

            public function cargarOportunidades($rev){

                //Declaramos el query
                    $query = 
                    " SELECT * " .
                    " FROM " . static::$tabla .
                    " WHERE tipo='Oportunidad' " .
                    " AND revision='${rev}' ";

                    $result = static::consultarSQL($query);
                    
                    return $result;

            }

        //endregion

    }

?>