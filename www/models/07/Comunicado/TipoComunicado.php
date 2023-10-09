<?php

    namespace ModelComunicado;
    use \ModelGeneral\ActiveRecord as ActiveRecord;

    //Definimos la clase
    class TipoComunicado extends ActiveRecord{

        //region PROPIEDADES
            public $id;
            public $tipo;

        //endregion

        //region BASE DE DATOS

            protected static $db;
            protected static $tabla = '07_comunicados_tipo';
            protected static $columnasDB = ['id', 'tipo'];    

        //endregion

        //region CONSTRUCTOR

            //Definimos el constructor y las propiedades del mismo
                public function __construct($args = []){

                    $this->id = $args['id'] ?? '';
                    $this->tipo =  $args['tipo'] ?? '';

                }
        //endregion
        

        //region OTROS

            public function asignarIndicador($tipo, $tipos){

                foreach ($tipos as $key => $t) {
    
                    if ($t->tipo === $tipo) {
                        return $t->id;
                    }
    
                }
    
            }

        //endregion

       
    }

?>