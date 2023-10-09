<?php

    namespace ModelAnalisisContexto;
    use \ModelGeneral\ActiveRecord as ActiveRecord;

    //Definimos la clase
    class RevisionAnalisisContexto extends ActiveRecord{

        //region PROPIEDADES
            public $id;
            public $analisisContexto;
            public $codigo_interno;
            public $tipo;
            public $revision;
            public $fecha;
            public $denominador;
            public $control_cambios;
            public $comentarios;

        //endregion

        //region BASE DE DATOS

            protected static $db;
            protected static $tabla = '04_analisiscontexto_revisiones';
            protected static $columnasDB = ['id', 'analisisContexto', 'codigo_interno', 'tipo', 'revision', 'fecha', 'denominador', 'control_cambios','comentarios'];    

        //endregion

        //region CONSTRUCTOR

            //Definimos el constructor y las propiedades del mismo
                public function __construct($args = []){

                    $this->id = $args['id'] ?? '';
                    $this->analisisContexto = $args['analisisContexto'] ?? '';
                    $this->codigo_interno = $args['codigo_interno'] ?? '';
                    $this->tipo = $args['tipo'] ?? '';
                    $this->revision =  $args['revision'] ?? '';
                    $this->denominador =  $args['denominador'] ?? '';
                    $this->control_cambios =  $args['control_cambios'] ?? '';
                    $this->fecha =  date('Y-m-d');
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

                    if(!$this->revision){
                        $errores[] = "El campo Edición es obligatorio";
                    }

                    if(!$this->fecha){
                        $errores[] = "El campo Fecha es obligatorio";
                    }

                    if(!$this->comentarios){
                        $errores[] = "El campo Comentarios es obligatorio";
                    }

                }

        //endregion

        //region OTROS MÉTODOS

         //Definimos el método para calcular códigos

            public function cargarHistorico($codigo){

                //Declaramos el query
                    $query = 
                    " SELECT * " .
                    " FROM " . static::$tabla .
                    " WHERE codigo_interno='${codigo}'" .
                    " ORDER BY revision DESC";

                    $result = static::consultarSQL($query);

                    return $result;
            }     
            
            public function cargarUltimoHistorico($codigo){

                //Declaramos el query
                    $query = 
                    " SELECT * " .
                    " FROM " . static::$tabla .
                    " WHERE codigo_interno='${codigo}'" .
                    " ORDER BY revision DESC, fecha" . 
                    " LIMIT 1";

                    $result = static::consultarSQL($query);

                    $intervaloRevision = 6;

                    foreach($result as $r){
                        $r->proximaRevision = date('Y-m-d', strtotime($r->fecha."+" . $intervaloRevision . " months"));
                    }

                    return $result;
            }   
            
            public function EliminarHistorico($codigo_interno){          

                //Declaramos el query
                    $query = "DELETE FROM 04_historicoanalisiscontexto WHERE codigo_interno='${codigo_interno}'";

                //usamos static por que $db es estático
                    $resultado = static::$db->query($query);

                //array_shift devuelve el primer elemento de un array
                    return $resultado;
                        
            }

            public function asignarIndicadorFecha($r){
                
                foreach ($r as $key) {

                    switch ($key->fecha) {

                        case 'No aprovechado':
                            $key->estado_css = 1;
                            break;

                        case 'En estudio':
                            $key->estado_css = 2;
                            break;

                        case 'Aprovechado y en proceso':
                            $key->estado_css = 3;
                            break;

                        case 'Aprovechado y finalizado':
                            $key->estado_css = 4;
                            break;

                        case 'Planeado para el futuro':
                            $key->estado_css = 5;
                            break;
                    }
                }

            }

        //endregion
    }

?>