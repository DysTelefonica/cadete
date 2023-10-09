<head>

    <!-- Título -->
        
        <title> 

            <?php if($crud == 1): ?>

                    Nuevo Comunicado | " <?php echo $_SESSION["nombreApp"]; ?>" ?>     

            <?php else: 

                echo "$com->codigo_interno" ?> | <?php echo $_SESSION["nombreApp"]; ?>  

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
            <li class="breadcrumb__item"> <a href="/apoyo"> Apoyo </a> </li>
            <li class="breadcrumb__item"> <span> / </span> </li>               
            <li class="breadcrumb__item"> <a href="/apoyo/comunicados"> Comunicados </a> </li>
            <li class="breadcrumb__item"> <span> / </span> </li>     
            
            <?php if($crud == 1):?>
                <li class="breadcrumb__item actual"> <a href="/apoyo/comunicados/create"> Nuevo Comunicado </a> </li>     
            <?php else:?>
                <li class="breadcrumb__item actual"> <a href="/apoyo/comunicados/read?id=<?php echo $com->id ?>"> Comunicado <?php echo $com->codigo_interno ?> </a> </li>
            <?php endif;?>

        </ol>

    </nav>

<!-- #endregion -->

<!-- #region Artículo -->

    <article>

        <header class="entry-header">
            <h1>
                <svg class="ico ico__noticias  b"></svg>

                    <?php 

                        switch ($crud){

                            case 1: //Create ?>
                                <span>Nuevo Comunicado</span> 
                                
                                <?php break;

                            case 2: //Read ?>

                                <span>Comunicado <?php echo $com->codigo_interno; ?></span>                            
                                                                    
                                <?php break;

                            case 3: //Read ?>

                                <span>Actualizar Comunicado <?php echo $com->codigo_interno; ?></span>
                                                                                            
                                <?php break;

                        }
                    
                    ?>

            </h1>
        </header>

        <!-- #region tabs -->

        <div class="tab__container">
                    
            <div class="tab__header n_tabs_4">

                <div class="active"> <svg class="ico ico__documento d"></svg> Metadatos </div>
                <div> <svg class="ico ico__documento d"></svg> Codigo fuente </div>

                <?php if($crud == 2): ?>

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
                                                    id="form__comunicado" 
                                                    method='POST'
                                                
                                                    <?php switch ($crud){

                                                        case 1: ?>
                                                            action="/apoyo/comunicados/create"
                                                        <?php break;

                                                        case 3: ?>
                                                            action="/apoyo/comunicados/update?id=<?php echo $com->id; ?>"
                                                        <?php break;}?>>

                                                    <!-- ID -->

                                                    <input 
                                                        type="hidden"
                                                        name="id"
                                                        id="id"
                                                        value=<?php echo $com->id; ?>
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

                                                                        value="<?php echo s($com->codigo_interno); ?>"
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
                                                                value="<?php echo s($com->denominador); ?>"
                                                                
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

                                                    <!-- AUTOR --> 
                                                    <a href="/apoyo/recursos/personal/read?id=<?php echo($autor->id);?>">

                                                        <div class="control select w100" style="cursor: pointer"> 
                                             
                                                            <img src=<?php echo $autor->avatar; ?> class="avatar"> 

                                                            <div class="textbox">

                                                                <select 
                                                                    name="autor" 
                                                                    id="autor" 
                                                                    class="valid link"
                                                                    value="<?php echo s($com->autor); ?>"
                                                                    style="cursor: pointer"
                                                                    
                                                                    <?php if($crud == 1): ?>
                                                                        required='required'
                                                                    <?php endif; ?>

                                                                    <?php if($crud == 2): ?>
                                                                        disabled
                                                                    <?php endif; ?>
                                                                
                                                                >
                                                                
                                                                    <option selected value=""> Seleccione el autor del Comunicado </option>    
                                                                    
                                                                    <?php foreach($autores as $r) { ?>
                                                                    
                                                                        <option <?php echo s($r->id) === s($com->autor) ? 'selected' : '' ?> value="<?php echo s($r->id);?>"> <?php echo s($r->nombre . " " . $r->primer_apellido . " " . $r->segundo_apellido); ?> </option>

                                                                    <?php } ?>

                                                                </select>

                                                                <label class="label">
                                                                    <span class="label__text">Autor</span>
                                                                </label> 

                                                            </div>    

                                                        </div>
                                                    </a>

                                                    <!-- COPETE -->
                                                    <div class="control textarea w100"> 

                                                        <svg class="ico ico__chat b"></svg>

                                                        <div class="textbox">

                                                            <textarea 
                                                                name="copete" 
                                                                id="copete" 
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
                                                            ><?php if($crud == 2 || $crud == 3):echo s($com->copete);endif;?></textarea>

                                                            <label class="label">
                                                                <span class="label__text">Copete</span>
                                                            </label> 

                                                        </div>                                         

                                                    </div>

                                                    <!-- TIPO -->
                                                    <div class="control select w100"> 

                                                        <svg class="ico ico__proceso b"></svg>

                                                        <div class="textbox <?php if(isset($com->indicador)):echo s('PA_E'. $com->indicador); endif; ?>">

                                                            <select 
                                                                name="tipo" 
                                                                id="tipo" 
                                                                class="valid"
                                                                value="<?php echo s($com->tipo); ?>"
                                                                
                                                                <?php if($crud == 1): ?>
                                                                    required='required'
                                                                <?php endif; ?>

                                                                <?php if($crud == 2): ?>
                                                                    disabled
                                                                <?php endif; ?>
                                                            
                                                            >
                                                            
                                                                <option selected value=""> Seleccione el tipo de Comunicado </option>    

                                                                <?php foreach($tipos as $t) { ?>
                                                                    
                                                                    <option <?php echo s($t->tipo) === s($com->tipo) ? 'selected' : '' ?> value="<?php echo s($t->id);?>"> <?php echo s($t->tipo); ?> </option>

                                                                <?php } ?>

                                                            </select>

                                                            <label class="label">
                                                                <span class="label__text">tipo</span>
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
                                                            ><?php if($crud == 2 || $crud == 3):echo s($com->comentarios);endif;?></textarea>

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

                                                    <!-- FECHA -->
                                                    <?php switch ($crud) {

                                                        case 1: ?>

                                                            <div class="control date w100"> 

                                                                <svg class="ico ico__calendario b"></svg>

                                                                <div class="textbox">

                                                                    <input 
                                                                        type="date" 
                                                                        name="fecha" 
                                                                        id="fecha"  
                                                                        form="form__comunicado" 
                                                                        class="valid"
                                                                        value="<?php echo s(date("Y-m-d")); ?>"
                                                                    >

                                                                    <label class="label">
                                                                        <span class="label__text">Fecha</span>
                                                                    </label> 

                                                                    <svg class="ico ico__calendario b"></svg>

                                                                </div>                                        

                                                            </div>

                                                        <?php break; ?>

                                                        <?php case 2: ?>

                                                            <?php if(isset($com->fecha) && $com->fecha != ""): ?>

                                                                <div class="control date w100"> 

                                                                    <svg class="ico ico__calendario b"></svg>

                                                                    <div class="textbox">

                                                                        <input 
                                                                            type="date" 
                                                                            name="fecha" 
                                                                            id="fecha"  
                                                                            form="form__comunicado" 
                                                                            class="valid"
                                                                            readonly
                                                                            value ="<?php echo s($com->fecha); ?>"                                                            
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

                                                            <?php if(isset($com->fecha) && $com->fecha != ""): ?>

                                                                <div class="control date w100"> 

                                                                    <svg class="ico ico__calendario b"></svg>

                                                                    <div class="textbox">

                                                                        <input 
                                                                            type="date" 
                                                                            name="fecha" 
                                                                            id="fecha"  
                                                                            form="form__comunicado" 
                                                                            class="valid"
                                                                            value="<?php echo s($com->fecha); ?>"
                                                                        >

                                                                        <label class="label">
                                                                            <span class="label__text">Fecha</span>
                                                                        </label> 

                                                                        <svg class="ico ico__calendario b"></svg>

                                                                    </div>                                        

                                                                </div>

                                                            <?php endif; ?>

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

                                                 <!-- Específico: Ver comunicado -->

                                                    <?php if($crud == 2): ?>     

                                                        <li class="toolbar__item"> 

                                                            <button 
                                                                type="button" 
                                                                class="button button__primary button__green w100"
                                                                onclick="location.href='<?php echo $com->ruta ?>'"
                                                            > 
                                                                <svg class="ico ico__noticias w"></svg>
                                                                <span>Ver comunicado</span>
                                                            </button>

                                                        </li>

                                                    <?php endif; ?>   

                                                <!-- Específico: Crear carpetas -->
                                                    <?php if($crud == 2 && $auth): ?>     

                                                        <li class="toolbar__item"> 

                                                            <button 
                                                                type="button" 
                                                                class="button button__primary button__green w100"
                                                                onclick="location.href='/apoyo/comunicados/crearDirectorio?id=<?php echo $com->id ?>'"
                                                            > 
                                                                <svg class="ico ico__carpeta w"></svg>
                                                                <span>Crear directorios</span>
                                                            </button>

                                                        </li>

                                                    <?php endif; ?>  

                                                    <!-- Guardar/Actualizar -->
                                                    <?php if($auth && $crud <> 2): ?>                                                    

                                                        <li class="toolbar__item"> 

                                                            <button 
                                                                type="button" 
                                                                form="form__comunicado"
                                                                class="button button__primary button__blue w100"
                                                                onclick="validate__planaccion_Form(form__comunicado, <?php echo $crud ?>)"
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

                                                                <input type="hidden" name="id" value="<?php echo $com->id; ?>">

                                                                <button 
                                                                    type="button" 
                                                                    class="button button__primary button__yellow w100"
                                                                    onclick="location.href='/apoyo/comunicados/update?id=<?php echo $com->id; ?>'"
                                                                > 
                                                                    <svg class="ico ico__lapicero w"></svg>
                                                                    <span>Modificar Comunicado</span>
                                                                </button>                                                                                                                 

                                                            </form>

                                                        </li>

                                                    <?php endif; ?> 

                                                    <!-- ELIMINAR -->
                                                    <?php if($crud == 2 && $auth) :?>

                                                        <li class="toolbar__item">   

                                                            <form 
                                                                method="POST" 
                                                                action="/planificacio/planificacion-cambios/delete" 
                                                                id="formEliminarPlanAccion"
                                                            >

                                                                <input type="hidden" name="id" value="<?php echo $com->id; ?>">

                                                                <button 
                                                                    type="button" 
                                                                    class="button button__primary button__red w100"
                                                                    onclick="notificarEliminar(this.form, '<?php echo $com->id;?>', '<?php echo $com->codigo_interno;?>')"
                                                                > 
                                                                    <svg class="ico ico__papelera w"></svg>
                                                                    <span>Eliminar Comunicado</span>
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

                        <?php

                            if(file_exists($com->codigo_fuente) && $com->codigo_fuente <> ""){

                                $text = file_get_contents($com->codigo_fuente);
                                echo  $text;

                            }else{
                                echo "No se ha encontrado ningún documento.";
                            }

                        ?>

                    </div>

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
            if (document.getElementById('autor').value.length == 0) {
                showSnackbar('¡Falta el autor!','ico__alerta w','red');
                return false;
            }
            if (document.getElementById('tipo').value.length == 0) {
                showSnackbar('¡Falta el tipo!','ico__alerta w','red');
                return false;
            }

            //Seleccionamos la acción dependiendo del CRUD

                switch(crud){
                    case 1:
                        notificarCrear(form__comunicado);
                    break;

                    case 3:
                        notificarActualizar(form__comunicado);
                    break;
                }

        }

        function notificarCrear(form){

            Dialog.open({
                title: 'CREAR Comunicado',
                message: 'Va a crear un nuevo Comunicado ¿Desea continuar?',
                color: 'blue',
                ico: 'ico__noticias  d',
                okText: '¡Adelante, créalo!',
                cancelText: 'Mmm no, mejor no',
                onok: () => { form.submit(); }                

            })
        }  
        
        function notificarActualizar(form){

            Dialog.open({
                title: 'ACTUALIZAR Comunicado',
                message: 'Va a actualizar un nuevo Comunicado ¿Desea continuar?',
                color: 'blue',
                ico: 'ico__noticias  d',
                okText: '¡Los cambios siempre son buenos!',
                cancelText: 'Si algo funciona, ¿Por qué cambiarlo?',
                onok: () => { form.submit(); }                

            })
        }            

        function notificarEliminar(form, id, codigo){

            Dialog.open({
                title: 'Eliminar Comunicado ' + codigo,
                message: '¿Desea eliminar el Comunicado ' + codigo + '? (esta acción es irreversible).',
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

        var tipo = $("#tipo").val();

        $("#tipo").change(function(){

            if($("#tipo").val() != tipo) {

                $(".PA_E"+tipo, document)
                                        .addClass("PA_E"+$("#tipo").val())
                                        .removeClass("PA_E"+tipo);
                
                tipo = $("#tipo").val();
                console.log(tipo);
            }

        })


    </script>

<!-- #endregion -->