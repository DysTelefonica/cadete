<?php

    namespace ModelRiesgoOportunidad;
    use \ModelGeneral\ActiveRecord as ActiveRecord;

    //Definimos la clase
    class RevisionRiesgoOportunidad extends ActiveRecord{

        //region PROPIEDADES
            public $id;
            public $codigo_interno;
            public $denominador;
            public $revision;
            public $fecha;
            public $comentarios;

        //endregion

        //region BASE DE DATOS

            protected static $db;
            protected static $tabla = '06_riesgosoportunidades_revisiones';
            protected static $columnasDB = ['id', 'codigo_intenro','denominador', 'revision', 'fecha', 'comentarios'];    

        //endregion

        //region CONSTRUCTOR

            //Definimos el constructor y las propiedades del mismo
                public function __construct($args = []){

                    $this->id = $args['id'] ?? '';
                    $this->codigo_interno = $args['codigo_interno'] ?? '';
                    $this->denominador =  $args['denominador'] ?? '';
                    $this->revision =  $args['revision'] ?? '';
                    $this->fecha =  $args['fecha'] ?? '';
                    $this->comentarios =  $args['comentarios'] ?? '';

                }
        //endregion
        
        //region VALIDACIÓN

            //Definimos un método para la validación de datos
                public function validar(){

                    if(!$this->id){
                        $errores[] = "El campo ID es obligatorio";
                    }

                    if(!$this->denominador){
                        $errores[] = "El denominador es obligatorio";
                    }

                    if(!$this->revision){
                        $errores[] = "El campo Revision es obligatorio";
                    }

                    if(!$this->fecha){
                        $errores[] = "El campo Fecha es obligatorio";
                    }

                    if(!$this->comentarios){
                        $errores[] = "El campo Comentarios es obligatorio";
                    }

                }

        //endregion

        //region OTROS MÉTODOS

            public function cargarRevisiones(){

                    //Declaramos el query
                        $query = 
                        " SELECT * ".
                        " FROM " . static::$tabla .
                        " ORDER BY revision DESC";
    
                        $result = static::consultarSQL($query);

                        return $result;
                }
            }

        //endregion

?>