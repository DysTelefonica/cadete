<?php

    namespace ModelGeneral;

    class Login extends ActiveRecord {

        //region BASE DE DATOS
            protected static $tabla = '00_usuarios';
            protected static $columnasDB = ['id', 'user', 'password']; 

        //endregion
        
        //region PROPIEDADES

            public $id;
            public $user;
            public $password;

        //endregion

        //region CONSTRUCTOR

            public function __construct($args = []) {
                
                $this->id = $args['id'] ?? '';
                $this->user = $args['email'] ?? '';
                $this->password =  $args['password'] ?? '';

            }

        //endregion

        //region VALIDAR

            public function validar(){

                if(!$this->user) {
                    self::$errores[] = "El usuario es obligatorio. Recuerda que es un email.";
                }

                if(!$this->password) {
                    self::$errores[] = "La contraseña es obligatoria.";
                }

                return self::$errores;

            }

            public static function findByUser($user) {

                //Declaramos el query
                $query = "SELECT * FROM " . static::$tabla . " WHERE user='${user}'" . " LIMIT 1" ; //Static se hereda 
                $result = static::consultarSQL($query);
    
                $result = array_shift ($result);
                
                //array_shift devuelve el primer elemento de un array
                return $result;
    
            }

            public function existeUsuario() {

                //Revisamos si un usuario existe o no
                    $query = "SELECT * FROM " . static::$tabla . " WHERE user= '" . $this->user . "' LIMIT 1";

                    $result = self::$db->query($query); //si tras debuguearlo num_rows > 0 eso quiere decir que exite

                    if(!$result->num_rows) {
                        self::$errores[] = "El usuario no existe.";
                        return;
                    }

                    return $result;
                    
            }

            public function comprobarPassword($result) {

                //Revisamos si el password es correcto
                    $usuario = $result->fetch_object();

                //Verificamos si el password es correcto o no
                    $autenticado = password_verify($this->password, $usuario->password);

                if(!$autenticado) {

                    self::$errores[] = "El usuario o la contraseña son incorrectos.";

                }

                return $autenticado;

            }

            public function compararPassword($usuario, $pass_verificar){

                //Verificamos si el password es correcto o no
                    $a = password_verify($pass_verificar, $usuario->password ?? 'default');

                    debuguear($a);

                if(!$a) {

                    self::$errores[] = "El usuario o la contraseña son incorrectos.";

                }

                return $a;

            }

        //endregion

        //region AUTENTICAR

            public function autenticar() {

                //Si la sesión no está abierta, la inicia
                    if(!isset($_SESSION)){
                        session_start();
                    }

                //llenamos el arreglo de la sesión
                    $_SESSION['id_user'] = $this->id;
                    $_SESSION['usuario'] = $this->user;
                    $_SESSION['login'] = true;

            }

        //endregion
    }


