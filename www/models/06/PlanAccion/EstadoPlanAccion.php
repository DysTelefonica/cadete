<?php

    namespace ModelPlanAccion;
    use \ModelGeneral\ActiveRecord as ActiveRecord;

    //Definimos la clase
    class EstadoPlanAccion extends ActiveRecord{

        //region PROPIEDADES 
            public $id;
            public $estado;

        //endregion

        //region BASE DE DATOS

            protected static $db;
            protected static $tabla = '06_planesaccion_estados';
            protected static $columnasDB = ['id', 'estado'];    

        //endregion

        //region CONSTRUCTOR

            //Definimos el constructor y las propiedades del mismo
                public function __construct($args = []){
                    $this->id =  $args['id'] ?? '';
                    $this->estado =  $args['estado'] ?? '';

                }
        //endregion
        
        //region VALIDACIÓN

            //Definimos un método para la validación de datos
                public function validar(){

                    if(!$this->estado){
                        $errores[] = "El campo Estado es obligatorio";
                    }

                }

        //endregion

        public function asignarIndicador($estado, $estados){
            
            foreach ($estados as $key => $e) {

                if ($e->estado === $estado) {
                    return $e->id;
                }

            }

        }

    }

?>