<?php

    namespace ModelProceso;
    use \ModelGeneral\ActiveRecord as ActiveRecord;

    //Definimos la clase
    class Proceso extends ActiveRecord{

        //region PROPIEDADES
            public $id;    
            public $codigo_interno;
            public $denominador;
            public $juridica;
            public $href;
            public $estado;
            public $comentarios;

        //endregion

        //region BASE DE DATOS

            protected static $db;
            protected static $tabla = '04_procesos';
            protected static $columnasDB = ['id', 'codigo_interno', 'denominador', 'juridica', 'href', 'estado', 'comentarios'];    

        //endregion

        //region CONSTRUCTOR

            //Definimos el constructor y las propiedades del mismo
                public function __construct($args = []){

                    $this->id = $args['id'] ?? '';
                    $this->codigo_interno = $args['codigo_interno'] ?? '';
                    $this->denominador =  $args['denominador'] ?? '';
                    $this->juridica =  $args['juridica'] ?? '';
                    $this->href =  $args['href'] ?? '';
                    $this->estado =  $args['estado'] ?? '';
                    $this->comentarios =  $args['comentarios'] ?? '';

                }
        //endregion
        
        //region VALIDACIÓN

            //Definimos un método para la validación de datos
                public function validar(){

                    if(!$this->id){
                        $errores[] = "El campo Código es obligatorio";
                    }

                    if(!$this->codigo_interno){
                        $errores[] = "El campo Código es obligatorio";
                    }

                    if(!$this->denominador){
                        $errores[] = "El denominador es obligatorio";
                    }

                    if(!$this->juridica){
                        $errores[] = "La jurídica es obligatoria";
                    }

                    if(!$this->estado){
                        $errores[] = "El campo Estado es obligatorio";
                    }

                    if(!$this->comentarios){
                        $errores[] = "El campo comentarios es obligatorio";
                    }

                }

        //endregion
        

        //region OTROS MÉTODOS

            public function cargarProcesosTDE(){

                //Declaramos el query
                    $query = 
                    " SELECT * " .
                    " FROM " . static::$tabla .
                    " WHERE estado=1 " .
                    " AND juridica='TdE'";

                    $result = static::consultarSQL($query);
                    
                    return $result;

            }

            public function cargarProcesosDYS(){

                //Declaramos el query
                    $query = 
                    " SELECT * " .
                    " FROM " . static::$tabla .
                    " WHERE estado=1 " .
                    " AND juridica='DyS'";

                    $result = static::consultarSQL($query);

                    return $result;

            }

        //endregion
    }

?>