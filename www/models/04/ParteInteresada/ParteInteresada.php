<?php

    namespace ModelParteInteresada;
    use \ModelGeneral\ActiveRecord as ActiveRecord;

    //Definimos la clase
    class ParteInteresada extends ActiveRecord{

        //region PROPIEDADES
            public $id;    
            public $codigo_interno;
            public $contenedor;
            public $tipo;
            public $denominador;
            public $fechaDeteccion;
            public $estado;
            public $comentarios;

        //endregion

        //region BASE DE DATOS

            protected static $db;
            protected static $tabla = '04_partesinteresadas';
            protected static $columnasDB = ['id', 'codigo_interno', 'contenedor', 'tipo', 'denominador', 'fechaDeteccion', 'estado', 'comentarios'];    

        //endregion

        //region CONSTRUCTOR

            //Definimos el constructor y las propiedades del mismo
                public function __construct($args = []){

                    $this->id = $args['id'] ?? '';
                    $this->codigo_interno = $args['codigo_interno'] ?? '';
                    $this->contenedor = $args['contenedor'] ?? '';
                    $this->tipo =  $args['tipo'] ?? '';
                    $this->denominador =  $args['denominador'] ?? '';
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

                }

        //endregion

        //region OTROS MÉTODOS

         //Definimos el método para calcular códigos
            public function calcularCodigo($tipo, $contenedor){

                //Declaramos el query
                    $query = 
                        "SELECT codigo_interno " .
                        " FROM " . static::$tabla . 
                        " WHERE tipo='${tipo}'" . 
                        " AND contenedor='${contenedor}'" . 
                        " ORDER BY codigo_interno ASC"; //Static se hereda

                    $result = static::consultarSQL($query);

                //Si es la primera vez que se abre un item del analisi DAFO
                    if(!$result){

                        switch ($tipo){

                            case '1':
                                $codigo = "PII-001";
                                break;

                            case '2':
                                $codigo = "PIE-001";
                                break;

                        };
                    
                    }

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

                    return $codigo;

            }

            public function cargarPII(){

                //Buscamos el contenedor de DyS
                    $query = 
                    " SELECT * " .
                    " FROM " . "04_partesinteresadas_contenedor" .
                    " WHERE dys='1'" .
                    " LIMIT 1";

                    $contenedor = static::consultarSQL($query);

                //Declaramos el query
                    $query = 
                    " SELECT 
                        04_partesinteresadas.id, 
                        04_partesinteresadas.codigo_interno, 
                        04_partesinteresadas.denominador, 
                        04_partesinteresadas.tipo, 
                        04_partesinteresadas_tipos.tipo " .

                    " FROM " . static::$tabla .
                    " JOIN 04_partesinteresadas_tipos" .
                    " ON 04_partesinteresadas.tipo = 04_partesinteresadas_tipos.id" .
                    " WHERE 04_partesinteresadas.tipo=1 " .
                    " AND  04_partesinteresadas.contenedor='" . $contenedor[0]->id . "'";
                    
                    $result = static::consultarSQL($query);

                    return $result;
            }

            public function cargarPIE(){

                //Buscamos el contenedor de DyS
                    $query = 
                    " SELECT * " .
                    " FROM " . "04_partesinteresadas_contenedor" .
                    " WHERE dys='1'" .
                    " LIMIT 1";

                    $contenedor = static::consultarSQL($query);

                //Declaramos el query
                    $query = 
                    " SELECT 
                        04_partesinteresadas.id, 
                        04_partesinteresadas.codigo_interno, 
                        04_partesinteresadas.denominador, 
                        04_partesinteresadas.tipo, 
                        04_partesinteresadas_tipos.tipo " .

                    " FROM " . static::$tabla .
                    " JOIN 04_partesinteresadas_tipos" .
                    " ON 04_partesinteresadas.tipo = 04_partesinteresadas_tipos.id" .
                    " WHERE 04_partesinteresadas.tipo=2 " .
                    " AND  04_partesinteresadas.contenedor='" . $contenedor[0]->id . "'";

                    $result = static::consultarSQL($query);

                    return $result;
            }

            public function cargarPIIContenedor($contenedor){

                //Declaramos el query
                    $query = 
                    " SELECT 
                        04_partesinteresadas.id, 
                        04_partesinteresadas.codigo_interno, 
                        04_partesinteresadas.denominador, 
                        04_partesinteresadas.tipo, 
                        04_partesinteresadas_tipos.tipo " .

                    " FROM " . static::$tabla .
                    " JOIN 04_partesinteresadas_tipos" .
                    " ON 04_partesinteresadas.tipo = 04_partesinteresadas_tipos.id" .
                    " WHERE 04_partesinteresadas.tipo=1 " .
                    " AND  04_partesinteresadas.contenedor='${contenedor}'";
                    
                    $result = static::consultarSQL($query);

                    return $result;
            }

            public function cargarPIEContenedor($contenedor){

                //Declaramos el query
                    $query = 
                    " SELECT 
                        04_partesinteresadas.id, 
                        04_partesinteresadas.codigo_interno, 
                        04_partesinteresadas.denominador, 
                        04_partesinteresadas.tipo, 
                        04_partesinteresadas_tipos.tipo " .

                    " FROM " . static::$tabla .
                    " JOIN 04_partesinteresadas_tipos" .
                    " ON 04_partesinteresadas.tipo = 04_partesinteresadas_tipos.id" .
                    " WHERE 04_partesinteresadas.tipo=2 " .
                    " AND  04_partesinteresadas.contenedor='${contenedor}'";

                    $result = static::consultarSQL($query);

                    return $result;
            }

            public function cargarPIContenedor($contenedor){

                //Declaramos el query
                    $query = 
                    " SELECT 
                        04_partesinteresadas.id, 
                        04_partesinteresadas.codigo_interno, 
                        04_partesinteresadas.denominador, 
                        04_partesinteresadas.tipo, 
                        04_partesinteresadas_tipos.tipo " .

                    " FROM " . static::$tabla .
                    " JOIN 04_partesinteresadas_tipos" .
                    " ON 04_partesinteresadas.tipo = 04_partesinteresadas_tipos.id" .
                    " WHERE 04_partesinteresadas.tipo=1 " .
                    " AND  04_partesinteresadas.contenedor='${contenedor}'";

                    $result = static::consultarSQL($query);

                    $query2 = 
                    " SELECT 
                        04_partesinteresadas.id, 
                        04_partesinteresadas.codigo_interno, 
                        04_partesinteresadas.denominador, 
                        04_partesinteresadas.tipo, 
                        04_partesinteresadas_tipos.tipo " .

                    " FROM " . static::$tabla .
                    " JOIN 04_partesinteresadas_tipos" .
                    " ON 04_partesinteresadas.tipo = 04_partesinteresadas_tipos.id" .
                    " WHERE 04_partesinteresadas.tipo=2 " .
                    " AND  04_partesinteresadas.contenedor='${contenedor}'";

                    $result2 = static::consultarSQL($query2);

                    $r = array_merge($result, $result2);

                    return $r;
            }

        //endregion
    }

?>