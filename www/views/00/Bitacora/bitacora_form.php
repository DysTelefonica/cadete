<head>

    <!-- Título -->
        
        <title> 

            <?php 
            
            if($crud == 1):
                echo "Nueva entrada de bitácora | Telefónica DyS";
            else: 
                echo "Entrada de bitácora | Telefónica DyS";
            endif; 
            
            ?>

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
            <li class="breadcrumb__item"> <a href="/bitacora"> Bitácora </a> </li>
            <li class="breadcrumb__item"> <span> / </span> </li>          

            <?php if($crud == 1):?>
                <li class="breadcrumb__item actual"> <a href="/bitacora/create/"> Nueva entrada de bitácora </a> </li>     
            <?php else:?>
                <li class="breadcrumb__item actual"> <a href="/bitacora/read?id=<?php echo $bitaora->id ?>"> Entrada de bitácora </a> </li>
            <?php endif;?>

        </ol>

    </nav>

<!-- #endregion -->

<!-- #region Artículo -->

    <article>

        <header class="entry-header">
            <h1>
                <svg class="ico ico__blog b"></svg>

                    <?php 

                        switch ($crud){

                            case 1: //Create ?>
                                <span>Nueva entrada de bitácora</span> 
                                
                                <?php break;

                            case 2: //Read ?>

                                <span>Entrada de bitácora</span>                            
                                                                    
                                <?php break;

                            case 3: //Read ?>

                                <span>Actualizar entrada de bitácora</span>
                                                                                            
                                <?php break;

                        }
                    
                    ?>

            </h1>
        </header>

        <!-- #region Formulario -->

            <div class="entry-content">

                <div class="block">

                    <div class="block__content form">

                        <div class="form__two">

                        <!-- Formulario -->

                            <div class="form__left">

                                <h2>
                                    <svg class="ico ico__documento b"></svg>
                                    <span>Ficha</span>
                                </h2>

                                <div class="form__leftContent">

                                    <form 
                                        class="form"
                                        id="form__bitacora" 
                                        method='POST'
                                    
                                        <?php switch ($crud){

                                            case 1: ?>
                                                action="/bitacora/create"
                                            <?php break;

                                            case 3: ?>
                                                action="/bitacora/update?id=<?php echo $bitacora->id; ?>"
                                            <?php break;}?>>

                                        <!-- ID -->

                                        <input 
                                            type="hidden"
                                            name="id"
                                            id="id"
                                            value=<?php echo $bitacora->id; ?>
                                        >
                                                                                   
                                        <!-- ENTRADA -->
                                            <div class="control textarea w100"> 

                                                <div class="textbox">

                                                    <textarea 
                                                        name="bitacora" 
                                                        id="bitacora" 
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
                                                    ><?php if($crud == 2 || $crud == 3):echo s($bitacora->bitacora);endif;?></textarea>

                                                    <label class="label">
                                                        <span class="label__text">Entrada de bitácora</span>
                                                    </label> 

                                                </div>                                        

                                            </div>

                                        <!-- ORIGEN -->
                                            <div class="control select w100"> 

                                                <div class="textbox">

                                                    <select 
                                                        name="selector1" 
                                                        id="selector1" 
                                                        class="valid"
                                                        value ="<?php echo s($bitacora->origen); ?>"                                                  

                                                        <?php if($crud == 1): ?>
                                                            required
                                                        <?php endif; ?>

                                                        <?php if($crud == 2): ?>
                                                            disabled
                                                        <?php endif; ?>

                                                    >
                                                    
                                                        <option selected value=""> Seleccione el origen de la entrada </option>    
                                                        <option <?php echo 'Calidad' === s($bitacora->origen) ? 'selected' : '' ?>  value="Calidad"> Calidad </option>
                                                        <option <?php echo 'Proyecto' === s($bitacora->origen) ? 'selected' : '' ?> value="Proyecto"> Proyectos </option>

                                                    </select>

                                                    <label class="label">
                                                        <span class="label__text">Origen</span>
                                                    </label> 

                                                </div>                                        

                                                <div class="helper__text">
                                                    Ej: Calidad
                                                </div>

                                            </div>

                                        <!-- CATEGORÍA -->
                                            <div class="control select w100"> 

                                                <div class="textbox">

                                                    <select 
                                                        name="selector2" 
                                                        id="selector2" 
                                                        class="valid"

                                                        <?php if($crud == 1): ?>
                                                            required
                                                        <?php endif; ?>

                                                        <?php if($crud == 2): ?>
                                                            disabled
                                                        <?php endif; ?>
                                                    >
                                                    
                                                        <option selected value=""> Seleccione la categoría </option>    

                                                        <?php foreach($categorias as $c) { ?>
                                                            
                                                            <option <?php echo s($bitacora->categoria) === s($c->apartado) ? 'selected' : '' ?> value="<?php echo s($c->apartado);?>"> <?php echo s($c->apartado); ?> </option>

                                                        <?php } ?>


                                                    </select>

                                                    <label class="label">
                                                        <span class="label__text">Categoría</span>
                                                    </label> 

                                                </div>                                        
                                                
                                                <div class="helper__text">
                                                    Ej: 07. Apoyo
                                                </div>

                                            </div>

                                        <!-- SUBCATEGORÍA -->
                                            <div class="control select w100"> 

                                                <div class="textbox">

                                                    <select 
                                                        name="selector3" 
                                                        id="selector3" 
                                                        class="valid"

                                                        <?php if($crud == 1): ?>
                                                            required
                                                        <?php endif; ?>

                                                        <?php if($crud == 2): ?>
                                                            disabled
                                                        <?php endif; ?>                        
                                                    >
                                                    
                                                    <option selected value=""> Seleccione la subcategoría </option>    

                                                    <?php foreach($subcategorias as $s) { ?>
                                                        
                                                        <option <?php echo s($bitacora->subcategoria) === s($s->elementoSistema) ? 'selected' : '' ?> value="<?php echo s($s->elementoSistema);?>"> <?php echo s($s->elementoSistema); ?> </option>

                                                    <?php } ?> 

                                                    </select>

                                                    <label class="label">
                                                        <span class="label__text">Subcategoría</span>
                                                    </label> 

                                                </div>                                        

                                                <div class="helper__text">
                                                    Ej: Información documentada
                                                </div>

                                            </div> 

                                        <!-- REFERENCIA -->                                 
                                            <div class="control select w100"> 

                                                <div class="textbox">

                                                    <select 
                                                        name="referencia" 
                                                        id="referencia" 
                                                        class="valid"

                                                        <?php if($crud == 1): ?>
                                                            required
                                                        <?php endif; ?>

                                                        <?php if($crud == 2): ?>
                                                            disabled
                                                        <?php endif; ?>
                                                    >
                                                    
                                                    <option selected value=""> Seleccione la referencia </option>    

                                                    <?php foreach($referencias as $r) { ?>
                                                        
                                                        <option <?php echo s($bitacora->referencia) === s($r->id) ? 'selected' : '' ?> value="<?php echo s($r->id);?>"> 

                                                            <?php 
                                                                echo s("["); 
                                                                echo s($r->codigo_interno); 
                                                                echo s("] "); 
                                                                echo s($r->denominador); 
                                                            ?> 

                                                        </option>

                                                    <?php } ?> 

                                                    </select>

                                                    <label class="label">
                                                        <span class="label__text">Referencia</span>
                                                    </label> 
                                           
                                                </div>      
                                                 
                                                <div class="helper__text">
                                                    Ej: Procedimiento EM-300-PR-001
                                                </div>

                                            </div> 
                                       
                                        <!-- FECHA -->
                                            <?php switch ($crud) {

                                                case 1: ?>

                                                    <input 
                                                        type="hidden" 
                                                        name="fecha" 
                                                        id="fecha"  
                                                        value=""
                                                    >

                                                <?php break; ?>

                                                <?php case 2: ?>

                                                    <?php if(isset($bitacora->fecha) && $bitacora->fecha != ""): ?>

                                                        <div class="control date w100"> 

                                                            <div class="textbox">

                                                                <input 
                                                                    type="date" 
                                                                    name="fecha" 
                                                                    id="fecha"  
                                                                    class="valid"
                                                                    readonly
                                                                    value ="<?php echo s($bitacora->fecha); ?>"                                                            
                                                                >

                                                                <label class="label">
                                                                    <span class="label__text">Fecha de alta</span>
                                                                </label> 

                                                                <svg class="ico ico__calendario b"></svg>

                                                            </div>                                        

                                                        </div>

                                                    <?php endif; ?>

                                                <?php break; ?>

                                                <?php case 3: ?>

                                                    <?php if(isset($bitacora->fecha) && $bitacora->fecha != ""): ?>

                                                        <div class="control date w100"> 

                                                            <div class="textbox">

                                                                <input 
                                                                    type="date" 
                                                                    name="fecha" 
                                                                    id="fecha"  
                                                                    class="valid"
                                                                    value="<?php echo s($bitacora->fecha); ?>"
                                                                >

                                                                <label class="label">
                                                                    <span class="label__text">Fecha de la entrada</span>
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
                        
                        <!-- Acciones -->

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
                                                            form="form__bitacora"
                                                            class="button button__primary button__blue w100"
                                                            onclick="validate__bitacora_Form(form__bitacora, <?php echo $crud ?>)"
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

                                                                <input type="hidden" name="id" value="<?php echo $bitacora->id; ?>">

                                                                <button 
                                                                    type="button" 
                                                                    class="button button__primary button__yellow w100"
                                                                    onclick="location.href='/bitacora/update?id=<?php echo $bitacora->id; ?>'"
                                                                > 
                                                                    <svg class="ico ico__lapicero w"></svg>
                                                                    <span>Modificar entrada de bitácora</span>
                                                                </button>                                                                                                                 

                                                            </form>

                                                        </li>

                                                    <?php endif; ?> 

                                                <!-- ELIMINAR -->
                                                <?php if($crud == 2 && $auth) :?>

                                                    <li class="toolbar__item">   

                                                        <form 
                                                            method="POST" 
                                                            action="/bitacora/delete" 
                                                            id="form_EliminarBitacora"
                                                        >

                                                            <input type="hidden" name="id" value="<?php echo $bitacora->id; ?>">

                                                            <button 
                                                                type="button" 
                                                                class="button button__primary button__red w100"
                                                                onclick="notificarEliminar(this.form, '<?php echo $bitacora->id;?>')"
                                                            > 
                                                                <svg class="ico ico__papelera w"></svg>
                                                                <span>Eliminar entrada de bitácora</span>
                                                            </button>                                                                                                                 

                                                        </form>

                                                    </li>

                                                <?php endif; ?> 

                                                <?php if($crud == 2) :?>

                                                    <li class="toolbar__item"> 

                                                        <button 
                                                            type="button" 
                                                            class="button button__primary button__blue w100"
                                                            onclick="location.href='<? echo $bitacora->rutaIndex; echo $bitacora->referencia?>'"
                                                        > 
                                                            <svg class="ico <? echo $bitacora->ico; ?> w"></svg>
                                                            
                                                            <span> Ver referencia </span>                                                           

                                                    </button>
                                                            
                                                    </li>

                                                <?php endif; ?>                                                  
                                                
                                                <?php if($auth && $crud == 2): ?>

                                                    <div class="toolbar__separator"></div>                                                      

                                                    <!-- AÑADIR ADJUNTO -->
                                                        <div class="newRelation__button">

                                                            <button 
                                                                type="button" 
                                                                class="button button__primary button__regular button__blue w100"
                                                                onclick="showAdjuntos('<?php echo $_GET['id'] ?>')"
                                                            > 
                                                                <svg class="ico ico__adjuntar w"></svg>
                                                                <span>Adjuntar archivo</span>
                                                            </button>

                                                        </div>     

                                                    <!-- AÑADIR RELACIONES -->
                                                    
                                                        <div class="newRelation__button">

                                                            <button 
                                                                type="button" 
                                                                class="button button__primary button__regular button__blue w100"
                                                                onclick="showRelaciones('<?php echo $_GET['id'] ?>')"
                                                            > 
                                                                <svg class="ico ico__conexiones w"></svg>
                                                                <span>Añadir relación</span>
                                                            </button>

                                                        </div>      

                                                <?php endif; ?>

                                        </ol>

                                    </nav>

                                </div>                                  
                                
                            </div>

                        </div>

                    </div>

                </div>
            
            </div>
        
        <!-- #endregion -->             

    </article>               

<!-- #endregion -->

</main>

<!-- #region Script JS  -->

    <script type="text/javascript">

        selector1.addEventListener('change', function(){

            //Almacenamos en una variable el valor del apartado
                var origen = this.value;

            if(origen && origen !=""){
                
                //Limpiamos las variables
                    selector2.value = "";
                    selector2.disabled = true;
                    selector3.value = "";
                    selector3.disabled = true;
                    referencia.value = "";
                    referencia.disabled = true;

                //Definimos la url (definida en index.php) con el método a ejecutar en el controller
                    const Url = "/bitacora/cargarCategorias";

                //Le pasamos los datos para alimentar la funcion del controller
                    const Data = { origen: origen }
                    

                //Creamos el método ajax
                    $.ajax({
                        url: Url,
                        type: "POST",
                        data: Data,
                        cache: false,

                        success: function(r){
                            $(selector2).html(r);
                            selector2.disabled = false;
                        },

                        error:function(e){
                            selector2.disabled = true;
                        }
                    })

            }

        });

        selector2.addEventListener('change', function(){

            //Almacenamos en una variable el valor del apartado
                var categoria = this.value;

            if(categoria && categoria !=""){
                
                //Limpiamos las variables
                    selector3.value = "";
                    selector3.disabled = true;
                    referencia.value = "";
                    referencia.disabled = true;

                //Definimos la url (definida en index.php) con el método a ejecutar en el controller
                    const Url = "/bitacora/cargarSubcategorias";

                //Le pasamos los datos para alimentar la funcion del controller
                    const Data = { categoria: categoria }

                //Creamos el método ajax
                    $.ajax({
                        url: Url,
                        type: "POST",
                        data: Data,
                        cache: false,

                        success: function(r){
                            $(selector3).html(r);
                            selector3.disabled = false;
                        },

                        error:function(e){
                            selector3.disabled = true;
                        }
                    })

            }

        });

        selector3.addEventListener('change', function(){

            //Almacenamos en una variable el valor del apartado
                var subcategoria = this.value;

            if(subcategoria && subcategoria !=""){
                
                //Limpiamos las variables
                    referencia.value = "";
                    referencia.disabled = true;

                //Definimos la url (definida en index.php) con el método a ejecutar en el controller
                    const Url = "/bitacora/cargarElementos";
                //Le pasamos los datos para alimentar la funcion del controller
                    const Data = {
                        subcategoria: subcategoria
                    }

                //Creamos el método ajax
                    $.ajax({
                        url: Url,
                        type: "POST",
                        data: Data,
                        cache: false,

                        success: function(r){
                            $(referencia).html(r);
                            referencia.disabled = false;
                        },

                        error:function(e){
                            referencia.disabled = true;
                        }
                    })

            }

        });

        function validate__bitacora_Form(form, crud) {

            if (document.getElementById('bitacora').value.length == 0) {
                showSnackbar('¡Falta la entrada de bitácora!','ico__alerta w','red');
                return false;
            }
            if (document.getElementById('selector1').value.length == 0) {
                showSnackbar('¡Falta el origen!','ico__alerta w','red');
                return false;
            }
            if (document.getElementById('selector2').value.length == 0) {
                showSnackbar('¡Falta la categoría!','ico__alerta w','red');
                return false;
            }
            if (document.getElementById('selector3').value.length == 0) {
                showSnackbar('¡Falta la subcategoría!','ico__alerta w','red');
                return false;
            }
            if (document.getElementById('referencia').value.length == 0) {
                showSnackbar('¡Falta la referencia!','ico__alerta w','red');
                return false;
            }
            if (document.getElementById('fecha').value.length == 0) {
                showSnackbar('¡Falta la fecha!','ico__alerta w','red');
                return false;
            }

            //Seleccionamos la acción dependiendo del CRUD

                switch(crud){
                    case 1:
                        notificarCrear(form__bitacora);
                    break;

                    case 3:
                        notificarActualizar(form__bitacora);
                    break;
                }

        }

        function notificarCrear(form){

            Dialog.open({
                title: 'NUEVA ENTRADA DE BITÁCORA',
                message: 'Va a crear una entrada en el cuaderno de bitácora ¿Desea continuar?',
                color: 'blue',
                ico: 'ico__blog d',
                okText: 'Querido diario:',
                cancelText: 'Necesito corregir algo...',
                onok: () => { form.submit(); }                

            })
        }  
        
        function notificarActualizar(form){

            Dialog.open({
                title: 'ACTUALIZAR ENTRADA DE BITÁCORA',
                message: 'Va a actualizar una entrada en el cuaderno de bitácora ¿Desea continuar?',
                color: 'blue',
                ico: 'ico__blog d',
                okText: 'Querido diario:',
                cancelText: 'Necesito corregir algo...',
                onok: () => { form.submit(); }                 

            })
        }   
        
        function notificarEliminar(form){

            Dialog.open({
                title: 'ELIMINAR ENTRADA DE BITÁCORA',
                message: '¿Desea eliminar la entrada de bitácora? (esta acción es irreversible).',
                color: 'red',
                ico: 'ico__papelera d',
                okText: 'Borra, BORRA',
                cancelText: 'Déjalo, DÉJALO',
                onok: () => { 
                    showSnackbar('Bitácora eliminada correctamente', 'ico__papelera w', 'red');
                    form.submit(),'_self'; 
                }                

            })
        }

    </script>

<!-- #endregion -->