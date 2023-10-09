<head>

    <!-- Título -->
        
        <title> 

            <?php if($crud == 1): ?>

                    Nuevo Análisis de Contexto | <?php echo $_SESSION["nombreApp"]; ?>     

            <?php else: 

                echo "$proceso->codigo_interno" ?> | <?php echo $_SESSION["nombreApp"]; ?>  

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
            <li class="breadcrumb__item"> <a href="/contexto"> Contexto </a> </li>
            <li class="breadcrumb__item"> <span> / </span> </li>               
            <li class="breadcrumb__item"> <a href="/contexto/procesos"> Procesos </a> </li>
            <li class="breadcrumb__item"> <span> / </span> </li>     
            
            <?php if($crud == 1):?>
                <li class="breadcrumb__item actual"> <a href="/contexto/procesos/create"> Nuevo Proceso </a> </li>     
            <?php else:?>
                <li class="breadcrumb__item actual"> <a href="/contexto/procesos/read?id=<?php echo $proceso->id ?>"> Proceso <?php echo $proceso->codigo_interno ?> </a> </li>
            <?php endif;?>

        </ol>

    </nav>

<!-- #endregion -->

<!-- #region Artículo -->

    <article>

        <header class="entry-header">
            <h1>

                <svg class="ico ico__intranet b"></svg>

                    <?php 

                        switch ($crud){

                            case 1: //Create ?>
                                <span>Nuevo Proceso</span> 
                                
                                <?php break;

                            case 2: //Read ?>

                                <span>Proceso</span>                            
                                                                    
                                <?php break;

                            case 3: //Read ?>

                                <span>Proceso</span>
                                                                                            
                                <?php break;

                        }
                    
                    ?>

            </h1>
        </header>

        <!-- #region tabs -->

            <div class="tab__container">
                    
                <div class="tab__header">

                    <div class="active"> <svg class="ico ico__documento d"></svg> Metadatos </div>
                    <div id="tab__header__log"> <svg class="ico ico__tiempo d"></svg> Log </div>
                    <div id="tab__header__relations"> <svg class="ico ico__conexiones d"></svg> Relaciones </div>
                    <div id="tab__header__adjunct"> <svg class="ico ico__adjuntar d"></svg> Adjuntos </div>

                </div>
                
                <div class="tab__body">

                    <div class="tab active">

                        <div class="entry-content">

                            <div class="block">

                                <div class="block__content form">

                                    <div class="form__two">

                                        <div class="form__left">

                                            <h2>
                                                <svg class="ico ico__documento b"></svg>
                                                <span>Metadatos</span>
                                            </h2>

                                            <div class="form__leftContent">

                                                <form 
                                                    id="form__procesos"
                                                    class="form"
                                                    method="POST" 

                                                    <?php switch ($crud){

                                                        case 1: ?>
                                                            action="/contexto/procesos/create" 
                                                        <?php break;

                                                        case 3: ?>
                                                            action="/contexto/procesos/update?id=<?php echo $proceso->id?>" 
                                                        <?php break;
                                                    };?>
                                                >
                                                    <!-- ID -->
                                                    <input 
                                                        type="hidden"
                                                        name="id"
                                                        id="id"
                                                        value="<?php echo $proceso->id ?>" 
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
                                                                        value=""
                                                                        autofocus='autofocus'
                                                                        required='required'

                                                                    <?php break;

                                                                    case ($crud == 2 || $crud == 3): ?>

                                                                        value="<?php echo s($proceso->codigo_interno); ?>"
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
                                                                value="<?php echo s($proceso->denominador); ?>"
                                                                
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

                                                    <!-- JURÍDICA -->
                                                    <div class="control select w100"> 

                                                        <svg class="ico ico__edificio b"></svg>

                                                        <div class="textbox">

                                                            <select 
                                                                name="juridica" 
                                                                id="juridica" 
                                                                class="valid"
                                                                value="<?php echo s($proceso->juridica); ?>"
                                                                
                                                                <?php if($crud == 1): ?>
                                                                    required='required'
                                                                <?php endif; ?>

                                                                <?php if($crud == 2): ?>
                                                                    disabled
                                                                <?php endif; ?>
                                                            
                                                            >
                                                            
                                                            <option selected value=""> Seleccione la jurídica </option>    
                                                            <option <?php echo 'TdE' === s($proceso->juridica) ? 'selected' : '' ?>  value="TdE"> Telefónica de España (TdE) </option>
                                                            <option <?php echo 'TSOL' === s($proceso->juridica) ? 'selected' : '' ?> value="TSOL"> Telefónica Soluciones (TSOL) </option>
                                                            <option <?php echo 'DyS' === s($proceso->juridica) ? 'selected' : '' ?>  value="DyS"> Área de Defensa y Seguridad (DyS) </option>

                                                            </select>

                                                            <label class="label">
                                                                <span class="label__text">Jurídica</span>
                                                            </label> 

                                                        </div>                                        

                                                    </div>

                                                    <?php if($crud == 1 || $crud == 3): ?>

                                                        <!-- ENLACE -->
                                                        <div class="control text w100"> 

                                                            <div class="textbox">

                                                                <input 
                                                                    name="href" 
                                                                    id="href"
                                                                    autocomplete='off'
                                                                    value="<?php echo s($proceso->href); ?>"
                                                                >

                                                                <label class="label">
                                                                    <span class="label__text">Enlace</span>
                                                                </label> 

                                                            </div>                                        

                                                        </div>

                                                    <?php endif; ?>

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
                                                            ><?php if($crud == 2 || $crud == 3):echo s($proceso->comentarios);endif;?></textarea>

                                                            <label class="label">
                                                                <span class="label__text">Comentarios</span>
                                                            </label> 

                                                        </div>                                        

                                                    </div>

                                                </form>

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
                                                                        form="form__procesos"
                                                                        class="button button__primary button__blue w100"
                                                                        onclick="validateFormProcesos(form__procesos, <?php echo $crud ?>)"
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

                                                        <!-- Específico: Ver Proceso -->

                                                            <?php if($crud == 2): ?>     

                                                                <li class="toolbar__item"> 

                                                                    <button 
                                                                        type="button" 
                                                                        class="button button__primary button__green w100"
                                                                        onclick="window.open('<?php echo $proceso->href?>'), '_blank'"
                                                                    > 
                                                                        <svg class="ico ico__intranet w"></svg>
                                                                        <span>Ver en web de procesos</span>
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

                                                                    <input type="hidden" name="id" value="<?php echo $proceso->id; ?>">

                                                                    <button 
                                                                        type="button" 
                                                                        class="button button__primary button__yellow w100"
                                                                        onclick="location.href='/contexto/procesos/update?id=<?php echo $proceso->id; ?>'"
                                                                    > 
                                                                        <svg class="ico ico__lapicero w"></svg>
                                                                        <span>Modificar proceso</span>
                                                                    </button>                                                                                                                 

                                                                </form>

                                                            </li>

                                                            <?php endif; ?> 

                                                        <!-- ELIMINAR -->
                                                            <?php if($crud == 2 && $auth) :?>

                                                            <li class="toolbar__item">   

                                                            <form 
                                                                method="POST" 
                                                                action="/contexto/procesos/delete" 
                                                                id="form__deleteProceso"
                                                            >

                                                                <input type="hidden" name="id" value="<?php echo $proceso->id; ?>">

                                                                <button 
                                                                    type="button" 
                                                                    class="button button__primary button__red w100"
                                                                    onclick="notificarEliminar(this.form, '<?php echo $proceso->id;?>', '<?php echo $proceso->codigo_interno;?>')"
                                                                > 
                                                                    <svg class="ico ico__papelera w"></svg>
                                                                    <span>Eliminar proceso</span>
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

                    <div class="tab" id="Tab__log"></div>
                    <div class="tab" id="Tab__relations"></div>
                    <div class="tab" id="Tab__adjunct"> </div>

                </div>

            </div>
                    
        <!-- #endregion -->       

    </article>               

<!-- #endregion -->

</main>

<!-- #region Script JS  -->

    <script type="text/javascript">

        function validateFormProcesos(form, crud) {

            if (document.getElementById('codigo_interno').value.length == 0) {
                showSnackbar('¡Falta el código!','ico__alerta w','red');
                return false;
            }
            if (document.getElementById('denominador').value.length == 0) {
                showSnackbar('¡Falta el denominador!','ico__alerta w','red');
                return false;
            }
            if (document.getElementById('juridica').value.length == 0) {
                showSnackbar('¡Falta la jurídica!','ico__alerta w','red');
                return false;
            }

            //Seleccionamos la acción dependiendo del CRUD

            switch(crud){

                case 1:
                    notificarCrear(form);
                break;

                case 3:
                    notificarActualizar(form);
                break;
            }

        }

        function eliminarRestricciones(){

            //hay que eliminar la propiedad disabled de los input para que puedan ser pasados por submit
                document.getElementById('codigo_interno').disabled = false;
                document.getElementById('denominador').disabled = false;
                document.getElementById('juridica').disabled = false;
                document.getElementById('href').disabled = false;
                document.getElementById('comentarios').disabled = false;
        }

        function notificarCrear(form){

            Dialog.open({
                title: 'Nuevo proceso',
                message: 'Va a crear el proceso ' + document.getElementById('codigo_interno').value + '" ¿Desea continuar?',
                color: 'blue',
                ico: 'ico__intranet d',
                okText: 'Sí',
                cancelText: 'No',
                onok: () => { 
                    eliminarRestricciones();
                    form.submit(); 
                }                

            })
        }    

        function notificarActualizar(form){

            Dialog.open({
                title: 'Actualizar proceso',
                message: 'Va a actualizar el proceso ' + document.getElementById('denominador').value + '" ¿Desea continuar?',
                color: 'blue',
                ico: 'ico__intranet d',
                okText: 'Sí',
                cancelText: 'No',
                onok: () => { 
                    eliminarRestricciones();
                    form.submit(); 
                }                

            })
        }    

        function notificarEliminar(form, id, codigo){

            Dialog.open({
                title: 'Eliminar proceso ' + codigo,
                message: '¿Desea eliminar el proceso ' + codigo + '? (esta acción es irreversible).',
                color: 'red',
                ico: 'ico__papelera d',
                okText: 'Adelante, bórralo',
                cancelText: 'Nooooooooooooo',
                onok: () => { 
                    showSnackbar('Proceso eliminado correctamente', 'ico__papelera w', 'red');
                    form.submit(),'_self'; 
                }                

            })
        }

</script>

<!-- #endregion -->