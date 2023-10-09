<head>

    <!-- Título -->
        
        <title> 

            <?php if($crud == 1): ?>

                    Nuevo Plan de Acción | " <?php echo $_SESSION["nombreApp"]; ?>" ?>     

            <?php else: 

                echo "$pa->codigo_interno" ?> | <?php echo $_SESSION["nombreApp"]; ?>  

            <?php endif; ?>

        </title> 

    <!-- Icono -->
        <link rel="shortcut icon" href="/build/img/layout/Internet_2Regular_azul.svg">
    
</head>

<!-- #endregion -->

<main>

 <!-- #region Breadcrumb -->

    <nav class="breadcrumb">

        <ol class="breadcrumb__list">

            <li class="breadcrumb__item"> <svg class="ico ico__puntos b"> </svg> </li>
            <li class="breadcrumb__item"> <a href="/"> Inicio </a> </li>
            <li class="breadcrumb__item"> <span> / </span> </li>               
            <li class="breadcrumb__item"> <a href="/planificacion"> Planificación </a> </li>
            <li class="breadcrumb__item"> <span> / </span> </li>               
            <li class="breadcrumb__item"> <a href="/planificacion/planificacion-cambios"> Planificación de los cambios </a> </li>
            <li class="breadcrumb__item"> <span> / </span> </li>     
            
            <?php if($crud == 1):?>
                <li class="breadcrumb__item actual"> <a href="/planificacion/planificacion-cambios/create"> Nuevo Plan de Acción </a> </li>     
            <?php else:?>
                <li class="breadcrumb__item actual"> <a href="/planificacion/planificacion-cambios/read?id=<?php echo $pa->id ?>"> Plan de acción <?php echo $pa->codigo_interno ?> </a> </li>
            <?php endif;?>

        </ol>

    </nav>

<!-- #endregion -->

<!-- #region Artículo -->

    <article>

        <header class="entry-header">
            <h1>
                <svg class="ico ico__rutarecorrido b"></svg>

                    <?php 

                        switch ($crud){

                            case 1: //Create ?>
                                <span>Nuevo Plan de Acción</span> 
                                
                                <?php break;

                            case 2: //Read ?>

                                <span>Plan de Acción "<?php echo $pa->denominador; ?>"</span>                            
                                                                    
                                <?php break;

                            case 3: //Read ?>

                                <span>Actualizar Plan de Acción "<?php echo $pa->denominador; ?>"</span>
                                                                                            
                                <?php break;

                        }
                    
                    ?>

            </h1>
        </header>

        <!-- #region tabs -->

        <div class="tab__container">
                    
            <div class="tab__header n_tabs_4">

                <div class="active"> <svg class="ico ico__documento d"></svg> Metadatos </div>
                
                <?php if($crud == 2): ?>

                    <div><svg class="ico ico__rutarecorrido d"></svg> Acciones</div>
                    <div id="tab__header__log"> <svg class="ico ico__tiempo d"></svg> Log </div>
                    <div id="tab__header__relations"> <svg class="ico ico__conexiones d"></svg> Relaciones </div>
                    <div id="tab__header__adjunct"> <svg class="ico ico__adjuntar d"></svg> Adjuntos </div>

                <?php endif; ?> 
                
            </div>
    
            <div class="tab__body">

                <div class="tab active">

                    <div class="entry-content">

                        <div class="block">

                            <div class="block__content form">

                                <div class="form__two">

                                    <div class="form__left">

                                        <div class="form_metadatos">

                                            <h2>
                                                <svg class="ico ico__documento b"></svg>
                                                <span>Metadatos</span>
                                            </h2>

                                            <div class="form__leftContent">

                                                <form 
                                                    class="form"
                                                    id="form__planaccion" 
                                                    method='POST'
                                                
                                                    <?php switch ($crud){

                                                        case 1: ?>
                                                            action="/planificacion/planificacion-cambios/create"
                                                        <?php break;

                                                        case 3: ?>
                                                            action="/planificacion/planificacion-cambios/update?id=<?php echo $pa->id; ?>"
                                                        <?php break;}?>>

                                                    <!-- ID -->

                                                    <input 
                                                        type="hidden"
                                                        name="id"
                                                        id="id"
                                                        value=<?php echo $pa->id; ?>
                                                    >
                                                    
                                                    <!-- CODIGO -->
                                                    <div class="control text w100"> 

                                                        <svg class="ico ico__huella b"></svg>

                                                        <div class="textbox">

                                                            <input 
                                                                type="text" 
                                                                name="codigo_interno" 
                                                                id="codigo_interno" 
                                                                
                                                                <?php switch ($crud){

                                                                    case ($crud == 1): ?>

                                                                        value="<?php echo s($codigoCalculado); ?>" 
                                                                        disabled
                                                                        class="valid"

                                                                    <?php break;

                                                                    case ($crud == 2 || $crud == 3): ?>

                                                                        value="<?php echo s($pa->codigo_interno); ?>"
                                                                        readonly
                                                                        class="valid"

                                                                    <?php break; } ?>
                                                            >

                                                            <label class="label">
                                                                <span class="label__text">Codigo</span>
                                                            </label> 

                                                        </div>                                        

                                                    </div>

                                                    <!-- DENOMINADOR -->
                                                    <div class="control text w100"> 
                                                    
                                                        <svg class="ico ico__chat b"></svg>

                                                        <div class="textbox">

                                                            <input 
                                                                name="denominador" 
                                                                id="denominador"
                                                                autocomplete='off'
                                                                value="<?php echo s($pa->denominador); ?>"
                                                                
                                                                <?php if($crud == 1): ?>
                                                                    autofocus='autofocus'
                                                                    required='required'
                                                                <?php endif; ?>

                                                                <?php if($crud == 2): ?>
                                                                    disabled
                                                                    class="valid"
                                                                <?php endif; ?>

                                                                <?php if($crud ==3): ?>
                                                                    class="valid"
                                                                <?php endif; ?>
                                                            >

                                                            <label class="label">
                                                                <span class="label__text">Denominador</span>
                                                            </label> 

                                                        </div>                                          

                                                    </div>

                                                    <!-- RESPONSABLE --> 
                                                    <?php if($crud == 2): ?>
                                                        <a href="/apoyo/recursos/personal/read?id=<?php echo($responsable->id);?>">
                                                    <?php endif; ?>

                                                        <div class="control select w100" style="cursor: pointer"> 

                                                            <?php if(isset($responsable) && $responsable->avatar <> ""):?>                                                    
                                                                <img src=<?php echo $responsable->avatar; ?> class="avatar"> 
                                                            <?php else: ?>
                                                                <!-- <svg class="ico ico__usuario b"></svg> -->
                                                                <img src="/build/img/users/sinAvatar.png" class="avatar"> 
                                                            <?php endif;?>

                                                            <div class="textbox">

                                                                <select 
                                                                    name="responsable" 
                                                                    id="responsable" 
                                                                    class="valid link"
                                                                    value="<?php echo s($pa->responsable); ?>"
                                                                    style="cursor: pointer"
                                                                    
                                                                    <?php if($crud == 1): ?>
                                                                        required='required'
                                                                    <?php endif; ?>

                                                                    <?php if($crud == 2): ?>
                                                                        disabled
                                                                    <?php endif; ?>
                                                                
                                                                >
                                                                
                                                                    <option selected value=""> Seleccione el responsable del plan de acción </option>    
                                                                    
                                                                    <?php foreach($responsables as $r) { ?>
                                                                    
                                                                        <option <?php echo s($r->id) === s($pa->responsable) ? 'selected' : '' ?> value="<?php echo s($r->id);?>"> <?php echo s($r->nombre . " " . $r->primer_apellido . " " . $r->segundo_apellido); ?> </option>

                                                                    <?php } ?>

                                                                </select>

                                                                <label class="label">
                                                                    <span class="label__text">Responsables</span>
                                                                </label> 

                                                            </div>    

                                                        </div>
                                                    </a>

                                                    <!-- DESCRIPCIÓN -->
                                                    <div class="control textarea w100"> 

                                                        <svg class="ico ico__chat b"></svg>

                                                        <div class="textbox">

                                                            <textarea 
                                                                name="descripcion" 
                                                                id="descripcion" 
                                                                cols="30" 
                                                                rows="10"

                                                                <?php if($crud == 1): ?>
                                                                    value=""
                                                                <?php endif; ?>

                                                                <?php if($crud == 2): ?>
                                                                    class="valid"
                                                                    disabled
                                                                <?php endif; ?>

                                                                <?php if($crud ==3): ?>
                                                                    class="valid"
                                                                <?php endif; ?>
                                                            ><?php if($crud == 2 || $crud == 3):echo s($pa->descripcion);endif;?></textarea>

                                                            <label class="label">
                                                                <span class="label__text">Descripción</span>
                                                            </label> 

                                                        </div>                                         

                                                    </div>

                                                    <!-- ORIGEN -->
                                                    <div class="control textarea w100"> 

                                                        <svg class="ico ico__mapa b"></svg>

                                                        <div class="textbox">

                                                            <textarea 
                                                                name="origen" 
                                                                id="origen" 
                                                                cols="30" 
                                                                rows="10"

                                                                <?php if($crud == 1): ?>
                                                                    value=""
                                                                <?php endif; ?>

                                                                <?php if($crud == 2): ?>
                                                                    class="valid"
                                                                    disabled
                                                                <?php endif; ?>

                                                                <?php if($crud ==3): ?>
                                                                    class="valid"
                                                                <?php endif; ?>
                                                            ><?php if($crud == 2 || $crud == 3):echo s($pa->origen);endif;?></textarea>

                                                            <label class="label">
                                                                <span class="label__text">Origen</span>
                                                            </label> 

                                                        </div>                                     

                                                    </div>

                                                    <!-- RECURSOS -->
                                                    <div class="control text w100"> 

                                                        <svg class="ico ico__cartera b"></svg>

                                                        <div class="textbox">

                                                            <input 
                                                                name="recursos" 
                                                                id="recursos"
                                                                autocomplete='off'
                                                                value="<?php echo s($pa->recursos); ?>"
                                                                
                                                                <?php if($crud == 1): ?>
                                                                    autofocus='autofocus'
                                                                    required='required'
                                                                <?php endif; ?>

                                                                <?php if($crud == 2): ?>
                                                                    disabled
                                                                    class="valid"
                                                                <?php endif; ?>

                                                                <?php if($crud ==3): ?>
                                                                    class="valid"
                                                                <?php endif; ?>
                                                            >

                                                            <label class="label">
                                                                <span class="label__text">Recursos</span>
                                                            </label> 

                                                        </div>                                        

                                                    </div>

                                                    <!-- ESTADO -->
                                                    <div class="control select w100"> 

                                                        <svg class="ico ico__proceso b"></svg>

                                                        <div class="textbox <?php if(isset($pa->indicador)):echo s('PA_E'. $pa->indicador); endif; ?>">

                                                            <select 
                                                                name="estado" 
                                                                id="estado" 
                                                                class="valid"
                                                                value="<?php echo s($pa->estado); ?>"
                                                                
                                                                <?php if($crud == 1): ?>
                                                                    required='required'
                                                                <?php endif; ?>

                                                                <?php if($crud == 2): ?>
                                                                    disabled
                                                                <?php endif; ?>
                                                            
                                                            >
                                                            
                                                                <option selected value=""> Seleccione el estado de plan de acción </option>    

                                                                <?php foreach($estadosPlanAccion as $e) { ?>
                                                                    
                                                                    <option <?php echo s($e->estado) === s($pa->estado) ? 'selected' : '' ?> value="<?php echo s($e->id);?>"> <?php echo s($e->estado); ?> </option>

                                                                <?php } ?>

                                                            </select>

                                                            <label class="label">
                                                                <span class="label__text">Estado</span>
                                                            </label> 

                                                        </div>                                        

                                                    </div>

                                                    <!-- COMENTARIOS -->
                                                    <div class="control textarea w100"> 

                                                        <svg class="ico ico__foro b"></svg>

                                                        <div class="textbox">

                                                            <textarea 
                                                                name="comentarios" 
                                                                id="comentarios" 
                                                                cols="30" 
                                                                rows="10"

                                                                <?php if($crud == 1): ?>
                                                                    value=""
                                                                <?php endif; ?>

                                                                <?php if($crud == 2): ?>
                                                                    class="valid"
                                                                    disabled
                                                                <?php endif; ?>

                                                                <?php if($crud ==3): ?>
                                                                    class="valid"
                                                                <?php endif; ?>
                                                            ><?php if($crud == 2 || $crud == 3):echo s($pa->comentarios);endif;?></textarea>

                                                            <label class="label">
                                                                <span class="label__text">Comentarios</span>
                                                            </label> 

                                                        </div>                                        

                                                    </div>

                                                </form>

                                            </div>

                                        </div>
                                        
                                        <div class="form_fechas">

                                            <h2>
                                                <svg class="ico ico__calendario b"></svg>
                                                <span>Fechas</span>
                                            </h2>

                                            <div class="form__leftContent">

                                                <form class="form">

                                                    <!-- FECHA INICIO -->
                                                    <?php switch ($crud) {

                                                        case 1: ?>

                                                            <div class="control date w100" id="control_fechaInicio"> 

                                                                <svg class="ico ico__calendario b"></svg>

                                                                <div class="textbox">

                                                                    <input 
                                                                        type="date" 
                                                                        name="fechaInicio" 
                                                                        id="fechaInicio"  
                                                                        form="form__planaccion" 
                                                                        class="valid"
                                                                        value="<?php echo s(date("Y-m-d")); ?>"
                                                                    >

                                                                    <label class="label">
                                                                        <span class="label__text">Fecha de inicio</span>
                                                                    </label> 

                                                                    <svg class="ico ico__calendario b"></svg>

                                                                </div>                                        

                                                            </div>

                                                        <?php break; ?>

                                                        <?php case 2: ?>

                                                            <?php if(isset($pa->fechaInicio) && $pa->fechaInicio != ""): ?>

                                                                <div class="control date w100" id="control_fechaInicio"> 

                                                                    <svg class="ico ico__calendario b"></svg>

                                                                    <div class="textbox">

                                                                        <input 
                                                                            type="date" 
                                                                            name="fechaInicio" 
                                                                            id="fechaInicio"  
                                                                            form="form__planaccion" 
                                                                            class="valid"
                                                                            readonly
                                                                            value ="<?php echo s($pa->fechaInicio); ?>"                                                            
                                                                        >

                                                                        <label class="label">
                                                                            <span class="label__text">Fecha de inicio</span>
                                                                        </label> 

                                                                        <svg class="ico ico__calendario b"></svg>

                                                                    </div>                                        

                                                                </div>

                                                            <?php endif; ?>

                                                        <?php break; ?>

                                                        <?php case 3: ?>

                                                            <div class="control date w100" id="control_fechaInicio"> 

                                                                <svg class="ico ico__calendario b"></svg>

                                                                <div class="textbox">

                                                                    <input 
                                                                        type="date" 
                                                                        name="fechaInicio" 
                                                                        id="fechaInicio"  
                                                                        form="form__planaccion" 
                                                                        class="valid"
                                                                        value="<?php echo s($pa->fechaInicio); ?>"
                                                                    >

                                                                    <label class="label">
                                                                        <span class="label__text">Fecha de inicio</span>
                                                                    </label> 

                                                                    <svg class="ico ico__calendario b"></svg>

                                                                </div>                                        

                                                            </div>

                                                        <?php break; ?>

                                                    <?php }; ?>

                                                    <!-- FECHA FIN PREVISTO -->
                                                    <?php switch ($crud) {

                                                        case 1: ?>

                                                            <div class="control date w100 hidden" id="control_fechaFinPrevisto"> 

                                                                <svg class="ico ico__calendario b"></svg>

                                                                <div class="textbox">

                                                                    <input 
                                                                        type="hidden" 
                                                                        name="fechaFinPrevisto" 
                                                                        id="fechaFinPrevisto"  
                                                                        form="form__planaccion" 
                                                                        class="valid"
                                                                        value="<?php echo s($pa->fechaFinPrevisto); ?>"
                                                                    >

                                                                    <label class="label">
                                                                        <span class="label__text">Fecha de fin previsto</span>
                                                                    </label> 

                                                                    <svg class="ico ico__calendario b"></svg>

                                                                </div>                                        

                                                            </div>

                                                        <?php break; ?>

                                                        <?php case 2: ?>

                                                            <?php if(isset($pa->fechaFinPrevisto) && $pa->fechaFinPrevisto != ""): ?>

                                                                <div class="control date w100" id="control_fechaFinPrevisto"> 

                                                                    <svg class="ico ico__calendario b"></svg>

                                                                    <div class="textbox">

                                                                        <input 
                                                                            type="date" 
                                                                            name="fechaFinPrevisto" 
                                                                            id="fechaFinPrevisto" 
                                                                            form="form__planaccion"  
                                                                            class="valid"
                                                                            readonly
                                                                            value ="<?php echo s($pa->fechaFinPrevisto); ?>"                                                            
                                                                        >

                                                                        <label class="label">
                                                                            <span class="label__text">Fecha de fin previsto</span>
                                                                        </label> 

                                                                        <svg class="ico ico__calendario b"></svg>

                                                                    </div>                                        

                                                                </div>

                                                            <?php endif; ?>

                                                        <?php break; ?>

                                                        <?php case 3: ?>

                                                            <div class="control date w100" id="control_fechaFinPrevisto"> 

                                                                <svg class="ico ico__calendario b"></svg>

                                                                <div class="textbox">

                                                                    <input 
                                                                        type="date" 
                                                                        name="fechaFinPrevisto" 
                                                                        id="fechaFinPrevisto"  
                                                                        form="form__planaccion" 
                                                                        class="valid"
                                                                        value="<?php echo s($pa->fechaFinPrevisto); ?>"
                                                                    >

                                                                    <label class="label">
                                                                        <span class="label__text">Fecha de fin previsto</span>
                                                                    </label> 

                                                                    <svg class="ico ico__calendario b"></svg>

                                                                </div>                                        

                                                            </div>

                                                        <?php break; ?>

                                                    <?php }; ?>

                                                    <!-- FECHA FIN REAL -->
                                                    <?php switch ($crud) {

                                                        case 1: ?>

                                                            <div class="control date w100 hidden" id="control_fechaFinReal"> 

                                                                <svg class="ico ico__calendario b"></svg>

                                                                <div class="textbox">

                                                                    <input 
                                                                        type="hidden" 
                                                                        name="fechaFin" 
                                                                        id="fechaFin"  
                                                                        form="form__planaccion"                                                   
                                                                    >

                                                                    <label class="label">
                                                                        <span class="label__text">Fecha de fin</span>
                                                                    </label> 

                                                                    <svg class="ico ico__calendario b"></svg>

                                                                </div>                                        

                                                            </div>

                                                        <?php break; ?>

                                                        <?php case 2: ?>

                                                            <?php if(isset($pa->fechaFin) && $pa->fechaFin != ""): ?>

                                                                <div class="control date w100" id="control_fechaFinReal"> 

                                                                    <svg class="ico ico__calendario b"></svg>

                                                                    <div class="textbox">

                                                                        <input 
                                                                            type="date" 
                                                                            name="fechaFin" 
                                                                            id="fechaFin"  
                                                                            form="form__planaccion" 
                                                                            class="valid"
                                                                            readonly
                                                                            value ="<?php echo s($pa->fechaFin); ?>"                                                            
                                                                        >

                                                                        <label class="label">
                                                                            <span class="label__text">Fecha de fin</span>
                                                                        </label> 

                                                                        <svg class="ico ico__calendario b"></svg>

                                                                    </div>                                        

                                                                </div>

                                                            <?php endif; ?>

                                                        <?php break; ?>

                                                        <?php case 3: ?>

                                                            <div class="control date w100" id="control_fechaFinReal"> 

                                                                <svg class="ico ico__calendario b"></svg>

                                                                <div class="textbox">

                                                                    <input 
                                                                        type="date" 
                                                                        name="fechaFin" 
                                                                        id="fechaFin"  
                                                                        form="form__planaccion" 
                                                                        class="valid"
                                                                        value="<?php echo s($pa->fechaFin); ?>"
                                                                    >

                                                                    <label class="label">
                                                                        <span class="label__text">Fecha de fin</span>
                                                                    </label> 

                                                                    <svg class="ico ico__calendario b"></svg>

                                                                </div>                                        

                                                            </div>

                                                        <?php break; ?>

                                                    <?php }; ?>

                                                </form>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="form__right">

                                        <h2>
                                            <svg class="ico ico__rayo b"></svg>
                                            <span>Acciones</span>
                                        </h2>

                                        <div class="form__rightContent">

                                            <nav class="toolbar">

                                                <ol class="toolbar__list">

                                                    <!-- Guardar/Actualizar -->
                                                    <?php if($auth && $crud <> 2): ?>                                                    

                                                        <li class="toolbar__item"> 

                                                            <button 
                                                                type="button" 
                                                                form="form__planaccion"
                                                                class="button button__primary button__blue w100"
                                                                onclick="validate__planaccion_Form(form__planaccion, <?php echo $crud ?>)"
                                                            > 
                                                                <svg class="ico ico__discoduro w"></svg>
                                                                
                                                                <span>
                                                                    <?php if($crud == 1): ?>
                                                                        Guardar
                                                                    <?php elseif($crud == 3):?>
                                                                        Actualizar
                                                                    <?php endif; ?> 

                                                                </span>                                                           

                                                            </button>
                                                            
                                                        </li>
                                                
                                                    <?php endif; ?> 

                                                    <!-- MODIFICAR -->
                                                    <?php if($crud == 2 && $auth) :?>

                                                        <li class="toolbar__item">   

                                                            <form 
                                                                method="POST" 
                                                                action="" 
                                                                id=""
                                                            >

                                                                <input type="hidden" name="id" value="<?php echo $pa->id; ?>">

                                                                <button 
                                                                    type="button" 
                                                                    class="button button__primary button__yellow w100"
                                                                    onclick="location.href='/planificacion/planificacion-cambios/update?id=<?php echo $pa->id; ?>'"
                                                                > 
                                                                    <svg class="ico ico__lapicero w"></svg>
                                                                    <span>Modificar plan de acción</span>
                                                                </button>                                                                                                                 

                                                            </form>

                                                        </li>

                                                    <?php endif; ?> 

                                                    <!-- ELIMINAR -->
                                                    <?php if($crud == 2 && $auth) :?>

                                                        <li class="toolbar__item">   

                                                            <form 
                                                                method="POST" 
                                                                action="/planificacion/planificacion-cambios/delete?id=<?php echo $pa->id; ?>'" 
                                                                id="formEliminarPlanAccion"
                                                            >

                                                                <input type="hidden" name="id" value="<?php echo $pa->id; ?>">

                                                                <button 
                                                                    type="button" 
                                                                    class="button button__primary button__red w100"
                                                                    onclick="notificarEliminar(this.form, '<?php echo $pa->id;?>', '<?php echo $pa->codigo_interno;?>')"
                                                                > 
                                                                    <svg class="ico ico__papelera w"></svg>
                                                                    <span>Eliminar plan de acción</span>
                                                                </button>                                                                                                                 

                                                            </form>

                                                        </li>

                                                    <?php endif; ?> 

                                                </ol>

                                            </nav>

                                        </div>                                  
                                        
                                    </div>

                                </div>

                            </div>

                        </div>
                    
                    </div>

                </div>
                
                <?php if($crud == 2): ?>

                    <div class="tab"> 

                        <div class="block__table">

                            <div class="table__content">

                                <?php if($auth): ?>

                                    <div class="table__button">

                                        <div class="tooltip">

                                            <button 
                                                type="button" 
                                                class="button button__primary button__regular button__green"
                                                onclick="location.href='/planificacion/planificacion-cambios/accion/create?pa=<?php echo($pa->id);?>'"
                                            > 
                                                <svg class="ico ico__anadirmas w"></svg>
                                            </button>
                                            
                                            <span class="tooltiptext">Añadir acción</span>

                                        </div>

                                    </div>      
                                
                                <?php endif; ?>

                            </div>

                            <?php if($pa->acciones && $pa->acciones != ''): ?>
                            
                                <table>  

                                    <thead>
                                        <th>Código</th>
                                        <th class=ocultarColumna>id</th>
                                        <th> Plan de acción </th>
                                        <th style="text-align: center;"> Fecha Inicio </th>
                                        <th style="text-align: center;"> Fecha Fin Previsto </th>
                                        <th style="text-align: center;"> Fecha Fin </th>
                                        <th style="text-align: center;"></th>
                                    </thead>

                                    <tbody>
                                        
                                        <!-- Introducimos la función php para cargar los datos en la tabla -->
                                        <?php foreach ($pa->acciones as $row): ?>
                                            
                                            <tr>
                                                <td onclick="location.href='/planificacion/planificacion-cambios/accion/read?id=<?php echo $row->id; ?>'" style="width: 100px"><?php echo $row->codigo_interno ?> </td> 
                                                <td onclick="location.href='/planificacion/planificacion-cambios/accion/read?id=<?php echo $row->id; ?>'" class=ocultarColumna> <?php echo $row->id ?> </td>
                                                <td onclick="location.href='/planificacion/planificacion-cambios/accion/read?id=<?php echo $row->id; ?>'" style="width: 800px"> <?php echo $row->denominador ?> </td>
                                                <td onclick="location.href='/planificacion/planificacion-cambios/accion/read?id=<?php echo $row->id; ?>'" style="width: 100pxM; text-align: center;"> <?php echo transformarFecha($row->fechaInicio); ?> </td>
                                                <td onclick="location.href='/planificacion/planificacion-cambios/accion/read?id=<?php echo $row->id; ?>'" style="width: 100px; text-align: center;"> <?php echo transformarFecha($row->fechaFinPrevisto); ?> </td>
                                                <td onclick="location.href='/planificacion/planificacion-cambios/accion/read?id=<?php echo $row->id; ?>'" style="width: 100px; text-align: center;"> <?php echo transformarFecha($row->fechaFin); ?> </td>

                                                <!-- Ahora se generan dinámicamente los botones -->
                                                <td onclick="location.href='/planificacion/planificacion-cambios/accion/read?id=<?php echo $row->id; ?>'" style="width: 150px; text-align: center;">

                                                    <div class="btn-group">

                                                        <form 
                                                            method="POST" 
                                                            action="/planificacion/planificacion-cambios/accion/delete?id=<?php echo $row->id; ?>" 
                                                            id="form_pm"
                                                        >
                                                            
                                                            <input type="hidden" name="id" value="<?php echo $row->id; ?>">

                                                            <div class="tooltip">

                                                                <button 
                                                                    type="button" 
                                                                    class="button button__primary button__small button__blue"
                                                                    onclick="location.href='/planificacion/planificacion-cambios/accion/read?id=<?php echo $row->id; ?>'"
                                                                > 
                                                                    <svg class="ico ico__ojo w"></svg>
                                                                    
                                                                </button>
                                                                
                                                                <span class="tooltiptext">Ver acción</span>

                                                            </div>

                                                        <?php if($auth): ?>

                                                            <div class="tooltip">

                                                                <button 
                                                                    type="button" 
                                                                    class="button button__primary button__small button__yellow"
                                                                    onclick="location.href='/planificacion/planificacion-cambios/accion/update?id=<?php echo $row->id; ?>'"
                                                                > 
                                                                    <svg class="ico ico__lapicero w"></svg>

                                                                </button>
                                                                
                                                                <span class="tooltiptext">Modificar acción </span>

                                                            </div>

                                                            <div class="tooltip">

                                                                <button 
                                                                    type="button" 
                                                                    class="button button__primary button__small button__red"
                                                                    onclick="notificarEliminar(this.form, '<?php echo $row->id;?>', '<?php echo $row->codigo_interno;?>')"
                                                                > 
                                                                    <svg class="ico ico__papelera w"></svg>
                                                                    
                                                                </button>
                                                                
                                                                <span class="tooltiptext">Eliminar acción</span>

                                                            </div>
                                                            
                                                            <?php endif; ?>

                                                        </form>
                                                        
                                                    </div>

                                                </td>

                                            </tr>

                                        <?php  endforeach; ?>

                                    </tbody>

                                </table>
                            
                            <?php else: ?>     
                                <p> Por el momento, no se ha definido ninguna acción. </p>
                            <?php endif; ?>   
                        
                        </div>

                    </div>

                    <div class="tab" id="Tab__log"></div> <!-- Log -->
                    <div class="tab" id="Tab__relations"></div> <!-- Relaciones -->
                    <div class="tab" id="Tab__adjunct"> </div> <!-- Adjuntos -->

                <?php endif; ?> 

            </div>
        <!-- #endregion -->             

    </article>               

<!-- #endregion -->

</main>

<!-- #region Script JS  -->

    <script type="text/javascript">

        function validate__planaccion_Form(form, crud) {

            if (document.getElementById('codigo_interno').value.length == 0) {
                showSnackbar('¡Falta el codigo!','ico__alerta w','red');
                return false;
            }
            if (document.getElementById('denominador').value.length == 0) {
                showSnackbar('¡Falta el denominador!','ico__alerta w','red');
                return false;
            }
            if (document.getElementById('responsable').value.length == 0) {
                showSnackbar('¡Falta el responsable!','ico__alerta w','red');
                return false;
            }
            if (document.getElementById('estado').value.length == 0) {
                showSnackbar('¡Falta el estado!','ico__alerta w','red');
                return false;
            }

            switch(document.querySelector("#estado").selectedIndex){

                case 2:

                    if (document.getElementById('fechaInicio').value.length == 0) {
                        showSnackbar('¡Falta la fecha de inicio!','ico__alerta w','red');
                        return false;
                    }

                    if (document.getElementById('fechaFinPrevisto').value.length == 0) {
                        showSnackbar('¡Falta la fecha de fin previsto!','ico__alerta w','red');
                        return false;
                    }

                break;

                case 3:

                    if (document.getElementById('fechaInicio').value.length == 0) {
                        showSnackbar('¡Falta la fecha de inicio!','ico__alerta w','red');
                        return false;
                    }

                    if (document.getElementById('fechaFinPrevisto').value.length == 0) {
                        showSnackbar('¡Falta la fecha de fin previsto!','ico__alerta w','red');
                        return false;
                    }

                    if (document.getElementById('fechaFin').value.length == 0) {
                        showSnackbar('¡Falta la fecha de fin del plan de acción!','ico__alerta w','red');
                        return false;
                    }

                break;
            }

            //Seleccionamos la acción dependiendo del CRUD

                switch(crud){
                    case 1:
                        notificarCrear(form__planaccion);
                    break;

                    case 3:
                        notificarActualizar(form__planaccion);
                    break;
                }

        }

        function notificarCrear(form){

            Dialog.open({
                title: 'CREAR PLAN DE ACCIÓN',
                message: 'Va a crear un nuevo plan de acción ¿Desea continuar?',
                color: 'blue',
                ico: 'ico__rutarecorrido d',
                okText: '¡Adelante, créalo!',
                cancelText: 'Mmm no, mejor no',
                onok: () => { form.submit(); }                

            })
        }  
        
        function notificarActualizar(form){

            Dialog.open({
                title: 'ACTUALIZAR PLAN DE ACCIÓN',
                message: 'Va a actualizar un nuevo plan de acción ¿Desea continuar?',
                color: 'blue',
                ico: 'ico__rutarecorrido d',
                okText: '¡Los cambios siempre son buenos!',
                cancelText: 'Si algo funciona, ¿Por qué cambiarlo?',
                onok: () => { form.submit(); }                

            })
        }            

        function notificarEliminar(form, id, codigo){

            Dialog.open({
                title: 'Eliminar plan de acción ' + codigo,
                message: '¿Desea eliminar el plan de acción ' + codigo + '? (esta acción es irreversible).',
                color: 'red',
                ico: 'ico__papelera d',
                okText: 'Adelante, bórralo',
                cancelText: 'Nooooooooooooo',
                onok: () => { 
                    showSnackbar('Registro eliminado correctamente', 'ico__papelera w', 'red');
                    form.submit(),'_self'; 
                }                

            })
        }

        const estado = document.querySelector("#estado");

        const control_fechaInicio = document.querySelector("#control_fechaInicio");
        const fechaInicio = document.querySelector("#fechaInicio");

        const control_fechaFinPrevisto = document.querySelector("#control_fechaFinPrevisto");
        const fechaFinPrevisto = document.querySelector("#fechaFinPrevisto");

        const control_fechaFinReal = document.querySelector("#control_fechaFinReal");
        const fechaFin = document.querySelector("#fechaFin");

        const opcionCambiada = () => {   

            if(estado.selectedIndex >= 3){

                control_fechaInicio.classList.remove("hidden");
                fechaInicio.type = "date";

                control_fechaFinPrevisto.classList.remove("hidden");
                fechaFinPrevisto.type = "date";

                control_fechaFinReal.classList.remove("hidden");
                fechaFin.type = "date";

            } else if(estado.selectedIndex >= 2){

                control_fechaInicio.classList.remove("hidden");
                fechaInicio.type = "date";

                control_fechaFinPrevisto.classList.remove("hidden");
                fechaFinPrevisto.type = "date";

                control_fechaFinReal.classList.add("hidden");
                fechaFin.type = "hidden";

            } else if(estado.selectedIndex <= 1){

                control_fechaInicio.classList.add("hidden");
                fechaInicio.type = "hidden";
                fechaInicio.value = "";

                control_fechaFinPrevisto.classList.add("hidden");
                fechaFinPrevisto.type = "hidden";

                control_fechaFinReal.classList.add("hidden");
                fechaFin.type = "hidden";

            };

        }

        estado.addEventListener("change", opcionCambiada);


    </script>

<!-- #endregion -->