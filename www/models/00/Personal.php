<?php

    namespace ModelGeneral;

    //Definimos la clase
    class Personal extends ActiveRecord{

        //region PROPIEDADES
            public $id;
            public $user;
            public $email;
            public $nombre;
            public $primer_apellido;
            public $segundo_apellido;
            public $matricula;
            public $telefono_fijo;
            public $telefono_movil;
            public $empresa;
            public $rol;
            public $cargo;
            public $estado;

        //endregion

        //region BASE DE DATOS

            protected static $db;
            protected static $tabla = '00_personal';
            protected static $columnasDB = ['id', 'user', 'email', 'nombre', 'primer_apellido', 'segundo_apellido', 'matricula', 
            'telefono_fijo', 'telefono_movil', 'empresa', 'rol', 'cargo', 'estado'];    

        //endregion

        //region CONSTRUCTOR

            //Definimos el constructor y las propiedades del mismo
                public function __construct($args = []){

                    $this->id = $args['id'] ?? '';
                    $this->user = $args['user'] ?? '';
                    $this->email = $args['email'] ?? '';
                    $this->nombre =  $args['nombre'] ?? '';
                    $this->primer_apellido =  $args['primer_apellido'] ?? '';
                    $this->segundo_apellido =  $args['segundo_apellido'] ?? '';
                    $this->matricula =  $args['matricula'] ?? '';
                    $this->telefono_fijo =  $args['telefono_fijo'] ?? '';
                    $this->telefono_movil =  $args['telefono_movil'] ?? '';
                    $this->empresa =  $args['empresa'] ?? '';
                    $this->rol =  $args['rol'] ?? '';
                    $this->cargo =  $args['cargo'] ?? '';
                    $this->estado =  $args['estado'] ?? '';
                }

        //endregion

        public static function findByEmail($email) {

            //Declaramos el query
            $query = "SELECT * FROM " . static::$tabla . " WHERE email='${email}'" . " LIMIT 1" ; //Static se hereda 
            $result = static::consultarSQL($query);

            $result = array_shift ($result);
            
            //Ahora asignamos avatar, en caso de que lo tenga
            $result->avatar = Personal::asignarAvatar($result->id);
            
            //array_shift devuelve el primer elemento de un array
            return $result;

        }

        public static function find_WithAvatar($id) {

            //Declaramos el query
            $query = "SELECT * FROM " . static::$tabla . " WHERE id='${id}'" . " LIMIT 1" ; //Static se hereda 
            $result = static::consultarSQL($query);

            //array_shift devuelve el primer elemento de un array
            $r = array_shift($result);

            //Ahora asignamos avatar, en caso de que lo tenga
            if($r){
                $r->avatar = Personal::asignarAvatar($id);
            }

            //Devolvemos el array
            return $r;

        }

        public static function readAll_search(){

            $query = 
            " SELECT    id,
                        email,
                        matricula,
                        nombre,
                        primer_apellido,
                        segundo_apellido,
                        rol" .

            " FROM " . static::$tabla . 
            
            " ORDER BY nombre ASC ";
            
            $result = static::consultarSQL($query);

            foreach ($result as $r) {
                
                $r->denominador = $r->nombre . ' ' . $r->primer_apellido . ' ' . $r->segundo_apellido;

                if($r->matricula != ''){
                    $r->codigo_interno = $r->matricula;
                }else{
                    $r->codigo_interno = 'No disponible';
                }

                //Asignamos avatar
                $r->avatar = Personal::asignarAvatar($r->id);
                
                $array = Codigo::analizarId($r->id);            

                $r->modelo =  $array->namespace . '\\' . $array->modelo;
                $r->elementoSistema = $array->elementoSistema;
                $r->rutaIndex = $array->rutaIndex;
                $r->ico = $array->ico;   
            }

            return $result;

        }

        public static function readAll_activos(){

            $query = 
            " SELECT    id,
                        email,
                        matricula,
                        nombre,
                        primer_apellido,
                        segundo_apellido,
                        rol" .

            " FROM " . static::$tabla . 

            " WHERE estado = 1" .
            
            " ORDER BY nombre ASC ";
            
            $result = static::consultarSQL($query);

            foreach ($result as $r) {
                
                $r->denominador = $r->nombre . ' ' . $r->primer_apellido . ' ' . $r->segundo_apellido;

                if($r->matricula != ''){
                    $r->codigo_interno = $r->matricula;
                }else{
                    $r->codigo_interno = 'No disponible';
                }

                //Asignamos avatar
                $r->avatar = Personal::asignarAvatar($r->id);
                
                $array = Codigo::analizarId($r->id);            

                $r->modelo =  $array->namespace . '\\' . $array->modelo;
                $r->elementoSistema = $array->elementoSistema;
                $r->rutaIndex = $array->rutaIndex;
                $r->ico = $array->ico;   
            }

            return $result;

        }

        public static function crearUsuario($email, $user){

            //Declaramos el query
            $query =    " UPDATE " . static::$tabla;
            $query .=   " SET user= '" . $user . "' ";
            $query .=   " WHERE email= '" . $email . "' ";
            $query .=   " LIMIT 1 ";

            $result = static::$db->query($query);

        }

        
        public function validar(){

            //Definimos un método para la validación de datos

            if(!$this->email){
                $email[] = "El campo Email es obligatorio";
            }

        }

        public function permisoProyectosMejora(){

            //Declaramos el query
                $query = 
                " SELECT 
                    00_personal.*, 
                    00_permisos.permitirPlanesAccion " .

                " FROM " . static::$tabla .

                " LEFT JOIN 00_permisos" .
                    " ON 00_personal.id = 00_permisos.id" .

                " WHERE 00_permisos.permitirPlanesAccion = 1";

            $result = static::consultarSQL($query);
            
            return $result;

        }

        public static function asignarAvatar($id){

            if(file_exists('build/img/users/' . $id . '.jpg')):       
                $avatar = '/build/img/users/' . $id . '.jpg';
            else:
                $avatar ="/build/img/users/sinAvatar.png";
            endif;

            return $avatar;

        }

    }

?>