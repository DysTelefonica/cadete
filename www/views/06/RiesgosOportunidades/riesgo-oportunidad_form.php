<head>

    <!-- Título -->
        
        <title> 

            <?php if($crud == 1): ?>

   
                    Nuevo Riesgo / Oportunidad | <? echo $_SESSION["nombreApp"]; ?>    

            <?php else: 

                echo "$ro->codigo_interno" ?> <?php echo $_SESSION["nombreApp"]; ?>  

            <?php endif; ?>

        </title> 

    <!-- Icono -->
        <link rel="shortcut icon" href="/build/img/layout/Internet_2Regular_azul.svg">
    
</head>

<main>

 <!-- #region Breadcrumb -->

    <nav class="breadcrumb">

        <ol class="breadcrumb__list">

            <li class="breadcrumb__item"> <svg class="ico ico__puntos b"> </svg> </li>
            <li class="breadcrumb__item"> <a href="/"> Inicio </a> </li>
            <li class="breadcrumb__item"> <span> / </span> </li>               
            <li class="breadcrumb__item"> <a href="/planificacion"> Planificación </a> </li>
            <li class="breadcrumb__item"> <span> / </span> </li>               
            <li class="breadcrumb__item"> <a href="/planificacion/riesgos-oportunidades"> Riesgos y Oportunidades del sistema </a> </li>
            <li class="breadcrumb__item"> <span> / </span> </li>     
            
            <?php if($crud == 1):?>
                <?php if(isset($_GET['tipo']) && $_GET['tipo'] == 1):?>
                    <li class="breadcrumb__item actual"> <a href="/planificacion/riesgos-oportunidades/create?tipo=<? echo($_GET['tipo']) ?>"> Nuevo Riesgo </a> </li>     
                <?php else:?>
                    <li class="breadcrumb__item actual"> <a href="/planificacion/riesgos-oportunidades/create?tipo=<? echo($_GET['tipo']) ?>"> Nueva Oportunidad </a> </li> 
                <?php endif;?>      

            <?php else:?>

                <?php if($ro->tipo == "Riesgo"):?>
                    <li class="breadcrumb__item actual"> <a href="/planificacion/riesgos-oportunidades/read?id=<?php echo $ro->id ?>"> Riesgo <?php echo $ro->codigo_interno ?> </a> </li>
                <?php else:?>
                    <li class="breadcrumb__item actual"> <a href="/planificacion/riesgos-oportunidades/read?id=<?php echo $ro->id ?>"> Oportunidad <?php echo $ro->codigo_interno ?> </a> </li>
                <?php endif;?> 
                
            <?php endif;?>

        </ol>

    </nav>

<!-- #endregion -->

<!-- #region Artículo -->

    <article>

        <header class="entry-header">
            <h1>
                <svg class="ico ico__teatro b"></svg>

                <span id='titulo'>

                    <?php 

                        switch ($crud){

                            case 1: //Create ?>

                                <?php if(isset($_GET['tipo']) && $_GET['tipo'] == 1):?>
                                    Nuevo Riesgo
                                <?php else:?>
                                   Nueva Oportunidad
                                <?php endif;?>                                
                                
                                <?php break;

                            case 2: //Read ?>

                                <?php echo($ro->tipo); echo('" '); echo s($ro->denominador); ?>"                
                                                                    
                                <?php break;

                            case 3: //Read ?>

                                <?php echo('Actualizar '); echo($ro->tipo); ?>"   
                                                                                            
                                <?php break;

                        }
                    
                    ?>

                </span> 

            </h1>

        </header>
        
        <div class="tab__container">
                    
            <div class="tab__header n_tabs_6">
                
                    <div class="active"><svg class="ico ico__documento d"></svg> Metadatos </div>
                
                <?php if($crud == 2): ?>   
                    <div><svg class="ico ico__basededatos d"></svg> <?php if(isset($h) && !$h): echo "Revisiones"; else: echo "Revisiones"; endif; ?>  </div>
                <?php endif; ?> 

                <?php if($crud == 2): ?>
                    <div id="tab__header__log"> <svg class="ico ico__tiempo d"></svg> Log </div>
                    <div id="tab__header__relations"> <svg class="ico ico__conexiones d"></svg> Relaciones </div>
                    <div id="tab__header__adjunct"> <svg class="ico ico__adjuntar d"></svg> Adjuntos </div>
                <?php endif; ?> 
                
            </div>
    
            <div class="tab__body">

                <div class="tab active"> <!-- METADATOS -->

                    <div class="entry-content">

                        <div class="block">

                            <div class="block__content form">

                                <div class="form__two">

                                <!-- Formulario -->

                                    <div class="form__left">

                                        <div class="form_metadatos">

                                            <h2>
                                                <svg class="ico ico__documento b"></svg>
                                                <span>Metadatos</span>
                                            </h2>

                                            <div class="form__leftContent">

                                                <form 
                                                    class="form"
                                                    id="form__riesgooportunidad" 
                                                    method='POST'
                                                
                                                    <?php switch ($crud){

                                                        case 1: ?>
                                                            action="/planificacion/riesgos-oportunidades/create"
                                                        <?php break;

                                                        case 3: ?>
                                                            action="/planificacion/riesgos-oportunidades/update?id=<?php echo $ro->id; ?>"
                                                        <?php break;}?>>

                                                    <!-- ID -->

                                                    <input 
                                                        type="hidden"
                                                        name="id"
                                                        id="id"
                                                        value=<?php echo $ro->id; ?>
                                                    >
                                                    
                                                    <!-- CODIGO -->
                                                    <div class="control text w100"> 

                                                        <svg class="ico ico__huella b"></svg>

                                                        <div class="textbox">

                                                            <input 
                                                                type="text" 
                                                                name="codigo_interno" 
                                                                id="codigo_interno" 
                                                                readonly
                                                                class="valid"
                                                                
                                                                <?php switch ($crud){

                                                                    case ($crud == 1): ?>

                                                                        value="<?php echo s($codigoCalculado); ?>" 

                                                                    <?php break;

                                                                    case ($crud == 2 || $crud == 3): ?>

                                                                        value="<?php echo s($ro->codigo_interno); ?>"

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
                                                                value="<?php echo s($ro->denominador); ?>"
                                                                
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
                                                    
                                                    <!-- TIPO -->
                                                    <div class="control select w100"> 

                                                        <svg class="ico ico__teatro b"></svg>

                                                        <div class="textbox">

                                                            <select 
                                                                name="tipo" 
                                                                id="tipo" 
                                                                class="valid"
                                                                value="<?php echo s($ro->tipo); ?>"
                                                                
                                                                <?php if($crud == 1): ?>
                                                                    required='required'
                                                                <?php endif; ?>

                                                                <?php if($crud == 2): ?>
                                                                    disabled
                                                                <?php endif; ?>
                                                            
                                                            >
                                                            
                                                                <option selected value=""> Seleccione el tipo </option>    

                                                                <?php foreach($tiposRO as $t) { ?>
                                                                    
                                                                    <option <?php echo s($t->tipo) === s($ro->tipo) ? 'selected' : '' ?> value="<?php echo s($t->id);?>"> <?php echo s($t->tipo); ?> </option>

                                                                <?php } ?>

                                                            </select>

                                                            <label class="label">
                                                                <span class="label__text">Tipo</span>
                                                            </label> 

                                                        </div>                                        

                                                    </div>

                                                    <!-- DESCRIPCÓN -->
                                                    <div class="control textarea w100"> 

                                                        <svg class="ico ico__foro b"></svg>

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
                                                            ><?php if($crud == 2 || $crud == 3):echo s($ro->descripcion);endif;?></textarea>

                                                            <label class="label">
                                                                <span class="label__text">Descripción</span>
                                                            </label> 

                                                        </div>                                        

                                                    </div>

                                                    <!-- ESTADO -->
                                                    <div class="control select w100"> 

                                                        <svg class="ico ico__proceso b"></svg>

                                                        <div class="textbox <?php if(isset($ro->indicador)):echo s('RO_E'. $ro->indicador); endif; ?>">

                                                            <select 
                                                                name="estado" 
                                                                id="estado" 
                                                                class="valid"
                                                                value="<?php echo s($ro->estado); ?>"
                                                                
                                                                <?php if($crud == 1): ?>
                                                                    required='required'
                                                                <?php endif; ?>

                                                                <?php if($crud == 2): ?>
                                                                    disabled
                                                                <?php endif; ?>
                                                            
                                                            >
                                                            
                                                                <option selected value=""> Seleccione el estado </option>    

                                                                <?php foreach($estadosRO as $e) { ?>
                                                                    
                                                                    <option <?php echo s($e->estado) === s($ro->estado) ? 'selected' : '' ?> value="<?php echo s($e->id);?>"> <?php echo s($e->estado); ?> </option>

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
                                                            ><?php if($crud == 2 || $crud == 3):echo s($ro->comentarios);endif;?></textarea>

                                                            <label class="label">
                                                                <span class="label__text">Comentarios</span>
                                                            </label> 

                                                        </div>                                        

                                                    </div>

                                                </form>

                                            </div>

                                        </div>

                                        <div class="form_decision">

                                            <h2>
                                                <svg class="ico ico__atencioncliente b"></svg>
                                                <span>Decisión</span>
                                            </h2>

                                            <div class="form__leftContent">

                                                <form class="form">

                                                 <!-- DECISIÓN -->
                                                    <div class="control select w100"> 

                                                        <svg class="ico ico__atencioncliente b"></svg>

                                                        <div class="textbox">

                                                            <select 
                                                                name="decision" 
                                                                id="decision" 
                                                                class="valid"
                                                                form="form__riesgooportunidad" 
                                                                value="<?php echo s($ro->decision); ?>"
                                                                
                                                                <?php if($crud == 1): ?>
                                                                    required='required'
                                                                <?php endif; ?>

                                                                <?php if($crud == 2): ?>
                                                                    disabled
                                                                <?php endif; ?>
                                                            
                                                            >
                                                            
                                                                <option selected value=""> Seleccione la decisión a tomar </option>    

                                                                <?php foreach($decisionesRO as $d) { ?>
                                                                
                                                                    <option <?php echo s($d->decision) === s($ro->decision) ? 'selected' : '' ?> value="<?php echo s($d->id);?>"> <?php echo s($d->decision . " - " . $d->descripcion); ?> </option>

                                                                <?php } ?>

                                                            </select>

                                                            <label class="label">
                                                                <span class="label__text">Decisión</span>
                                                            </label> 

                                                        </div>                                        

                                                    </div>

                                                    <!-- JUSTIFICACIÓN -->
                                                    <div class="control textarea w100"> 

                                                        <svg class="ico ico__foro b"></svg>

                                                        <div class="textbox">

                                                            <textarea 
                                                                name="justificacion" 
                                                                id="justificacion" 
                                                                cols="30" 
                                                                rows="10"
                                                                form="form__riesgooportunidad" 

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
                                                            ><?php if($crud == 2 || $crud == 3):echo s($ro->justificacion);endif;?></textarea>

                                                            <label class="label">
                                                                <span class="label__text">Justificación de la decisión</span>
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
                                                                        name="fecha_deteccion" 
                                                                        id="fecha_deteccion"  
                                                                        form="form__riesgooportunidad" 
                                                                        class="valid"
                                                                        value="<?php echo s(date("Y-m-d")); ?>"
                                                                    >

                                                                    <label class="label">
                                                                        <span class="label__text">Fecha de detección</span>
                                                                    </label> 

                                                                    <svg class="ico ico__calendario b"></svg>

                                                                </div>                                        

                                                            </div>

                                                        <?php break; ?>

                                                        <?php case 2: ?>

                                                            <?php if(isset($ro->fecha_deteccion) && $ro->fecha_deteccion != ""): ?>

                                                                <div class="control date w100" id="control_fechaInicio"> 

                                                                    <svg class="ico ico__calendario b"></svg>

                                                                    <div class="textbox">

                                                                        <input 
                                                                            type="date" 
                                                                            name="fecha_deteccion" 
                                                                            id="fecha_deteccion"  
                                                                            form="form__riesgooportunidad" 
                                                                            class="valid"
                                                                            readonly
                                                                            value ="<?php echo s($ro->fecha_deteccion); ?>"                                                            
                                                                        >

                                                                        <label class="label">
                                                                            <span class="label__text">Fecha de deteccion</span>
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
                                                                        name="fecha_deteccion" 
                                                                        id="fecha_deteccion"  
                                                                        form="form__riesgooportunidad" 
                                                                        class="valid"
                                                                        value="<?php echo s($ro->fecha_deteccion); ?>"
                                                                    >

                                                                    <label class="label">
                                                                        <span class="label__text">Fecha de detección</span>
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
                                                                form="form__riesgooportunidad"
                                                                class="button button__primary button__blue w100"
                                                                onclick="validate__riesgooportunidad_Form(form__riesgooportunidad, <?php echo $crud ?>)"
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

                                                                <input type="hidden" name="id" value="<?php echo $ro->id; ?>">

                                                                <button 
                                                                    type="button" 
                                                                    class="button button__primary button__yellow w100"
                                                                    onclick="location.href='/planificacion/riesgos-oportunidades/update?id=<?php echo $ro->id; ?>'"
                                                                > 
                                                                    <svg class="ico ico__lapicero w"></svg>
                                                                    <span>
                                                                        Modificar 
                                                                        <?php 

                                                                            switch ($ro->tipo) {
                                                                                
                                                                                case 'Riesgo':
                                                                                    echo("riesgo");
                                                                                    break;

                                                                                case 'Oportunidad':
                                                                                    echo("oportunidad");
                                                                                    break;
                                                                            }
                                                                        ?>
            
                                                                    </span>
                                                                </button>                                                                                                                 

                                                            </form>

                                                        </li>

                                                    <?php endif; ?> 

                                                    <!-- ELIMINAR -->
                                                    <?php if($crud == 2 && $auth) :?>

                                                        <li class="toolbar__item">   

                                                            <form 
                                                                method="POST" 
                                                                action="/planificacion/riesgos-oportunidades/delete" 
                                                                id="formEliminarPlanAccion"
                                                            >

                                                                <input type="hidden" name="id" value="<?php echo $pa->id; ?>">

                                                                <button 
                                                                    type="button" 
                                                                    class="button button__primary button__red w100"
                                                                    onclick="notificarEliminar(this.form, '<?php echo $pa->id;?>', '<?php echo $pa->codigo_interno;?>')"
                                                                > 
                                                                    <svg class="ico ico__papelera w"></svg>
                                                                    <span>
                                                                        Eliminar 
                                                                        <?php 

                                                                            switch ($ro->tipo) {
                                                                                
                                                                                case 'Riesgo':
                                                                                    echo("riesgo");
                                                                                    break;

                                                                                case 'Oportunidad':
                                                                                    echo("oportunidad");
                                                                                    break;
                                                                            }
                                                                        ?>
                                                                    </span>
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

                    <div class="tab"> <!-- REVISIONES -->

                        <div class="block__table">

                            <div class="table__header">

                                <div class="table__title">

                                    <p>
                                        Debe realizarse una revisión de los riesgos y oportunidades del sistema, como mínimo, cada <span class="underline">6 meses.</span>
                                        
                                    </p>
            
                                </div>     
                                
                                <?php if($auth): ?>

                                    <input type="hidden" name="id" value="<?php echo $revisiones->id; ?>">
                                    <input type="hidden" name="url" value="<?php echo($_SERVER["REQUEST_URI"]) ?>">                       

                                    <div class="table__button">

                                        <div class="tooltip">

                                            <button 
                                                type="button" 
                                                class="button button__primary button__regular button__green"
                                                onclick="dialogRevision(
                                                                '<?php 
                                                                    if(!$revisiones){
                                                                        echo 1;
                                                                    }
                                                                    else{
                                                                        echo ($revisiones[0]->edicion) +1;
                                                                    }
                                                                    
                                                                ?>'
                                                                )"
                                            > 
                                                <svg class="ico ico__anadirmas w"></svg>
                                            </button>
                                            
                                            <span class="tooltiptext">Añadir revisión de riesgos y oportundiades del sistema</span>

                                        </div>

                                    </div>      

                                <?php endif; ?>

                            </div>

                            <?php if($revisiones && $revisiones != ''): ?>

                                <table>  

                                    <thead>
                                        <th>Revision</th>
                                        <th class=ocultarColumna>id</th>
                                        <th >Fecha</th>
                                        <th >Comentarios</th>
                                        <th></th>
                                    </thead>

                                    <tbody>
                                        
                                        <?php    

                                            for($n = 0; $n < 1; $n++) {

                                                $i = 0;

                                                foreach ($revisiones as $row):?>
                                            
                                                    <tr class='linea'>
                                                        <td onclick="location.href='/planificacion/riesgos-oportunidades/revisiones?id=<?php echo $row->id; ?>'"> <?php echo $row->revision ?> </td> 
                                                        <td onclick="location.href='/planificacion/riesgos-oportunidades/revisiones?id=<?php echo $row->id; ?>'" class=ocultarColumna> <?php echo $row->id ?> </td>

                                                        <td onclick="location.href='/planificacion/riesgos-oportunidades/revisiones?id=<?php echo $row->id; ?>'">
                                                            <?php 
                                                                if ( !$row->fecha == null) { echo date('d/m/Y', strtotime($row->fecha)); }
                                                                else { echo ''; }                                                
                                                            ?> 
                                                        </td>

                                                        <td onclick="location.href='/planificacion/riesgos-oportunidades/revisiones?id=<?php echo $row->id; ?>'"> <?php echo $row->comentarios ?> </td>

                                                        <td onclick="location.href='/planificacion/riesgos-oportunidades/revisiones?id=<?php echo $row->id; ?>'"> 

                                                            <div class="btn-group">

                                                                <form method="POST">
                                                                    
                                                                    <input type="hidden" name="id" value="<?php echo $row->id; ?>">

                                                                    <div class="tooltip">

                                                                        <button 
                                                                            type="button" 
                                                                            class="button button__primary button__small button__blue"
                                                                            onclick="location.href='/planificacion/riesgos-oportunidades/revisiones?id=<?php echo $row->id; ?>'"
                                                                        > 
                                                                            <svg class="ico ico__teatro w"></svg>
                                                                        
                                                                        </button>
                                                                        
                                                                        <span class="tooltiptext">Ver registro histórico</span>

                                                                    </div>

                                                                    <?php if($auth): ?>

                                                                        <?php for($i = $i; $i < 1; $i++) { ?> 

                                                                            <div class="tooltip">

                                                                                <button 
                                                                                    type="button" 
                                                                                    class="button button__primary button__small button__red"
                                                                                    onclick="notificarEliminar(this.form, '<?php echo $row->id;?>')"
                                                                                > 
                                                                                    <svg class="ico ico__papelera w"></svg>

                                                                                </button>
                                                                                
                                                                                <span class="tooltiptext">Eliminar edición</span>

                                                                            </div>

                                                                        <?php } ?>
                                                                        
                                                                    <?php endif; ?>

                                                                </form>
                                                                
                                                            </div>

                                                        </td>

                                                    </tr>                                   

                                                <?php endforeach; ?>

                                            <?php } ?>

                                    </tbody>

                                </table>

                                <!-- Mostrando <? echo $i+1 ?> registros de un total de  -->
                            
                            <?php else: ?>     
                                <p class="no-entry"> Por el momento, no se ha realizado ninguna revisión de los riesgos y oportunidades del sistema. </p>
                            <?php endif; ?>   
                        </div>

                    </div> 

                    <div class="tab" id="Tab__log"></div> <!-- Logs -->
                    <div class="tab" id="Tab__relations"></div> <!-- Relaciones -->
                    <div class="tab" id="Tab__adjunct"> </div> <!-- Adjuntos -->

                <?php endif; ?> 
                   

    </article>               

<!-- #endregion -->

</main>

<!-- #region Script JS  -->

    <script type="text/javascript">

        function validate__riesgooportunidad_Form(form, crud) {

            if (document.getElementById('codigo_interno').value.length == 0) {
                showSnackbar('¡Falta el codigo!','ico__alerta w','red');
                return false;
            }
            if (document.getElementById('denominador').value.length == 0) {
                showSnackbar('¡Falta el denominador!','ico__alerta w','red');
                return false;
            }
            if (document.getElementById('tipo').value.length == 0) {
                showSnackbar('¡Falta el tipo!','ico__alerta w','red');
                return false;
            }
            if (document.getElementById('estado').value.length == 0) {
                showSnackbar('¡Falta el estado!','ico__alerta w','red');
                return false;
            }

            //Seleccionamos la acción dependiendo del CRUD

                switch(crud){
                    case 1:
                        notificarCrear(form__riesgooportunidad);
                    break;

                    case 3:
                        notificarActualizar(form__riesgooportunidad);
                    break;
                }

        }

        function notificarCrear(form){

            if(document.getElementById('tipo').value == 1) {
                tipo = 'riesgo';
                pronombre ='el';
            } else {
                tipo = 'oportunidad';
                pronombre = 'la';
            }

            Dialog.open({
                title: 'CREAR ' + tipo.toUpperCase(),
                message: 'Va a crear ' + pronombre + ' ' + tipo + ' "' + document.getElementById('denominador').value + '", ¿Desea continuar?',
                color: 'blue',
                ico: 'ico__teatro d',
                okText: '¡Adelante, créalo!',
                cancelText: 'Mmm no, mejor no',
                onok: () => { 
                    document.getElementById('tipo').disabled = false;
                    form.submit(); 
                }                

            })
        }  
        
        function notificarActualizar(form){

            Dialog.open({
                title: 'ACTUALIZAR ' + document.getElementById('tipo').value.toUpperCase(),
                message: 'Va a actualizar un ' + document.getElementById('tipo').value + ' ¿Desea continuar?',
                color: 'blue',
                ico: 'ico__teatro d',
                okText: '¡Los cambios siempre son buenos!',
                cancelText: 'Si algo funciona, ¿Por qué cambiarlo?',
                onok: () => { 
                    document.getElementById('tipo').disabled = false;
                    form.submit(); 
                }                

            })
        }            

        function notificarEliminar(form, id, codigo){

            Dialog.open({
                title: 'Eliminar riesgo/oportunidad ' + codigo,
                message: '¿Desea eliminar el riesgo/oportunidad ' + codigo + '? (esta acción es irreversible).',
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