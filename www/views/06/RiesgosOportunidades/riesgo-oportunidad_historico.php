<head>
    
    <title> Riesgos y oportunidades | <?php echo $_SESSION["nombreApp"]; ?> </title> <!-- Título -->
    <link rel="icon" href="/build/img/layout/Internet_2Regular.svg" sizes="any" type="image/svg+xml"> <!-- Icono -->
    
</head>

<main>

    <!-- Breadcrumb -->

        <nav class="breadcrumb">

            <ol class="breadcrumb__list">

                <li class="breadcrumb__item"> <svg class="ico ico__puntos b"> </svg> </li>
                <li class="breadcrumb__item"> <a href="/"> Inicio </a> </li>
                <li class="breadcrumb__item"> <span> / </span> </li>               
                <li class="breadcrumb__item"> <a href="/planificacion"> Planificación </a> </li>
                <li class="breadcrumb__item"> <span> / </span> </li>               
                <li class="breadcrumb__item actual"> <a href="/planificacion/riesgos-oportunidades"> Riesgos y oportunidades del sistema </a> </li>
                <li class="breadcrumb__item"> <span> / </span> </li>               
                <li class="breadcrumb__item actual"> <a href="/planificacion/riesgos-oportunidades/revisiones?id=<?php echo $ed->id; ?>"> Revisión <?php echo $rev->revision; ?> </a> </li>

            </ol>

        </nav>

        <article>

            <header class="entry-header">
                <h1>
                    <svg class="ico ico__teatro d"></svg>
                    Riesgos y Oportunidades del sistema - Revisión <? echo $rev->revision?>
                </h1>
            </header>




            <div class="tab__container">
                
                <div class="tab__header n_tabs_4">

                    <div class="active"><svg class="ico ico__teatro d"></svg> Riesgos y Oportunidades</div>
                    <div> <svg class="ico ico__documento d"></svg> Metadatos </div>
                    <div id="tab__header__relations"> <svg class="ico ico__conexiones d"></svg> Relaciones </div>
                    <div id="tab__header__adjunct"> <svg class="ico ico__adjuntar d"></svg> Adjuntos </div>

                </div>

                <div class="tab__body">

                    <div class="tab active"> <!-- Riesgos y oportunidades -->
                        
                        <!-- Riesgos -->
                            <div class="block__table">

                                <div class="table__header">
                                
                                    <div class="table__title">
                                        <h2>
                                            <svg class="ico ico__teatro d"></svg>
                                            Riesgos
                                        </h2>
                                    </div>               

                                </div>

                                <?php if($riesgos && $riesgos != ''): ?>
                                
                                    <table>  

                                        <thead>
                                            <th>Código</th>
                                            <th class=ocultarColumna>id</th>
                                            <th> Riesgo </th>
                                            <th> Estado </th>
                                            <th></th>
                                        </thead>

                                        <tbody>
                                            
                                            <!-- Introducimos la función php para cargar los datos en la tabla -->
                                            <?php 
                                                foreach ($riesgos as $row):
                                            ?>

                                                <!-- Esto bebe de la función php de arriba -->
                                                <tr>
                                                    <td onclick="location.href='/planificacion/riesgos-oportunidades/read?id=<?php echo $row->id; ?>'" style="width: 100px"><?php echo $row->codigo_interno ?> </td> 
                                                    <td onclick="location.href='/planificacion/riesgos-oportunidades/read?id=<?php echo $row->id; ?>'" class=ocultarColumna> <?php echo $row->id ?> </td>
                                                    <td onclick="location.href='/planificacion/riesgos-oportunidades/read?id=<?php echo $row->id; ?>'" style="width: 800px"> <?php echo $row->denominador ?> </td>
                                                    <td onclick="location.href='/planificacion/riesgos-oportunidades/read?id=<?php echo $row->id; ?>'" style="width: 100px"> <?php echo $row->estado ?> </td>

                                                    <!-- Ahora se generan dinámicamente los botones -->
                                                    <td onclick="location.href='/planificacion/riesgos-oportunidades/read?id=<?php echo $row->id; ?>'" style="width: 150px">

                                                        <div class="btn-group">

                                                            <form 
                                                                method="POST" 
                                                                action="/planificacion/riesgos-oportunidades/delete?id=<?php echo $row->id; ?>'" 
                                                                id="form_pas"
                                                            >
                                                                
                                                                <input type="hidden" name="id" value="<?php echo $row->id; ?>">

                                                                <div class="tooltip">

                                                                    <button 
                                                                        type="button" 
                                                                        class="button button__primary button__small button__blue"
                                                                        onclick="location.href='/planificacion/riesgos-oportunidades/read?id=<?php echo $row->id; ?>'"
                                                                    > 
                                                                        <svg class="ico ico__ojo w"></svg>
                                                                        
                                                                    </button>
                                                                    
                                                                    <span class="tooltiptext">Ver Riesgo <?php echo $row->tipo ?></span>

                                                                </div>

                                                            </form>
                                                            
                                                        </div>

                                                    </td>

                                                </tr>

                                            <?php
                                                
                                                //Cerramos el resultado y la conexión
                                                endforeach;

                                            ?>

                                        </tbody>

                                    </table>
                                
                                <?php else: ?>     
                                    <p> No se ha detectado ningún riesgo vinculado a esta revisión. </p>
                                <?php endif; ?>   

                            </div>
                        
                        <!-- Oportunidades -->
                            <div class="block__table">

                                <div class="table__header">

                                    <div class="table__title">
                                        <h2>
                                            <svg class="ico ico__teatro d"></svg>
                                            Oportunidades
                                        </h2>
                                    </div>    
                                    
                                </div>

                                <?php if($oportunidades && $oportunidades != ''): ?>
                                
                                    <table>  

                                        <thead>
                                            <th> Código</th>
                                            <th class=ocultarColumna>id</th>
                                            <th> Oportunidad </th>
                                            <th> Estado </th>
                                            <th></th>
                                        </thead>

                                        <tbody>
                                            
                                            <!-- Introducimos la función php para cargar los datos en la tabla -->
                                            <?php 
                                                foreach ($oportunidades as $row):
                                            ?>

                                                <!-- Esto bebe de la función php de arriba -->
                                                <tr>
                                                    <td onclick="location.href='/planificacion/riesgos-oportunidades/read?id=<?php echo $row->id; ?>'" style="width: 100px"> <?php echo $row->codigo_interno ?> </td> 
                                                    <td onclick="location.href='/planificacion/riesgos-oportunidades/read?id=<?php echo $row->id; ?>'" class=ocultarColumna> <?php echo $row->id ?> </td>
                                                    <td onclick="location.href='/planificacion/riesgos-oportunidades/read?id=<?php echo $row->id; ?>'" style="width: 800px"> <?php echo $row->denominador ?> </td>
                                                    <td onclick="location.href='/planificacion/riesgos-oportunidades/read?id=<?php echo $row->id; ?>'" style="width: 100px"> <?php echo $row->estado ?> </td>

                                                    <!-- Ahora se generan dinámicamente los botones -->
                                                    <td onclick="location.href='/planificacion/riesgos-oportunidades/read?id=<?php echo $row->id; ?>'" style="width: 150px">

                                                        <div class="btn-group">

                                                            <form 
                                                                method="POST" 
                                                                action="/planificacion/riesgos-oportunidades/delete?id=<?php echo $row->id; ?>'" 
                                                                id="form_par"
                                                            >
                                                                
                                                                <input type="hidden" name="id" value="<?php echo $row->id; ?>">

                                                                <div class="tooltip">

                                                                    <button 
                                                                        type="button" 
                                                                        class="button button__primary button__small button__blue"
                                                                        onclick="location.href='/planificacion/riesgos-oportunidades/read?id=<?php echo $row->id; ?>'"
                                                                    > 
                                                                        <svg class="ico ico__ojo w"></svg>
                                                                        
                                                                    </button>
                                                                    
                                                                    <span class="tooltiptext">Ver Oportunidad <?php echo $row->tipo ?></span>

                                                                </div>

                                                            </form>
                                                            
                                                        </div>

                                                    </td>

                                                </tr>

                                            <?php
                                                
                                                //Cerramos el resultado y la conexión
                                                endforeach;

                                            ?>

                                        </tbody>

                                    </table>
                                
                                <?php else: ?>     
                                    <p> No se ha detectado ninguna oportunidad vinculado a esta revisión. </p>
                                <?php endif; ?>   

                            </div>

                    </div>

                    <div class="tab" > <!-- Ficha  -->

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
                                                    id="form__riesgooportunidadrevision" 
                                                    method='POST'
                                                
                                                    <?php switch ($crud){

                                                        case 1: ?>
                                                            action="/planificacion/riesgos-oportunidades/create"
                                                        <?php break;

                                                        case 3: ?>
                                                            action="planificacion/riesgos-oportunidades/update?id=<?php echo $rev->id; ?>"
                                                        <?php break;}?>>

                                                    <!-- ID -->

                                                    <input 
                                                        type="hidden"
                                                        name="id"
                                                        id="id"
                                                        value=<?php echo $rev->id; ?>
                                                    >
                                                    
                                                    <!-- REVISIÓN -->
                                                    <div class="control text w100"> 

                                                        <div class="textbox">

                                                            <input 
                                                                type="text" 
                                                                name="revision" 
                                                                id="revision" 
                                                                
                                                                <?php switch ($crud){

                                                                    case ($crud == 1): ?>

                                                                        value="<?php echo s($codigoCalculado); ?>" 
                                                                        disabled
                                                                        class="valid"

                                                                    <?php break;

                                                                    case ($crud == 2 || $crud == 3): ?>

                                                                        value="<?php echo s($rev->revision); ?>"
                                                                        readonly
                                                                        class="valid"

                                                                    <?php break; } ?>
                                                            >

                                                            <label class="label">
                                                                <span class="label__text">Revisión</span>
                                                            </label> 

                                                        </div>                                        

                                                    </div>

                                                    <!-- DENOMINADOR -->
                                                    <div class="control textarea w100"> 

                                                        <div class="textbox">

                                                            <textarea 
                                                                name="denominador" 
                                                                id="denominador" 
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
                                                            ><?php if($crud == 2 || $crud == 3):echo s($rev->denominador);endif;?></textarea>

                                                            <label class="label">
                                                                <span class="label__text">Denominador</span>
                                                            </label> 

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

                                                            <?php if(isset($rev->fecha) && $rev->fecha != ""): ?>

                                                                <div class="control date w100"> 

                                                                    <div class="textbox">

                                                                        <input 
                                                                            type="date" 
                                                                            name="fecha" 
                                                                            id="fecha"  
                                                                            class="valid"
                                                                            readonly
                                                                            value ="<?php echo s($rev->fecha); ?>"                                                            
                                                                        >

                                                                        <label class="label">
                                                                            <span class="label__text">Fecha de revisión</span>
                                                                        </label> 

                                                                        <svg class="ico ico__calendario b"></svg>

                                                                    </div>                                        

                                                                </div>

                                                            <?php endif; ?>

                                                        <?php break; ?>

                                                        <?php case 3: ?>

                                                            <?php if(isset($rev->fecha) && $rev->fecha != ""): ?>

                                                                <div class="control date w100"> 

                                                                    <div class="textbox">

                                                                        <input 
                                                                            type="date" 
                                                                            name="fecha" 
                                                                            id="fecha"  
                                                                            class="valid"
                                                                            value="<?php echo s($rev->fecha); ?>"
                                                                        >

                                                                        <label class="label">
                                                                            <span class="label__text">Fecha de revisión</span>
                                                                        </label> 

                                                                        <svg class="ico ico__calendario b"></svg>

                                                                    </div>                                        

                                                                </div>

                                                            <?php endif; ?>

                                                        <?php break; ?>

                                                    <?php }; ?>

                                                    <!-- COMENTARIOS -->
                                                    <div class="control textarea w100"> 

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
                                                            ><?php if($crud == 2 || $crud == 3):echo s($rev->comentarios);endif;?></textarea>

                                                            <label class="label">
                                                                <span class="label__text">Comentarios</span>
                                                            </label> 

                                                        </div>                                        

                                                    </div>


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
                                                                        action="/planificacio/planificacion-cambios/delete" 
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

                    <div class="tab" id="Tab__relations"></div>

                    <div class="tab" id="Tab__adjunct"> </div>

                </div>

        </article>

</main>

<script type="text/javascript" src="/build/js/fundamentals/formRevisionPartesInteresadas.js"></script>

<script>

        function notificarEliminar(form, id, codigo){

            Dialog.open({
                title: 'Eliminar parte interesada' + codigo,
                message: '¿Desea eliminar la parte interesada ' + codigo + '? (esta acción es irreversible).',
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

        function dialogRevision(edicion){

            console.log('asga');

            Dialog.open({
                title: 'Nueva revisión Partes Interesadas',
                message: '¿Has realizado la revisión de las Partes Interesadas?',
                color: 'blue',
                ico: 'ico__lanzar d',
                okText: 'Por supuesto, ¿Dudas de mi?',
                cancelText: 'Emmmmmmmm, nope',
                onok: () => { 

                                RevisionPartesInteresadas.open({
                                    edicion: edicion,
                                    fecha: obtenerFechaHoy(),
                                })
                            },     

                oncancel: () => { window.location.href = "http://localhost/contexto/partesinteresadas" }       

            })
        }   


    </script>

</html>