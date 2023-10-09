<?php

    namespace ModelGeneral;

    //Definimos la clase
    class Relacion extends ActiveRecord{

        //region PROPIEDADES
            public $id;
            public $id_item1;
            public $id_item2;

        //endregion

        //region BASE DE DATOS
            protected static $db;
            protected static $tabla = '00_relaciones';
            protected static $columnasDB = ['id', 'id_item1', 'id_item2'];    

        //endregion

        //region CONSTRUCTOR

            //Definimos el constructor y las propiedades del mismo
                public function __construct($args = []){

                    $this->id = $args['id'] ?? '';
                    $this->id_item1 =  $args['id_item1'] ?? '';
                    $this->id_item2 =  $args['id_item2'] ?? '';
                }
                
        //endregion

        //buscar adjuntos
            public static function cargarRelaciones($id_item1){

                //RELACIÓN DIRECTA

                    $query = "SELECT * FROM 00_relaciones WHERE id_item1='${id_item1}'";

                    $result = static::consultarSQL($query);
                    
                    //Asignamos el elemento del sistema al que se refiere a cada relación
                        foreach ($result as $relacion) {
                            $array = Codigo::analizarId($relacion->id_item2);  
                            $relacion->elementoSistema = $array->elementoSistema;
                            
                            $modelo = $array->namespace . '\\' . $array->modelo;
                            $item2 = new $modelo;

                            $item2 = $item2::find($relacion->id_item2);
                            $relacion->codigo_interno = $item2->codigo_interno;
                            $relacion->descripcion = $item2->denominador;
                            $relacion->rutaIndex = $array->rutaIndex . $relacion->id_item2;
                            $relacion->ico = $array->ico;

                        }
                
                //RELACIÓN INVERSA

                    $query2 = "SELECT * FROM 00_relaciones WHERE id_item2='${id_item1}'";
                    $result2 = static::consultarSQL($query2);

                     //Asignamos el elemento del sistema al que se refiere a cada relación
                     foreach ($result2 as $relacion) {
                        $array = Codigo::analizarId($relacion->id_item1);  
                        $relacion->elementoSistema = $array->elementoSistema;

                        $modelo = $array->namespace . '\\' . $array->modelo;
                        $item1 = new $modelo;

                        $item1 = $item1::find($relacion->id_item1);
                        $relacion->codigo_interno = $item1->codigo_interno;
                        $relacion->descripcion = $item1->denominador;
                        $relacion->rutaIndex = $array->rutaIndex . $relacion->id_item1;
                        $relacion->ico = $array->ico;

                    }

                //Juntamos ambos arrays
                    $merge_result = array_merge($result, $result2);

                //array_shift devuelve el primer elemento de un array
                    return $merge_result;
                    
            }

        //region VALIDACIÓN

            //Definimos un método para la validación de datos
                public function validar(){

                    if(!$this->id){
                        $errores[] = "El campo id es obligatorio";
                    }

                    if(!$this->id_item1){
                        $errores[] = "El campo Item1 es obligatorio";
                    }

                }

        //endregion

        public function EliminarRelacionPorItem($id){          

                //Declaramos el query
                    $query = " DELETE FROM 00_relaciones WHERE id_item1='${id}'";

                //usamos static por que $db es estático
                    $resultado = static::$db->query($query);

                //Declaramos el query
                    $query = " DELETE FROM 00_relaciones WHERE id_item2='${id}'";

                //usamos static por que $db es estático
                    $resultado = static::$db->query($query);

                //array_shift devuelve el primer elemento de un array
                    return $resultado;

                        
        }
        
    }

?>