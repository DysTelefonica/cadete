<?php

    namespace ModelRiesgoOportunidad;
    use \ModelGeneral\ActiveRecord as ActiveRecord;

    //Definimos la clase
    class RiesgoOportunidad extends ActiveRecord{

        //region PROPIEDADES 
            public $id;       
            public $codigo_interno;
            public $denominador;
            public $tipo;
            public $descripcion;
            public $contenedor;
            public $fecha_deteccion;
            public $decision;
            public $justificacion;
            public $estado;
            public $fecha_cierre;
            public $comentarios;

        //endregion

        //region BASE DE DATOS

            protected static $db;
            protected static $tabla = '06_riesgosoportunidades';
            protected static $columnasDB = ['id', 'codigo_interno', 'denominador', 'tipo', 'descripcion', 'contenedor','fecha_deteccion','decision', 'justificacion', 'fecha_cierre', 'estado', 'comentarios',];    

        //endregion

        //region CONSTRUCTOR

            //Definimos el constructor y las propiedades del mismo
                public function __construct($args = []){

                    $this->id = $args['id'] ?? '';
                    $this->codigo_interno = $args['codigo_interno'] ?? '';
                    $this->denominador =  $args['denominador'] ?? '';
                    $this->tipo =  $args['tipo'] ?? '';
                    $this->descripcion =  $args['descripcion'] ?? '';
                    $this->contenedor =  $args['contenedor'] ?? '';
                    $this->fecha_deteccion =  $args['fecha_deteccion'] ?? '';
                    $this->decision =  $args['decision'] ?? '';
                    $this->justificacion =  $args['justificacion'] ?? '';
                    $this->estado =  $args['estado'] ?? '';
                    $this->fecha_cierre =  $args['fecha_cierre'] ?? '';
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

        //region READ

            public function cargarRegistro($id){

                //Declaramos el query
                    $query = 
                    " SELECT    id,
                                codigo_interno,
                                (select tipo from 06_riesgosoportunidades_tipos where 06_riesgosoportunidades.tipo = 06_riesgosoportunidades_tipos.id) as tipo,
                                (select decision from 06_riesgosoportunidades_decisiones where 06_riesgosoportunidades.decision = 06_riesgosoportunidades_decisiones.id) as decision,
                                (select estado from 06_riesgosoportunidades_estados where 06_riesgosoportunidades.estado = 06_riesgosoportunidades_estados.id) as estado,
                                denominador,
                                descripcion,
                                contenedor,
                                fecha_deteccion,
                                justificacion,
                                fecha_cierre,
                                comentarios" .

                    " FROM " . static::$tabla .

                    " WHERE " . static::$tabla . ".id='${id}'";

                    $result = static::consultarSQL($query);
                    
                    return array_shift($result);

            }

            public function cargarRiesgos(){

                //Declaramos el query
                    $query = 
                    " SELECT    id,
                                codigo_interno,
                                (select tipo from 06_riesgosoportunidades_tipos where 06_riesgosoportunidades.tipo = 06_riesgosoportunidades_tipos.id) as tipo,
                                (select decision from 06_riesgosoportunidades_decisiones where 06_riesgosoportunidades.decision = 06_riesgosoportunidades_decisiones.id) as decision,
                                (select estado from 06_riesgosoportunidades_estados where 06_riesgosoportunidades.estado = 06_riesgosoportunidades_estados.id) as estado,
                                denominador,
                                descripcion,
                                contenedor
                                fecha_deteccion,
                                justificacion,
                                fecha_cierre,
                                comentarios" .

                    " FROM " . static::$tabla .

                    " WHERE 06_riesgosoportunidades.tipo=1 ".

                    " ORDER BY codigo_interno ASC";

                    $result = static::consultarSQL($query);
                    
                    return $result;

            }

            public function cargarOportunidades(){

                //Declaramos el query
                $query = 
                " SELECT    id,
                            codigo_interno,
                            (select tipo from 06_riesgosoportunidades_tipos where 06_riesgosoportunidades.tipo = 06_riesgosoportunidades_tipos.id) as tipo,
                            (select decision from 06_riesgosoportunidades_decisiones where 06_riesgosoportunidades.decision = 06_riesgosoportunidades_decisiones.id) as decision,
                            (select estado from 06_riesgosoportunidades_estados where 06_riesgosoportunidades.estado = 06_riesgosoportunidades_estados.id) as estado,
                            denominador,
                            descripcion,
                            contenedor
                            fecha_deteccion,
                            justificacion,
                            fecha_cierre,
                            comentarios" .

                " FROM " . static::$tabla .

                " WHERE 06_riesgosoportunidades.tipo=2 ".

                " ORDER BY codigo_interno ASC";

                $result = static::consultarSQL($query);
                
                return $result;

            }

    //endregion

     //region OTROS MÉTODOS

        public function calcularCodigo($tipo){    
           
            //Declaramos el query
                $query =
                    "SELECT 
                        codigo_interno,
                        (select tipo from 06_riesgosoportunidades_tipos where 06_riesgosoportunidades.tipo = 06_riesgosoportunidades_tipos.id) as tipo" .
                
                    " FROM " . static::$tabla . 

                    " WHERE ". static::$tabla . ".tipo= (SELECT id from 06_riesgosoportunidades_tipos WHERE tipo = '${tipo}') ";

                    " ORDER BY codigo_interno ASC";     
                                    
                $result = static::consultarSQL($query);

            //Si es la primera vez que se abre un item del analisi DAFO

                if(!$result && $tipo == 'Riesgo' || $tipo == '1'){
                    $codigo = "RSG-001";  
                }

                elseif (!$result && $tipo == 'Oportunidad' || $tipo == '2') {
                    $codigo = "OPO-001";  
                }      
                
                else{ //Si no, lo calcula

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

                debuguear($codigo);

        }

        public function asignarEstadoCss($ro){

            foreach ($ro as $key) {

                switch ($key->estado) {

                    case 'Cerrado':
                        $key->estado_css = 1;
                        break;

                    case 'Abierto':
                        $key->estado_css = 4;
                        break;
                }
            }
        }

    //endregion

}

?>