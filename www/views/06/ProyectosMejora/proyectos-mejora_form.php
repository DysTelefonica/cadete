<head>

    <!-- Título -->
        
        <title> 

            <?php if($crud == 1): ?>

                   Nuevo Proyecto de mejora | <? echo $_SESSION["nombreApp"]; ?>     

            <?php else: 
                 echo "Proyecto de mejora "; echo "$proyectoMejora->codigo_interno"; ?>  | <?php echo $_SESSION["nombreApp"]; ?>  

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
            <li class="breadcrumb__item"> <a href="/planificacion/proyectos-mejora"> Proyectos de mejora </a> </li>
            <li class="breadcrumb__item"> <span> / </span> </li>     
            
            <?php if($crud == 1):?>
                <li class="breadcrumb__item actual"> <a href="/planificacion/proyectos-mejora/create"> Nuevo Proyecto de mejora </a> </li>     
            <?php else:?>
                <li class="breadcrumb__item actual"> <a href="/planificacion/proyectos-mejora/read?id=<?php echo $proyectoMejora->id ?>"> <?php echo $proyectoMejora->denominador ?> </a> </li>
            <?php endif;?>


        </ol>

    </nav>

<!-- #endregion -->

<!-- #region Artículo -->

    <article>

        <header class="entry-header">

            <h1>
                <svg class="ico ico__copa b"></svg>

                    <?php 

                        switch ($crud){

                            case 1: //Create ?>
                                <span>Nuevo Proyecto de mejora</span> 
                                
                                <?php break;

                            case 2: //Read ?>

                                <span><?php echo $proyectoMejora->denominador; ?></span>                            

                                <?php break;

                            case 3: //Read ?>

                                <span>Actualizar <?php echo($proyectoMejora->denominador); ?></span>
                                                                                            
                                <?php break;

                        }
                    
                    ?>

            </h1>

        </header>

        <!-- #region Tabs -->

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

                    <div class="tab active"> <!-- Metadatos -->
   
                        <div class="entry-content">

                            <div class="block">

                                <div class="block__content form">

                                    <div class="form__two">

                                    <!-- Formulario -->

                                        <div class="form__left">

                                            <h2>
                                                <svg class="ico ico__documento b"></svg>
                                                <span>Metadatos</span>
                                            </h2>

                                            <div class="form__leftContent">

                                                <form 
                                                    class="form"
                                                    id="form__pm" 
                                                    method='POST'
                                                
                                                    <?php switch ($crud){

                                                        case 1: ?>
                                                            action="/planificacion/proyectos-mejora/create"
                                                        <?php break;

                                                        case 3: ?>
                                                            action="/planificacion/proyectos-mejora/update?id=<?php echo $proyectoMejora->id; ?>"
                                                        <?php break;}?>>

                                                    <!-- ID -->
                                                    <input 
                                                        type="hidden"
                                                        name="id"
                                                        id="id"
                                                        value=<?php echo $proyectoMejora->id; ?>
                                                    >

                                                    <input 
                                                        type="hidden"
                                                        name="decision"
                                                        id="decision"
                                                        value=0
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

                                                                        value="<?php echo s($proyectoMejora->codigo_interno); ?>"
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
                                                                value="<?php echo s($proyectoMejora->denominador); ?>"
                                                                
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
                                                            ><?php if($crud == 2 || $crud == 3):echo s($proyectoMejora->origen);endif;?></textarea>

                                                            <label class="label">
                                                                <span class="label__text">Origen</span>
                                                            </label> 

                                                        </div>                                        

                                                    </div>
                                                    
                                                    <!-- ESTADO -->
                                                    <div class="control select w100"> 

                                                        <svg class="ico ico__proceso b"></svg>

                                                        <div class="textbox <?php if(isset($proyectoMejora->indicador)):echo s('PM_E'. $proyectoMejora->indicador); endif; ?>">

                                                            <select 
                                                                name="estado" 
                                                                id="estado" 
                                                                class="valid"
                                                                value="<?php echo s($proyectoMejora->estado); ?>"
                                                                
                                                                <?php if($crud == 1): ?>
                                                                    required='required'
                                                                <?php endif; ?>

                                                                <?php if($crud == 2): ?>
                                                                    disabled
                                                                <?php endif; ?>
                                                            
                                                            >
                                                            
                                                                <option selected value=""> Seleccione el estado del proyecto de mejora </option>    

                                                                <?php foreach($estadosProyectosMejora as $estado) { ?>
                                                                    
                                                                    <option <?php echo s($estado->estado) === s($proyectoMejora->estado) ? 'selected' : '' ?> value="<?php echo s($estado->id);?>"> <?php echo s($estado->estado); ?> </option>

                                                                <?php } ?>

                                                            </select>

                                                            <label class="label">
                                                                <span class="label__text">Estado</span>
                                                            </label> 

                                                        </div>                                        

                                                    </div>

                                                    <!-- FECHA DETECCION-->
                                                    <?php switch ($crud) {

                                                        case 1: ?>

                                                            <input 
                                                                type="hidden" 
                                                                name="fechaDeteccion" 
                                                                id="fechaDeteccion"  
                                                                value=""
                                                            >

                                                        <?php break; ?>

                                                        <?php case 2: ?>

                                                            <?php if(isset($proyectoMejora->fechaDeteccion) && $proyectoMejora->fechaDeteccion != ""): ?>

                                                                <div class="control date w100"> 

                                                                    <svg class="ico ico__calendario b"></svg>

                                                                    <div class="textbox">

                                                                        <input 
                                                                            type="date" 
                                                                            name="fechaDeteccion" 
                                                                            id="fechaDeteccion"  
                                                                            class="valid"
                                                                            readonly
                                                                            value ="<?php echo s($proyectoMejora->fechaDeteccion); ?>"                                                            
                                                                        >

                                                                        <label class="label">
                                                                            <span class="label__text">Fecha de detección</span>
                                                                        </label> 

                                                                        <svg class="ico ico__calendario b"></svg>

                                                                    </div>                                        

                                                                </div>

                                                            <?php endif; ?>

                                                        <?php break; ?>

                                                        <?php case 3: ?>

                                                            <?php if(isset($proyectoMejora->fechaDeteccion) && $proyectoMejora->fechaDeteccion != ""): ?>

                                                                <div class="control date w100"> 

                                                                    <svg class="ico ico__calendario b"></svg>
                                                                    
                                                                    <div class="textbox">

                                                                        <input 
                                                                            type="date" 
                                                                            name="fechaDeteccion" 
                                                                            id="fechaDeteccion"  
                                                                            class="valid"
                                                                            value="<?php echo s($proyectoMejora->fechaDeteccion); ?>"
                                                                        >

                                                                        <label class="label">
                                                                            <span class="label__text">Fecha de detección</span>
                                                                        </label> 

                                                                        <svg class="ico ico__calendario b"></svg>

                                                                    </div>                                        

                                                                </div>

                                                            <?php endif; ?>

                                                        <?php break; ?>
                                                    
                                                    <?php }; ?>

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
                                                            ><?php if($crud == 2 || $crud == 3):echo s($proyectoMejora->comentarios);endif;?></textarea>

                                                            <label class="label">
                                                                <span class="label__text">Comentarios</span>
                                                            </label> 

                                                        </div>                                        

                                                    </div>

                                                </form>

                                            </div>
                                        
                                           

                                        </div>

                                    <!-- Acciones -->
                                        <?php if($auth): ?>

                                            <div class="form__right">

                                                <h2>
                                                    <svg class="ico ico__rayo b"></svg>
                                                    <span>Acciones</span>
                                                </h2>

                                                <div class="form__rightContent">

                                                    <nav class="toolbar">

                                                        <ol class="toolbar__list">

                                                            <?php if($auth && $crud <> 2): ?>  <!-- Guardar/Actualizar -->                                                   

                                                                <li class="toolbar__item"> 

                                                                    <button 
                                                                        type="button" 
                                                                        form="form__pm"
                                                                        class="button button__primary button__blue w100"
                                                                        onclick="validate__ProyectoMejora_Form(form__pm, <?php echo $crud ?>)"
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

                                                            
                                                            <?php if($crud == 2 && $auth) :?> <!-- Modificar -->

                                                                <li class="toolbar__item">   

                                                                    <form 
                                                                        method="POST" 
                                                                        action="" 
                                                                        id=""
                                                                    >

                                                                        <input type="hidden" name="id" value="<?php echo $proyectoMejora->id; ?>">

                                                                        <button 
                                                                            type="button" 
                                                                            class="button button__primary button__yellow w100"
                                                                            onclick="location.href='/planificacion/proyectos-mejora/update?id=<?php echo $proyectoMejora->id; ?>'"
                                                                        > 
                                                                            <svg class="ico ico__lapicero w"></svg>
                                                                            <span>Modificar proyecto de mejora</span>
                                                                        </button>                                                                                                                 

                                                                    </form>

                                                                </li>

                                                            <?php endif; ?> 

                                                            
                                                            <?php if($crud == 2 && $auth) :?>  <!-- Eliminar -->

                                                                <li class="toolbar__item">   

                                                                    <form 
                                                                        method="POST" 
                                                                        action="/planificacion/proyectos-mejora/delete?id=<?php echo $proyectoMejora->id; ?>" 
                                                                        id="form_eliminarpm"
                                                                    >

                                                                        <input type="hidden" name="id" value="<?php echo $proyectoMejora->id; ?>">

                                                                        <button 
                                                                            type="button" 
                                                                            class="button button__primary button__red w100"
                                                                            onclick="notificarEliminar(this.form, '<?php echo $proyectoMejora->id;?>', '<?php echo $proyectoMejora->codigo_interno;?>')"
                                                                        > 
                                                                            <svg class="ico ico__papelera w"></svg>
                                                                            <span>Eliminar proyecto de mejora</span>
                                                                        </button>                                                                                                                 

                                                                    </form>

                                                                </li>

                                                            <?php endif; ?>                                       

                                                        </ol>

                                                    </nav>

                                                </div>                                  
                                                
                                            </div>

                                        <?php endif; ?>

                                    </div>

                                </div>

                            </div>
                        
                        </div>

                    </div>

                    <?php if($crud == 2): ?>
                        
                        <div class="tab" id="Tab__log"></div> <!-- Logs -->

                        <div class="tab" id="Tab__relations"></div> <!-- Relaciones -->

                        <div class="tab" id="Tab__adjunct"> </div> <!-- Adjuntos -->
                    
                    <?php endif; ?> 

                </div>

            </div>
        
        <!-- #endregion -->          

    </article>               

<!-- #endregion -->

</main>

<!-- #region Script JS  -->

    <script type="text/javascript" src="/build/js/fundamentals/formRevisionAnalisisContexto.js"></script>

    <script type="text/javascript">

        function validate__ProyectoMejora_Form(form, crud) {

            if (document.getElementById('denominador').value.length == 0) {
                showSnackbar('¡Falta el denominador!','ico__alerta w','red');
                return false;
            }
            if (document.getElementById('estado').value.length == 0) {
                showSnackbar('¡Falta el estado!','ico__alerta w','red');
                return false;
            }


            //Seleccionamos la acción dependiendo del CRUD

                switch(crud){
                    case 1:
                        notificarCrear(form__pm);
                    break;

                    case 3:
                        notificarActualizar(form__pm);
                    break;
                }

        }

        function notificarCrear(form){

            const estado = document.querySelector("#estado");

            Dialog.open({
                title: 'CREAR PROYECTO DE MEJORA',
                message: 'Va a crear un nuevo proyecto de mejora ¿Desea continuar?',
                color: 'blue',
                ico: 'ico__copa d',
                okText: '¡Adelante, créalo!',
                cancelText: 'Mmm no, mejor no',
                onok: () => { 

                    if(estado.selectedIndex == 3 || estado.selectedIndex == 4){
                        PlanAccion(form);
                    }else{
                        form.submit();   
                    };
                    
                }                

            })
        }  

        function PlanAccion(form){

            Dialog.open({
                title: 'CREAR UN PLAN DE ACCIÓN',
                message: 'Se ha tomado al decisión de ejecutar este Proyecto de Mejora, ¿desea dar de alta un Plan de Acción asociado?',
                color: 'blue',
                ico: 'ico__copa d',
                okText: '¡2x1!',
                cancelText: 'Estas cosas es mejor pensárselas',
                onok: () => { 
                    const decision = form.querySelector("#decision");
                    decision.value = 1;
                    form.submit(); 
                },
                oncancel: () => { 
                    const decision = form.querySelector("#decision");
                    decision.value = 0;
                    form.submit(); 
                }                  

            })
        }  
        
        function notificarActualizar(form){

            const estado = document.querySelector("#estado");

            Dialog.open({
                title: 'ACTUALIZAR PROYECTO DE MEJORA',
                message: 'Va a actualizar el proyecto de mejora ¿Desea continuar?',
                color: 'blue',
                ico: 'ico__copa d',
                okText: '¡Los cambios siempre son buenos!',
                cancelText: 'Si algo funciona, ¿Por qué cambiarlo?',
                onok: () => { 

                    if(estado.selectedIndex == 3 || estado.selectedIndex == 4){
                        PlanAccion(form);
                    }else{
                        form.submit();   
                    };
                    
                }                  

            })
        }   

        function notificarEliminar(form, id, codigo){

            Dialog.open({
                title: 'Eliminar proyecto de mejora' + codigo,
                message: '¿Desea eliminar el proyecto de mejora ' + codigo + '? (esta acción es irreversible).',
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