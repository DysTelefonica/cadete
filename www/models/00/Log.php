<?php

    namespace ModelGeneral;

    //Definimos la clase
    class Log extends ActiveRecord{

        //region PROPIEDADES
            public $id;    
            public $auto;
            public $crud;
            public $model;
            public $property;
            public $data_old;
            public $data_new;
            public $denominador;
            public $id_ref1;
            public $id_ref2;
            public $id_ref3;
            public $category;
            public $subcategory;
            public $bitacora;

            public $date;
            public $user;

        //endregion

        //region BASE DE DATOS

            protected static $db;
            protected static $tabla = '00_log';
            protected static $columnasDB = ['id', 'auto', 'crud', 'model', 'property','data_old','data_new','denominador', 'id_ref1', 'id_ref2','id_ref3','category', 'subcategory','bitacora', 'date', 'user'];    

        //endregion

        //region CONSTRUCTOR

            //Definimos el constructor y las propiedades del mismo
                public function __construct($args = []){

                    $this->id = $args['id'] ?? '';
                    $this->auto =  $args['auto'] ?? '';
                    $this->crud =  $args['crud'] ?? '';
                    $this->model =  $args['model'] ?? '';
                    $this->property =  $args['property'] ?? '';
                    $this->data_old =  $args['data_old'] ?? '';
                    $this->data_new =  $args['data_new'] ?? '';
                    $this->denominador =  $args['denominador'] ?? '';
                    $this->id_ref1 = $args['id_ref1'] ?? '';
                    $this->id_ref2 = $args['id_ref2'] ?? '';
                    $this->id_ref3 = $args['id_ref3'] ?? '';
                    $this->category =  $args['category'] ?? '';
                    $this->subcategory =  $args['subcategory'] ?? '';
                    $this->bitacora = $args['bitacora'] ?? '';
                    $this->date =  $args['date'] ?? '';
                    $this->user = $args['user'] ?? '';
                }
        //endregion
        
        //region VALIDACIÓN

            //Definimos un método para la validación de datos
                public function validar(){}

        //endregion

        //region CREATE
            public static function createLog($obj) {           
                    
                //Obtenemos el texto a usar
                    $array = Codigo::analizarId($obj->id);      
                    $elementoSistema = $array->elementoSistema;
                    $denominador = "Añadido el " . $elementoSistema . ' "' . $obj->codigo_interno . ' - '. $obj->denominador . '".';

                //Definimos que ocurre con el método POST
                    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        
                        //Creamos el registro en la BBDD
                            $c = new Log();

                            $c->id = Codigo::generarId("Cambio");      
                            $c->auto = 1;   
                            $c->crud = 1;   
                            $c->model = $elementoSistema;   
                            $c->property = 'N/A';
                            $c->data_old = 'N/A';
                            $c->data_new = $obj->denominador;
                            $c->denominador = $denominador;
                            $c->id_ref1 = $obj->id;
                            $c->id_ref2 = '';
                            $c->id_ref3 = '';
                            $c->category = 'N/A';
                            $c->subcategory = 'N/A';
                            $c->bitacora = 1;
                            $c->date = obtenerFechayHora();
                            $c->user = Personal::findByEmail($_SESSION['usuario'])->id;

                            switch ($elementoSistema) {
                                case 'Debilidad [Análisis DAFO]':
                                case 'Amenaza [Análisis DAFO]':
                                case 'Fortaleza [Análisis DAFO]':
                                case 'Oportunidad [Análisis DAFO]':
                                case 'Revisión Análisis Contexto':

                                    $c->id_cont = $obj->analisisContexto;
                                    break;
                                
                                default:
                                    $c->id_cont = 'N/A';
                                    break;
                            }

                            $c->create();         
        
                    }
    
            }

            public static function relationLog($obj) {           
                    
                //Obtenemos el texto a usar
                $array = Codigo::analizarId($obj->id);      
                $elementoSistema = $array->elementoSistema;
                $denominador = "Se han relacionado los elementos " . $obj->id_item1 . ' y '. $obj->id_item2 . '".';

                //Definimos que ocurre con el método POST
                if($_SERVER['REQUEST_METHOD'] === 'POST') {
    
                    //Creamos el registro en la BBDD
                    $c = new Log();

                    $c->id = Codigo::generarId("Cambio");      
                    $c->auto = 1;   
                    $c->crud = 1;   
                    $c->model = $elementoSistema;   
                    $c->property = 'N/A';
                    $c->data_old =  'N/A';
                    $c->data_new =  'N/A';
                    $c->denominador = $denominador;
                    $c->id_ref1 = $obj->id;
                    $c->id_ref2 =  $obj->id_item1;
                    $c->id_ref3 =  $obj->id_item2;
                    $c->category = 'N/A';
                    $c->subcategory = 'N/A';
                    $c->bitacora = 1;
                    $c->date = obtenerFechayHora();
                    $c->user = Personal::findByEmail($_SESSION['usuario'])->id;

                    $c->create();         
    
                }
    
            }

            public static function adjuntLog($obj) {     
                    
                //Definimos el elemento del sitema
                $array = new Codigo();
                $array = $array->analizarId($obj->id);         

                //Definimos que ocurre con el método POST
                if($_SERVER['REQUEST_METHOD'] === 'POST') {
    
                    //Creamos el registro en la BBDD
                    $c = new Log();

                    $c->id = $array->generarId("Cambio");      
                    $c->auto = 1;   
                    $c->crud = 1;   
                    $c->model = $array->elementoSistema;   
                    $c->property = 'N/A';
                    $c->data_old = '';
                    $c->data_new = '';
                    $c->denominador = $obj->denominador;
                    $c->id_ref1 = $obj->id;
                    $c->id_ref2 = $obj->item_referencia;
                    $c->id_ref3 = '';
                    $c->category = 'N/A';
                    $c->subcategory = 'N/A';
                    $c->bitacora = 1;
                    $c->date = obtenerFechayHora();
                    $c->user = Personal::findByEmail($_SESSION['usuario'])->id;

                    $c->create();         
    
                }
    
            }

        //endregion

        //region READ
            public static function findByid_Ref($id) {           
  
                //Declaramos el query, buscamos el id_Ref o refencias en data_old y data_new de las relaciones.
                    $q = 
                    " SELECT * " .
                    " FROM " . static::$tabla .
                    " WHERE (id_ref1='${id}')" . 
                    " OR id_ref2='${id}'" . 
                    " OR id_ref3='${id}'" . 
                    " ORDER BY date DESC ";

                //Ejecutamos la búsqueda
                    $result = static::consultarSQL($q);

                //Asignamos el elemento del sistema al que se refiere a cada relación
                    foreach ($result as $r) {

                        //En este caso, el id_ref habrá desaparecido, por lo que debemos apoyarnos en la información que aparezca en data_old e data_new
                            $array = Codigo::analizarId($r->id_ref1);  
                            $r->elementoSistema = $array->elementoSistema;

                            $modelo = $array->namespace . '\\' . $array->modelo;

                            $r->item = new $modelo;
                            $r->item->elementoSistema = $array->elementoSistema;

                        //Ahora atendemos al tipo de elemento al que hace referencia el log
                        switch ($r->item->elementoSistema) {

                            case 'Adjunto':

                                $r->item = Adjuntos::find($r->id_ref1);
                                break;

                            case 'Relación':           

                                if($id <> $r->id_ref2){
                                    $ref = Codigo::analizarId($r->id_ref3);  
                                }else{
                                    $ref = Codigo::analizarId($r->id_ref2);  
                                };
                                
                                $modelo = $ref->namespace . '\\' . $ref->modelo;

                                $r->item->ref = new $modelo;

                                if($id == $r->id_ref2){
                                    $r->item->ref = $modelo::find($r->id_ref2);
                                    $r->item->ref->rutaIndex = $referencia->rutaIndex;

                                }else{
                                    $r->item->ref = $modelo::find($r->id_ref3);
                                    $r->item->ref->rutaIndex = $ref->rutaIndex;
                                };

                                $r->item->ref->elementoSistema = $ref->elementoSistema;
                                break;                               
                            
                            default:
                                $r->item = $modelo::find($r->id_ref1);
                                $r->item->rutaIndex = $array->rutaIndex;
                                break;
                        }

                    }

                //Devolvemos el resultado
                    return $result;

            }

            public static function findByDate($date) {    
  
                //Declaramos el query
                    $query = 
                    " SELECT * " .
                    " FROM " . static::$tabla .
                    " WHERE date > ${date}";                  

                //Ejecutamos la búsqueda
                    $result = static::consultarSQL($query);

                //Devolvemos el resultado
                    return $result;

            }

            public static function findDerivado($obj, $cont) {   

                //Inicializamos el array donde irán almacenados todos los logs derivados
                    $logs = [];                    


  
                //Por cada obj, buscamos todos los logs derivados y los incluimos en el array
                    foreach ($obj as $o) {

                        //Extraemos los datos para poder meterlos en el query
                            $id= $o->id;
                            $id_cont = $cont->id;

                        //Definimos el query
                            $q = 
                            " SELECT * " .
                            " FROM " . static::$tabla .
                            " WHERE (id_ref1='${id}')" . 
                            " OR id_ref2='${id}'" . 
                            " OR id_ref3='${id}'" . 
                            " ORDER BY date DESC ";

                        //Ejecutamos la búsqueda
                            $result = static::consultarSQL($q);                           

                            foreach ($result as $r ) {
                                $logs[] = $r;
                            }
                    
                    }      
                    


                //Asignamos el elemento del sistema al que se refiere a cada relación                   

                    foreach ($logs as $r) {

                        //En este caso, el id_ref habrá desaparecido, por lo que debemos apoyarnos en la información que aparezca en data_old e data_new
                            $array = Codigo::analizarId($r->id_ref1);  

                            $r->elementoSistema = $array->elementoSistema;

                            $modelo = $array->namespace . '\\' . $array->modelo;

                            $r->item = new $modelo;
                            $r->item->elementoSistema = $array->elementoSistema;

                        //Ahora atendemos al tipo de elemento al que hace referencia el log
                            switch ($r->item->elementoSistema) {

                                case 'Adjunto':

                                    $r->item = Adjuntos::find($r->id_ref1);
                                    break;

                                case 'Relación':            
                                    
                                    if($id <> $r->id_ref2){
                                        $referencia = Codigo::analizarId($r->id_ref2);  
                                    }else{
                                        $referencia = Codigo::analizarId($r->id_ref3);  
                                    };
                                    
                                    $modelo = $referencia->namespace . '\\' . $referencia->modelo;

                                    $r->item->referencia = new $modelo;

                                    if($id <> $r->id_ref2){
                                        $r->item->referencia = $modelo::find($r->id_ref2);
                                        $r->item->referencia->rutaIndex = $referencia->rutaIndex . $r->id_ref2;

                                    }else{
                                        $r->item->referencia = $modelo::find($r->id_ref3);
                                        $r->item->referencia->rutaIndex = $referencia->rutaIndex . $r->id_ref3;
                                    };

                                    $r->item->referencia->elementoSistema = $referencia->elementoSistema;
                                    $r->item->referencia->rutaIndex = $array->rutaIndex;

                                    break;                               
                                
                                default:
                                    $r->item = $modelo::find($r->id_ref1);

                                    if (isset($r->item)) {
                                        $r->item->rutaIndex = $array->rutaIndex;
                                    }
                                    
                                    break;
                            }

                    }      

                //Devolvemos el resultado
                    return $logs;

            }

        //endregion

        //region UPDATE
            public static function updateLog($original, $cambios) {      

                error_reporting(E_ERROR | E_PARSE);
                    
                // !!! DEBE AÑADIRSE ANTES DE LA SINCRONIZACIÓN CON ARGS
                    
                //Obtenemos el texto a usar
                    $array = Codigo::analizarId($obj->id);      
                    $elementoSistema = $array->elementoSistema;
                    $denominador = "N/A";

                //Definimos que ocurre con el método POST
                    if($_SERVER['REQUEST_METHOD'] === 'POST') {

                        foreach ($cambios as $key => $value) {

                            if(property_exists($original, $key) && !is_null($value)){
        
                                //Creamos el registro en la BBDD
                                    $c = new Log();

                                    $c->id = Codigo::generarId("Cambio");      
                                    $c->auto = 1;   
                                    $c->crud = 3;   
                                    $c->model = $elementoSistema;   
                                    $c->property = $key;
                                    $c->data_old = $original->${key};
                                    $c->data_new = $value;
                                    $c->denominador = $denominador;
                                    $c->id_ref1 = $original->id;
                                    $c->id_ref2 = '';
                                    $c->id_ref3 = '';
                                    $c->category = 'N/A';
                                    $c->subcategory = 'N/A';
                                    $c->bitacora = 1;
                                    $c->date = obtenerFechayHora();
                                    $c->user = Personal::findByEmail($_SESSION['usuario'])->id;

                                    $c->create();  
                                    
                            }

                        }
        
                    }

            }

        //endregion

        //region DELETE
            public static function deleteLog($obj) {           
                        
                //Obtenemos el texto a usar
                    $array = Codigo::analizarId($obj->id);      
                    $elementoSistema = $array->elementoSistema;
                    $denominador = "Elimiando el " . $elementoSistema . ' "' . $obj->codigo_interno . ' - '. $obj->denominador . '".';

                //Definimos que ocurre con el método POST
                    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        
                        //Creamos el registro en la BBDD
                            $c = new Log();

                            $c->id = Codigo::generarId("Cambio");      
                            $c->auto = 1;   
                            $c->crud = 4;   
                            $c->model = $elementoSistema;   
                            $c->property = 'N/A';
                            $c->data_old = $obj->denominador;
                            $c->data_new = $obj->denominador;
                            $c->denominador = $denominador;
                            $c->id_ref1 = $obj->id;
                            $c->category = 'N/A';
                            $c->subcategory = 'N/A';
                            $c->bitacora = 1;
                            $c->date = obtenerFechayHora();
                            $c->user = Personal::findByEmail($_SESSION['usuario'])->id;

                            switch ($elementoSistema) {
                                case 'Debilidad [Análisis DAFO]':
                                case 'Amenaza [Análisis DAFO]':
                                case 'Fortaleza [Análisis DAFO]':
                                case 'Oportunidad [Análisis DAFO]':
                                case 'Revisión Análisis Contexto':

                                    $c->id_cont = $obj->analisisContexto;
                                    break;
                                
                                default:
                                    $c->id_cont = 'N/A';
                                    break;
                            }


                            $c->create();         
        
                    }

            }

            public static function deleterelationLog($obj) {           
                    
                //Obtenemos el texto a usar
                    $array = Codigo::analizarId($obj->id);      
                    $elementoSistema = $array->elementoSistema;
                    $denominador = "Se ha eliminado la relación entre los elementos " . $obj->id_item1 . ' y '. $obj->id_item2 . '".';

                //Definimos que ocurre con el método POST
                    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        
                        //Creamos el registro en la BBDD
                            $c = new Log();

                            $c->id = Codigo::generarId("Cambio");      
                            $c->auto = 1;   
                            $c->crud = 4;   
                            $c->model = $elementoSistema;   
                            $c->property = 'N/A';
                            $c->data_old =  $obj->id_item1;
                            $c->data_new =  $obj->id_item2;
                            $c->denominador = $denominador;
                            $c->id_ref1 = $obj->id;
                            $c->category = 'N/A';
                            $c->subcategory = 'N/A';
                            $c->bitacora = 1;
                            $c->date = obtenerFechayHora();
                            $c->user = Personal::findByEmail($_SESSION['usuario'])->id;

                            $c->create();         
        
                    }
    
            }

            public static function deleteadjuntLog($obj) {           
                    
                //Obtenemos el texto a usar
                    $array = Codigo::analizarId($obj->id);      
                    $elementoSistema = $array->elementoSistema;
                    $denominador = "Se ha eliminado el documento " . $obj->nombreAdjunto;

                //Definimos que ocurre con el método POST
                    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        
                        //Creamos el registro en la BBDD
                            $c = new Log();

                            $c->id = Codigo::generarId("Cambio");      
                            $c->auto = 1;   
                            $c->crud = 4;   
                            $c->model = $elementoSistema;   
                            $c->property = 'N/A';
                            $c->data_old = $obj->item_referencia;
                            $c->data_new =  'N/A';
                            $c->denominador = $obj->nombreAdjunto;
                            $c->id_ref1 = $obj->id;
                            $c->category = 'N/A';
                            $c->subcategory = 'N/A';
                            $c->bitacora = 1;
                            $c->date = obtenerFechayHora();
                            $c->user = Personal::findByEmail($_SESSION['usuario'])->id;

                            $c->create();         
        
                    }
    
            }

        //endregion

        //region OTROS

            public static function obtenerCambiosPosterioresAFecha($historico){

                if(empty($historico)){
                    $cambios = Log::readAll();
                }
                else{
                    $cambios = Log::findByDate($historico[0]->fecha);
                }

                return $cambios;

            }

            public static function crearStringCambios($modelo){

                for($i = 0; $i < count($modelo); $i++){

                    $stringCambios = $stringCambios . "\n" . "- " . $modelo[$i]->denominador;

                }

                if(empty($stringCambios)){
                    $stringCambios = 'Sin cambios.';
                }

                return $stringCambios;

            }

            public static function juntarDerivados($log, $log_especifico){

                //Juntamos ambos logs
                    $log = array_merge($log, $log_especifico);
                                            
                //Ordenamos el log resultante por fecha descendente
                    Usort($log, object_sorter('date', 'DESC'));

                return $log;

            }

        //endregion

    }

?>