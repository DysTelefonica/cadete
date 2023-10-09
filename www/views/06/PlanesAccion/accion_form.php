<head>

    <!-- Título -->
        
        <title> 

            <?php if($crud == 1): ?>

                    Nueva Acción | " <?php echo $_SESSION["nombreApp"]; ?>" ?>     

            <?php else: 

                echo "$a->codigo_interno" ?> | <?php echo $_SESSION["nombreApp"]; ?>  

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
            <li class="breadcrumb__item"> <a href="/planificacion/planificacion-cambios/read?id=<?php echo $pa->id ?>"> Plan de acción <?php echo $pa->codigo_interno ?> </a> </li>
            <li class="breadcrumb__item"> <span> / </span> </li>    
            
            <?php if($crud == 1):?>
                <li class="breadcrumb__item actual"> <a href="/planificacion/planificacion-cambios/acccion/create"> Nueva Acción </a> </li>     
            <?php else:?>
                <li class="breadcrumb__item actual"> <a href="/planificacion/planificacion-cambios/accion/read?id=<?php echo $a->id ?>"> Acción <?php echo $a->codigo_interno ?> </a> </li>
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
                                <span>Nueva Acción</span> 
                                
                                <?php break;

                            case 2: //Read ?>

                                <span>Acción "<?php echo $a->denominador; ?>"</span>                            
                                                                    
                                <?php break;

                            case 3: //Read ?>

                                <span>Actualizar Acción "<?php echo $a->denominador; ?>"</span>
                                                                                            
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
                                                    id="form__accion" 
                                                    method='POST'
                                                
                                                    <?php switch ($crud){

                                                        case 1: ?>
                                                            action="/planificacion/planificacion-cambios/accion/create?pa=<?php echo $a->planAccion;?>"
                                                        <?php break;

                                                        case 3: ?>
                                                            action="/planificacion/planificacion-cambios/accion/update?id=<?php echo $a->id; ?>"
                                                        <?php break;}?>>

                                                    <!-- ID -->

                                                    <input 
                                                        type="hidden"
                                                        name="id"
                                                        id="id"
                                                        value=<?php echo $a->id; ?>
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

                                                                        value="<?php echo s($a->codigo_interno); ?>"
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
                                                                value="<?php echo s($a->denominador); ?>"
                                                                
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
                                                                    value="<?php echo s($a->responsable); ?>"
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
                                                                    
                                                                        <option <?php echo s($r->id) === s($a->responsable) ? 'selected' : '' ?> value="<?php echo s($r->id);?>"> <?php echo s($r->nombre . " " . $r->primer_apellido . " " . $r->segundo_apellido); ?> </option>

                                                                    <?php } ?>

                                                                </select>

                                                                <label class="label">
                                                                    <span class="label__text">Responsable</span>
                                                                </label> 

                                                            </div>    

                                                        </div>

                                                    <?php if($crud == 2): ?>
                                                        </a>
                                                    <?php endif; ?>

                                                    <!-- PLAN DE ACCIÓN -->
                                                    <a href="/planificacion/planificacion-cambios/read?id=<?php echo $pa->id; ?>">
                                                        
                                                        <input 
                                                            type="hidden"
                                                            name="contenedor"
                                                            id="contenedor"
                                                            value="<?php echo s($pa->id); ?>"
                                                        >

                                                        <div class="control text w100"> 

                                                            <svg class="ico ico__rutarecorrido b"></svg>

                                                            <div class="textbox">

                                                                <input 
                                                                    type="hidden" 
                                                                    name="planAccion" 
                                                                    id="planAccion" 
                                                                    value="<?php echo s($pa->id); ?>" 
                                                                >

                                                                <input 
                                                                    type="text" 
                                                                    name="planAccion_text" 
                                                                    id="planAccion_text" 
                                                                    
                                                                    <?php switch ($crud){

                                                                        case ($crud == 1): ?>
                                                                            readonly
                                                                            class="valid link"
                                                                            value="<?php echo s($pa->codigo_interno); ?> - <?php echo s($pa->denominador); ?>" 

                                                                        <?php break;

                                                                        case ($crud == 2 || $crud == 3): ?>
                                                                            readonly
                                                                            class="valid link"
                                                                            value="<?php echo s($pa->codigo_interno); ?> - <?php echo s($pa->denominador); ?>"

                                                                        <?php break; } ?>
                                                                >

                                                                <label class="label">
                                                                    <span class="label__text">Plan de Acción</span>
                                                                </label> 

                                                            </div>   
                                                        </div>

                                                    </a>

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
                                                            ><?php if($crud == 2 || $crud == 3):echo s($a->comentarios);endif;?></textarea>

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
                                                                        form="form__accion" 
                                                                        class="valid"
                                                                        
                                                                        value=""
                                                                    >

                                                                    <label class="label">
                                                                        <span class="label__text">Fecha de inicio</span>
                                                                    </label> 

                                                                    <svg class="ico ico__calendario b"></svg>

                                                                </div>                                        

                                                            </div>

                                                        <?php break; ?>

                                                        <?php case 2: ?>

                                                            <?php if(isset($a->fechaInicio) && $a->fechaInicio != ""): ?>

                                                                <div class="control date w100" id="control_fechaInicio"> 

                                                                    <svg class="ico ico__calendario b"></svg>

                                                                    <div class="textbox">

                                                                        <input 
                                                                            type="date" 
                                                                            name="fechaInicio" 
                                                                            id="fechaInicio"  
                                                                            form="form__accion" 
                                                                            class="valid"
                                                                            readonly
                                                                            value ="<?php echo s($a->fechaInicio); ?>"                                                            
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
                                                                        form="form__accion" 
                                                                        class="valid"
                                                                        value="<?php echo s($a->fechaInicio); ?>"
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

                                                            <div class="control date w100" id="control_fechaFinPrevisto"> 

                                                                <svg class="ico ico__calendario b"></svg>

                                                                <div class="textbox">

                                                                    <input
                                                                        type="date" 
                                                                        name="fechaFinPrevisto" 
                                                                        id="fechaFinPrevisto"  
                                                                        form="form__accion" 
                                                                        class="valid"
                                                                        value="<?php echo s($a->fechaFinPrevisto); ?>"
                                                                    >

                                                                    <label class="label">
                                                                        <span class="label__text">Fecha de fin previsto</span>
                                                                    </label> 

                                                                    <svg class="ico ico__calendario b"></svg>

                                                                </div>                                        

                                                            </div>

                                                        <?php break; ?>

                                                        <?php case 2: ?>

                                                            <?php if(isset($a->fechaFinPrevisto) && $a->fechaFinPrevisto != ""): ?>

                                                                <div class="control date w100" id="control_fechaFinPrevisto"> 

                                                                    <svg class="ico ico__calendario b"></svg>

                                                                    <div class="textbox">

                                                                        <input 
                                                                            type="date" 
                                                                            name="fechaFinPrevisto" 
                                                                            id="fechaFinPrevisto" 
                                                                            form="form__accion"  
                                                                            class="valid"
                                                                            readonly
                                                                            value ="<?php echo s($a->fechaFinPrevisto); ?>"                                                            
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
                                                                        form="form__accion" 
                                                                        class="valid"
                                                                        value="<?php echo s($a->fechaFinPrevisto); ?>"
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

                                                            <div class="control date w100" id="control_fechaFin"> 

                                                                <svg class="ico ico__calendario b"></svg>

                                                                <div class="textbox">

                                                                    <input 
                                                                        type="date" 
                                                                        name="fechaFin" 
                                                                        id="fechaFin"  
                                                                        form="form__accion"   
                                                                        class="valid"                                                
                                                                    >

                                                                    <label class="label">
                                                                        <span class="label__text">Fecha de fin</span>
                                                                    </label> 

                                                                    <svg class="ico ico__calendario b"></svg>

                                                                </div>                                        

                                                            </div>

                                                        <?php break; ?>

                                                        <?php case 2: ?>

                                                            <?php if(isset($a->fechaFin) && $a->fechaFin != ""): ?>

                                                                <div class="control date w100" id="control_fechaFinReal"> 

                                                                    <svg class="ico ico__calendario b"></svg>

                                                                    <div class="textbox">

                                                                        <input 
                                                                            type="date" 
                                                                            name="fechaFin" 
                                                                            id="fechaFin"  
                                                                            form="form__accion" 
                                                                            class="valid"
                                                                            readonly
                                                                            value ="<?php echo s($a->fechaFin); ?>"                                                            
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

                                                            <div class="control date w100" id="control_fechaFin"> 

                                                                <svg class="ico ico__calendario b"></svg>

                                                                <div class="textbox">

                                                                    <input 
                                                                        type="date" 
                                                                        name="fechaFin" 
                                                                        id="fechaFin"  
                                                                        form="form__accion" 
                                                                        class="valid"
                                                                        value="<?php echo s($a->fechaFin); ?>"
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
                                                                form="form__accion"
                                                                class="button button__primary button__blue w100"
                                                                onclick="validate__planaccion_Form(form__accion, <?php echo $crud ?>)"
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

                                                                <input type="hidden" name="id" value="<?php echo $a->id; ?>">

                                                                <button 
                                                                    type="button" 
                                                                    class="button button__primary button__yellow w100"
                                                                    onclick="location.href='/planificacion/planificacion-cambios/accion/update?id=<?php echo $a->id; ?>'"
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
                                                                action="/planificacion/planificacion-cambios/accion/delete?id=<?php echo $a->id; ?>'" 
                                                                id="formEliminarPlanAccion"
                                                            >

                                                                <input type="hidden" name="id" value="<?php echo $a->id; ?>">

                                                                <button 
                                                                    type="button" 
                                                                    class="button button__primary button__red w100"
                                                                    onclick="notificarEliminar(this.form, '<?php echo $a->id;?>', '<?php echo $a->codigo_interno;?>')"
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

            //Seleccionamos la acción dependiendo del CRUD

                switch(crud){
                    case 1:
                        notificarCrear(form__accion);
                    break;

                    case 3:
                        notificarActualizar(form__accion);
                    break;
                }

        }

        function notificarCrear(form){

            Dialog.open({
                title: 'CREAR ACCIÓN',
                message: 'Va a crear una nueva acción ¿Desea continuar?',
                color: 'blue',
                ico: 'ico__rutarecorrido d',
                okText: '¡Adelante, créalo!',
                cancelText: 'Mmm no, mejor no',
                onok: () => { form.submit(); }                

            })
        }  
        
        function notificarActualizar(form){

            Dialog.open({
                title: 'ACTUALIZAR ACCIÓN',
                message: 'Va a actualizar una nueva acción ¿Desea continuar?',
                color: 'blue',
                ico: 'ico__rutarecorrido d',
                okText: '¡Los cambios siempre son buenos!',
                cancelText: 'Si algo funciona, ¿Por qué cambiarlo?',
                onok: () => { form.submit(); }                

            })
        }            

        function notificarEliminar(form, id, codigo){

            Dialog.open({
                title: 'Eliminaracción ' + codigo,
                message: '¿Desea eliminar la acción ' + codigo + '? (esto es irreversible).',
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

    </script>

<!-- #endregion -->