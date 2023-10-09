<?php

    namespace ModelGeneral;

    //Definimos la clase
    class Adjuntos extends ActiveRecord{

        //region PROPIEDADES
            public $id;
            public $item_referencia;
            public $nombreAdjunto;
            public $tipoAdjunto;   
            public $tamanoAdjunto;
            public $rutaAdjunto;
            public $auth;

        //endregion

        //region BASE DE DATOS
            protected static $db;
            protected static $tabla = '00_adjuntos';
            protected static $columnasDB = ['id', 'item_referencia', 'nombreAdjunto', 'tipoAdjunto', 'tamanoAdjunto', 'rutaAdjunto', 'auth'];    

        //endregion

        //region CONSTRUCTOR

            //Definimos el constructor y las propiedades del mismo
                public function __construct($args = []){

                    $this->id = $args['id'] ?? '';
                    $this->item_referencia =  $args['item_referencia'] ?? '';
                    $this->nombreAdjunto =  $args['nombreAdjunto'] ?? '';
                    $this->tipoAdjunto =  $args['tipoAdjunto'] ?? '';
                    $this->tamanoAdjunto =  $args['tamanoAdjunto'] ?? '';
                    $this->rutaAdjunto =  $args['rutaAdjunto'] ?? '';
                    $this->auth =  $args['auth'] ?? '';
                    
                }
                
        //endregion

        //region VALIDACIÓN

            //Definimos un método para la validación de datos
                public function validar(){

                    if(!$this->id){
                        $errores[] = "El campo Código es obligatorio";
                    }

                    if(!$this->item_referencia){
                        $errores[] = "El campo Edición es obligatorio";
                    }

                    if(!$this->nombreAdjunto){
                        $errores[] = "El campo Nombre es obligatorio";
                    }

                    if(!$this->tipoAdjunto){
                        $errores[] = "El tipo es obligatorio";
                    }

                    if(!$this->tamanoAdjunto){
                        $errores[] = "El tamaño es obligatorio";
                    }

                    if(!$this->rutaAdjunto){
                        $errores[] = "La ruta es obligatoria";
                    }

                }

        //endregion

        //region CREATE

            //Si no están creadas previamente, creamos las carpetas del directrio
                public function generarRutayCrearCarpetas($item_referencia){          

                    $carpeta1 = substr($item_referencia->id, 0, 2);
                    $carpeta2 = substr($item_referencia->id, 2, 2);
                    $carpeta3 = substr($item_referencia->id, 4, 2);
                    $carpeta4 = $item_referencia->id;

                    //Gestión de errores
                        ini_set("display_errors", 1);
                        error_reporting(E_ALL & ~E_NOTICE);

                    //Apartados
                        $ruta = "../adj/" . $carpeta1 . "/" . $carpeta2 . "/" . $carpeta3 . "/" . $carpeta4 . "/";
                        
                    //Creamos la estructura de carpetas
                        $mode = 0777;
                        $recursive = true;  //Esto permite crear una estructura anidada

                        if(!file_exists($ruta)){

                            if (!@mkdir($ruta, $mode, $recursive)){ 
                                die('Fallo al crear la carpeta...');
                            };

                        }

                    //Devolvemos el valor de la ruta
                        return $ruta;
                    
                }

        //endregion

        //region READ

            public static function cargarAdjuntos($item_referencia){

                //Declaramos el query
                    $query = "SELECT * FROM 00_adjuntos WHERE item_referencia='${item_referencia}'";
                    $result = static::consultarSQL($query);

                //array_shift devuelve el primer elemento de un array
                    return $result;
                    
            }

            public static function cargarAdjuntosAutorizados($item_referencia){

                //Declaramos el query
                    $query = "SELECT * FROM 00_adjuntos WHERE item_referencia='${item_referencia}' AND auth=0";
                    $result = static::consultarSQL($query);

                //array_shift devuelve el primer elemento de un array
                    return $result;
                    
            }

            public static function obtenerNombre($id){

                //Declaramos el query
                $query = "SELECT nombreAdjunto FROM 00_adjuntos WHERE item_referencia='${item_referencia}' LIMIT 1";
                $result = static::consultarSQL($query);

            //array_shift devuelve el primer elemento de un array
                return $result;

            }

        //endregion

        //region DELETE
        
            public function EliminarAdjuntosPorItem($item_referencia){          

                //Eliminamos la carpeta
                    $query = "SELECT * FROM 00_adjuntos WHERE item_referencia='${item_referencia}'";
                    $result = static::consultarSQL($query);

                    if($result){

                        $dir = $result[0]->rutaAdjunto;
                        $element = '/' . substr(strrchr($result[0]->rutaAdjunto, "/"), 1);
                        $delete = str_replace($element, '', $dir);

                        //La siguiente función la he cogido de internet
                        //Lo que hace es eliminar cada archivo, para luego proceder a elimianr la carpeta
                        //la funcion rmdir no permite eliminar la carpeta si tiene archivos dentro

                            if(!$dh = @opendir($delete)) return;

                            while (false !== ($current = readdir($dh))) {
                
                                if($current != '.' && $current != '..') {
                                    if (!@unlink($delete.'/'.$current)) 
                                        deleteDirectory($delete.'/'.$current);
                                }    
                
                            }
                
                            closedir($dh);
                
                            @rmdir($delete);

                    }
                    
                    

                //Declaramos el query
                    $query = " DELETE FROM 00_adjuntos WHERE item_referencia='${item_referencia}'";

                //usamos static por que $db es estático
                    $resultado = static::$db->query($query);

                //array_shift devuelve el primer elemento de un array
                    return $resultado;
                            
            }

        //endregion
            
    }

?>