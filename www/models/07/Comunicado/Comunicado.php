<?php

    namespace ModelComunicado;
    use \ModelGeneral\ActiveRecord as ActiveRecord;

    use ModelTipoComunicado;

    //Definimos la clase
    class Comunicado extends ActiveRecord{

        //region PROPIEDADES
            public $id;
            public $codigo_interno;
            public $denominador;
            public $tipo;
            public $fecha;
            public $autor;
            public $copete;
            public $comentarios;

        //endregion

        //region BASE DE DATOS

            protected static $db;
            protected static $tabla = '07_comunicados';
            protected static $columnasDB = ['id', 'codigo_interno', 'denominador', 'tipo', 'fecha', 'autor', 'copete', 'comentarios'];    

        //endregion

        //region CONSTRUCTOR

            //Definimos el constructor y las propiedades del mismo
                public function __construct($args = []){

                    $this->id = $args['id'] ?? '';
                    $this->codigo_interno = $args['codigo_interno'] ?? '';
                    $this->denominador =  $args['denominador'] ?? '';
                    $this->tipo =  $args['tipo'] ?? '';
                    $this->fecha =  $args['fecha'] ?? '';
                    $this->autor =  $args['autor'] ?? '';
                    $this->copete =  $args['copete'] ?? '';
                    $this->comentarios =  $args['comentarios'] ?? '';
                }
        //endregion
        
        //region VALIDACIÓN

            //Definimos un método para la validación de datos
                public function validar(){

                }

        //endregion

        //region READ

            public static function find_estado($id){

                //Declaramos el query
                    $query = 
                        " SELECT 
                            07_comunicados.*,
                            07_comunicados_tipo.tipo " .

                        " FROM " . static::$tabla .

                        " INNER JOIN 07_comunicados_tipo" .
                            " ON 07_comunicados.tipo = 07_comunicados_tipo.id" .

                        " WHERE 07_comunicados.id = '${id}'"; ;

                    $result = static::consultarSQL($query);

                    return array_shift($result);

            }

            public static function readAllDESC(){

                $query = 
                    " SELECT * " .
                    " FROM " . static::$tabla .
                    " ORDER BY fecha DESC";

                $result = static::consultarSQL($query);

                return $result;

            }

            public static function CargarComunicadosPortada(){

                $query = 
                    " SELECT 
                        07_comunicados.*,
                        07_comunicados_gestor.prioridad,
                        07_comunicados_tipo.tipo " .

                    " FROM " . static::$tabla .

                    " INNER JOIN 07_comunicados_gestor" .
                        " ON 07_comunicados.id = 07_comunicados_gestor.id" .

                    " INNER JOIN 07_comunicados_tipo" .
                        " ON 07_comunicados.tipo = 07_comunicados_tipo.id" .

                    " WHERE 07_comunicados_gestor.prioridad <> 0" . 

                    " ORDER BY 07_comunicados_gestor.prioridad";

                $result = static::consultarSQL($query);

                $tipos = TipoComunicado::readAll();

                foreach ($result as $r ) {
                    $r->ruta = '../../apoyo/comunicados/comunicado?id=' . $r->id;
                    $r->portada = Comunicado::asignarPortada($r);
                    $r->indicador = TipoComunicado::asignarIndicador($r->tipo, $tipos);
                }

                return $result;

            }

            public static function CargarComunicadosPrioridad(){

                $query = 
                    " SELECT 
                        07_comunicados.*,
                        07_comunicados_gestor.* " .

                    " FROM " . static::$tabla .

                    " INNER JOIN 07_comunicados_gestor" .
                        " ON 07_comunicados_gestor.id = 07_comunicados.id" .

                    " WHERE 07_comunicados_gestor.prioridad <> 0" . 

                    " ORDER BY 07_comunicados_gestor.prioridad";

                $result = static::consultarSQL($query);

                return $result;

            }

            public static function CargarRelacionados(){

                $query = 
                " SELECT *" .

                " FROM " . static::$tabla .

                " ORDER BY RAND()";

                $result = static::consultarSQL($query);

                foreach ($result as $r ) {
                    $r->ruta = '../../apoyo/comunicados/comunicado?id=' . $r->id;
                    $r->portada = Comunicado::asignarPortada($r);
                }

                return $result;

            }

        //endregion

        //region OTROS

            public function construirBreadcrumb($id, $codigo_interno){

                $breadcrumb = '

                    <nav class="breadcrumb">

                        <ol class="breadcrumb__list">
            
                            <li class="breadcrumb__item"> <svg class="ico ico__puntos b"> </svg> </li>
                            <li class="breadcrumb__item"> <a href="/"> Inicio </a> </li>
                            <li class="breadcrumb__item"> <span> / </span> </li>    
                            <li class="breadcrumb__item"> <a href="/apoyo"> Apoyo </a> </li>        
                            <li class="breadcrumb__item"> <span> / </span> </li> 
                            <li class="breadcrumb__item"> <a href="../../apoyo/comunicados"> Comunicados </a> </li>
                            <li class="breadcrumb__item"> <span> / </span> </li>               
                            <li class="breadcrumb__item actual"> <a href="../../apoyo/comunicados/comunicado?id=';
                        
                $breadcrumb = $breadcrumb . $id . '"> Comunicado ';
                $breadcrumb = $breadcrumb . $codigo_interno;
                $breadcrumb = $breadcrumb . '</a> </li> </ol> </nav>';

                return $breadcrumb;

            }

            public function asignarPortada($c){

                $p = '/build/img/com/' . $c->codigo_interno . '/portada.jpg';

                if(!file_exists($_SERVER['DOCUMENT_ROOT'] . $p)){

                    switch ($c->tipo) {

                        case 1:
                            $p = '/build/img/com/default/portada.jpg';
                            break;

                        case 2:
                            $p = '/build/img/com/default/2.jpg';
                            break;

                        case 3:
                            $p = '/build/img/com/default/3.jpg';
                            break;

                        case 4:
                            $p = '/build/img/com/default/4.jpg';
                            break;

                        case 5:
                            $p = '/build/img/com/default/5.jpg';
                            break;
                        
                        default:
                            $p = '/build/img/com/default/portada.jpg';
                            break;
                    }

                    
                }

                return $p;
            }

            public function asignarRuta($c){

                $y = date('Y', strtotime($c->fecha));
                $r = $y . "/" . $c->codigo_interno;

                return $r;

            }    

            public function reestablecerGestor(){

                $query =  " DELETE FROM 07_comunicados_gestor";
                static::$db->query($query);

                $q = 
                " SELECT 07_comunicados.id " .
                " FROM " . static::$tabla . 
                " ORDER BY 07_comunicados.fecha ASC";

                $result = static::consultarSQL($q);

                foreach ($result as $r) {

                    $r = $r->id;

                    $qu = "INSERT INTO 07_comunicados_gestor (id) VALUES ('${r}') ";
                    $i = static::$db->query($qu);
                }

            }

            public function asignarIndicador($estado, $estados){

                foreach ($estados as $key => $e) {
    
                    if ($e->estado === $estado) {
                        return $e->id;
                    }
    
                }
    
            }

            public function crearDirectorio($c){

                //Hay que crear 2 rutas, una para las imagenes (en public) y otra para los comunicados (en com)
                
                //Carpeta de imagenes

                    //Gestión de errores
                        ini_set("display_errors", 1);
                        error_reporting(E_ALL & ~E_NOTICE);

                    //ruta
                        $rutaPublic = $_SERVER['DOCUMENT_ROOT'] . "/build/img/com/" . date("Y", strtotime($c->fecha)) . "/" . $c->codigo_interno . "/";

                    //Creamos la estructura de carpetas
                        $mode = 0777;
                        $recursive = true;  //Esto permite crear una estructura anidada

                        if(!file_exists($rutaPublic)){

                            if (!@mkdir($rutaPublic, $mode, $recursive)){ 
                                die('Fallo al crear la carpeta...');
                            };

                        }

                        echo substr(sprintf('%o', fileperms($rutaPublic)), -4);

                //Carpeta de imagenes

                    //Gestión de errores
                        ini_set("display_errors", 1);
                        error_reporting(E_ALL & ~E_NOTICE);

                        //ruta
                            $rutaCom = $_SERVER['DOCUMENT_ROOT'] . "/../com/" . date("Y", strtotime($c->fecha)) . "/" . $c->codigo_interno . "/";

                        //Creamos la estructura de carpetas
                            $mode = 0777;
                            $recursive = true;  //Esto permite crear una estructura anidada

                            if(!file_exists($rutaCom)){

                                if (!@mkdir($rutaCom, $mode, $recursive)){ 
                                    die('Fallo al crear la carpeta...');
                                };

                            }

                            echo substr(sprintf('%o', fileperms($rutaCom)), -4);

            }

        //endregion

       
    }

?>