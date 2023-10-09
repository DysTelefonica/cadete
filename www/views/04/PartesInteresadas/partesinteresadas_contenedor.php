<head>

    <!-- Título -->
        <title> Partes interesadas | <?php echo $_SESSION["nombreApp"]; ?> </title>

    <!-- Icono -->
        <link rel="icon" href="/build/img/layout/Internet_2Regular.svg" sizes="any" type="image/svg+xml">
    
</head>

<?php

    if(!isset($_SESSION)){
        session_start();
    }
    
    $auth = $_SESSION['login'] ?? false;

?>

<main>

    <nav class="breadcrumb">

        <ol class="breadcrumb__list">

            <li class="breadcrumb__item"> <svg class="ico ico__puntos b"> </svg> </li>
            <li class="breadcrumb__item"> <a href="/"> Inicio </a> </li>
            <li class="breadcrumb__item"> <span> / </span> </li>               
            <li class="breadcrumb__item"> <a href="/contexto"> Contexto </a> </li>
            <li class="breadcrumb__item"> <span> / </span> </li>               
            <li class="breadcrumb__item"> <a href="/contexto/partesinteresadas"> Partes Interesadas </a> </li>
            <li class="breadcrumb__item"> <span> / </span> </li>        
            
                <?php
                
                    switch ($crud) {

                        case 1: ?>

                            <li class="breadcrumb__item actual"> <a href="/contexto/partesinteresadas/estudio/create"> Nuevo estudio de partes interesadas </a> </li>

                        <?php break; 

                        case 2: 
                        case 3:
                        
                            if(isset($h) && $h){ ?>

                                <li class="breadcrumb__item"> <a href="/contexto/partesinteresadas/estudio/read?id=<?php echo $contenedor_original->id; ?>"> <?php echo $contenedor_original->denominador; ?> </a> </li>
                                <li class="breadcrumb__item"> <span> / </span> </li>    
                                <li class="breadcrumb__item actual"> <a href="/contexto/partesinteresadas/estudio/revision/read?id=<?php echo $contenedor->id; ?>"> Revisión <?php echo $contenedor->revision; ?> </a> </li>
                            <? }
                            else{ ?>
                            
                                <li class="breadcrumb__item actual"> <a href="/contexto/partesinteresadas/estudio/read?id=<?php echo $contenedor->id; ?>"> <?php echo $contenedor->denominador; ?> </a> </li>

                        <?php 
                        }
                        break; 

                    } ?>



        </ol>

    </nav>

    <article>

        <header class="entry-header">

            <h1>
                <svg class="ico ico__miembros d"></svg>

                <?php
                
                    switch ($crud) {
                        case 1:
                            echo "Nuevo estudio de partes interesadas";
                            break;

                        case 2:
                            if(isset($h) && $h){
                                echo $contenedor->revision . "ª revisión de las Partes interesadas";
                            }
                            else{
                                echo $contenedor->denominador;
                            }
                            break;

                        case 3:
                                echo 'Actualizar "' . $contenedor->denominador . "'";                          

                            break;

                    }
            
                ?>
                
            </h1>
            
        </header>

        <div class="tab__container">
                    
            <div class="tab__header n_tabs_6">

                <?php if($crud == 2): ?>
                    <div class="<?php if($crud == 2): echo('active'); endif; ?>"> <svg class="ico ico__miembros d"></svg> P.I. Internas </div>
                    <div> <svg class="ico ico__miembros d"></svg> P.I. Externas </div>
                <?php endif; ?> 
                    <div class="<?php if($crud <> 2): echo('active'); endif; ?>"> <svg class="ico ico__documento d"></svg> Metadatos </div>
                <?php if($crud == 2): ?>
                    <div> <svg class="ico ico__basededatos d"></svg> Revisiones </div>
                    <div id="tab__header__log"> <svg class="ico ico__tiempo d"></svg> Log </div>
                    <div id="tab__header__relations"> <svg class="ico ico__conexiones d"></svg> Relaciones </div>
                    <div id="tab__header__adjunct"> <svg class="ico ico__adjuntar d"></svg> Adjuntos </div>
                <?php endif; ?> 

            </div>

            <div class="tab__body">
                <?php if($crud == 2): ?>

                    <div class="tab <?php if($crud == 2): echo('active'); endif; ?>"> <!-- PI internas -->

                        <div class="block__table">

                            <div class="table__header">
                            
                                <div class="table__title">
                                    <h2>
                                        <svg class="ico ico__miembros b"></svg>
                                        Partes Interesadas Internas
                                    </h2>
                                </div>  
                                   
                                <?php if($auth): ?>

                                    <div class="table__content">

                                        <div class="table__button">

                                            <div class="tooltip">

                                                <button 
                                                    type="button" 
                                                    class="button button__primary button__regular button__green"
                                                    onclick="location.href='/contexto/partesinteresadas/pi/create?c=<?php echo($contenedor->id); ?>&type=1'"
                                                > 
                                                    <svg class="ico ico__anadirmas w"></svg>
                                                </button>
                                                
                                                <span class="tooltiptext">Añadir parte interesada interna</span>

                                            </div>

                                        </div>      

                                    </div>

                                <?php endif; ?>

                            </div>

                            <?php if($pii && $pii != ''): ?>
                            
                                <table>  

                                    <thead>
                                        <th>Parte interesada</th>
                                        <th class=ocultarColumna>Código</th>
                                        <th class=ocultarColumna>id</th>
                                        <th class=ocultarColumna>Tipo</th>
                                        <th></th>
                                    </thead>

                                    <tbody>
                                        
                                        <!-- Introducimos la función php para cargar los datos en la tabla -->
                                        <?php 
                                            foreach ($pii as $row):
                                        ?>

                                            <!-- Esto bebe de la función php de arriba -->
                                            <tr>
                                                <td onclick="location.href='/contexto/partesinteresadas/pi/read?id=<?php echo $row->id; ?>'"> <?php echo $row->denominador ?> </td> 
                                                <td onclick="location.href='/contexto/partesinteresadas/pi/read?id=<?php echo $row->id; ?>'" class=ocultarColumna> <?php echo $row->codigo_interno ?> </td> 
                                                <td onclick="location.href='/contexto/partesinteresadas/pi/read?id=<?php echo $row->id; ?>'" class=ocultarColumna> <?php echo $row->id ?> </td>
                                                <td onclick="location.href='/contexto/partesinteresadas/pi/read?id=<?php echo $row->id; ?>'" class=ocultarColumna> <?php echo $row->tipo ?> </td>

                                                <!-- Ahora se generan dinámicamente los botones -->
                                                <td onclick="location.href='/contexto/partesinteresadas/pi/read?id=<?php echo $row->id; ?>'">

                                                    <div class="btn-group">

                                                        <form 
                                                            method="POST" 
                                                            action="/contexto/partesinteresadas/pi/delete?id=<?php echo $row->id; ?>'" 
                                                            id="form_pii"
                                                        >
                                                            
                                                            <input type="hidden" name="id" value="<?php echo $row->id; ?>">

                                                            <div class="tooltip">

                                                                <button 
                                                                    type="button" 
                                                                    class="button button__primary button__small button__blue"
                                                                    onclick="location.href='/contexto/partesinteresadas/pi/read?id=<?php echo $row->id; ?>'"
                                                                > 
                                                                    <svg class="ico ico__ojo w"></svg>
                                                                    
                                                                </button>
                                                                
                                                                <span class="tooltiptext">Ver <?php echo $row->tipo ?></span>
                                                                
                                                            </div>

                                                            <?php if($auth && !$h): ?>

                                                                <div class="tooltip">

                                                                    <button 
                                                                        type="button" 
                                                                        class="button button__primary button__small button__yellow"
                                                                        onclick="location.href='/contexto/partesinteresadas/pi/update?id=<?php echo $row->id; ?>'"
                                                                    > 
                                                                        <svg class="ico ico__lapicero w"></svg>

                                                                    </button>
                                                                    
                                                                    <span class="tooltiptext">Modificar <?php echo $row->tipo ?></span>

                                                                </div>

                                                                <div class="tooltip">

                                                                    <button 
                                                                        type="button" 
                                                                        class="button button__primary button__small button__red"
                                                                        onclick="notificarEliminar(this.form, '<?php echo $row->id;?>', '<?php echo $row->codigo_interno;?>')"
                                                                    > 
                                                                        <svg class="ico ico__papelera w"></svg>
                                                                        
                                                                    </button>
                                                                    
                                                                    <span class="tooltiptext">Eliminar <?php echo $row->tipo ?></span>

                                                                </div>
                                                                
                                                            <?php endif; ?>

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
                                <p> Por el momento, no se ha detectado ninguna parte interesada interna. </p>
                            <?php endif; ?>   

                        </div>

                    </div>

                    <div class="tab"> <!-- PI externas -->

                        <div class="block__table">

                            <div class="table__header">

                                <div class="table__title">
                                    <h2>
                                        <svg class="ico ico__miembros b"></svg>
                                        Partes Interesadas Externas
                                    </h2>
                                </div>  

                                <?php if($auth): ?>

                                    <div class="table__content">

                                        <div class="table__button">

                                            <div class="tooltip">

                                                <button 
                                                    type="button" 
                                                    class="button button__primary button__regular button__green"
                                                    onclick="location.href='/contexto/partesinteresadas/pi/create?c=<?php echo $contenedor->id; ?>&type=2'"
                                                > 
                                                    <svg class="ico ico__anadirmas w"></svg>

                                                </button>
                                                
                                                <span class="tooltiptext">Añadir Parte Interesada Externa</span>

                                            </div>

                                        </div> 

                                    </div>

                                <?php endif; ?>
                                
                            </div>

                            <?php if($pie && $pie != ''): ?>
                            
                                <table>  

                                    <thead>
                                        <th>Parte interesada</th>
                                        <th class=ocultarColumna>Código</th>
                                        <th class=ocultarColumna>id</th>
                                        <th class=ocultarColumna>Tipo</th>
                                        <th></th>
                                    </thead>

                                    <tbody>
                                        
                                        <?php 
                                            foreach ($pie as $row):
                                        ?>

                                            <tr>
                                                <td onclick="location.href='/contexto/partesinteresadas/pi/read?id=<?php echo $row->id; ?>'"> <?php echo $row->denominador ?> </td> 
                                                <td onclick="location.href='/contexto/partesinteresadas/pi/read?id=<?php echo $row->id; ?>'" class=ocultarColumna> <?php echo $row->codigo_interno ?> </td> 
                                                <td onclick="location.href='/contexto/partesinteresadas/pi/read?id=<?php echo $row->id; ?>'" class=ocultarColumna> <?php echo $row->id ?> </td>
                                                <td onclick="location.href='/contexto/partesinteresadas/pi/read?id=<?php echo $row->id; ?>'" class=ocultarColumna> <?php echo $row->tipo ?> </td>

                                                <td onclick="location.href='/contexto/partesinteresadas/pi/read?id=<?php echo $row->id; ?>'"> 

                                                    <div class="btn-group">

                                                        <form 
                                                            method="POST" 
                                                            action="/contexto/partesinteresadas/pi/delete?id=<?php echo $row->id; ?>" 
                                                            id="form_pie"
                                                        >
                                                            
                                                            <input type="hidden" name="id" value="<?php echo $row->id; ?>">

                                                            <div class="tooltip">

                                                                <button 
                                                                    type="button" 
                                                                    class="button button__primary button__small button__blue"
                                                                    onclick="location.href='/contexto/partesinteresadas/pi/read?id=<?php echo $row->id; ?>'"
                                                                > 
                                                                    <svg class="ico ico__ojo w"></svg>
                                                                
                                                                </button>
                                                                
                                                                <span class="tooltiptext">Ver <?php echo $row->tipo ?></span>

                                                            </div>

                                                            <?php if($auth && !$h): ?>

                                                                <div class="tooltip">

                                                                    <button 
                                                                        type="button" 
                                                                        class="button button__primary button__small button__yellow"
                                                                        onclick="location.href='/contexto/partesinteresadas/pi/update?id=<?php echo $row->id; ?>'"
                                                                    > 
                                                                        <svg class="ico ico__lapicero w"></svg>

                                                                    </button>
                                                                    
                                                                    <span class="tooltiptext">Modificar <?php echo $row->tipo ?></span>

                                                                </div>

                                                                <div class="tooltip">

                                                                    <button 
                                                                        type="button" 
                                                                        class="button button__primary button__small button__red"
                                                                        onclick="notificarEliminar(this.form, '<?php echo $row->id;?>', '<?php echo $row->codigo_interno;?>')"
                                                                    > 
                                                                        <svg class="ico ico__papelera w"></svg>
                                                                        
                                                                    </button>
                                                                    
                                                                    <span class="tooltiptext">Eliminar <?php echo $row->tipo ?></span>

                                                                </div>
                                                                
                                                            <?php endif; ?>

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
                                <p> Por el momento, no se ha detectado ninguna parte interesada externa. </p>
                            <?php endif; ?>   

                        </div>
                    
                    </div>

                <?php endif; ?> 

                <div class="tab <?php if($crud <> 2): echo('active'); endif; ?>"> <!-- Metadatos -->  

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
                                                method='POST'
                                                class="form"
                                                id="form__contenedorparteinteresada" 
                                                name="form__contenedorparteinteresada"
                                            
                                                <?php switch ($crud){

                                                    case 1: ?>
                                                        action="/contexto/partesinteresadas/estudio/create"
                                                    <?php break;

                                                    case 3: ?>
                                                        action="/contexto/partesinteresadas/estudio/update?id=<? echo $contenedor->id; ?>"
                                                    <?php break;
                                                };?>
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
                                                                    readonly
                                                                    class="valid"
                                                                    value="<?php echo s($codigoCalculado); ?>" 

                                                                <?php break;

                                                                case ($crud == 2 || $crud == 3): ?>
                                                                    readonly
                                                                    class="valid"
                                                                    value="<?php echo s($contenedor->codigo_interno); ?>"

                                                                <?php break; } ?>
                                                        >

                                                        <label class="label">
                                                            <span class="label__text">Codigo</span>
                                                        </label> 

                                                    </div>                                        

                                                </div>

                                                <!-- DENOMINADOR -->
                                                <div class="control textarea w100 h100"> 

                                                    <svg class="ico ico__chat b"></svg>

                                                    <div class="textbox">

                                                        <textarea 
                                                            name="denominador" 
                                                            id="denominador" 

                                                            <?php if($crud == 1): ?>
                                                                autofocus='autofocus'
                                                                required='required'
                                                            <?php endif; ?>

                                                            <?php if($crud == 2): ?>
                                                                class="valid"
                                                                disabled
                                                            <?php endif; ?>

                                                            <?php if($crud ==3): ?>
                                                                class="valid"
                                                            <?php endif; ?>
                                                        ><?php if($crud == 2 || $crud == 3):echo s($contenedor->denominador);endif;?></textarea>

                                                        <label class="label">
                                                            <span class="label__text">Denominador</span>
                                                        </label> 

                                                    </div>                                        

                                                </div>

                                                <!-- REVISIÓN -->
                                                <?php if(isset($h) && $h){ ?>

                                                    <div class="control text w100"> 

                                                        <svg class="ico ico__basededatos b"></svg>

                                                        <div class="textbox">

                                                            <input 
                                                                type="text" 
                                                                name="revision" 
                                                                id="revision" 
                                                                
                                                                <?php switch ($crud){

                                                                    case ($crud == 1): ?>
                                                                        readonly
                                                                        class="valid"
                                                                        value="<?php echo s($contenedor->revision); ?>" 

                                                                    <?php break;

                                                                    case ($crud == 2 || $crud == 3): ?>
                                                                        readonly
                                                                        class="valid"
                                                                        value="<?php echo s($contenedor->revision); ?>"

                                                                    <?php break; } ?>
                                                            >

                                                            <label class="label">
                                                                <span class="label__text">Nº. Revisión</span>
                                                            </label> 

                                                        </div>                                        

                                                    </div>

                                                <?php } ?>

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

                                                        <?php if(isset($contenedor->fecha) && $contenedor->fecha != ""): ?>

                                                            <div class="control date w100"> 

                                                                <svg class="ico ico__calendario b"></svg>

                                                                <div class="textbox">

                                                                    <input 
                                                                        type="date" 
                                                                        name="fecha" 
                                                                        id="fecha"  
                                                                        class="valid"
                                                                        disabled
                                                                        value ="<?php echo s($contenedor->fecha); ?>"                                                            
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

                                                        <?php if(isset($contenedor->fecha) && $contenedor->fecha != ""): ?>

                                                            <div class="control date w100"> 

                                                                <svg class="ico ico__calendario b"></svg>

                                                                <div class="textbox">

                                                                    <input 
                                                                        type="date" 
                                                                        name="fecha" 
                                                                        id="fecha"  
                                                                        class="valid"
                                                                        value="<?php echo s($contenedor->fecha); ?>"
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
                                                        ><?php if($crud == 2 || $crud == 3):echo s($contenedor->comentarios);endif;?></textarea>

                                                        <label class="label">
                                                            <span class="label__text">Comentarios</span>
                                                        </label> 

                                                    </div>                                        

                                                </div>

                                            </form>

                                        </div>

                                    </div>  
                                    
                                    <?php if($auth && isset($h) && !$h){ ?>

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
                                                                    form="form__contenedorparteinteresada"
                                                                    class="button button__primary button__blue w100"
                                                                    onclick="validate__contenedorpartesinteresadas_Form(form__contenedorparteinteresada, <?php echo $crud ?>)"
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

                                                                <button 
                                                                    type="button" 
                                                                    class="button button__primary button__yellow w100"
                                                                    onclick="location.href='/contexto/partesinteresadas/estudio/update?id=<?php echo $contenedor->id; ?>'"
                                                                > 
                                                                    <svg class="ico ico__lapicero w"></svg>
                                                                    <span>Modificar revisión</span>
                                                                </button>                                                                                                                 

                                                            </li>

                                                        <?php endif; ?> 

                                                    <!-- ELIMINAR -->
                                                        <?php if($crud == 2 && $auth) :?>

                                                            <li class="toolbar__item">   

                                                                <form 
                                                                    method="POST" 
                                                                    action="/contexto/partesinteresadas/delete" 
                                                                    id="form__deleteParteInteresada"
                                                                >

                                                                    <input type="hidden" name="id" value="<?php echo $contenedor->id; ?>">

                                                                    <button 
                                                                        type="button" 
                                                                        class="button button__primary button__red w100"
                                                                        onclick="notificarEliminar(this.form, '<?php echo $contenedor->id;?>', '<?php echo $contenedor->codigo_interno;?>')"
                                                                    > 
                                                                        <svg class="ico ico__papelera w"></svg>
                                                                        <span>Eliminar revisión</span>
                                                                    </button>                                                                                                                 

                                                                </form>

                                                            </li>

                                                        <?php endif; ?> 

                                                    </ol>

                                                </nav>

                                            </div>      

                                        </div>

                                    <?php } ?>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>  

                <?php if($crud == 2): ?>

                    <div class="tab"> <!-- Revisiones -->

                        <div class="block__table">

                            <div class="table__header">

                                <div class="table__title">
                                    
                                    <h2>
                                        <svg class="ico ico__basededatos b"></svg>
                                        Revisiones de las partes interesadas
                                    </h2>
            
                                </div>  
                                
                                    <?php if($auth && isset($h) && !$h): ?>

                                        <div class="table__button">

                                            <div class="tooltip">
                                                
                                                <button 
                                                    class="button button__primary button__regular button__green w100"
                                                    type="button"
                                                    onclick="dialogRevision(
                                                                            '<?php echo $contenedor->id; ?>', 
                                                                            '<?php echo $contenedor->codigo_interno ?>', 
                                                                            '<?php if(!$ultimaRevision): echo 1; else: echo($ultimaRevision[0]->revision) + 1; endif; ?>'
                                                                            )"
                                                > 
                                                    <svg class="ico ico__lanzar w"></svg>
                                                </button>

                                                <span class="tooltiptext">Realizar revisión</span>

                                            </div>

                                        </div>      
                                    
                                    <?php endif; ?> 

                            </div>

                            <?php if($revisiones && $revisiones != ''): ?>

                                <table>  

                                    <thead>
                                        <th>Revisión</th>
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
                                                        <td onclick="location.href='/contexto/partesinteresadas/estudio/revision/read?id=<?php echo $row->id; ?>'"> <?php echo $row->revision ?> </td> 
                                                        <td onclick="location.href='/contexto/partesinteresadas/estudio/revision/read?id=<?php echo $row->id; ?>'" class=ocultarColumna> <?php echo $row->id ?> </td>

                                                        <td onclick="location.href='/contexto/partesinteresadas/estudio/revision/read?id=<?php echo $row->id; ?>'">
                                                            <?php 
                                                                if ( !$row->fecha == null) { echo date('d/m/Y', strtotime($row->fecha)); }
                                                                else { echo ''; }                                                
                                                            ?> 
                                                        </td>

                                                        <td onclick="location.href='/contexto/partesinteresadas/estudio/revision/read?id=<?php echo $row->id; ?>'"> <?php echo $row->comentarios ?> </td>

                                                        <td onclick="location.href='/contexto/partesinteresadas/estudio/revision/read?id=<?php echo $row->id; ?>'"> 

                                                            <div class="btn-group">

                                                                <form method="POST">
                                                                    
                                                                    <input type="hidden" name="id" value="<?php echo $row->id; ?>">

                                                                    <div class="tooltip">

                                                                        <button 
                                                                            type="button" 
                                                                            class="button button__primary button__small button__blue"
                                                                            onclick="location.href='/contexto/partesinteresadas/estudio/revision/read?id=<?php echo $row->id; ?>'"
                                                                        > 
                                                                            <svg class="ico ico__miembros w"></svg>
                                                                        
                                                                        </button>
                                                                        
                                                                        <span class="tooltiptext">Ver registro histórico</span>

                                                                    </div>

                                                                </form>
                                                                
                                                            </div>

                                                        </td>

                                                    </tr>                                   

                                                <?php endforeach; ?>

                                            <?php } ?>

                                    </tbody>

                                </table>
                            
                            <?php else: ?>     
                                <p> Por el momento, no se ha realizado ninguna revisión de las partes interesadas. </p>
                            <?php endif; ?>   
                        </div>

                    </div>

                    <div class="tab" id="Tab__log"></div>
                    <div class="tab" id="Tab__relations"></div>
                    <div class="tab" id="Tab__adjunct"> </div>

                <?php endif; ?> 

            </div>

        </div>

    </article>

</main>

<script type="text/javascript" src="/build/js/fundamentals/formRevisionPartesInteresadas.js"></script>
<script>

        function validate__contenedorpartesinteresadas_Form(form, crud) {

            if (document.getElementById('denominador').value.length == 0) {
                showSnackbar('¡Falta el denominador!','ico__alerta w','red');
                return false;
            }
            if (document.getElementById('codigo_interno').value.length == 0) {
                showSnackbar('¡Falta el código interno!','ico__alerta w','red');
                return false;
            }

            //Seleccionamos la acción dependiendo del CRUD

                switch(crud){
                    case 1:
                        notificarCrear(form__contenedorparteinteresada);
                    break;

                    case 3:
                        notificarActualizar(form__contenedorparteinteresada);
                    break;
                }

        }

        function notificarCrear(form){

            Dialog.open({
                title: 'CREAR ESTUDIO PARTES INTERESADAS',
                message: 'Va a crear un estudio de partes interesadas ¿Desea continuar?',
                color: 'blue',
                ico: 'ico__miembros d',
                okText: '¡Adelante, créalo!',
                cancelText: 'Mmm no, mejor no',
                onok: () => { form.submit(); }                

            })
        }  
        
        function notificarActualizar(form){

            Dialog.open({
                title: 'ACTUALIZAR ESTUDIO PARTES INTERESADAS',
                message: 'Va a actualizar el estudio de partes interesadas ¿Desea continuar?',
                color: 'blue',
                ico: 'ico__miembros d',
                okText: '¡Los cambios siempre son buenos!',
                cancelText: 'Si algo funciona, ¿Por qué cambiarlo?',
                onok: () => { form.submit(); }                

            })
        }   
        
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

        function dialogRevision(contenedor, codigo_interno, revision){

            Dialog.open({
                title: 'Nueva revisión Partes Interesadas',
                message: '¿Has realizado la revisión de las Partes Interesadas?',
                color: 'blue',
                ico: 'ico__lanzar d',
                okText: 'Por supuesto, ¿Dudas de mi?',
                cancelText: 'Emmmmmmmm, nope',
                onok: () => { 

                                RevisionPartesInteresadas.open({
                                    id: contenedor,
                                    codigo_interno: codigo_interno,
                                    revision: revision,
                                    fecha: obtenerFechaHoy(),
                                })
                            },     

                oncancel: () => { window.location.href = "http://localhost/contexto/partesinteresadas" }       

            })
        }   

    </script>

</html>