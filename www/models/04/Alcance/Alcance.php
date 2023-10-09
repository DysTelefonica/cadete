<?php

    namespace ModelAlcance;
    use \ModelGeneral\ActiveRecord as ActiveRecord;

    //Definimos la clase
    class Alcance extends ActiveRecord{

        //region PROPIEDADES
            public $id;    
            public $codigo_interno;
            public $normativa;
            public $fecha;
            public $denominador;
            public $comentarios;

        //endregion

        //region BASE DE DATOS

            protected static $db;
            protected static $tabla = '04_alcance';
            protected static $columnasDB = ['id', 'codigo_interno','normativa', 'fecha', 'denominador', 'comentarios'];    

        //endregion

        //region CONSTRUCTOR

            //Definimos el constructor y las propiedades del mismo
                public function __construct($args = []){

                    $this->id = $args['id'] ?? '';
                    $this->id = $args['codigo_interno'] ?? '';
                    $this->normativa = $args['normativa'] ?? '';
                    $this->fecha =  $args['fecha'] ?? '';
                    $this->denominador =  $args['denominador'] ?? '';
                    $this->comentarios =  $args['comentarios'] ?? '';

                }
        //endregion
        
        //region VALIDACIÓN

            //Definimos un método para la validación de datos
                public function validar(){

                    if(!$this->id){
                        $errores[] = "El campo Código es obligatorio";
                    }

                    if(!$this->normativa){
                        $errores[] = "La normativa es obligatorio";
                    }

                    if(!$this->denominador){
                        $errores[] = "El denominador es obligatorio";
                    }

                    if(!$this->fecha){
                        $errores[] = "La fecha es obligatoria";
                    }

                    if(!$this->comentarios){
                        $errores[] = "El campo comentarios es obligatorio";
                    }

                }

        //endregion

         //#region OTROS MÉTODOS

            public function cargarAlcanceDyS(){

                //Declaramos el query
                    $query = 
                    " SELECT * " .
                    " FROM " . static::$tabla .
                    " WHERE normativa='PECAL 2110' ";

                    $result = static::consultarSQL($query);
                    
                    return $result;

            }

        //#endregion

    }

?>