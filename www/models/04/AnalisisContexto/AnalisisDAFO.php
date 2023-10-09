<?php

    namespace ModelAnalisisContexto;
    use \ModelGeneral\ActiveRecord as ActiveRecord;

    //Definimos la clase
    class AnalisisDAFO extends ActiveRecord{

        //region PROPIEDADES 
            public $id;       
            public $codigo_interno;
            public $analisisContexto;
            public $tipo;
            public $denominador;
            public $origen;
            public $fechaDeteccion;
            public $estado;
            public $comentarios;

        //endregion

        //region BASE DE DATOS

            protected static $db;
            protected static $tabla = '04_analisisdafo';
            protected static $columnasDB = ['id', 'codigo_interno', 'analisisContexto', 'tipo', 'denominador', 'origen', 'fechaDeteccion', 'estado', 'comentarios'];    

        //endregion

        //region CONSTRUCTOR

            //Definimos el constructor y las propiedades del mismo
                public function __construct($args = []){

                    $this->id = $args['id'] ?? '';
                    $this->codigo_interno = $args['codigo_interno'] ?? '';
                    $this->analisisContexto = $args['analisisContexto'] ?? '';
                    $this->tipo =  $args['tipo'] ?? '';
                    $this->denominador =  $args['denominador'] ?? '';
                    $this->origen =  $args['origen'] ?? '';
                    $this->fechaDeteccion =  $args['fechaDeteccion'] ?? '';
                    $this->estado =  $args['estado'] ?? '';
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

                    if(!$this->origen){
                        $errores[] = "El campo Origen es obligatorio";
                    }

                    if(!$this->fechaDeteccion){
                        $errores[] = "El campo Fecha es obligatorio";
                    }

                    if(!$this->estado){
                        $errores[] = "El campo Estado es obligatorio";
                    }

                    if(!$this->comentarios){
                        $errores[] = "El campo comentarios es obligatorio";
                    }

                }

        //endregion

        //regiom READ

            public function cargarDAFO($analisisContexto){

                //Declaramos el query

                    $query = 
                    " SELECT * " .
                    " FROM " . static::$tabla .
                    " WHERE analisiscontexto='${analisisContexto}'";

                    $result = static::consultarSQL($query);

                    return $result;
            }

            public function cargarDAFOVigente($analisisContexto){

                //Declaramos el query

                    $query = 
                    " SELECT * " .
                    " FROM " . static::$tabla .
                    " WHERE analisiscontexto='${analisisContexto}'" . 
                    " AND estado = 'Vigente'";

                    $result = static::consultarSQL($query);

                    return $result;
            }

            public function cargarDebilidades($analisisContexto){

                //Declaramos el query

                    $query = 
                    " SELECT
                            04_analisisdafo.id,  
                            04_analisisdafo.codigo_interno, 
                            04_analisisdafo.analisisContexto, 
                            04_analisisdafo.denominador, 
                            04_analisisdafo_tipos.tipo " .

                    " FROM " . static::$tabla .
                    " JOIN 04_analisisdafo_tipos" .
                    " ON 04_analisisdafo.tipo = 04_analisisdafo_tipos.id" .
                    " WHERE 04_analisisdafo.analisiscontexto='${analisisContexto}'" .
                    " AND 04_analisisdafo.tipo = '1'" .
                    " AND 04_analisisdafo.estado = 'Vigente'";

                    $result = static::consultarSQL($query);

                    return $result;
            }

            public function cargarAmenazas($analisisContexto){

                //Declaramos el query

                    $query = 
                    " SELECT 
                            04_analisisdafo.id, 
                            04_analisisdafo.codigo_interno, 
                            04_analisisdafo.analisisContexto, 
                            04_analisisdafo.denominador, 
                            04_analisisdafo_tipos.tipo " .

                    " FROM " . static::$tabla .
                    " JOIN 04_analisisdafo_tipos" .
                    " ON 04_analisisdafo.tipo = 04_analisisdafo_tipos.id" .
                    " WHERE 04_analisisdafo.analisiscontexto='${analisisContexto}'" .
                    " AND 04_analisisdafo.tipo = '2'" .
                    " AND 04_analisisdafo.estado = 'Vigente'";

                    $result = static::consultarSQL($query);

                    return $result;
            }

            public function cargarFortalezas($analisisContexto){

                //Declaramos el query

                    $query = 
                    " SELECT 
                            04_analisisdafo.id, 
                            04_analisisdafo.codigo_interno, 
                            04_analisisdafo.analisisContexto, 
                            04_analisisdafo.denominador, 
                            04_analisisdafo_tipos.tipo " .

                    " FROM " . static::$tabla .
                    " JOIN 04_analisisdafo_tipos" .
                    " ON 04_analisisdafo.tipo = 04_analisisdafo_tipos.id" .
                    " WHERE 04_analisisdafo.analisiscontexto='${analisisContexto}'" .
                    " AND 04_analisisdafo.tipo = '3'".
                    " AND 04_analisisdafo.estado = 'Vigente'";

                    $result = static::consultarSQL($query);

                    return $result;
            }

            public function cargarOportunidades($analisisContexto){

                //Declaramos el query

                    $query = 
                    " SELECT 
                            04_analisisdafo.id, 
                            04_analisisdafo.codigo_interno, 
                            04_analisisdafo.analisisContexto, 
                            04_analisisdafo.denominador, 
                            04_analisisdafo_tipos.tipo " .

                    " FROM " . static::$tabla .
                    " JOIN 04_analisisdafo_tipos" .
                    " ON 04_analisisdafo.tipo = 04_analisisdafo_tipos.id" .
                    " WHERE 04_analisisdafo.analisiscontexto='${analisisContexto}'" .
                    " AND 04_analisisdafo.tipo = '4'".
                    " AND 04_analisisdafo.estado = 'Vigente'";

                    $result = static::consultarSQL($query);

                    return $result;
            }

            public function cargarAnalisisDAFO($tipo){

                //Declaramos el query

                    switch ($tipo) {
                        case 'Debilidad [Análisis DAFO]':
                            $tipo = '1';
                            break;
                        
                        case 'Amenaza [Análisis DAFO]':
                            $tipo = '2';
                            break;

                        case 'Fortaleza [Análisis DAFO]':
                            $tipo = '3';
                            break;

                        case 'Oportunidad [Análisis DAFO]':
                            $tipo = '4';
                            break;
                    }

                    $query = 
                    " SELECT 
                            04_analisisdafo.id, 
                            04_analisisdafo.codigo_interno, 
                            04_analisisdafo.analisisContexto, 
                            04_analisisdafo.denominador, 
                            04_analisisdafo_tipos.tipo " .

                    " FROM " . static::$tabla .
                    " JOIN 04_analisisdafo_tipos" .
                    " ON 04_analisisdafo.tipo = 04_analisisdafo_tipos.id" .
                    " WHERE 04_analisisdafo.tipo='${tipo}'";

                    $result = static::consultarSQL($query);

                    return $result;
            }

            public function cargarTodoAnalisisDAFO($analisisContexto){

                 //Declaramos el query
                    $q1 = 
                    " SELECT
                            04_analisisdafo.id,  
                            04_analisisdafo.codigo_interno, 
                            04_analisisdafo.analisisContexto, 
                            04_analisisdafo.denominador, 
                            04_analisisdafo_tipos.tipo " .

                    " FROM " . static::$tabla .
                    " JOIN 04_analisisdafo_tipos" .
                    " ON 04_analisisdafo.tipo = 04_analisisdafo_tipos.id" .
                    " WHERE 04_analisisdafo.analisiscontexto='${analisisContexto}'" .
                    " AND 04_analisisdafo.estado = 'Vigente'";

                    $r1 = static::consultarSQL($q1);

                    return $r1;

            }

        //endregion

        //regiom DELETE

            public function deleteDAFO($analisisContexto){

                //Declaramos el query   

                    $query = 
                    " DELETE" .
                    " FROM " . static::$tabla . 
                    " WHERE analisisContexto='${analisisContexto}'";

                    $result = static::$db->query($query);

                    return $result;

            }

        //endregion

        //region OTROS MÉTODOS

            public function calcularCodigo($tipo, $analisisContexto){               

                //Declaramos el query
                    $query = "SELECT codigo_interno FROM " . static::$tabla . 
                    " WHERE tipo = " . $tipo . 
                    " AND analisisContexto = '${analisisContexto}'" . 
                    " ORDER BY codigo_interno ASC";             
                    
                    $result = static::consultarSQL($query);
                    
                //Si es la primera vez que se abre un item del analisi DAFO
                    if(!$result){

                        switch ($tipo){

                            case '1':
                                $codigo = "DEB-001";
                                break;

                            case '2':
                                $codigo = "AMZ-001";
                                break;

                            case '3':
                                $codigo = "FOR-001";
                                break;

                            case '4':
                                $codigo = "OPO-001";
                                break;

                        };
                    
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

        //endregion

    }

?>