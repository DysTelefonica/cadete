<?php

    namespace ModelPolitica;
    use \ModelGeneral\ActiveRecord as ActiveRecord;

    //Definimos la clase
    class Politica extends ActiveRecord{

        //region PROPIEDADES 
            public $id;       
            public $codigo_interno;
            public $tipo;
            public $denominador;
            public $fecha;
            public $comentarios;

        //endregion

        //region BASE DE DATOS

            protected static $db;
            protected static $tabla = '05_politica';
            protected static $columnasDB = ['id', 'codigo_interno', 'tipo', 'denominador', 'fecha', 'comentarios'];    

        //endregion

        //region CONSTRUCTOR

            //Definimos el constructor y las propiedades del mismo
                public function __construct($args = []){

                    $this->id = $args['id'] ?? '';
                    $this->codigo_interno = $args['codigo_interno'] ?? '';
                    $this->tipo =  $args['tipo'] ?? '';
                    $this->denominador =  $args['denominador'] ?? '';
                    $this->fecha =  $args['fecha'] ?? '';
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

                    if(!$this->fecha){
                        $errores[] = "El campo Fecha es obligatorio";
                    }

                }

        //endregion
        

        //region OTROS MÉTODOS

            public function calcularCodigo(){               

                //Declaramos el query
                    $query = "SELECT codigo_interno FROM " . static::$tabla . 
                    " ORDER BY codigo_interno ASC";             
                    
                    $result = static::consultarSQL($query);
                    
                //Si es la primera vez que se abre un item del analisi DAFO
                    if(!$result){
                        $codigo = "POL-001";                 
                    }

                //Si no, lo calcula
                    else{

                    //Creamos una variable con el último elemento del array
                        $ultimoCodigo = end($result);

                    //Extraemos el campo que queremos
                        $ultimoCodigo = $ultimoCodigo->codigo_interno;
                    
                    //Separamos el código en 2, el string y el int
                        $stringCodigo = preg_replace('/[0-9]/', '', $ultimoCodigo);
    
                        $valorCodigo = (int) filter_var($ultimoCodigo, FILTER_SANITIZE_NUMBER_INT);
                        
                    //El código sale negativo por el guión del código. Así que sanitizamos el resultado
                        $valorCodigo = ($valorCodigo - 2*$valorCodigo) + 1;
    
                    //Ahora lo formateamos para que tenga el formato "000"
                        $longitud = 3;
                        $valorFormateado = substr(str_repeat(0, $longitud).$valorCodigo, -$longitud);
    
                    //Ponemos el cálculo final
                        $codigo = strval($stringCodigo) . strval($valorFormateado);

                    }
                
                //Devolvemos el dato

                    return $codigo; 

            }

            public function cargarPoliticaCalidad(){

                //Declaramos el query
                    $query = 
                    " SELECT * " .
                    " FROM " . static::$tabla .
                    " WHERE tipo='Política de calidad y de PECAL' ";

                    $result = static::consultarSQL($query);
                    
                    return $result;

            }

            public function cargarPoliticaAmbiental(){

                //Declaramos el query
                    $query = 
                    " SELECT * " .
                    " FROM " . static::$tabla .
                    " WHERE tipo='Política de gestión ambiental' ";

                    $result = static::consultarSQL($query);
                    
                    return $result;

            }

        //endregion
    }

?>