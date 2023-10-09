<?php

    namespace ModelGeneral;
    use \ModelDocumentacionExterna\ISO_9001_2015 as ISO_9001_2015;

    //Definimos la clase
    class Trazabilidad_ISO extends ActiveRecord{

        //region PROPIEDADES
            public $id;
            public $ruta;    
            public $apartado;

        //endregion

        //region BASE DE DATOS

            protected static $db;
            protected static $tabla = '00_trazabilidad_ISO';
            protected static $columnasDB = ['id', 'ruta', 'apartado'];    

        //endregion

        //region CONSTRUCTOR

            //Definimos el constructor y las propiedades del mismo
                public function __construct($args = []){

                    $this->id = $args['id'] ?? '';
                    $this->ruta = $args['ruta'] ?? '';
                    $this->apartado = $args['apartado'] ?? '';

                }
        //endregion
        
        //region VALIDACIÓN

            //Definimos un método para la validación de datos
                public function validar(){}

        //endregion

        //region READ

            //Definimos un método para buscar las rutas
            public function buscarRuta($ruta){

                $partes = explode('?', $ruta);
                $ruta = $partes[0];                

                //Declaramos el query
                $q = 
                    " SELECT ruta, apartado " .
                    " FROM " . static::$tabla .
                    " WHERE ruta LIKE '%${ruta}%'"; 

                //Realizamos la consulta
                $r = static::consultarSQL($q);                   

                //Ahora buscamos cada apartado de ISO y lo anexamos      
                        
                foreach ($r as $a) {
                    $a->apartado = ISO_9001_2015::buscarApartado($a->apartado);
                }

                //Devolvemos el array obtenido
                return $r;

            }

        //endregion

    }

?>