<?php

    namespace ModelPlanAccion;
    use \ModelGeneral\ActiveRecord as ActiveRecord;

    //Definimos la clase
    class TareaCircular extends ActiveRecord{

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
            protected static $tabla = '06_tareascirculares';
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

                    if(!$this->tipo){
                        $errores[] = "El campo Tipo es obligatorio";
                    }

                    if(!$this->denominador){
                        $errores[] = "El denominador es obligatorio";
                    }

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
                        $codigo = "TAR-".$y."-001";  
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