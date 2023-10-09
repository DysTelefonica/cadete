<?php

    //region RUTAS

        require_once 'rutas.php';

    //endregion

    //region TEMPLATES

        //Función para incluir templates
            function incluirTemplate(string $nombre, bool $inicio = false) {
                include TEMPLATES_URL . "/${nombre}.php";
            }
    
    //endregion

    //region CLASES

        //Función para debuguear las clases
            function debuguear($v){

                echo "<pre>";
                var_dump($v);
                echo "</pre>";
                exit;
            }

            function console_log( $data ){
                echo '<script>';
                echo 'console.log('. json_encode( $data ) .')';
                echo '</script>';
            }

            function obtenerFecha(){

                $date = date('Y-m-d');
                return $date;

            }

            function obtenerDatetime(){

                $d = date('Y-m-d H:i:s');
                return strtotime($d);

            }

            function transformarFecha($date){

                //Transforma la fecha de Y-M-D a D-M-Y
                    if($date <> ""){
                        $d = date('d/m/Y', strtotime($date));
                        return $d;
                    }

            }

            function fechaLarga($d){

                setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish');
                $d = utf8_encode(ucfirst(strftime("%A, %d de %B del %Y.", strtotime($d))));

                return $d;
            }

            function fechayHora($d){

                setlocale(LC_TIME,"spanish");
                $d = utf8_encode(ucfirst(strftime("%A, %d de %B del %Y, a las %r.", strtotime($d))));

                return $d;
            }

            function asignarAlarma($date){

                //Esta función compara dos fechas, y genera una alarma dependiendo de la cercanía de ambas fechas

                //Se obtiene la fecha de hoy para poder compararla
                    $date1 = new DateTime(date('Y-m-d'));
                //Se obtiene la fecha a comparar
                    $date2 = new DateTime(date('Y-m-d', strtotime($date)));
            
                //Se obtiene la diferencia entre ambas fechas
                    $diff = $date1->diff($date2);

                    switch ($diff->invert) {

                        case 0:

                            if ($diff->days <= 15) {
                                // Si quedan menos de 15 días, se devuelve 1
                                return 1;
        
                            } elseif ($diff->days <= 30) {
                                // Si quedan entre 15 y 30 días, se devuelve 2
                                return 2;
        
                            } else {
                                // Si quedan más de 30 días, se devuelve 3
                                return 3;
                            }        

                            break;
                        
                        case 1:
                            return 1;
                            break;
                    }

            }

            function obtenerFechayHora(){
                
                date_default_timezone_set('Europe/Madrid');
                $d =  date('Y-m-d H:i:s');

                return $d;
            }

            function array_group_by($arr, $fldName) {

                $groups = array();

                foreach ($arr as $rec) {

                    $r = (array) $rec;

                    $groups[$r[$fldName]] = $r;
                }

                return $groups;
            }

            function object_sorter($clave,$orden=null) {
                return function ($a, $b) use ($clave,$orden) {
                      $result=  ($orden=="DESC") ? strnatcmp($b->$clave, $a->$clave) :  strnatcmp($a->$clave, $b->$clave);
                      return $result;
                };
            }


    //endregion

    //region SANITIZAR
        
        //Escapa el HTML
            function s($html) : string {

                $s = htmlspecialchars($html);
                return $s;

            }

    //endregion

        function validaroRedireccionar(string $url) {

            //Validamos la URL por ID válido

            $id = $_GET['id'];
            $id = filter_Var($id, FILTER_VALIDATE_INT);

            if(!$id) {

                header("Location: ${url}");

            }
            return $id;
        }

        function iniciarSesion(){

            //Iniciamos sesión

                if(!isset($_SESSION)){
                    session_start();
                }

            //Obtenemos los datos del login
                $login = $_SESSION['login'] ?? false;

            return $login;

        }

        function asignarPermisos($login){

            //Por defecto, asignamos el permiso de escritura como false
            $auth = false;         
            
            if($login){

                //Si tiene el rol de calidad, le damos los permisos oportunos
                if($_SESSION['rol'] === 'Calidad' || $_SESSION['rol'] === 'Admin'){

                    $auth = true;

                }

            }   

            return $auth;

        }

    //region PASSWORDS

        function comprobarPass($pass1, $pass2){

            $v = password_verify(pass1, pass2);

            return $v;

        }

        function obtenerIconoDeTipo($tipoAdjunto){
                       
            $icono = '';

            switch ($tipoAdjunto) {

                case 'pdf':
                    $icono = 'ico__pdf';
                    break;

                case 'xlsx':
                case 'xls':
                    $icono = 'ico__xlsx';
                    break;

                case 'png':
                case 'jpg':
                case 'jpeg':
                case 'svg':
                    $icono = 'ico__imagen';
                    break;

                case 'zip':
                case 'rar':
                    $icono = 'ico__zip';
                    break;
                
                default:
                    $icono = 'ico__exportar';
                    break;
            }

            return $icono;

        }

        function transformarBytes($bytes){

            if ($bytes >= 1073741824)
            {
                $bytes = number_format($bytes / 1073741824, 2) . ' GB';
            }
            elseif ($bytes >= 1048576)
            {
                $bytes = number_format($bytes / 1048576, 2) . ' MB';
            }
            elseif ($bytes >= 1024)
            {
                $bytes = number_format($bytes / 1024, 2) . ' KB';
            }
            elseif ($bytes > 1)
            {
                $bytes = $bytes . ' bytes';
            }
            elseif ($bytes == 1)
            {
                $bytes = $bytes . ' byte';
            }
            else
            {
                $bytes = '0 bytes';
            }

            return $bytes;

        }