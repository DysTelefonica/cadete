<?php

    namespace ModelGeneral;

    //Definimos la clase
    class Bitacora extends ActiveRecord{

        //region PROPIEDADES
            public $id;    
            public $usuario;
            public $fecha;
            public $origen;
            public $categoria;
            public $subcategoria;
            public $bitacora;
            public $referencia;
            public $estado;

        //endregion

        //region BASE DE DATOS

            protected static $db;
            protected static $tabla = '00_bitacora';
            protected static $columnasDB = ['id', 'usuario', 'fecha', 'origen', 'categoria', 'subcategoria', 'bitacora', 'referencia', 'estado'];    

        //endregion

        //region CONSTRUCTOR

            //Definimos el constructor y las propiedades del mismo
                public function __construct($args = []){

                    $this->id = $args['id'] ?? '';
                    $this->usuario = $args['usuario'] ?? '';
                    $this->fecha =  $args['fecha'] ?? '';
                    $this->origen =  $args['origen'] ?? '';
                    $this->categoria =  $args['categoria'] ?? '';
                    $this->subcategoria =  $args['subcategoria'] ?? '';
                    $this->bitacora =  $args['bitacora'] ?? '';
                    $this->referencia =  $args['referencia'] ?? '';
                    $this->estado =  $args['estado'] ?? '';

                }
        //endregion
        
        //region VALIDACIÓN

            //Definimos un método para la validación de datos
                public function validar(){

                   

                }

        //endregion
        

        //region OTROS MÉTODOS

         //Definimos el método para calcular códigos
            public function calcularIdentificador(){

                //Declaramos el query
                    $query = "SELECT codigo FROM " . static::$tabla . " ORDER BY codigo ASC"; //Static se hereda
                    $result = static::consultarSQL($query);

                //Creamos una variable con el último elemento del array
                    $ultimoCodigo = end($result);

                //Extraemos el campo que queremos
                    $ultimoCodigo = $ultimoCodigo->codigo;
                
                //Separamos el código en 2, el string y el int
                    $stringCodigo = preg_replace('/[0-9]/', '', $ultimoCodigo);
                    $valorCodigo = (int) filter_var($ultimoCodigo, FILTER_SANITIZE_NUMBER_INT);
                    
                //El código sale negativo por el guión del código. Así que sanitizamos el resultado
                    $valorCodigo = ($valorCodigo - 2*$valorCodigo) + 1;

                //Ahora lo formateamos para que tenga el formato "000"
                    $longitud = 3;
                    $valorFormateado = substr(str_repeat(0, $longitud).$valorCodigo, -$longitud);

                //Ponemos el cálculo final
                    $codigo = strval($stringCodigo) . strval($valorFormateado);

                    return $codigo;

            }

            public function cargarBitacora(){

                //Declaramos el query
                    $query = 
                    " SELECT 
                        partesinteresadas.id, 
                        partesinteresadas.codigo, 
                        partesinteresadas.descripcion, 
                        partesinteresadas.tipo, 
                        tipopartesinteresadas.tipo " .

                    " FROM " . static::$tabla .
                    " WHERE tipo=1 ";

                    $result = static::consultarSQL($query);

                    return $result;
            }

            public function cargarCategorias(){

                //Declaramos el query
                    $query = 
                    " SELECT 
                        id,
                        categoría " .

                    " FROM " . static::$tabla . 
                    "  ";

                    $result = static::consultarSQL($query);

                    return $result;
            }

            public function cargarSubcategorias($categoria){

                //Declaramos el query
                    $query = 
                    " SELECT 
                        id,
                        subcategoría " .

                    " FROM " . static::$tabla . 
                    " WHERE categoría='${categoria}'";

                    $result = static::consultarSQL($query);

                    return $result;
            }

            public static function create__BitacoraAutomatica($bitacora, $origen, $categoria, $subcategoria, $referencia) {           
                    
                //Definimos que ocurre con el método POST
                if($_SERVER['REQUEST_METHOD'] === 'POST') {                        
    
                    //Creamos el registro en la BBDD
                        $nuevaBitacora = new Bitacora();                      
    
                    //Le asignamos los valores
                        $nuevaBitacora->id = Codigo::generarId("Bitácora"); 
                        $nuevaBitacora->usuario = Personal::findByEmail($_SESSION['usuario'])->id;
                        $nuevaBitacora->bitacora = $bitacora;
                        $nuevaBitacora->fecha = obtenerFecha();
                        $nuevaBitacora->origen = $origen;
                        $nuevaBitacora->categoria = $categoria;
                        $nuevaBitacora->subcategoria = $subcategoria;
                        $nuevaBitacora->referencia = $referencia;
                        $nuevaBitacora->estado = 1;

                        $nuevaBitacora->create();         
    
                }
    
            }

        //endregion
    }

?>