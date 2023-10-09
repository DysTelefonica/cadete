<?php

    namespace ModelAnalisisContexto;
    use \ModelGeneral\ActiveRecord as ActiveRecord;
    use \ModelGeneral\Codigo;

    //Definimos la clase
    class HistoricoAnalisisDAFO extends ActiveRecord{

        //region PROPIEDADES 
            public $id;       
            public $codigo_interno;
            public $analisisContexto;
            public $revisionAnalisisContexto;
            public $tipo;
            public $denominador;
            public $origen;
            public $fechaDeteccion;
            public $estado;
            public $comentarios;

        //endregion

        //region BASE DE DATOS

            protected static $db;
            protected static $tabla = '04_analisisdafo_historico';
            protected static $columnasDB = ['id', 'codigo_interno', 'revisionAnalisisContexto', 'analisisContexto', 'tipo', 'denominador', 'origen', 'fechaDeteccion', 'estado', 'comentarios'];    

        //endregion

        //region CONSTRUCTOR

            //Definimos el constructor y las propiedades del mismo
                public function __construct($args = []){

                    $this->id = $args['id'] ?? '';
                    $this->codigo_interno = $args['codigo_interno'] ?? '';
                    $this->analisisContexto = $args['analisisContexto'] ?? '';
                    $this->revisionAnalisisContexto = $args['revisionAnalisisContexto'] ?? '';
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

        //region CREATE

        public function prepararRevision($DAFO, $RevisionAnalisisContexto){

            //Por cada registro asignamos un id. Para ello, recorremos un buble for en el que analizamos el tipo y le asignamos un id dependiendo del mismo
                for($i = 0; $i < count($DAFO); $i++){

                    //Asginamos el id al registro
                        switch ($DAFO[$i]->tipo) {

                            case 1:
                                $DAFO[$i]->id = Codigo::generarId("Histórico Debilidad [Análisis DAFO]");
                                break;

                            case 2:
                                $DAFO[$i]->id = Codigo::generarId("Histórico Amenaza [Análisis DAFO]");
                                break;

                            case 3:
                                $DAFO[$i]->id = Codigo::generarId("Histórico Fortaleza [Análisis DAFO]");
                                break;

                            case 4:
                                $DAFO[$i]->id = Codigo::generarId("Histórico Oportunidad [Análisis DAFO]");
                                break;
                        };
                    
                    //Creamos el registro y le asignamos el código de la revisión 
                        $historicoDAFO = new HistoricoAnalisisDAFO((array)$DAFO[$i]);                    
                        $historicoDAFO->revisionAnalisisContexto = $RevisionAnalisisContexto->id;
                    
                    //Creamos un array y lo alimentamos
                        $array[] = $historicoDAFO;
                    
                };

            //Recorremos todo el array y creamos cada registro
                for($i = 0; $i < count($array); $i++){

                    $array[$i]->create();

                }
            
        }

        //endregion
        

        //region READ

            public function cargarDAFO($analisisContexto){

                //Declaramos el query

                    $query = 
                    " SELECT * " .
                    " FROM " . static::$tabla .
                    " WHERE revisionanalisisContexto='${analisisContexto}'";

                    $result = static::consultarSQL($query);

                    return $result;
            }

            public function cargarDebilidades($analisisContexto){

                //Declaramos el query

                    $query = 
                    " SELECT 
                            04_analisisdafo_historico.id, 
                            04_analisisdafo_historico.codigo_interno, 
                            04_analisisdafo_historico.revisionAnalisisContexto, 
                            04_analisisdafo_historico.denominador, 
                            04_analisisdafo_tipos.tipo " .

                    " FROM " . static::$tabla .
                    " JOIN 04_analisisdafo_tipos" .
                    " ON 04_analisisdafo_historico.tipo = 04_analisisdafo_tipos.id" .
                    " WHERE 04_analisisdafo_historico.revisionAnalisisContexto='${analisisContexto}'" .
                    " AND 04_analisisdafo_historico.tipo = '1'";

                    $result = static::consultarSQL($query);

                    return $result;
            }

            public function cargarAmenazas($analisisContexto){

                //Declaramos el query

                    $query = 
                    " SELECT 
                            04_analisisdafo_historico.id, 
                            04_analisisdafo_historico.codigo_interno, 
                            04_analisisdafo_historico.revisionAnalisisContexto, 
                            04_analisisdafo_historico.denominador, 
                            04_analisisdafo_tipos.tipo " .

                    " FROM " . static::$tabla .
                    " JOIN 04_analisisdafo_tipos" .
                    " ON 04_analisisdafo_historico.tipo = 04_analisisdafo_tipos.id" .
                    " WHERE 04_analisisdafo_historico.revisionAnalisisContexto='${analisisContexto}'" .
                    " AND 04_analisisdafo_historico.tipo = '2'";

                    $result = static::consultarSQL($query);

                    return $result;
            }

            public function cargarFortalezas($analisisContexto){

                //Declaramos el query

                    $query = 
                    " SELECT 
                            04_analisisdafo_historico.id, 
                            04_analisisdafo_historico.codigo_interno, 
                            04_analisisdafo_historico.revisionAnalisisContexto, 
                            04_analisisdafo_historico.denominador, 
                            04_analisisdafo_tipos.tipo " .

                    " FROM " . static::$tabla .
                    " JOIN 04_analisisdafo_tipos" .
                    " ON 04_analisisdafo_historico.tipo = 04_analisisdafo_tipos.id" .
                    " WHERE 04_analisisdafo_historico.revisionAnalisisContexto='${analisisContexto}'" .
                    " AND 04_analisisdafo_historico.tipo = '3'";

                    $result = static::consultarSQL($query);

                    return $result;
            }

            public function cargarOportunidades($analisisContexto){

                //Declaramos el query

                    $query = 
                    " SELECT 
                            04_analisisdafo_historico.id, 
                            04_analisisdafo_historico.codigo_interno, 
                            04_analisisdafo_historico.revisionAnalisisContexto, 
                            04_analisisdafo_historico.denominador, 
                            04_analisisdafo_tipos.tipo " .

                    " FROM " . static::$tabla .
                    " JOIN 04_analisisdafo_tipos" .
                    " ON 04_analisisdafo_historico.tipo = 04_analisisdafo_tipos.id" .
                    " WHERE 04_analisisdafo_historico.revisionAnalisisContexto='${analisisContexto}'" .
                    " AND 04_analisisdafo_historico.tipo = '4'";

                    $result = static::consultarSQL($query);

                    return $result;
            }

        //region DELETE
            
            public function eliminarHistoricoDAFO($analisisContexto){          

                //Declaramos el query
                    $query = "DELETE FROM 04_analisisDAFO_historico  WHERE analisisContexto='${analisisContexto}'";

                //usamos static por que $db es estático
                    $resultado = static::$db->query($query);

                //array_shift devuelve el primer elemento de un array
                    return $resultado;
                        
            }

    }

?>