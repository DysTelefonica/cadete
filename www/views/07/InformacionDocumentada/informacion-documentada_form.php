<head>

    <!-- Título -->
        
        <title> 

            <?php if($crud == 1): ?>

                    Nuevo Documento | " <?php echo $_SESSION["nombreApp"]; ?>" ?>     

            <?php else: 

                echo "$doc->codigo_interno" ?> | <?php echo $_SESSION["nombreApp"]; ?>  

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
            <li class="breadcrumb__item"> <a href="/apoyo/informacion-documentada"> Información documentada </a> </li>
            <li class="breadcrumb__item"> <span> / </span> </li>     
            
            <?php if($crud == 1):?>
                <li class="breadcrumb__item actual"> <a href="/apoyo/informacion-documentada/create"> Nuevo documento </a> </li>     
            <?php else:?>
                <li class="breadcrumb__item actual"> <a href="/apoyo/informacion-documentada/read?id=<?php echo $doc->edicion->id ?>"> <?php echo $doc->codigo_interno ?> (Ed. <?php echo $doc->edicion->edicion ?>) </a> </li>
            <?php endif;?>

        </ol>

    </nav>

<!-- #endregion -->

<!-- #region Artículo -->

    <article>

        <header class="entry-header">
            <h1>
                <svg class="ico ico__documento  b"></svg>

                    <?php 

                        switch ($crud){

                            case 1: //Create ?>
                                <span>Nuevo Documento</span> 
                                
                                <?php break;

                            case 2: //Read ?>

                                <span><?php echo $doc->edicion->denominador; ?></span>                            
                                                                    
                                <?php break;

                            case 3: //Read ?>

                                <span>Actualizar "<?php echo $doc->denominador; ?>"</span>
                                                                                            
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

                    <div><svg class="ico ico__basededatos d"></svg> Ediciones</div>
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
                                                    id="form__informacion_documentada" 
                                                    method='POST'
                                                
                                                    <?php switch ($crud){

                                                        case 1: ?>
                                                            action="/apoyo/informacion-documentada/create"
                                                        <?php break;

                                                        case 3: ?>
                                                            action="/apoyo/informacion-documentada/update?id=<?php echo $doc->id; ?>"
                                                        <?php break;}?>>

                                                    <!-- ID -->
                                                    <input 
                                                        type="hidden"
                                                        name="id"
                                                        id="id"
                                                        value=<?php echo $doc->id; ?>
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

                                                                        value="<?php echo s($doc->codigo_interno); ?>"
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
                                                                value="<?php echo s($doc->edicion->denominador); ?>"
                                                                
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

                                                    <!-- ÁREA -->
                                                    <div class="control text w100"> 
                                                    
                                                        <svg class="ico ico__chat b"></svg>

                                                        <div class="textbox">

                                                            <input 
                                                                name="area" 
                                                                id="area"
                                                                autocomplete='off'
                                                                value="<?php echo s($doc->area); ?>"
                                                                
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
                                                                <span class="label__text">Área</span>
                                                            </label> 

                                                        </div>                                          

                                                    </div>

                                                    <!-- REPOSITORIO -->
                                                    <div class="control text w100"> 
                                                    
                                                        <svg class="ico ico__chat b"></svg>

                                                        <div class="textbox">

                                                            <input 
                                                                name="repositorio" 
                                                                id="repositorio"
                                                                autocomplete='off'
                                                                value="<?php echo s($doc->repositorio); ?>"
                                                                
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
                                                                <span class="label__text">Repositorio</span>
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
                                                            ><?php if($crud == 2 || $crud == 3):echo s($doc->comentarios);endif;?></textarea>

                                                            <label class="label">
                                                                <span class="label__text">Comentarios</span>
                                                            </label> 

                                                        </div>                                        

                                                    </div>

                                                </form>

                                            </div>

                                        </div>


                                        <div class="form_edicion">

                                            <h2>
                                                <svg class="ico ico__calendario b"></svg>
                                                <span>Edición actual</span>
                                            </h2>

                                            <div class="form__leftContent">

                                                <form class="form">

                                                    <!-- ÚLTIMA EDICIÓN -->
                                                    <div class="control text w100"> 
                                                    
                                                        <svg class="ico ico__chat b"></svg>

                                                        <div class="textbox">

                                                            <input 
                                                                name="edicion" 
                                                                id="edicion"
                                                                autocomplete='off'
                                                                value="<?php echo s($doc->edicion->edicion); ?>"
                                                                
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
                                                                <span class="label__text">Última edición</span>
                                                            </label> 

                                                        </div>                                          

                                                    </div>

                                                    <!-- FECHA -->
                                                    <?php switch ($crud) {

                                                        case 1: ?>

                                                            <div class="control date w100" id="control_fecha"> 

                                                                <svg class="ico ico__calendario b"></svg>

                                                                <div class="textbox">

                                                                    <input 
                                                                        type="date" 
                                                                        name="fecha" 
                                                                        id="fecha"  
                                                                        form="form__informacion_documentada" 
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

                                                            <?php if(isset($doc->edicion->fecha) && $doc->edicion->fecha != ""): ?>

                                                                <div class="control date w100" id="control_fecha"> 

                                                                    <svg class="ico ico__calendario b"></svg>

                                                                    <div class="textbox">

                                                                        <input 
                                                                            type="date" 
                                                                            name="fecha" 
                                                                            id="fecha"  
                                                                            form="form__informacion_documentada" 
                                                                            class="valid"
                                                                            readonly
                                                                            value ="<?php echo s($doc->edicion->fecha); ?>"                                                            
                                                                        >

                                                                        <label class="label">
                                                                            <span class="label__text">Fecha</span>
                                                                        </label> 

                                                                        <svg class="ico ico__calendario b"></svg>

                                                                    </div>                                        

                                                                </div>

                                                            <?php endif; ?>

                                                        <?php break; ?>

                                                        <?php case 3: ?>

                                                            <div class="control date w100" id="control_fecha"> 

                                                                <svg class="ico ico__calendario b"></svg>

                                                                <div class="textbox">

                                                                    <input 
                                                                        type="date" 
                                                                        name="fecha" 
                                                                        id="fecha"  
                                                                        form="form__informacion_documentada" 
                                                                        class="valid"
                                                                        value="<?php echo s($doc->edicon->fecha); ?>"
                                                                    >

                                                                    <label class="label">
                                                                        <span class="label__text">Fecha</span>
                                                                    </label> 

                                                                    <svg class="ico ico__calendario b"></svg>

                                                                </div>                                        

                                                            </div>

                                                        <?php break; ?>

                                                    <?php }; ?>

                                                    <!-- ELABORADO --> 
                                                    <?php if($crud == 2): ?>
                                                        <a href="/personal?id=<?php echo($doc->edicion->elaborado->id);?>">
                                                    <?php endif; ?>

                                                            <div class="control select w100" style="cursor: pointer"> 

                                                                <img src=<?php echo $doc->edicion->elaborado->avatar; ?> class="avatar"> 

                                                                <div class="textbox">

                                                                    <select 
                                                                        name="elaborado" 
                                                                        id="elaborado" 
                                                                        class="valid link"
                                                                        value="<?php echo s($doc->edicion->elaborado->id); ?>"
                                                                        style="cursor: pointer"
                                                                        
                                                                        <?php if($crud == 1): ?>
                                                                            required='required'
                                                                        <?php endif; ?>

                                                                        <?php if($crud == 2): ?>
                                                                            disabled
                                                                        <?php endif; ?>
                                                                    
                                                                    >
                                                                    
                                                                        <option selected value=""> Seleccione la persona que ha elaborado el documento </option>    
                                                                        
                                                                        <?php foreach($personal as $r) { ?>
                                                                        
                                                                            <option <?php echo s($r->id) === s($doc->edicion->elaborado->id) ? 'selected' : '' ?> value="<?php echo s($r->id);?>"> <?php echo s($r->nombre . " " . $r->primer_apellido . " " . $r->segundo_apellido); ?> </option>

                                                                        <?php } ?>

                                                                    </select>

                                                                    <label class="label">
                                                                        <span class="label__text">Elaborado por:</span>
                                                                    </label> 

                                                                </div>    

                                                            </div>
                                                        </a>

                                                    <!-- REVISADO --> 
                                                    <?php if($crud == 2): ?>
                                                        <a href="/personal?id=<?php echo($doc->edicion->revisado->id);?>">
                                                    <?php endif; ?>

                                                            <div class="control select w100" style="cursor: pointer"> 
                                                   
                                                                <img src=<?php echo $doc->edicion->revisado->avatar; ?> class="avatar"> 

                                                                <div class="textbox">

                                                                    <select 
                                                                        name="revisado" 
                                                                        id="revisado" 
                                                                        class="valid link"
                                                                        value="<?php echo s($doc->edicion->revisado->id); ?>"
                                                                        style="cursor: pointer"
                                                                        
                                                                        <?php if($crud == 1): ?>
                                                                            required='required'
                                                                        <?php endif; ?>

                                                                        <?php if($crud == 2): ?>
                                                                            disabled
                                                                        <?php endif; ?>
                                                                    
                                                                    >
                                                                    
                                                                        <option selected value=""> Seleccione la persona que ha revisado el documento </option>    
                                                                        
                                                                        <?php foreach($personal as $r) { ?>
                                                                        
                                                                            <option <?php echo s($r->id) === s($doc->edicion->revisado->id) ? 'selected' : '' ?> value="<?php echo s($r->id);?>"> <?php echo s($r->nombre . " " . $r->primer_apellido . " " . $r->segundo_apellido); ?> </option>

                                                                        <?php } ?>

                                                                    </select>

                                                                    <label class="label">
                                                                        <span class="label__text">Revisado por:</span>
                                                                    </label> 

                                                                </div>    

                                                            </div>
                                                        </a>

                                                    <!-- APROBADO --> 
                                                    <?php if($crud == 2): ?>
                                                        <a href="/personal?id=<?php echo($doc->edicion->aprobado->id);?>">
                                                    <?php endif; ?>

                                                            <div class="control select w100" style="cursor: pointer"> 
                                              
                                                                    <img src=<?php echo $doc->edicion->aprobado->avatar; ?> class="avatar"> 

                                                                <div class="textbox">

                                                                    <select 
                                                                        name="aprobado" 
                                                                        id="aprobado" 
                                                                        class="valid link"
                                                                        value="<?php echo s($doc->edicion->aprobado->id); ?>"
                                                                        style="cursor: pointer"
                                                                        
                                                                        <?php if($crud == 1): ?>
                                                                            required='required'
                                                                        <?php endif; ?>

                                                                        <?php if($crud == 2): ?>
                                                                            disabled
                                                                        <?php endif; ?>
                                                                    
                                                                    >
                                                                    
                                                                        <option selected value=""> Seleccione la persona que ha aprobado el documento </option>    
                                                                        
                                                                        <?php foreach($personal as $r) { ?>
                                                                        
                                                                            <option <?php echo s($r->id) === s($doc->edicion->aprobado->id) ? 'selected' : '' ?> value="<?php echo s($r->id);?>"> <?php echo s($r->nombre . " " . $r->primer_apellido . " " . $r->segundo_apellido); ?> </option>

                                                                        <?php } ?>

                                                                    </select>

                                                                    <label class="label">
                                                                        <span class="label__text">Aprobado por:</span>
                                                                    </label> 

                                                                </div>    

                                                            </div>
                                                        </a>

                                                    <!-- CAMBIOS -->
                                                    <div class="control textarea w100"> 

                                                        <svg class="ico ico__foro b"></svg>

                                                        <div class="textbox">

                                                            <textarea 
                                                                name="cambios" 
                                                                id="cambios" 
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
                                                            ><?php if($crud == 2 || $crud == 3):echo s($doc->edicion->cambios);endif;?></textarea>

                                                            <label class="label">
                                                                <span class="label__text">Cambios</span>
                                                            </label> 

                                                        </div>                                        

                                                    </div>

                                                    <!-- COMENTARIOS -->
                                                    <div class="control textarea w100"> 

                                                        <svg class="ico ico__foro b"></svg>

                                                        <div class="textbox">

                                                            <textarea 
                                                                name="comentarios_edicion" 
                                                                id="comentarios_edicion" 
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
                                                            ><?php if($crud == 2 || $crud == 3):echo s($doc->edicion->comentarios);endif;?></textarea>

                                                            <label class="label">
                                                                <span class="label__text">Comentarios de la edición</span>
                                                            </label> 

                                                        </div>                                        

                                                    </div>

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
                                                                form="form__informacion_documentada"
                                                                class="button button__primary button__blue w100"
                                                                onclick="validate__planaccion_Form(form__informacion_documentada, <?php echo $crud ?>)"
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

                                                                <input type="hidden" name="id" value="<?php echo $doc->id; ?>">

                                                                <button 
                                                                    type="button" 
                                                                    class="button button__primary button__yellow w100"
                                                                    onclick="location.href='/apoyo/informacion-documentada/update?id=<?php echo $doc->id; ?>'"
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
                                                                action="/apoyo/informacion-documentada/delete?id=<?php echo $doc->id; ?>'" 
                                                                id="formEliminarPlanAccion"
                                                            >

                                                                <input type="hidden" name="id" value="<?php echo $doc->id; ?>">

                                                                <button 
                                                                    type="button" 
                                                                    class="button button__primary button__red w100"
                                                                    onclick="notificarEliminar(this.form, '<?php echo $doc->id;?>', '<?php echo $doc->codigo_interno;?>')"
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

                            <?php if($doc->edicion && $doc->edicion != ''): ?>
                            
                                <table>  

                                    <thead>

                                        <th style="text-align: center;"> Edición </th>
                                        <th class=ocultarColumna>id</th>
                                        <th style="text-align: center;"> Fecha </th>
                                        <th style="text-align: center;"> Elaborado </th>
                                        <th style="text-align: center;"> Revisado </th>
                                        <th style="text-align: center;"> Aprobado </th>
                                        <th style="text-align: center;"></th>
                                    </thead>

                                    <tbody id="table_ediciones"></tbody>

                                </table>

                                <?php else: ?>     
                                    <p> Por el momento, no se ha detectado ningun edición de este documento. </p>
                                <?php endif; ?>    
                        
                        </div>

                    </div>

                    <div class="tab" id="Tab__log"> </div> <!-- Log -->
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
                        notificarCrear(form__informacion_documentada);
                    break;

                    case 3:
                        notificarActualizar(form__informacion_documentada);
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

<script>

//Definimos los datos para construir y filtrar la tabla
var data = <?php echo json_encode($ediciones) ?>;
var t = 'table_ediciones';
var row = `
        <tr>
            <td onclick="location.href='/apoyo/informacion-documentada/read?id={{id}}'" style="text-align: center;"> {{edicion}} </td> 
            <td onclick="location.href='/apoyo/informacion-documentada/read?id={{id}}'" style="text-align: center;" class='ocultarColumna'> {{id}} </td>
            <td onclick="location.href='/apoyo/informacion-documentada/read?id={{id}}'" style="text-align: center;"> {{fecha}} </td>
            
            <td onclick="location.href='/apoyo/informacion-documentada/read?id={{id}}'" style="text-align: center;"> 

                <a href="/personal?id={{elaborado.id}} ">

                    <div class="control select w100" style="cursor: pointer"> 
        
                        <img src={{elaborado.avatar}} class="avatar"> 

                    </div>

            </td>

            <td onclick="location.href='/apoyo/informacion-documentada/read?id={{id}}'" style="text-align: center;"> 

                <a href="/personal?id={{revisado.id}} ">

                    <div class="control select w100" style="cursor: pointer"> 
        
                        <img src={{revisado.avatar}} class="avatar"> 

                    </div>

            </td>

            <td onclick="location.href='/apoyo/informacion-documentada/read?id={{id}}'" style="text-align: center;"> 

                <a href="/personal?id={{aprobado.id}} ">

                    <div class="control select w100" style="cursor: pointer"> 

                        <img src={{aprobado.avatar}} class="avatar"> 

                    </div>

            </td>

            <td onclick="location.href='/apoyo/informacion-documentada/read?id={{id}}'" style="text-align: center;">

            <div class="btn-group">

                <form 
                    method="POST" 
                    action="/apoyo/informacion-documentada/delete?id={{id}}" 
                    id="form_pm"
                >

                <input type="hidden" name="id" value="{{id}}">

                <div class="tooltip" >

                    <button 
                        type="button" 
                        class="button button__primary button__small button__green"
                        onclick="abrirPDF(
                                        '/mostrarPDF?r={{adjunto.rutaAdjunto}}&n={{adjunto.nombreAdjunto}}.{{adjunto.tipoAdjunto}}',
                                        '{{adjunto.nombreAdjunto}}'
                                        )"
                    > 
                        <svg class="ico ico__pdf w"></svg>                          

                    </button>
                    
                    <span class="tooltiptext">Abrir documento</span>

                </div>

                <div class="tooltip" >

                    <button 
                        type="button" 
                        class="button button__primary button__small button__green"
                        onclick="descargarArchivo('/gestorArchivos?r=/{{adjunto.rutaAdjunto}}', '{{adjunto.nombreAdjunto}}.{{adjunto.tipoAdjunto}}')"
                    > 
                        <svg class="ico ico__descargar w"></svg>                          

                    </button>
                    
                    <span class="tooltiptext">Descargar documento</span>

                </div>

                <div class="tooltip">

                    <button 
                        type="button" 
                        class="button button__primary button__small button__blue"
                        onclick="location.href='/apoyo/informacion-documentada/read?id={{id}}'"
                    > 
                        <svg class="ico ico__ojo w"></svg>
                    
                    </button>
                
                    <span class="tooltiptext">Ver Ficha del documento</span>

                </div>

        `;  

        if(<?php echo $_SESSION['auth'] ? 'true' : 'false' ?>) {

            row += `

                <div class="tooltip">

                    <button 
                        type="button" 
                        class="button button__primary button__small button__yellow"
                        onclick="location.href='/apoyo/informacion-documentada/update?id={{id}}'"
                    > 
                        <svg class="ico ico__lapicero w"></svg>

                    </button>
                    
                    <span class="tooltiptext">Modificar Ficha del documento</span>

                </div>

                <div class="tooltip">

                    <button 
                        type="button" 
                        class="button button__primary button__small button__red"
                        onclick="notificarEliminar(this.form, '{{id}}', '{{codigo_interno}}')"
                    > 
                        <svg class="ico ico__papelera w"></svg>
                        
                    </button>
                    
                    <span class="tooltiptext">Eliminar Documento</span>

                </div>

            `;

        }

        row += `

                        </form>
                
                    </div>

                </td>

            </tr>

        `;

//Construimos la tabla
buildTable(data, t, row);

function descargarArchivo(ruta, nombre_del_archivo){

    startLoading();

    // Crear un elemento <a> para simular el clic y descargar el archivo
    var enlaceDeDescarga = document.createElement('a');
    enlaceDeDescarga.href = ruta;
    enlaceDeDescarga.download = nombre_del_archivo; // Puedes establecer el nombre del archivo aquí
    enlaceDeDescarga.style.display = 'none';

    // Agregar el elemento <a> al DOM
    document.body.appendChild(enlaceDeDescarga);

    // Simular un clic en el enlace para iniciar la descarga
    enlaceDeDescarga.click();

    // Eliminar el elemento <a> del DOM después de la descarga
    document.body.removeChild(enlaceDeDescarga);

    stopLoading();

}

</script>

<!-- #endregion -->