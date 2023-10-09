<?php

    namespace ControllerGeneral;
    use MVC\Router;

    //General
        Use ModelGeneral\Adjuntos;
        Use ModelGeneral\Codigo;
        Use ModelGeneral\Log;

    class AdjuntosController {

        //region READ

        public static function cargarAdjuntos(Router $router) {
            
            //Obtenemos los datos del item de referencia, obtenemos sus datos y lo hacemos objeto
                $idAnalizado = Codigo::analizarId($_GET['id']);  
                $modelo = $idAnalizado[0]->namespace . '\\' . $idAnalizado[0]->modelo;   
                
                $item_referencia = new $modelo;
                $item_referencia = $item_referencia::find($_GET['id']);
                $item_referencia->elementoSistema = $idAnalizado[0]->elementoSistema;

            //Definimos la acción CRUD
                $crud = 3;

            //Cargamos los datos y lo guardamos en una variable, que luego pasaremos por al router
                $archivosAdjuntos = Adjuntos::cargarAdjuntos($item_referencia->id);

            //Definimos que ocurre con el método POST
                if($_SERVER['REQUEST_METHOD'] === 'POST') {
                
                    //Comprobamos si se ha subido el archivo
                        if(is_uploaded_file($_FILES['archivo']['tmp_name'])){

                            //Obtenemos las variables del archivo
                                $_POST['id'] = Codigo::generarId("Adjunto");
                                $_POST['item_referencia'] = $item_referencia->id;

                                $extension = pathinfo($_FILES['archivo']['name'], PATHINFO_EXTENSION);

                                $_POST['tamanoAdjunto'] = $_FILES['archivo']['size'];
                                $_POST['tipoAdjunto'] = $extension;

                            //Si no están creadas previamente, creamos las carpetas del directrio
                                $carpeta = Adjuntos::generarRutayCrearCarpetas($item_referencia);

                            //Asignamos la ruta
                                $rutaTemporal = $_FILES['archivo']['tmp_name'];
                                $ruta = $carpeta . $_POST['id'] . "." . $extension;
                                $_POST['rutaAdjunto'] = $ruta;      

                            //Movemos el archivo a su ubicación
                                if(move_uploaded_file($rutaTemporal, $ruta)){                                  

                                    //Creamos el registro en la BBDD
                                        $archivosAdjuntos = new Adjuntos($_POST);
                                        $archivosAdjuntos->create();

                                };             

                            //Redirigimos a la página principal
                                header('Location:/appCalidad/gestorArchivos?id=' . $item_referencia->id);   

                        }
                }

            //Invovamos el método router
                $router->render('/adjuntos/adjuntos' , [

                    //Ahora le pasamos los datos
                        'archivosAdjuntos' => $archivosAdjuntos,
                        'crud' => $crud,
                        'item_referencia' => $item_referencia
            
                ]);

        }

        public static function cargarAdjuntosAjax(Router $router) {
        
            //Obtenemos los datos del item de referencia, obtenemos sus datos y lo hacemos objeto
                $idAnalizado = Codigo::analizarId($_POST['id']);  
                $modelo = $idAnalizado->namespace . '\\' . $idAnalizado->modelo;   
                
                $item_referencia = new $modelo;
                $item_referencia = $item_referencia::find($_POST['id']);
                $item_referencia->elementoSistema = $idAnalizado->elementoSistema;

            //Definimos la acción CRUD
                $crud = 2;

            //Cargamos los datos y lo guardamos en una variable, que luego pasaremos por al router

                if($_SESSION['auth']){
                    $archivosAdjuntos = Adjuntos::cargarAdjuntos($item_referencia->id);
                }else{
                    $archivosAdjuntos = Adjuntos::cargarAdjuntosAutorizados($item_referencia->id);
                }

            //Ahora definimos el HTML que se va a pasar  ¡Fuera de PHP!
                AdjuntosController::generarCodigoPHP($archivosAdjuntos, $_POST['auth'], $_POST['url_recarga']);

        }

        public static function fetchAdjuntAjax() {

            //Cargamos los datos y lo guardamos en una variable, que luego pasaremos por al router
            if($_SESSION['auth']){
                $archivosAdjuntos = Adjuntos::cargarAdjuntos($_GET['id']);
            }else{
                $archivosAdjuntos = Adjuntos::cargarAdjuntosAutorizados($_GET['id']);
            }

            //Adaptamos los datos
            foreach ($archivosAdjuntos as $a) {
                $a->icono = obtenerIconoDeTipo($a->tipoAdjunto);
                $a->bytes = transformarBytes($a->tamanoAdjunto);
            }

            //Devolvemos el resultado
            echo(json_encode($archivosAdjuntos));

        }

        public static function AbrirAdjunto(Router $router) {

            if (isset($_GET['r'])) {

                $file = Adjuntos::find($_GET['r']);                
        
                if (file_exists($file->rutaAdjunto) && is_readable($file->rutaAdjunto)) {

                    // Definir los tipos MIME y encabezados según la extensión
                    $mimeTypes = [
                        'pdf' => 'application/pdf',
                        'jpg' => 'image/jpeg',
                        'png' => 'image/png',
                    ];
        
                    // Verificar si la extensión está en la lista de tipos MIME
                    if (array_key_exists($file->tipoAdjunto, $mimeTypes)) {

                        // Establecer el tipo MIME adecuado y el encabezado Content-Disposition
                        header('Content-Type: ' . $mimeTypes[$file->tipoAdjunto]);
                        header('Content-Disposition: inline; filename="' . basename($file->nombreAdjunto) . '"');

                    } 
                    else{

                        // Establecer el tipo MIME adecuado y el encabezado Content-Disposition
                        header('Content-Type: application/octet-stream');
                        header('Content-Disposition: attachment; filename="' . basename($file->nombreAdjunto) . '.' . basename($file->tipoAdjunto) .'"');

                    }

                    // Leer y enviar el archivo
                    readfile($file->rutaAdjunto);
                    
                    // Terminar la ejecución después de enviar el archivo
                    exit; 

                } 
                else{
                    header('HTTP/1.1 404 Not Found');
                    echo "Archivo no encontrado.";
                }
            } 
            else{
                echo "Parámetro 'r' no especificado.";
            }
        }

        //endregion

        //region CREATE

        public static function guardarAdjuntos(Router $router) {

            //Definimos que ocurre con el método POST
            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                
                //Comprobamos si se ha subido el archivo
                if(is_uploaded_file($_FILES['archivo']['tmp_name'])){

                    //Obtenemos los datos del item de referencia, obtenemos sus datos y lo hacemos objeto
                    $idAnalizado = Codigo::analizarId($_GET['id']);  
                    $modelo = $idAnalizado->namespace . '\\' . $idAnalizado->modelo;
                    $item_referencia = new $modelo;
                    $item_referencia = $item_referencia::find($_GET['id']);
                    $item_referencia->elementoSistema = $idAnalizado->elementoSistema;

                    //Cargamos los datos y lo guardamos en una variable
                    $archivosAdjuntos = Adjuntos::cargarAdjuntos($item_referencia->id);

                    //Obtenemos las variables del archivo
                    $_POST['id'] = Codigo::generarId("Adjunto");
                    $_POST['item_referencia'] = $item_referencia->id;
                    $_POST['tamanoAdjunto'] = $_FILES['archivo']['size'];
                    $_POST['tipoAdjunto'] = pathinfo($_FILES['archivo']['name'], PATHINFO_EXTENSION);

                    //Por defecto, le damos permiso a todo el mundo para verlo
                    $_POST['auth'] = 0;

                    //Si no están creadas previamente, creamos las carpetas del directrio
                    $carpeta = Adjuntos::generarRutayCrearCarpetas($item_referencia);

                    //Asignamos la ruta
                    $rutaTemporal = $_FILES['archivo']['tmp_name'];
                    $ruta = $carpeta . $_POST['id'] . "." .  $_POST['tipoAdjunto'];
                    $_POST['rutaAdjunto'] = $ruta;      

                    //Movemos el archivo a su ubicación
                    if(move_uploaded_file($rutaTemporal, $ruta)){                                  

                        //Creamos el registro en la BBDD
                        $archivosAdjuntos = new Adjuntos($_POST);
                        $archivosAdjuntos->create();

                        //Guardamos el log
                        Log::adjuntLog($archivosAdjuntos);

                    };                         

                    //Redirigimos a la página principal
                    header('Location: ' . $_POST['url']);  

                }
            };

        }

        public static function generarCodigoPHP($archivosAdjuntos, $auth, $url_recarga){

            ?>

                <div class="download__area">

                    <div class="download__header">

                        <div class="title">

                            <h2>
                                <svg class="ico ico__adjuntar b"></svg>
                                Área de descargas
                            </h2>   

                        </div>

                        <?php if($auth): ?>

                            <div class="button">

                                <div class="newRelation__button">

                                    <button 
                                        type="button" 
                                        class="button button__primary button__regular button__blue w100"
                                        onclick="showAdjuntos('<?php echo $_POST['id'] ?>')"
                                    > 
                                        <svg class="ico ico__adjuntar w"></svg>
                                        <span>Adjuntar archivo</span>
                                    </button>

                                </div> 

                            </div>

                        <?php endif; ?>
                        

                    </div>

                    <?php if(isset($archivosAdjuntos) && !empty($archivosAdjuntos)): ?>

                        <div class="download__area">

                            <div class="download__body">

                                <ul class="download__list">

                                    <?php foreach ($archivosAdjuntos as $adjunto): ?>

                                        <li class="download__item">

                                            <div class="download__archive">

                                                <a 
                                                    href='/gestorArchivos?r=<?php echo $adjunto->id; ?>' 
                                                    target="_blank"
                                                    
                                                >
                                                    <div class="download__title">
                                                        <svg 
                                                            class="ico <?php echo obtenerIconoDeTipo($adjunto->tipoAdjunto)?> d icoChange"
                                                            id="icoChange"                              
                                                    
                                                        ></svg>
                                                        <?php echo $adjunto->nombreAdjunto ?>
                                                    </div>

                                                    <div class="download__info">
                                                        <?php echo $adjunto->tipoAdjunto ?> 
                                                        
                                                        | 

                                                        <?php echo transformarBytes($adjunto->tamanoAdjunto) ?>                                 

                                                    </div>

                                                </a>

                                                <?php if($auth): ?>

                                                    <div class="download__buttons">

                                                        <form 
                                                            method="POST" 
                                                            action="/gestorArchivos/d" 
                                                            id="formEliminarArchivo"
                                                        >

                                                            <input type="hidden" name="id" value="<?php echo $adjunto->id; ?>">
                                                            <input type="hidden" name="url" value="<?php echo($url_recarga) ?>">

                                                                <div class="tooltip">
                                                            
                                                                    <button 
                                                                        type="button" 
                                                                        class="button button__primary button__small button__red"
                                                                        onclick="confirmarEliminarAdjuntar(this.form)"
                                                                    > 
                                                                        <svg class="ico ico__papelera w"></svg>
                                                                        
                                                                    </button>    

                                                                    <span class="tooltiptext">Eliminar archivo adjunto</span>

                                                                </div>
                                                        </form>

                                                    </div>

                                                <?php endif; ?>

                                            </div>

                                        </li>
                                    
                                    <?php endforeach; ?>

                                </ul>

                            </div>       

                        </div>

                    <?php else: ?>
                        
                        <div class="download__area">
                            <p> No se ha encontrado ningún documento adjunto. </p>
                        </div>

                    <?php endif; ?>

                </div>

            <?php

        }

        //endregion

        //region DELETE

        public static function eliminarAdjunto(Router $router) {

            //Definimos que ocurre con el método POST
            if($_SERVER['REQUEST_METHOD'] === 'POST') {

                //Localizamos el registro
                $adjunto = Adjuntos::find($_POST['id']);
                
                //Eliminamos el fichero
                if (file_exists($adjunto->rutaAdjunto)) {
                    unlink($adjunto->rutaAdjunto);
                }

                //Eliminamos el registro
                $adjunto->delete($_POST['id']);

                //registramos el control de cambios
                Log::deleteadjuntLog($adjunto);

                //Redirigimos a la página principal
                header('Location:' . $_POST['url'] . '&delete=ok');
        
            };
        }

        //endregion

    }