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

    <!-- Breadcrumb -->

        <nav class="breadcrumb">

            <ol class="breadcrumb__list">

                <li class="breadcrumb__item"> <svg class="ico ico__puntos b"> </svg> </li>
                <li class="breadcrumb__item"> <a href="/"> Inicio </a> </li>
                <li class="breadcrumb__item"> <span> / </span> </li>               
                <li class="breadcrumb__item"> <a href="/contexto"> Contexto </a> </li>
                <li class="breadcrumb__item"> <span> / </span> </li>               
                <li class="breadcrumb__item"> <a href="/contexto/partesinteresadas"> Partes Interesadas </a> </li>
                <li class="breadcrumb__item"> <span> / </span> </li>               
                <li class="breadcrumb__item actual"> <a href="/contexto/partesinteresadas/historico?id=<?php echo $rev->id; ?>"> 
                
                    <?php
                    
                        switch ($rev->revision) {
                            case 0:
                                echo "Versión viva";
                                break;
                            
                            default:
                                echo "Revisión " . $rev->revision;
                                break;
                        }
                    
                    ?> </a>
                </li>    


            </ol>

        </nav>

        <article>

            <header class="entry-header">

                <h1>
                    <svg class="ico ico__miembros d"></svg>

                    <?php
                    
                        switch ($rev->revision) {
                            case 0:
                                echo "Versión viva de las Partes Interesadas";
                                break;
                            
                            default:
                                echo $rev->revision . "ª revisión de las Partes interesadas";
                                break;
                        }
                
                    ?>
                    
                </h1>
                
            </header>

        </article>

        <div class="tab__container">
                    
            <div class="tab__header n_tabs_6">

                <?php if($crud == 2): ?>
                    <div class="active"> <svg class="ico ico__miembros d"></svg> P.I. Internas </div>
                    <div> <svg class="ico ico__miembros d"></svg> P.I. Externas </div>
                    <div> <svg class="ico ico__documento d"></svg> Metadatos </div>
                    <div> <svg class="ico ico__basededatos d"></svg> Revisiones </div>
                    <div id="tab__header__relations"> <svg class="ico ico__conexiones d"></svg> Relaciones </div>
                    <div id="tab__header__adjunct"> <svg class="ico ico__adjuntar d"></svg> Adjuntos </div>
                <?php endif; ?> 

            </div>

            <div class="tab__body">

                <div class="tab active"> <!-- PI internas -->

                    <div class="block__table">

                        <div class="table__header">
                        
                            <div class="table__title">
                                <h2>
                                    <svg class="ico ico__miembros b"></svg>
                                    Partes Interesadas Internas
                                </h2>
                            </div>               

                        </div>

                        <?php if($pii && $pii != ''): ?>
                        
                            <table>  

                                <thead>
                                    <th class=ocultarColumna>Parte interesada</th>
                                    <th>Código</th>
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
                                            <td onclick="location.href='/contexto/partesinteresadas/read?id=<?php echo $row->id; ?>'"> <?php echo $row->denominador ?> </td> 
                                            <td onclick="location.href='/contexto/partesinteresadas/read?id=<?php echo $row->id; ?>'" class=ocultarColumna> <?php echo $row->codigo_interno ?> </td> 
                                            <td onclick="location.href='/contexto/partesinteresadas/read?id=<?php echo $row->id; ?>'" class=ocultarColumna> <?php echo $row->id ?> </td>
                                            <td onclick="location.href='/contexto/partesinteresadas/read?id=<?php echo $row->id; ?>'" class=ocultarColumna> <?php echo $row->tipo ?> </td>

                                            <!-- Ahora se generan dinámicamente los botones -->
                                            <td onclick="location.href='/contexto/partesinteresadas/read?id=<?php echo $row->id; ?>'">

                                                <div class="btn-group">

                                                    <form 
                                                        method="POST" 
                                                        action="/contexto/partesinteresadas/delete?id=<?php echo $row->id; ?>'" 
                                                        id="form_pii"
                                                    >
                                                        
                                                        <input type="hidden" name="id" value="<?php echo $row->id; ?>">

                                                        <div class="tooltip">

                                                            <button 
                                                                type="button" 
                                                                class="button button__primary button__small button__blue"
                                                                onclick="location.href='/contexto/partesinteresadas/read?id=<?php echo $row->id; ?>'"
                                                            > 
                                                                <svg class="ico ico__ojo w"></svg>
                                                                
                                                            </button>
                                                            
                                                            <span class="tooltiptext">Ver <?php echo $row->tipo ?></span>
                                                            
                                                        </div>

                                                        <?php if($auth): ?>

                                                            <div class="tooltip">

                                                                <button 
                                                                    type="button" 
                                                                    class="button button__primary button__small button__yellow"
                                                                    onclick="location.href='/contexto/partesinteresadas/update?id=<?php echo $row->id; ?>'"
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
                                            <td onclick="location.href='/contexto/partesinteresadas/read?id=<?php echo $row->id; ?>'"> <?php echo $row->denominador ?> </td> 
                                            <td onclick="location.href='/contexto/partesinteresadas/read?id=<?php echo $row->id; ?>'" class=ocultarColumna> <?php echo $row->codigo_interno ?> </td> 
                                            <td onclick="location.href='/contexto/partesinteresadas/read?id=<?php echo $row->id; ?>'" class=ocultarColumna> <?php echo $row->id ?> </td>
                                            <td onclick="location.href='/contexto/partesinteresadas/read?id=<?php echo $row->id; ?>'" class=ocultarColumna> <?php echo $row->tipo ?> </td>

                                            <td onclick="location.href='/contexto/partesinteresadas/read?id=<?php echo $row->id; ?>'"> 

                                                <div class="btn-group">

                                                    <form 
                                                        method="POST" 
                                                        action="/contexto/partesinteresadas/delete?id=<?php echo $row->id; ?>" 
                                                        id="form_pie"
                                                    >
                                                        
                                                        <input type="hidden" name="id" value="<?php echo $row->id; ?>">

                                                        <div class="tooltip">

                                                            <button 
                                                                type="button" 
                                                                class="button button__primary button__small button__blue"
                                                                onclick="location.href='/contexto/partesinteresadas/read?id=<?php echo $row->id; ?>'"
                                                            > 
                                                                <svg class="ico ico__ojo w"></svg>
                                                            
                                                            </button>
                                                            
                                                            <span class="tooltiptext">Ver <?php echo $row->tipo ?></span>

                                                        </div>

                                                        <?php if($auth): ?>

                                                            <div class="tooltip">

                                                                <button 
                                                                    type="button" 
                                                                    class="button button__primary button__small button__yellow"
                                                                    onclick="location.href='/contexto/partesinteresadas/update?id=<?php echo $row->id; ?>'"
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

                <div class="tab"> <!-- Metadatos -->  

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
                                                id="form__historicoparteinteresada" 
                                                name="form__historicoparteinteresada"
                                            
                                                <?php switch ($crud){

                                                    case 1: ?>
                                                        action="/contexto/partesinteresadas/create"
                                                    <?php break;

                                                    case 3: ?>
                                                        action="/contexto/partesinteresadas/update?id=<? echo $rev->id; ?>"
                                                    <?php break;
                                                };?>
                                            >
                                            
                                                <!-- CODIGO -->
                                                <div class="control text w100"> 

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
                                                                    value="<?php echo s($rev->codigo_interno); ?>"

                                                                <?php break; } ?>
                                                        >

                                                        <label class="label">
                                                            <span class="label__text">Codigo</span>
                                                        </label> 

                                                    </div>                                        

                                                </div>

                                                <!-- DENOMINADOR -->
                                                <div class="control textarea w100 h100"> 

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
                                                        ><?php if($crud == 2 || $crud == 3):echo s($rev->denominador);endif;?></textarea>

                                                        <label class="label">
                                                            <span class="label__text">Denominador</span>
                                                        </label> 

                                                    </div>                                        

                                                </div>

                                                <!-- REVISIÓN -->
                                                <div class="control textarea w100 h100"> 

                                                    <div class="textbox">

                                                        <textarea 
                                                            name="revision" 
                                                            id="revision" 

                                                            <?php if($crud == 1): ?>
                                                                required='required'
                                                            <?php endif; ?>

                                                            <?php if($crud == 2): ?>
                                                                class="valid"
                                                                disabled
                                                            <?php endif; ?>

                                                            <?php if($crud ==3): ?>
                                                                class="valid"
                                                            <?php endif; ?>
                                                        ><?php if($crud == 2 || $crud == 3):echo s($rev->revision);endif;?></textarea>

                                                        <label class="label">
                                                            <span class="label__text">Revisión</span>
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
                                                                        disabled
                                                                        value ="<?php echo s($rev->fecha); ?>"                                                            
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

                                    <div class="form__right">

                                        <?php if($rev->revision = 0): ?>

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
                                                                    form="form__historicoparteinteresada"
                                                                    class="button button__primary button__blue w100"
                                                                    onclick="validateFormParteInteresada(form__historicoparteinteresada, <?php echo $crud ?>)"
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
                                                                    onclick="location.href='/contexto/partesinteresadas/update?id=<?php echo $rev->id; ?>'"
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

                                                                    <input type="hidden" name="id" value="<?php echo $rev->id; ?>">

                                                                    <button 
                                                                        type="button" 
                                                                        class="button button__primary button__red w100"
                                                                        onclick="notificarEliminar(this.form, '<?php echo $rev->id;?>', '<?php echo $rev->codigo_interno;?>')"
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

                                        <?php endif;?>    

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>    
            
                <div class="tab"> <!-- Revisiones -->

                    <div class="block__table">

                        <div class="table__header">

                            <div class="table__title">
                                
                                <h2>
                                    <svg class="ico ico__basededatos b"></svg>
                                    Revisiones de las partes interesadas
                                </h2>
        
                            </div>     

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
                                                    <td onclick="location.href='/contexto/partesinteresadas/historico?id=<?php echo $row->id; ?>'"> <?php echo $row->revision ?> </td> 
                                                    <td onclick="location.href='/contexto/partesinteresadas/historico?id=<?php echo $row->id; ?>'" class=ocultarColumna> <?php echo $row->id ?> </td>

                                                    <td onclick="location.href='/contexto/partesinteresadas/historico?id=<?php echo $row->id; ?>'">
                                                        <?php 
                                                            if ( !$row->fecha == null) { echo date('d/m/Y', strtotime($row->fecha)); }
                                                            else { echo ''; }                                                
                                                        ?> 
                                                    </td>

                                                    <td onclick="location.href='/contexto/partesinteresadas/historico?id=<?php echo $row->id; ?>'"> <?php echo $row->comentarios ?> </td>

                                                    <td onclick="location.href='/contexto/partesinteresadas/historico?id=<?php echo $row->id; ?>'"> 

                                                        <div class="btn-group">

                                                            <form method="POST">
                                                                
                                                                <input type="hidden" name="id" value="<?php echo $row->id; ?>">

                                                                <div class="tooltip">

                                                                    <button 
                                                                        type="button" 
                                                                        class="button button__primary button__small button__blue"
                                                                        onclick="location.href='/contexto/partesinteresadas/historico?id=<?php echo $row->id; ?>'"
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

                            <!-- Mostrando <? echo $i+1 ?> registros de un total de  -->
                        
                        <?php else: ?>     
                            <p> Por el momento, no se ha realizado ninguna revisión de las partes interesadas. </p>
                        <?php endif; ?>   
                    </div>

                    <?php if($rev->revision != 0): ?>

                        <div class="block__table">

                            <div class="table__header">

                                <div class="table__title">
                                    
                                    <h2>
                                        <svg class="ico ico__basededatos b"></svg>
                                        Versión viva
                                    </h2>
            
                                </div>     

                            </div>

                            <?php if($versionviva && $versionviva != ''): ?>

                                <table>  

                                    <thead>
                                        <th class=ocultarColumna>id</th>
                                        <th >Denominador</th>
                                        <th >Comentarios</th>
                                        <th></th>
                                    </thead>

                                    <tbody>
                                        
                                        <?php    

                                            for($n = 0; $n < 1; $n++) {

                                                $i = 0;

                                                foreach ($versionviva as $row):?>
                                            
                                                    <tr class='linea'>
                                                        <td onclick="location.href='/contexto/partesinteresadas/historico?id=<?php echo $row->id; ?>'" class=ocultarColumna> <?php echo $row->id ?> </td>
                                                        <td onclick="location.href='/contexto/partesinteresadas/historico?id=<?php echo $row->id; ?>'"> <?php echo $row->denominador ?> </td>
                                                        <td onclick="location.href='/contexto/partesinteresadas/historico?id=<?php echo $row->id; ?>'"> <?php echo $row->comentarios ?> </td>

                                                        <td onclick="location.href='/contexto/partesinteresadas/historico?id=<?php echo $row->id; ?>'"> 

                                                            <div class="btn-group">

                                                                <form method="POST">
                                                                    
                                                                    <input type="hidden" name="id" value="<?php echo $row->id; ?>">

                                                                    <div class="tooltip">

                                                                        <button 
                                                                            type="button" 
                                                                            class="button button__primary button__small button__blue"
                                                                            onclick="location.href='/contexto/partesinteresadas/historico?id=<?php echo $row->id; ?>'"
                                                                        > 
                                                                            <svg class="ico ico__miembros w"></svg>
                                                                        
                                                                        </button>
                                                                        
                                                                        <span class="tooltiptext">Ver versión viva</span>

                                                                    </div>

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
                                <p> No se ha localizado la versión viva de las partes interesadas. </p>
                            <?php endif; ?>   
                        </div>

                    <?php endif; ?>

                </div>

                <div class="tab" id="Tab__relations"></div>

                <div class="tab" id="Tab__adjunct"> </div>

            </div>

        </div>
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