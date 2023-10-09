<?php

    namespace ModelProyectoMejora;
    use \ModelGeneral\ActiveRecord as ActiveRecord;

    use ModelEstadoProyectoMejora;

    //Definimos la clase
    class ProyectoMejora extends ActiveRecord{

        //region PROPIEDADES 
            public $id;       
            public $codigo_interno;
            public $denominador;
            public $origen;
            public $estado;
            public $fechaDeteccion;
            public $comentarios;

        //endregion

        //region BASE DE DATOS

            protected static $db;
            protected static $tabla = '06_proyectosmejora';
            protected static $columnasDB = ['id', 'codigo_interno', 'denominador', 'origen', 'estado', 'fechaDeteccion', 'comentarios'];    

        //endregion

        //region CONSTRUCTOR

            //Definimos el constructor y las propiedades del mismo
                public function __construct($args = []){

                    $this->id = $args['id'] ?? '';
                    $this->codigo_interno = $args['codigo_interno'] ?? '';
                    $this->denominador =  $args['denominador'] ?? '';
                    $this->origen =  $args['origen'] ?? '';
                    $this->estado =  $args['estado'] ?? '';
                    $this->fechaDeteccion =  $args['fechaDeteccion'] ?? '';
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

                    if(!$this->origen){
                        $errores[] = "El origen es obligatorio";
                    }


                    if(!$this->estado){
                        $errores[] = "El estado es obligatorio";
                    }

                }

        //endregion

        //region READ

            public function readAll_estado(){

                //Declaramos el query
                    $query = 
                    " SELECT 
                        06_proyectosmejora.*,
                        06_proyectosmejora_estados.estado " .

                    " FROM " . static::$tabla .

                    " INNER JOIN 06_proyectosmejora_estados" .
                        " ON 06_proyectosmejora.estado = 06_proyectosmejora_estados.id" .

                    " ORDER BY 06_proyectosmejora.codigo_interno DESC";

                $result = static::consultarSQL($query);

                return $result;

            }

            public function find_estado($id){

                //Declaramos el query
                $query = 
                " SELECT 
                    06_proyectosmejora.*,
                    06_proyectosmejora_estados.estado " .

                " FROM " . static::$tabla .

                " INNER JOIN 06_proyectosmejora_estados" .
                    " ON 06_proyectosmejora.estado = 06_proyectosmejora_estados.id" .

                " WHERE 06_proyectosmejora.id = '${id}'" .

                " ORDER BY 06_proyectosmejora.codigo_interno ASC";

                $result = static::consultarSQL($query);

                return array_shift($result);

            }

            public function readAll_filterbyestado($estado){

                $e = implode(',', $estado);

                //Declaramos el query
                    $query = 
                    " SELECT    id,
                                codigo_interno,
                                denominador,
                                origen,
                                (select estado from 06_proyectosmejora_estados where 06_proyectosmejora.estado = 06_proyectosmejora_estados.id) as estado,
                                fechaDeteccion,
                                comentarios" .

                    " FROM " . static::$tabla .

                    " WHERE estado in ('.$estado.') " . 

                    " ORDER BY codigo_interno ASC";

                $result = static::consultarSQL($query);

                return $result;

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
                        $codigo = "PMC-".$y."-001";  
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