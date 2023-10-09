<?php

    namespace ModelAnalisisContexto;
    use \ModelGeneral\ActiveRecord as ActiveRecord;
    use \ModelGeneral\Codigo;

    //Definimos la clase
    class AnalisisContexto extends ActiveRecord{

        //region PROPIEDADES
            public $id;
            public $codigo_interno;
            public $denominador;
            public $tipo;
            public $comentarios;

        //endregion

        //region BASE DE DATOS

            protected static $db;
            protected static $tabla = '04_analisiscontexto';
            protected static $columnasDB = ['id', 'codigo_interno', 'denominador', 'tipo', 'comentarios'];    

        //endregion

        //region rutas

            protected static $url__read = '/contexto/analisisContexto/read?id=';

        //endregion

        //region CONSTRUCTOR

            //Definimos el constructor y las propiedades del mismo
                public function __construct($args = []){

                    $this->id = $args['id'] ?? '';
                    $this->codigo_interno = $args['codigo_interno'] ?? '';
                    $this->denominador =  $args['denominador'] ?? '';
                    $this->tipo =  $args['tipo'] ?? '';
                    $this->comentarios =  $args['comentarios'] ?? '';

                }
        //endregion
        
        //region VALIDACIÓN

            //Definimos un método para la validación de datos
                public function validar(){

                    if(!$this->id){
                        $errores[] = "El campo ID es obligatorio";
                    }

                    if(!$this->codigo_interno){
                        $errores[] = "El campo Código es obligatorio";
                    }

                    if(!$this->denominador){
                        $errores[] = "El denominador es obligatorio";
                    }

                    if(!$this->tipo){
                        $errores[] = "El campo Tipo es obligatorio";
                    }

                    if(!$this->comentarios){
                        $errores[] = "El campo Comentarios es obligatorio";
                    }

                }

        //endregion

        //region OTROS MÉTODOS

         //Definimos el método para calcular códigos
            public function calcularCodigo(){

                //Declaramos el query
                    $query = "SELECT codigo_interno FROM " . static::$tabla . " ORDER BY codigo_interno ASC"; //Static se hereda
                    $result = static::consultarSQL($query);

                //Creamos una variable con el último elemento del array

                    if(!$result){
                        $codigo = "ACT-001";
                    }
                    else{

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

            public function cargarAnalisisDAFO(){

                //Declaramos el query
                    $query = 
                    " SELECT 
                        04_analisiscontexto.id, 
                        04_analisiscontexto.codigo_interno, 
                        04_analisiscontexto.denominador, 
                        04_analisiscontexto_tipos.tipo " .

                    " FROM " . static::$tabla .

                    " JOIN 04_analisiscontexto_tipos" .
                        " ON 04_analisiscontexto.tipo = 04_analisiscontexto_tipos.id" .

                    " WHERE 04_analisiscontexto.tipo='1'" .

                    " ORDER BY codigo_interno ASC";

                $result = static::consultarSQL($query);

                return $result;
            }

            public function cargarOtrosAnalisisContexto(){

                //Declaramos el query
                    $query = 
                    " SELECT 
                        04_analisiscontexto.id, 
                        04_analisiscontexto.codigo_interno, 
                        04_analisiscontexto.denominador, 
                        04_analisiscontexto_tipos.tipo " .

                    " FROM " . static::$tabla .

                    " JOIN 04_analisiscontexto_tipos" .
                        " ON 04_analisiscontexto.tipo = 04_analisiscontexto_tipos.id" .

                    " WHERE 04_analisiscontexto.tipo<>'1'" .
                    
                    " ORDER BY codigo_interno ASC";

                $result = static::consultarSQL($query);

                return $result;
            }     

        //endregion
    }

?>