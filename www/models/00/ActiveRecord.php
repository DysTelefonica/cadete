<?php

    namespace ModelGeneral;

    //Esta va a ser una clase maestra, con todos los métodos comunes del CRUD
    class ActiveRecord{

        //region BASE DE DATOS

            // Atributos
                protected static $db;
                protected static $tabla = '';
                protected static $tabla_controlcambios = '';
                protected static $columnasDB = [];   
            
            // Método Conexión a la bd
                public static function setDB($database) {
                    static ::$db = $database;      //Los atributos estáticos requieren que tengan el símbolo de $
                }
        
        //endregion

        //region ERRORES

            // Atrbutos
                protected static $errores = [];

            // Método para definir el array de errores
                public static function getErrores() {

                    return self::$errores;

                }

        //endregion


        //region MÉTODOS

            //Crear un array de objetos con la consulta que hayamos hecho
            public static function consultarSQL($query) {

                //Consultamos la base de datos
                    $resultado = static::$db->query($query);
                    
                //Iteramos los resultados
                    $array = [];

                    While($registro = $resultado->fetch_assoc()) {

                        $array[] = static::crearObjeto($registro);

                    }

                //Liberamos la memoria
                    $resultado->free();

                //Devolvemos los resultados
                    return $array;

            }

            protected static function crearObjeto($registro) {
                
                //Crea nuevos objetos en memoria de la clase actual
                    $objeto = new static;

                    //registro asociativo
                        foreach($registro as $key => $value) {

                            //Si existe una propiedad con el titulo, le asigna el valor
                                if(property_exists( $objeto, $key)) {
                                    $objeto->$key = $value;

                                }
                        }

                    return $objeto;

            }

            protected static function crearObjetoModeloPredefinido($modelo, $registro) {
                
                //Crea nuevos objetos en memoria de la clase actual
                    $objeto = new $modelo;

                    //registro asociativo
                        foreach($registro as $key => $value) {

                            //Si existe una propiedad con el titulo, le asigna el valor
                                if(property_exists( $objeto, $key)) {
                                    $objeto->$key = $value;

                                }
                        }

                    return $objeto;

            }

        //endregion

        //region CREATE

            //Definimos el método de crear
                public function create() {

                    //Sanitizamos los datos, llamando al método
                        $atributos = $this->sanitizarAtributos();       

                    //Declaramos el query
                        $query = " INSERT INTO " . static::$tabla . " ( ";
                        $query .= join(', ', array_keys($atributos)); //Creamos un string con las keys del array atributos
                        $query .= " ) VALUES ('";
                        $query .= join("', '", array_values($atributos)); //Creamos un string con las valores del array atributos
                        $query .= "') ";

                    //usamos self por que $db es estático
                        $resultado = static::$db->query($query);

                }
        
            //Agregamos un método para identificar y unir los atributos de la DB
                public function atributos() {

                    $atributos = [];
                    foreach(static::$columnasDB as $columna) {

                        $atributos[$columna] = $this->$columna;

                    }

                    return $atributos;

                }

            //Definimos el método para sanitizar los datos
                public function sanitizarAtributos() {

                    $atributos = $this->atributos();

                    $sanitizado = [];

                    //recorremos el arreglo de atributos
                        foreach($atributos as $key => $value) {

                            $sanitizado[$key] = static::$db->escape_string($value);
                            
                        }

                        return $sanitizado;

                }          


    #endregion

        //region READ 
            
            //Método par buscar todos los registros
                public static function readAll() {

                    //Declaramos el query
                        $query = "SELECT * FROM " . static::$tabla; //Static se hereda

                    //Ejecutamos la consulta
                        $result = static::consultarSQL($query);
                    
                    //Devolvemos el resultado
                        return $result;

                }

                public static function readAllAndValidateId() {

                    //Declaramos el query
                        $query = 

                            "SELECT 
                                " . static::$tabla . ".*," .
                                " 00_estadoid.* " .        

                            " FROM " . static::$tabla .
                            " JOIN 00_estadoid" .
                            " ON " . static::$tabla . ".id = 00_estadoid.id" .
                            " WHERE 00_estadoid.state=1"; //Static se hereda

                    //Ejecutamos la consulta
                        $result = static::consultarSQL($query);

                    //Devolvemos el resultado
                        return $result;

                }

                public function read__searchAjax(){
                
                    $q =
                        " SELECT    
                                    id,
                                    codigo_interno,
                                    denominador,
                                    comentarios" .
    
                        " FROM " . static::$tabla;
                    
                    $r = static::consultarSQL($q);
                    
                    $r = Codigo::obtenerDatosElementoSistema($r);
    
                    return $r;
    
                }

            //Busca un registro por su id
                public static function find($id) {

                    //Declaramos el query
                        $query = "SELECT * FROM " . static::$tabla . " WHERE id='${id}'"; //Static se hereda
                        $result = static::consultarSQL($query);

                    //array_shift devuelve el primer elemento de un array
                        return array_shift($result);

                }

                public static function findAndValidateId($id) {

                    //Declaramos el query
                        $query = 

                            "SELECT * " .
                            " FROM " . static::$tabla .
                            " JOIN 00_id_estado" .
                            " ON " . static::$tabla . ".id = 00_id_estado.id" .
                            " WHERE " . static::$tabla . ".id='${id}'" .
                            " AND 00_id_estado.id=1 "; //Static se hereda

                        $result = static::consultarSQL($query);

                    //array_shift devuelve el primer elemento de un array
                        return array_shift($result);

                }

            //Busca un registro por su código
                public static function findByCodigo($codigo) {

                    //Declaramos el query
                        $query = "SELECT * FROM " . static::$tabla . " WHERE codigo_interno='${codigo}' LIMIT 1"; //Static se hereda
                        
                        $result = static::consultarSQL($query);

                    //array_shift devuelve el primer elemento de un array
                        return array_shift($result);

                }

            //Busca un registro por su código y edición
                public static function findByCodigoAndEdicion($codigo, $edicion) {

                    //Declaramos el query
                        $query = "SELECT * FROM " . static::$tabla . " WHERE codigo='${codigo}' AND edicion=${edicion}"; //Static se hereda
                        
                        $result = static::consultarSQL($query);

                    //array_shift devuelve el primer elemento de un array
                        return array_shift($result);

                }

                public static function findRelacion($tabla, $id) {

                    //Declaramos el query
                        $query = "SELECT * FROM " . $tabla . " WHERE id='${id}'"; //Static se hereda
                        
                        $result = static::consultarSQL($query);

                    //array_shift devuelve el primer elemento de un array
                        return array_shift($result);

                }

        //endregion  

        //region UPDATE

            public function update() {

                //Sanitizamos los datos, llamando al método
                    $atributos = $this->sanitizarAtributos();                    

                    $valores = [];
                    foreach ($atributos as $key => $value) {
                        $valores[] = "{$key} ='{$value}'";
                    }

                //Declaramos el query
                    $query = " UPDATE " . static::$tabla . " SET ";
                    $query .= join(', ', $valores ); //Creamos un string con las keys del array atributos
                    $query .= " WHERE id= '" . static::$db->escape_string($this->id) . "' ";
                    $query .= " LIMIT 1 ";
                    
                //usamos static por que $db es estático
                    $resultado = static::$db->query($query);

            }

            public function sincronizar( $args = [] ) {

                foreach ($args as $key => $value) {

                    if(property_exists($this, $key) && !is_null($value)){

                        //Actualizamos el dato
                            $this->$key = $value;

                    }
                }
            }

        //endregion

        //region DELETE

            public function delete() {
                
                //Declaramos el query
                    $query = " DELETE FROM " . static::$tabla . "  ";
                    $query .= " WHERE id= '" . static::$db->escape_string($this->id) . "' ";
                    $query .= " LIMIT 1 ";

                //usamos static por que $db es estático
                    $resultado = static::$db->query($query);

            }

            public function deleteAll() {
                
                //Declaramos el query
                    $query = " DELETE FROM " . static::$tabla . "  ";
                    $query .= " WHERE id= '" . static::$db->escape_string($this->id) . "' ";

                //usamos static por que $db es estático
                    $resultado = static::$db->query($query);

            }

        //endregion

    }