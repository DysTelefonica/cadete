<?php

    namespace ControllerLog;
    use MVC\Router;

    //Modelos
        use ModelGeneral\Personal;
        use ModelGeneral\Codigo;
        use ModelGeneral\Log;

        use ModelParteInteresada\ParteInteresada;
        use ModelAnalisisContexto\AnalisisDAFO;
        use ModelAnalisisContexto\RevisionAnalisisContexto;
        use ModelPlanAccion\PlanAccion;
        use ModelPlanAccion\Accion;

        use ModelRiesgoOportunidad\RiesgoOportunidad;
        use ModelRiesgoOportunidad\RevisionRiesgoOportunidad;

        use ModelDocumento\Documento;
        use ModelDocumento\EdicionDocumento;

    class LogController {
        
        public static function cargarLogAjax(Router $router) {

            //Obtenemos los datos del m, obtenemos sus datos y lo hacemos objeto
                $array = Codigo::analizarId($_POST['id']);    
                $modelo = $array->namespace . '\\' . $array->modelo;
                $m = new $modelo;

                $m = $m::find($_POST['id']);
                $m->elementoSistema = $array->elementoSistema;

            //Obtenemos todas las relaciones de m
                $log = Log::findByid_Ref($m->id);     

            //Obtenemos logs específicos
                $log = LogController::obtenerLogDerivado($m, $log);

            //Contamos el número de registros para asignarle posteriormente el orden
                $i=count($log);
        
                foreach ($log as $l) {

                    //Asignamos los datos de usuario
                        $l->user = Personal::find($l->user);
                        $l->user->avatar = '/build/img/users/' . $l->user->id . '.jpg';

                    //Asignamos el género
                        $l->genero = $array->genero;    

                    //Asignamos el orden
                        $l->order = $i;
                        $i = $i-1;
                        
                }

            //Llamamos a la función que almacena el código php del log para que lo cargue con los datos del log
                LogController::generarCodigoPHP($log);

        }

        public static function obtenerLogDerivado($m, $log){

            //Obtenemos el log por cada tipo de elemento del sistema que pueda tener derivados
                switch ($m->elementoSistema) {

                    case 'Contenedor Parte Interesada':

                        $der = ParteInteresada::cargarPIContenedor($m->id);
                        $log_especifico = Log::findDerivado($der, $m);

                        break;

                    case 'Análisis de Contexto':

                        $der = AnalisisDAFO::cargarTodoAnalisisDAFO($m->id);
                        $rev = RevisionAnalisisContexto::cargarHistorico($m->codigo_interno);

                        if( !empty($der) ){
                            $log_especifico = Log::findDerivado($der, $m);

                        }

                        // if( !empty($rev) ){
                        //     $log_especifico = Log::findDerivado($rev, $m);
                        // }

                        break;

                    case 'Plan de Acción':

                        $der = Accion::readAll_PlanAccion($m->id);

                        if( !empty($der) ){

                            $log_especifico = Log::findDerivado($der, $m);
                        }

                        break;
                            
                }           

            //Juntamos los arrays
                if( isset($log_especifico) && !empty($log_especifico) ){

                    $log = Log::juntarDerivados($log, $log_especifico);

                }

            //Devolvemos el log resultado
                return $log;

        }

        public static function generarCodigoPHP($log){

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
                                                                <span> el </span> <? echo($l->item->ref->elementoSistema); ?> 

                                                                <a 
                                                                    style='text-decoration: none' 
                                                                    href="<? echo($l->item->ref->rutaIndex); ?><? echo($l->item->ref->id); ?>"
                                                                > 
                                                                    <span class="italic green"> 
                                                                        <? echo($l->item->ref->denominador); ?> 
                                                                        <? echo(" ("); ?> 
                                                                        <? echo($l->item->ref->codigo_interno); ?> 
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
                                                                    href="<? echo($l->item->referencia->rutaIndex); echo($l->item->referencia->id); ?>"
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

    }