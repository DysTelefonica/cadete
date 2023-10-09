<?php

    namespace ModelPlanAccion;
    use \ModelGeneral\ActiveRecord as ActiveRecord;

    //Definimos la clase
    class PlanAccion extends ActiveRecord{

        //region PROPIEDADES 
            public $id;       
            public $codigo_interno;
            public $denominador;
            public $responsable;
            public $descripcion;
            public $origen;
            public $estado;
            public $fechaInicio;
            public $fechaFinPrevisto;
            public $fechaFin;
            public $recursos;
            public $comentarios;

        //endregion

        //region BASE DE DATOS

            protected static $db;
            protected static $tabla = '06_planesaccion';
            protected static $columnasDB = ['id', 'codigo_interno', 'denominador', 'responsable', 'descripcion', 'origen', 'estado', 'fechaInicio', 'fechaFinPrevisto', 'fechaFin', 'recursos', 'comentarios'];    

        //endregion

        //region CONSTRUCTOR

            //Definimos el constructor y las propiedades del mismo
                public function __construct($args = []){

                    $this->id = $args['id'] ?? '';
                    $this->codigo_interno = $args['codigo_interno'] ?? '';
                    
                    $this->denominador =  $args['denominador'] ?? '';
                    $this->responsable =  $args['responsable'] ?? '';
                    $this->descripcion =  $args['descripcion'] ?? '';
                    $this->origen =  $args['origen'] ?? '';
                    $this->estado =  $args['estado'] ?? '';

                    $this->fechaInicio =  $args['fechaInicio'] ?? '';
                    $this->fechaFinPrevisto =  $args['fechaFinPrevisto'] ?? '';
                    $this->fechaFin =  $args['fechaFin'] ?? '';

                    $this->recursos =  $args['recursos'] ?? '';
                    $this->comentarios =  $args['comentarios'] ?? '';

                }
        //endregion
        
        //region VALIDACIÓN

            //Definimos un método para la validación de datos
                public function validar(){

                    if(!$this->codigo_interno){
                        $errores[] = "El campo Código es obligatorio";
                    }

                    if(!$this->denominador){
                        $errores[] = "El denominador es obligatorio";
                    }

                    if(!$this->responsable){
                        $errores[] = "El responsable es obligatorio";
                    }


                    if(!$this->descripcion){
                        $errores[] = "El descripcion es obligatorio";
                    }


                    if(!$this->origen){
                        $errores[] = "El origen es obligatorio";
                    }


                    if(!$this->estado){
                        $errores[] = "El estado es obligatorio";
                    }


                    if(!$this->fechaInicio){
                        $errores[] = "El fechaInicio es obligatorio";
                    }

                }

        //endregion

                //region READ

                public function readAll_estado(){

                    //Declaramos el query
                        $query = 
                        " SELECT 
                            06_planesAccion.*,
                            06_planesAccion_estados.estado " .
    
                        " FROM " . static::$tabla .
    
                        " INNER JOIN 06_planesAccion_estados" .
                            " ON 06_planesAccion.estado = 06_planesAccion_estados.id" .
    
                        " ORDER BY 06_planesAccion.codigo_interno DESC";
    
                    $result = static::consultarSQL($query);
    
                    return $result;

                }

                public function readAll_Dashboard(){

                    //Declaramos el query
                        $query = 
                        " SELECT * " .
                        " FROM " . static::$tabla .

                        " WHERE fechaFinPrevisto <> ''" . 

                        " AND estado = 2" . 
    
                        " ORDER BY fechaFinPrevisto ASC";
    
                    $result = static::consultarSQL($query);
    
                    return $result;

                }

                public function find_estado($id){

                    //Declaramos el query
                    $query = 
                    " SELECT 
                        06_planesAccion.*,
                        06_planesAccion_estados.estado " .

                    " FROM " . static::$tabla .

                    " INNER JOIN 06_planesAccion_estados" .
                        " ON 06_planesAccion.estado = 06_planesAccion_estados.id" .

                    " WHERE 06_planesAccion.id = '${id}'" .

                    " ORDER BY 06_planesAccion.codigo_interno ASC";

                    $result = static::consultarSQL($query);

                    return array_shift($result);

                }

        //endregion
       
        //region OTROS MÉTODOS

            public function calcularCodigo(){    

                //Calculamos el año de la fecha
                    $y = date('y');

                //Declaramos el query
                    $query = "SELECT codigo_interno FROM " . static::$tabla . 
                    " WHERE codigo_interno LIKE '%-$y-%'" .
                    " ORDER BY codigo_interno ASC";    
                    
                    $result = static::consultarSQL($query);

                //Si es la primera vez que se abre un item del analisi DAFO

                    if(!$result){
                        $codigo = "PAS-".$y."-001";  
                    }           

                //Si no, lo calcula
                    else{

                    //Creamos una variable con el último elemento del array
                        $ultimoCodigo = end($result);

                    //Extraemos el campo que queremos
                        $ultimoCodigo = $ultimoCodigo->codigo_interno;
                    
                    //Separamos del código el string del principio
                        $stringCodigo = preg_replace('/[0-9]/', '', $ultimoCodigo);
                        $stringCodigo = preg_replace('/[-]/', '', $stringCodigo);

                    //Obtenemos el valor numeral
                        $valorCodigo = (int) substr($ultimoCodigo, 7, 3);                        
                        
                    //Sumamos uno al valor numerico
                        $valorCodigo++;

                    //Ahora lo formateamos para que tenga el formato "000"
                        $longitud = 3;
                        $valorFormateado = substr(str_repeat(0, $longitud).$valorCodigo, -$longitud);

                    //Ponemos el cálculo final
                        $codigo = strval($stringCodigo) . "-". $y ."-" . strval($valorFormateado);

                    }
                
                //Devolvemos el dato
                    return $codigo; 

            }

        //endregion
    }

?>