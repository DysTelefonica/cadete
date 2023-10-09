<?php

    namespace ModelRiesgoOportunidad;
    use \ModelGeneral\ActiveRecord as ActiveRecord;

    //Definimos la clase
    class DecisionRiesgoOportunidad extends ActiveRecord{

        //region PROPIEDADES 
            public $id;
            public $decision;
            public $tipo;
            public $descripcion;



        //endregion

        //region BASE DE DATOS

            protected static $db;
            protected static $tabla = '06_riesgosoportunidades_decisiones';
            protected static $columnasDB = ['id','decision', 'tipo', 'descripcion'];    

        //endregion

        //region CONSTRUCTOR

            //Definimos el constructor y las propiedades del mismo
                public function __construct($args = []){

                    $this->id =  $args['id'] ?? '';
                    $this->decision =  $args['decision'] ?? '';
                    $this->tipo =  $args['tipo'] ?? '';
                    $this->descripcion =  $args['descripcion'] ?? '';
                    
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

            public function cargarDecision($tipo){

                //Declaramos el query
                    $query = 
                    " SELECT    id,
                                decision,
                                (select tipo from 06_riesgosoportunidades_tipos where 06_riesgosoportunidades_tipos.id = 06_riesgosoportunidades_decisiones.tipo) as tipo,
                                descripcion" .

                    " FROM " . static::$tabla .

                    " WHERE ". static::$tabla . ".tipo= (SELECT id from 06_riesgosoportunidades_tipos WHERE tipo = '${tipo}') ";
                    
                    $result = static::consultarSQL($query);

                    return $result;

            }

        //endregion

    }

?>