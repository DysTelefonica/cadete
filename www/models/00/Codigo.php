<?php

    namespace ModelGeneral;

    //Definimos la clase
    class Codigo extends ActiveRecord{

        //region PROPIEDADES
            public $apartado;
            public $elementoSistema;
            public $genero;
            public $ap1;
            public $ap2;
            public $ap3;
            public $modelo;
            public $bbdd;
            public $rutaIndex;
            public $ico;

        //endregion

        //region BASE DE DATOS
            protected static $db;
            protected static $tabla = '00_codigos';
            protected static $columnasDB = ['apartado', 'elementoSistema', 'genero', 'ap1', 'ap2', 'ap3', 'namespace', 'modelo', 'bbdd', 'rutaIndex', 'ico'];    

        //endregion

        //region CONSTRUCTOR

            //Definimos el constructor y las propiedades del mismo
                public function __construct($args = []){

                    $this->apartado = $args['apartado'] ?? '';
                    $this->elementoSistema = $args['elementoSistema'] ?? '';
                    $this->genero = $args['genero'] ?? '';
                    $this->ap1 = $args['ap1'] ?? '';
                    $this->ap2 = $args['ap2'] ?? '';
                    $this->ap3 = $args['ap3'] ?? '';
                    $this->namespace = $args['namespace'] ?? '';
                    $this->modelo = $args['modelo'] ?? '';
                    $this->bbdd = $args['bbdd'] ?? '';
                    $this->rutaIndex = $args['rutaIndex'] ?? '';
                    $this->ico = $args['ico'] ?? '';
                }
                
        //endregion       

        //region VALIDACIÓN

            //Definimos un método para la validación de datos
                public function validar(){

                    if(!$this->apartado){
                        $errores[] = "El campo apartado es obligatorio";
                    }

                }

        //endregion

        //region READ

            public function cargarCategoria(){

              //Declaramos el query
                $query = 
                " SELECT 
                        apartado " .

                " FROM " . static::$tabla .
                " WHERE apartado <> '00. Sistema'" .
                " GROUP BY apartado";

                $result = static::consultarSQL($query);

                return $result;

            }

            public function cargarSubcategorias($apartado){

                //Declaramos el query
                  $query = 
                  " SELECT 
                      elementoSistema " .
  
                  " FROM " . static::$tabla .
                  " WHERE apartado='${apartado}'";
  
                  $result = static::consultarSQL($query);
  
                  return $result;
  
            }

            public function cargarElementos($elementoSistema){

                //Declaramos el query
                    $query = 
                    " SELECT * " .
                    " FROM " . "00_codigos" .
                    " WHERE elementoSistema='${elementoSistema}'";

                    $elemento = static::consultarSQL($query);     

                //Modelo -> buscar todos los códigos
                    $modelo = $elemento[0]->namespace . '\\' . $elemento[0]->modelo;
                    $codigos = new $modelo;

                    switch ($elemento[0]->elementoSistema) {

                        case 'Parte Interesada Interna':
                            $codigos=$modelo::cargarPII();
                            break;

                        case 'Parte Interesada Externa':
                            $codigos=$modelo::cargarPIE();
                            break;

                        case 'Debilidad [Análisis DAFO]':
                        case 'Amenaza [Análisis DAFO]':
                        case 'Fortaleza [Análisis DAFO]':
                        case 'Oportunidad [Análisis DAFO]':
                            $codigos=$modelo::cargarAnalisisDAFO($elemento[0]->elementoSistema);
                            break;

                        case 'Plan de acción singular':
                            $codigos=$modelo::cargarPAS();
                            break;

                        case 'Plan de acción repetitivo':
                            $codigos=$modelo::cargarPAR();
                            break;
                        
                        default:
                            $codigos=$modelo::readAll();        //Esto genera un problema, y es que no permite filtrar más
                            console_log($codigos);
                            break;
                    }  


                return $codigos;
            }
    
        //endregion

        //region IDENTIFICADOR

            //Método para analizar el identificador
                public function analizarId($id){

                    //Primero fragmentamos el código en los diferentes grupos que lo forman
                        $ap1= substr($id, 0, 2); //Apartado
                        $ap2= substr($id, 2, 2); //Subapartado
                        $ap3= substr($id, 4, 2); //Divisor

                        $query = 
                        " SELECT elementoSistema, namespace, modelo, genero, bbdd, rutaIndex, ico " .
                        " FROM " . static::$tabla .
                        " WHERE ap1 ='${ap1}' AND ap2 ='${ap2}' AND ap3 ='${ap3}'";

                        $result = static::consultarSQL($query);

                        return array_shift($result);

                }

            //Método global para calcular el identifiador
                public function generarId($elementoSistema){

                   //Encontramos los parámetros del elemento del sistema a partir del elementoSistema
                   $query = 
                   " SELECT * " .
                   " FROM " . "00_codigos" .
                   " WHERE elementoSistema='${elementoSistema}'";
                   
                   $result = static::consultarSQL($query);
                        
                    //Colocamos los parámetros que definen a este modelo
                        $ap1=$result[0]->ap1;
                        $ap2=$result[0]->ap2;
                        $ap3=$result[0]->ap3;

                    //Establecemos el valor temporal
                        $now = new \DateTime('now', new \DateTimeZone('Europe/Paris'));
                        $ahora = $now->format("ymd.His.u");
                        
                    //Construimos el id
                        $id = $ap1.$ap2.$ap3.".".$ahora;
                        return $id;
    
                }

            //Método para añadir los elementos básicos, necesarios para la búsqueda AJAX
                public function obtenerDatosElementoSistema($a){               

                    foreach ($a as $r) {

                        $array = Codigo::analizarId($r->id);            

                        $r->modelo =  $array->namespace . '\\' . $array->modelo;
                        $r->elementoSistema = $array->elementoSistema;
                        $r->rutaIndex = $array->rutaIndex;
                        $r->ico = $array->ico;   
                    }

                    return $a;

            }

        //endregion


        
    }

?>