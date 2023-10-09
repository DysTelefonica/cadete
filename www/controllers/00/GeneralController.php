<?php

    namespace ControllerGeneral;
    use MVC\Router;

    //Modelos
        use ModelGeneral\Personal;
        use ModelGeneral\Version;
        use ModelGeneral\Codigo;
        use ModelGeneral\Log;
        use ModelGeneral\Ayuda;

        Use ModelComunicado\Comunicado;
        Use ModelComunicado\TipoComunicado;

        use ModelParteInteresada\ParteInteresada;
        use ModelAnalisisContexto\AnalisisContexto;
        use ModelAnalisisContexto\AnalisisDAFO;
        use ModelAnalisisContexto\RevisionAnalisisContexto;

        Use ModelInformacionDocumentada\Documento;
        Use ModelInformacionDocumentada\TipoDocumento;
        Use ModelInformacionDocumentada\JuridicaDocumento;
        use ModelInformacionDocumentada\EdicionDocumento;

    class GeneralController {

        public static function index(Router $router) {

            $portada = Comunicado::CargarComunicadosPortada();
            
            //Invovamos el método router
                $router->render('index', [

                    //Ahora le pasamos los datos
                        'portada' => $portada,
                        'ayuda' => $ayuda,
            
                ]);

        }

        public static function versiones(Router $router){
            
            $version = Version::find($_GET['id']);
            $versiones = Version::cargarVersionesPorFecha();

            $crud = 2;

             //Invovamos el método router
             $router->render('00/Versiones/versiones' , [
                'version' => $version,
                'versiones' => $versiones,
                'crud' => $crud   
            ]);

        }

        public static function obras(Router $router) {

            $router->render('00/obras' , []);

        }

        public static function debug(Router $router) {

            $router->render('00/debug' , []);

        }
        
            public static function cargarLogAjax(Router $router) {           

                //Obtenemos los datos del m, obtenemos sus datos y lo hacemos objeto
                    $array = Codigo::analizarId($_POST['id']);    
                    $modelo = $array->namespace . '\\' . $array->modelo;
                    $m = new $modelo;
    
                    $m = $m::find($_POST['id']);
                    $m->elementoSistema = $array->elementoSistema;
    
               //Obtenemos todas las relaciones de m
                    $log = Log::findByid_Ref($m->id);

                    // debuguear($m->elementoSistema);

                //Obtenemos logs específicos
                    switch ($m->elementoSistema) {

                        case 'Contenedor Parte Interesada':

                            $der = ParteInteresada::cargarPIContenedor($m->id);
                            $log_especifico = Log::findDerivado($der);

                            $log = Log::juntarDerivados($log, $log_especifico);

                            break;

                        case 'Análisis de Contexto':

                            $der = AnalisisDAFO::cargarTodoAnalisisDAFO($m->id);
                            $rev = RevisionAnalisisContexto::cargarHistorico($m->codigo_interno);

                            if( !empty($der) ){

                                $log_especifico = Log::findDerivado($der);

                                $log = Log::juntarDerivados($log, $log_especifico);
                            }

                            if( !empty($rev) ){

                                $log_especifico = Log::findDerivado($rev);

                                $log = Log::juntarDerivados($log, $log_especifico);
                            }

                            break;
                             
                    }

                    //Contamos el número de registros para asignarle posteriormente el orden
                        $i=count($log);
                
                    foreach ($log as $l) {

                        //Asignamos los datos de usuario
                            $l->user = Personal::find($l->user);

                        //Asignamos el género
                            $l->genero = $array->genero;    

                        //Asignamos la agrupación por fecha
                            // $l->fechaAgrupar = transformarFecha($l->date);

                        //Asignamos el orden
                            $l->order = $i;
                            $i = $i-1;
                    }

               //Obtenemos todos los apartados
                    $url_recarga = $_POST['url_recarga'];
               
               //Definimos la acción CRUD
                   $crud = 2;
    
                   $auth = $_POST['auth'];
    
                ?>
    
                    <div class="log__area">
    
                        <?php if(isset($log) && !empty($log)):?>
    
                            <div class="log__body">
    
                                <ul class="log__list">
    
                                    <?php foreach ($log as $l): ?>

                                        <li class="log__item">

                                        <div class="log__item__left">
                                            #<?php echo $l->order; ?>
                                        </div>

                                        <div class="log__item__right">
                                        
                                            <div class="log__item__head">

                                                <?php switch ($l->crud) { 

                                                        case 1:
                                                            
                                                            switch ($l->elementoSistema) {

                                                                case 'Adjunto': ?>
                                                                    
                                                                    <span class="bold"> Adjuntado </span>
                                                                    <span> el documento  </span>
                                                                    <a 
                                                                        style='text-decoration: none'    

                                                                        <?php if ( isset($l->item->rutaAdjunto) && $l->item->rutaAdjunto <> "" ) { ?>                                                                 
                                                                        href='
                                                                        <?php echo('/gestorArchivos?r='); echo($l->item->rutaAdjunto); } ?>
                                                                        ' 
                                                                        <?php if ( isset($l->item->rutaAdjunto) && $l->item->rutaAdjunto <> "" ) { ?>                                                                 
                                                                        target="_blank"
                                                                        download="<?php  echo $l->item->nombreAdjunto . "." . $l->item->tipoAdjunto;?>"
                                                                        <? }; ?>

                                                                    > 
                                                                        <span class="italic green"> 
                                                                            
                                                                            <? 
                                                                                if (isset($l->item->nombreAdjunto)) {
                                                                                    echo($l->item->nombreAdjunto); 
                                                                                }
                                                                                else{
                                                                                    echo("El documento ha sido elminado, y ya no se encuentra disponible."); 
                                                                                }
                                                                                
                                                                            ?> 
                                                                            
                                                                        </span> 
        
                                                                    </a>

                                                                    <?
                                                                    break;

                                                                case 'Relación': ?>

                                                                    <span> Creada la  </span> <span class="bold"> relación </span> con
                                                                    <span> el </span> <? echo($l->item->referencia->elementoSistema); ?> 

                                                                    <a 
                                                                        style='text-decoration: none' 
                                                                        href="<? echo($l->item->referencia->rutaIndex); ?><? echo($l->item->referencia->id); ?>"
                                                                    > 
                                                                        <span class="italic green"> 
                                                                            <? echo($l->item->referencia->denominador); ?> 
                                                                            <? echo(" ("); ?> 
                                                                            <? echo($l->item->referencia->codigo_interno); ?> 
                                                                            <? echo(")"); ?> 
                                                                        </span> 
        
                                                                    </a>

                                                                    <?
                                                                    break;

                                                                default:

                                                                    if($l->genero == 1){echo('Creada la');}else{echo('Creado el');}; ?>
                                                                    <span class="bold"> <? echo($l->model); ?>  </span>
                                                                    <a 
                                                                        style='text-decoration: none' 
                                                                        href="<? echo($l->item->rutaIndex); ?><? echo($l->item->id); ?>" 

                                                                    > 
                                                                        <span class="italic green"> 
                                                                            
                                                                            <? echo($l->data_new); ?> 
                                                                            
                                                                        </span> 
        
                                                                    </a>
    
                                                                    <?
                                                                    break;
                                                            }
                                                          
                                                            break;
                                                        
                                                        case 3: ?>
                                                            
                                                            Actualizada la propiedad <span class="bold"> <? echo(ucfirst($l->property)) ?> </span>
                                                            de el <? echo(ucfirst($l->elementoSistema)) ?> </span>

                                                            <a 
                                                            style='text-decoration: none' 
                                                            href="<? echo($l->item->rutaIndex); ?><? echo($l->item->id); ?>" 

                                                            > 
                                                                <span class="italic green"> 
                                                                    <? echo(ucfirst($l->item->denominador)) ?>
                                                                    ( <? echo(ucfirst($l->item->codigo_interno)) ?>)
                                                                </span>

                                                            </a>

                                                            <div class="sangria">

                                                                → Antigua propiedad: <span class="italic green"> <? echo($l->data_old) ?> </span>
                                                                <br>
                                                                → Nueva propiedad: <span class="italic green"> <? echo($l->data_new) ?> </span>
                                                            
                                                            </div>

                                                            <?
                                                            break;

                                                        case 4:

                                                            switch ($l->elementoSistema) {

                                                                case 'Adjunto': ?>
                                                                    
                                                                    <span class="bold"> Eliminado </span>
                                                                    <span> el documento adjunto  </span>
                                                                    <a 
                                                                        style='text-decoration: none'                                                                       

                                                                    > 
                                                                        <span class="italic green"> 
                                                                            
                                                                            <? echo($l->denominador); ?> 
                                                                            
                                                                        </span> 
        
                                                                    </a>

                                                                    <?
                                                                    break;

                                                                case 'Relación': ?>

                                                                    <span> Eliminada la  </span> <span class="bold"> relación </span> con
                                                                    <span> el </span> <? echo($l->item->referencia->elementoSistema); ?> 

                                                                    <a 
                                                                        style='text-decoration: none' 
                                                                        href="<? echo($l->item->referencia->rutaIndex); ?>"
                                                                    > 
                                                                        <span class="italic green">  
                                                                            <? echo($l->item->referencia->denominador); ?> 
                                                                            <? echo(" ("); ?> 
                                                                            <? echo($l->item->referencia->codigo_interno); ?> 
                                                                            <? echo(")"); ?> 
                                                                        </span> 
        
                                                                    </a>

                                                                    <?
                                                                    break;

                                                                default:

                                                                    if($l->genero == 1){
                                                                        echo('Eliminada el <span class="bold">' . $l->model . '</span> <span class="italic green">' . $l->data_new . '</span>. ');
                                                                    }else{
                                                                        echo('Eliminado el <span class="bold">' . $l->model . '</span> <span class="italic green">' . $l->data_new . '</span>. ');
                                                                    }

                                                                    break;
                                                            }
                                                           
                                                            break;
                                                    }

                                                ?>

                                            </div>

                                            <div class="log__item__body">

                                                Realizado por 
                                                
                                                <a href="/personal?id=<?php echo($l->user->id);?>" style="text-decoration: none;">
                                                    
                                                    <?php if ($l->user->avatar <> ""): ?>
                                                        <img src=<?php echo $l->user->avatar; ?> class="avatar small">  
                                                    <?php else: ?>
                                                        <img src="/build/img/users/sinAvatar.png" class="avatar small"> 
                                                    <?php endif; ?>

                                                    <?php echo($l->user->nombre . " " . $l->user->primer_apellido . " " . $l->user->segundo_apellido);?></a>, el 

                                                <?php echo(fechayHora($l->date)); ?>

                                            </div>

                                        </div>

                                        </li>
                                    
                                    <?php endforeach; ?>
    
                                </ul>
    
                            </div>     
    
                        <?php else: ?>
    
                            <div class="log__body">
                                <p> No se han encontrado ningún log asociado a este elemento del sistema. </p>
                            </div>   
                            
                        <?php endif; ?>
    
                    </div>
    
        <?php
    
           }

        //region RUTAS

        public static function contexto(Router $router) {    

            $iso9001_2015 = "4";
            $pecal2110 = "4";
            $crud = 2;

            //Invovamos el método router
                $router->render('/04/index' , [
                    'iso9001_2015' => $iso9001_2015,
                    'pecal2110' => $pecal2110,
                    'crud' => $crud   
                ]);
        }

        public static function liderazgo(Router $router) {
        
            //Invovamos el método router
            $router->render('/05/index', ['']);

        }

        public static function planificacion(Router $router) {
        
            //Invovamos el método router
            $router->render('/06/index', ['']);

        }

        public static function apoyo(Router $router) {
        
            //Invovamos el método router
                $router->render('/07/index', ['']);

        }
        
        public static function operacion(Router $router) {
        
            //Invovamos el método router
            $router->render('/08/index', ['']);

        }

        public static function desempeno(Router $router) {
        
            //Invovamos el método router
                $router->render('/09/index', ['']);

        }

        public static function mejora(Router $router) {
        
            //Invovamos el método router
            $router->render('/10/index', ['']);

        }

//endregion

    }