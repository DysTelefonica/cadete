<head>

    <!-- Título -->
        
        <title> 

            <?php if($crud == 1): ?>

                   Nuevo Análisis de Contexto | <? echo $_SESSION["nombreApp"]; ?>     

            <?php else: 
                if($analisisContexto->tipo == 1): echo("Análisis DAFO"); else: echo("Analisis del Contexto"); endif; echo " "; echo "$analisisContexto->codigo_interno"; ?>  | <?php echo $_SESSION["nombreApp"]; ?>  

            <?php endif; ?>

        </title> 

    <!-- Icono -->
        <link rel="shortcut icon" href="/build/img/layout/Internet_2Regular_azul.svg">

    <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="/build/css/fundamentals/DAFO.css">
    
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
            <li class="breadcrumb__item"> <a href="/contexto/analisisContexto"> Analisis del Contexto </a> </li>
            <li class="breadcrumb__item"> <span> / </span> </li>     
            
            <?php if($crud == 1):?>
                <li class="breadcrumb__item actual"> <a href="/contexto/analisisContexto/create"> Nuevo Análisis de contexto </a> </li>     
            
            <?php else:?>

                <?php if($h): ?>
                    <li class="breadcrumb__item"> <a href="/contexto/analisisContexto/read?id=<?php echo $analisisContexto->analisisContexto ?>"> <?php echo $analisisContexto__fuente->denominador ?> </a> </li>
                    <li class="breadcrumb__item"> <span> / </span> </li>    
                    <li class="breadcrumb__item actual"> <a href="/contexto/analisisContexto/read-historico?id=<?php echo $analisisContexto->id ?>"> Revisión <?php echo $analisisContexto->revision; ?> </a> </li>
                <?php else: ?>
                    <li class="breadcrumb__item actual"> <a href="/contexto/analisisContexto/read?id=<?php echo $analisisContexto->id ?>"> <?php echo $analisisContexto->denominador ?> </a> </li>
                <?php endif;?>
            
            <?php endif;?>

        </ol>

    </nav>

<!-- #endregion -->

<!-- #region Artículo -->

    <article>

        <header class="entry-header">

            <h1>
                <svg class="ico ico__internet b"></svg>

                    <?php 

                        switch ($crud){

                            case 1: //Create ?>
                                <span>Nuevo <?php if($analisisContexto->tipo == 1): echo("Análisis DAFO"); else: echo("Analisis del Contexto"); endif; ?></span> 
                                
                                <?php break;

                            case 2: //Read ?>

                                <span><?php if($analisisContexto->tipo == 1): echo("Análisis DAFO"); else: echo("Analisis del Contexto"); endif; ?></span>                            

                                <?php break;

                            case 3: //Read ?>

                                <span>Actualizar <?php if($analisisContexto->tipo == 1): echo("Análisis DAFO"); else: echo("Analisis del Contexto"); endif; ?></span>
                                                                                            
                                <?php break;

                        }
                    
                    ?>

            </h1>

            <?php if($h): ?>

                <h2>
                    <?php echo 'Revisión '; echo($analisisContexto->revision) ?>
                </h2>

            <?php endif ?>

        </header>

        <!-- #region Tabs -->

            <div class="tab__container">
                    
                <div class="tab__header n_tabs_5">
                    
                    <?php if($crud == 2 && $analisisContexto->tipo == 1): ?>

                        <div class="active"><svg class="ico ico__internet d"></svg> Análisis DAFO</div>

                    <?php endif; ?> 
                    
                        <div class="<?php if($crud != 2 || $analisisContexto->tipo != 1): echo("active"); endif; ?>"> <svg class="ico ico__documento d"></svg> Metadatos </div>
                    
                    <?php if($crud == 2 && $analisisContexto->tipo == 1): ?>
                        
                        <div> <svg class="ico ico__basededatos d"></svg> <?php if(isset($h) && !$h): echo "Revisiones"; else: echo "Otras revisiones"; endif; ?>  </div>
                    <?php endif; ?> 

                    <?php if($crud == 2): ?>
                        <div id="tab__header__log"> <svg class="ico ico__tiempo d"></svg> Log </div>
                        <div id="tab__header__relations"> <svg class="ico ico__conexiones d"></svg> Relaciones </div>
                        <div id="tab__header__adjunct"> <svg class="ico ico__adjuntar d"></svg> Adjuntos </div>
                    <?php endif; ?> 
                    
                </div>

                <div class="tab__body">

                    <?php if($crud == 2 && $analisisContexto->tipo == 1): ?>

                        <div class="tab active"> <!-- Análisis DAFO -->

                            <?php if(!$h): ?>
                                <p>Esta es la versión viva del Análisis DAFO de Telefónica DyS.</p>
                            <?php else: ?>
                                <p>Esto es una fotografía de cómo estaba el Análisis DAFO durante la revisión <?php echo $analisisContexto->revision ?>, realizada el 
                                <?php 
                                    if ( !$analisisContexto->fecha == null) { echo date('d/m/Y', strtotime($analisisContexto->fecha)); }
                                    else { echo ''; }                                                
                                ?>.
                                
                            <?php endif; ?>
                        
                            <div class="wp-block-columns-2">

                                <div class="wp-block-column">

                                    <div class="block DAFO">

                                        <div class="block__table">

                                            <div class="table__header">
                                
                                                <div class="table__title">
                                                    <h2>Debilidades</h2>
                                                </div>

                                                <?php if($auth && isset($h) && !$h): ?>

                                                    <div class="table__button">

                                                        <div class="tooltip">

                                                            <button 
                                                                type="button" 
                                                                class="button button__primary button__regular button__green"
                                                                onclick="location.href='/contexto/analisisContexto/AnalisisDAFO/create?analisisContexto=<?php echo $analisisContexto->id ?>&tipo=1'"
                                                            > 
                                                                <svg class="ico ico__anadirmas w"></svg>
                                                            </button>
                                                            
                                                            <span class="tooltiptext">Añadir debilidad</span>

                                                        </div>

                                                    </div>      
                                                
                                                <?php endif; ?>

                                            </div>

                                            <?php if($debilidades && $debilidades != ''): ?>

                                                <table class=tablajs>                     
                            
                                                    <tbody>
                                                    
                                                        <?php foreach ($debilidades as $row): ?>

                                                            <tr
                                                                class='linea'
                                                                
                                                                <?php if(isset($h) && $h): ?>
                                                                    onclick="location.href='/contexto/analisisContexto/AnalisisDAFO/read-historico?id=<?php echo $row->id; ?>'"
                                                                <?php else: ?>
                                                                    onclick="location.href='/contexto/analisisContexto/AnalisisDAFO/read?id=<?php echo $row->id; ?>'"
                                                                <?php endif; ?>
                                                            
                                                            >
                                                                <td> <?php echo $row->codigo_interno ?> </td> 
                                                                <td class=ocultarColumna> <?php echo $row->id ?> </td>
                                                                <td class=ocultarColumna> <?php echo $row->analisisContexto ?> </td>
                                                                <td> <?php echo $row->denominador ?> </td> 
                                                                <td class=ocultarColumna> <?php echo $row->tipo ?> </td>
                                                                
                                                                <td>
                                                                    <div class="btn-group">

                                                                        <form 
                                                                            method="POST" 
                                                                            action="/contexto/analisisContexto/AnalisisDAFO/delete" 
                                                                            id="formEliminarAnalisisDAFO"
                                                                        >

                                                                            <input type="hidden" name="id" value="<?php echo $row->id; ?>">

                                                                            <div class="tooltip">
                                                                            
                                                                                <button 
                                                                                    type="button" 
                                                                                    class="button button__primary button__small button__blue"

                                                                                    <?php if($h): ?>
                                                                                        onclick="location.href='/contexto/analisisContexto/AnalisisDAFO/read-historico?id=<?php echo $row->id; ?>'"
                                                                                    <?php else: ?>
                                                                                        onclick="location.href='/contexto/analisisContexto/AnalisisDAFO/read?id=<?php echo $row->id; ?>'"
                                                                                    <?php endif; ?>
                                                                                
                                                                                        > 
                                                                                    <svg class="ico ico__ojo w"></svg>

                                                                                </button>

                                                                                <span class="tooltiptext">Ver <?php echo $row->tipo ?></span>

                                                                            </div>

                                                                            <?php if($auth && isset($h) && !$h): ?>

                                                                                <div class="tooltip">

                                                                                    <button 
                                                                                        type="button" 
                                                                                        class="button button__primary button__small button__yellow"
                                                                                        onclick="location.href='/contexto/analisisContexto/AnalisisDAFO/update?id=<?php echo $row->id; ?>'"
                                                                                    > 
                                                                                        <svg class="ico ico__lapicero w"></svg>

                                                                                    </button>
                                                                                    
                                                                                    <span class="tooltiptext">Modificar <?php echo $row->tipo ?></span>

                                                                                </div>
                                                                                
                                                                                <div class="tooltip">

                                                                                    <button 
                                                                                        type="button" 
                                                                                        class="button button__primary button__small button__red"
                                                                                        onclick="notificarEliminar(this.form, '<?php echo $row->id;?>', '<?php echo $row->codigo_interno;?>', '<?php echo $row->tipo;?>')"
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

                                                        <?php endforeach; ?>

                                                    </tbody>
                                                
                                                </table>

                                            <?php else: ?>     
                                                <p> Por el momento, no se ha detectado ninguna debilidad </p>
                                            <?php endif; ?>   

                                        </div>

                                    </div>

                                </div>

                                <div class="wp-block-column">

                                    <div class="block DAFO">

                                        <div class="block__table">
                                        
                                            <div class="table__header">
                                
                                                <div class="table__title">
                                                    <h2>Amenazas</h2>
                                                </div>

                                                <?php if($auth && isset($h) && !$h): ?>

                                                    <div class="table__button">

                                                        <div class="tooltip">

                                                            <button 
                                                                type="button" 
                                                                class="button button__primary button__regular button__green"
                                                                onclick="location.href='/contexto/analisisContexto/AnalisisDAFO/create?analisisContexto=<?php echo $analisisContexto->id ?>&tipo=2'"
                                                            > 
                                                                <svg class="ico ico__anadirmas w"></svg>

                                                            </button>
                                                            
                                                            <span class="tooltiptext">Añadir amenaza</span>

                                                        </div>

                                                    </div>      
                                                
                                                <?php endif; ?>

                                            </div>

                                            <?php if($amenazas && $amenazas != ''): ?>

                                                <table class=tablajs>                     
                                                                    
                                                    <tbody>
                                                    
                                                        <?php foreach ($amenazas as $row): ?>

                                                            <tr 
                                                                class='linea'
                                                                
                                                                <?php if(isset($h) && $h): ?>
                                                                    onclick="location.href='/contexto/analisisContexto/AnalisisDAFO/read-historico?id=<?php echo $row->id; ?>'"
                                                                <?php else: ?>
                                                                    onclick="location.href='/contexto/analisisContexto/AnalisisDAFO/read?id=<?php echo $row->id; ?>'"
                                                                <?php endif; ?>
                                                            
                                                            >
                                                                <td> <?php echo $row->codigo_interno ?> </td> 
                                                                <td class=ocultarColumna> <?php echo $row->analisisContexto ?> </td>
                                                                <td> <?php echo $row->denominador ?> </td> 
                                                                <td class=ocultarColumna> <?php echo $row->tipo ?> </td>
                                                                
                                                                <td>
                                                                    <div class="btn-group">

                                                                        <form 
                                                                            method="POST" 
                                                                            action="/contexto/analisisContexto/AnalisisDAFO/delete" 
                                                                            id="formEliminarAnalisisDAFO"
                                                                        >

                                                                            <input type="hidden" name="id" value="<?php echo $row->id; ?>">

                                                                            <div class="tooltip">

                                                                                <button 
                                                                                    type="button" 
                                                                                    class="button button__primary button__small button__blue"

                                                                                    <?php if($h): ?>
                                                                                        onclick="location.href='/contexto/analisisContexto/AnalisisDAFO/read-historico?id=<?php echo $row->id; ?>'"
                                                                                    <?php else: ?>
                                                                                        onclick="location.href='/contexto/analisisContexto/AnalisisDAFO/read?id=<?php echo $row->id; ?>'"
                                                                                    <?php endif; ?>
                                                                                > 
                                                                                    <svg class="ico ico__ojo w"></svg>

                                                                                </button>
                                                                                
                                                                                <span class="tooltiptext">Ver <?php echo $row->tipo ?></span>

                                                                            </div>

                                                                            <?php if($auth && isset($h) && !$h): ?>
                                                                                
                                                                                <div class="tooltip">

                                                                                    <button 
                                                                                        type="button" 
                                                                                        class="button button__primary button__small button__yellow"
                                                                                        onclick="location.href='/contexto/analisisContexto/AnalisisDAFO/update?id=<?php echo $row->id; ?>'"
                                                                                    > 
                                                                                        <svg class="ico ico__lapicero w"></svg>

                                                                                    </button>
                                                                                    
                                                                                    <span class="tooltiptext">Modificar <?php echo $row->tipo ?></span>

                                                                                </div>

                                                                                <div class="tooltip">

                                                                                    <button 
                                                                                        type="button" 
                                                                                        class="button button__primary button__small button__red"
                                                                                        onclick="notificarEliminar(this.form, '<?php echo $row->id;?>', '<?php echo $row->codigo_interno;?>', '<?php echo $row->tipo;?>')"
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

                                                        <?php endforeach; ?>

                                                    </tbody>
                                                
                                                </table>

                                            <?php else: ?>     
                                                <p> Por el momento, no se ha detectado ninguna amenaza. </p>
                                            <?php endif; ?>   

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="wp-block-columns-2">

                                <div class="wp-block-column">

                                    <div class="block DAFO">

                                        <div class="block__table">

                                            <div class="table__header">
                                    
                                                <div class="table__title">
                                                    <h2>Fortalezas</h2>
                                                </div>

                                                <?php if($auth && isset($h) && !$h): ?>

                                                    <div class="table__button">

                                                        <div class="tooltip">

                                                            <button 
                                                                type="button" 
                                                                class="button button__primary button__regular button__green"
                                                                onclick="location.href='/contexto/analisisContexto/AnalisisDAFO/create?analisisContexto=<?php echo $analisisContexto->id ?>&tipo=3'"
                                                            > 
                                                                <svg class="ico ico__anadirmas w"></svg>

                                                            </button>

                                                            <span class="tooltiptext">Añadir fortaleza</span>

                                                        </div>

                                                    </div>      
                                                
                                                <?php endif; ?>

                                            </div>

                                            <?php if($fortalezas && $fortalezas != ''): ?>

                                                <table class=tablajs>                     
                            
                                                    <tbody>
                                                    
                                                        <?php foreach ($fortalezas as $row): ?>

                                                            <tr 
                                                                class='linea'
                                                            
                                                                <?php if(isset($h) && $h): ?>
                                                                    onclick="location.href='/contexto/analisisContexto/AnalisisDAFO/read-historico?id=<?php echo $row->id; ?>'"
                                                                <?php else: ?>
                                                                    onclick="location.href='/contexto/analisisContexto/AnalisisDAFO/read?id=<?php echo $row->id; ?>'"
                                                                <?php endif; ?>>

                                                                <td> <?php echo $row->codigo_interno ?> </td> 

                                                                <td class=ocultarColumna> <?php echo $row->analisisContexto ?> </td>
                                                                                                                                
                                                                <td> <?php echo $row->denominador ?> </td> 
                                                                
                                                                <td class=ocultarColumna> <?php echo $row->tipo ?> </td>
                                                                
                                                                <td>
                                                                    <div class="btn-group">

                                                                        <form 
                                                                            method="POST" 
                                                                            action="/contexto/analisisContexto/AnalisisDAFO/delete" 
                                                                            id="formEliminarAnalisisDAFO"
                                                                        >

                                                                            <input type="hidden" name="id" value="<?php echo $row->id; ?>">

                                                                            <div class="tooltip">

                                                                                <button 
                                                                                    type="button" 
                                                                                    class="button button__primary button__small button__blue"
                                                                                    
                                                                                    <?php if(isset($h)): ?>
                                                                                        onclick="location.href='/contexto/analisisContexto/AnalisisDAFO/read-historico?id=<?php echo $row->id; ?>'"
                                                                                    <?php else: ?>
                                                                                        onclick="location.href='/contexto/analisisContexto/AnalisisDAFO/read?id=<?php echo $row->id; ?>'"
                                                                                    <?php endif; ?>

                                                                                > 
                                                                                    <svg class="ico ico__ojo w"></svg>
                                                                                    
                                                                                </button>
                                                                                
                                                                                <span class="tooltiptext">Ver <?php echo $row->tipo ?></span>

                                                                            </div>

                                                                            <?php if($auth && isset($h) && !$h): ?>

                                                                                <div class="tooltip">

                                                                                    <button 
                                                                                        type="button" 
                                                                                        class="button button__primary button__small button__yellow"
                                                                                        onclick="location.href='/contexto/analisisContexto/AnalisisDAFO/update?id=<?php echo $row->id; ?>'"
                                                                                    > 
                                                                                        <svg class="ico ico__lapicero w"></svg>
                                                                                        
                                                                                    </button>
                                                                                    
                                                                                    <span class="tooltiptext">Modificar <?php echo $row->tipo ?></span>

                                                                                </div>
                                                                                
                                                                                <div class="tooltip">

                                                                                    <button 
                                                                                        type="button" 
                                                                                        class="button button__primary button__small button__red"
                                                                                        onclick="notificarEliminar(this.form, '<?php echo $row->id;?>', '<?php echo $row->codigo_interno;?>', '<?php echo $row->tipo;?>')"
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

                                                        <?php endforeach; ?>

                                                    </tbody>
                                                
                                                </table>
                                                
                                            <?php else: ?>     
                                                <p> Por el momento, no se ha detectado ninguna fortaleza. </p>
                                            <?php endif; ?>   

                                        </div>

                                    </div>

                                </div>

                                <div class="wp-block-column">

                                    <div class="block DAFO">

                                        <div class="block__table">

                                            <div class="table__header">
                                
                                                <div class="table__title">
                                                    <h2>Oportunidades</h2>
                                                </div>

                                                <?php if($auth && isset($h) && !$h): ?>

                                                    <div class="table__button">

                                                        <div class="tooltip">

                                                            <button 
                                                                type="button" 
                                                                class="button button__primary button__regular button__green"
                                                                onclick="location.href='/contexto/analisisContexto/AnalisisDAFO/create?analisisContexto=<?php echo $analisisContexto->id ?>&tipo=4'"
                                                            > 
                                                                <svg class="ico ico__anadirmas w"></svg>

                                                            </button>
                                                            
                                                            <span class="tooltiptext">Añadir oportunidad</span>

                                                        </div>

                                                    </div>      
                                                
                                                <?php endif; ?>

                                            </div>

                                            <?php if($oportunidades && $oportunidades != ''): ?>

                                                <table class=tablajs>                     
                                                                    
                                                    <tbody>
                                                    
                                                        <?php foreach ($oportunidades as $row): ?>

                                                            <tr 
                                                                class='linea'
                                                                
                                                                <?php if(isset($h) && $h): ?>
                                                                    onclick="location.href='/contexto/analisisContexto/AnalisisDAFO/read-historico?id=<?php echo $row->id; ?>'"
                                                                <?php else: ?>
                                                                    onclick="location.href='/contexto/analisisContexto/AnalisisDAFO/read?id=<?php echo $row->id; ?>'"
                                                                <?php endif; ?>
                                                            
                                                            >
                                                            
                                                                <td> <?php echo $row->codigo_interno ?> </td> 
                                                                <td class=ocultarColumna> <?php echo $row->analisisContexto ?> </td>
                                                                <td> <?php echo $row->denominador ?> </td> 
                                                                <td class=ocultarColumna> <?php echo $row->tipo ?> </td>
                                                                
                                                                <td>
                                                                    <div class="btn-group">

                                                                        <form 
                                                                            method="POST" 
                                                                            action="/contexto/analisisContexto/AnalisisDAFO/delete" 
                                                                            id="formEliminarAnalisisDAFO"
                                                                        >

                                                                            <input type="hidden" name="id" value="<?php echo $row->id; ?>">

                                                                            <div class="tooltip">

                                                                                <button 
                                                                                    type="button" 
                                                                                    class="button button__primary button__small button__blue"
                                                                                    
                                                                                    <?php if(isset($h)): ?>
                                                                                        onclick="location.href='/contexto/analisisContexto/AnalisisDAFO/read-historico?id=<?php echo $row->id; ?>'"
                                                                                    <?php else: ?>
                                                                                        onclick="location.href='/contexto/analisisContexto/AnalisisDAFO/read?id=<?php echo $row->id; ?>'"
                                                                                    <?php endif; ?>
                                                                                > 
                                                                                    <svg class="ico ico__ojo w"></svg>
                                                                                    
                                                                                </button>
                                                                                
                                                                                <span class="tooltiptext">Ver <?php echo $row->tipo ?></span>

                                                                            </div>

                                                                            <?php if($auth && isset($h) && !$h): ?>

                                                                                <div class="tooltip">

                                                                                    <button 
                                                                                        type="button" 
                                                                                        class="button button__primary button__small button__yellow"
                                                                                        onclick="location.href='/contexto/analisisContexto/AnalisisDAFO/update?id=<?php echo $row->id; ?>'"
                                                                                    > 
                                                                                        <svg class="ico ico__lapicero w"></svg>
                                                                                        
                                                                                    </button>
                                                                                    
                                                                                    <span class="tooltiptext">Modificar <?php echo $row->tipo ?></span>

                                                                                </div>
                                                                                
                                                                                <div class="tooltip">

                                                                                    <button 
                                                                                        type="button" 
                                                                                        class="button button__primary button__small button__red"
                                                                                        onclick="notificarEliminar(this.form, '<?php echo $row->id;?>', '<?php echo $row->codigo_interno;?>', '<?php echo $row->tipo;?>')"
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

                                                        <?php endforeach; ?>

                                                    </tbody>
                                                
                                                </table>

                                            <?php else: ?>     
                                                <p> Por el momento, no se ha detectado ninguna oportunidad. </p>
                                            <?php endif; ?>   

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    <?php endif; ?> 

                    <div class="tab <?php if($crud != 2 || $analisisContexto->tipo != 1): echo("active"); endif; ?>"> <!-- Metadatos -->
   
                        <div class="entry-content">

                            <div class="block">

                                <div class="block__content form">

                                    <div class="form__two">

                                    <!-- Formulario -->

                                        <div class="form__left">

                                            <?php if($h): ?>

                                                <h2>
                                                    <svg class="ico ico__lanzar b"></svg>
                                                    <span>Metadatos de la revision</span>
                                                </h2>  

                                                <div class="form__leftContent">

                                                    <form 
                                                        class="form"
                                                        action="">

                                                        <!-- REVISIÓN -->
                                                        <div class="control text w100"> 

                                                            <div class="textbox">

                                                                <input 
                                                                    name="revision" 
                                                                    id="revision"
                                                                    autocomplete='off'
                                                                    value="<?php echo s($analisisContexto->revision); ?>"
                                                                    
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

                                                                <?php if(isset($analisisContexto->fecha) && $analisisContexto->fecha != ""): ?>

                                                                    <div class="control date w100"> 

                                                                        <div class="textbox">

                                                                            <input 
                                                                                type="date" 
                                                                                name="fecha" 
                                                                                id="fecha"  
                                                                                class="valid"
                                                                                readonly
                                                                                value ="<?php echo s($analisisContexto->fecha); ?>"                                                            
                                                                            >

                                                                            <label class="label">
                                                                                <span class="label__text">Fecha de la Revisión</span>
                                                                            </label> 

                                                                            <svg class="ico ico__calendario b"></svg>

                                                                        </div>                                        

                                                                    </div>

                                                                <?php endif; ?>

                                                            <?php break; ?>

                                                            <?php case 3: ?>

                                                                <?php if(isset($analisisContexto->fecha) && $analisisContexto->fecha != ""): ?>

                                                                    <div class="control date w100"> 

                                                                        <div class="textbox">

                                                                            <input 
                                                                                type="date" 
                                                                                name="fecha" 
                                                                                id="fecha"  
                                                                                class="valid"
                                                                                value="<?php echo s($analisisContexto->fecha); ?>"
                                                                            >

                                                                            <label class="label">
                                                                                <span class="label__text">Fecha de la Revisión</span>
                                                                            </label> 

                                                                            <svg class="ico ico__calendario b"></svg>

                                                                        </div>                                        

                                                                    </div>

                                                                <?php endif; ?>

                                                            <?php break; ?>
                                                        
                                                        <?php }; ?>
                                                        
                                                        <!-- CONTROL CAMBIOS -->
                                                        <div class="control textarea w100"> 

                                                            <div class="textbox">

                                                                <textarea 
                                                                    name="control_cambios" 
                                                                    id="control_cambios" 
                                                                    cols="30" 
                                                                    rows="15"

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
                                                                ><?php if($crud == 2 || $crud == 3):echo s($analisisContexto->control_cambios);endif;?></textarea>

                                                                <label class="label">
                                                                    <span class="label__text">Control de cambios</span>
                                                                </label> 

                                                            </div>                                        

                                                        </div>

                                                        <!-- COMENTARIOS REVISIÓN -->
                                                        <div class="control textarea w100"> 

                                                            <div class="textbox">

                                                                <textarea 
                                                                    name="comentarios_ed" 
                                                                    id="comentarios_ed" 
                                                                    cols="30" 
                                                                    rows="5"

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
                                                                ><?php if($crud == 2 || $crud == 3):echo s($analisisContexto->comentarios);endif;?></textarea>

                                                                <label class="label">
                                                                    <span class="label__text">Comentarios (Revisión)</span>
                                                                </label> 

                                                            </div>                                        

                                                        </div>

                                                    </form>
                                                
                                                </div>

                                            <?php endif; ?>

                                            <h2>
                                                <svg class="ico ico__documento b"></svg>
                                                <span>Metadatos</span>
                                            </h2>

                                            <div class="form__leftContent">

                                                <form 
                                                    class="form"
                                                    id="form__analisiscontexto" 
                                                    method='POST'
                                                
                                                    <?php switch ($crud){

                                                        case 1: ?>
                                                            action="/contexto/analisisContexto/create"
                                                        <?php break;

                                                        case 3: ?>
                                                            action="/contexto/analisisContexto/update?id=<?php echo $analisisContexto->id; ?>"
                                                        <?php break;}?>>

                                                    <!-- ID -->

                                                    <input 
                                                        type="hidden"
                                                        name="id"
                                                        id="id"
                                                        value=<?php echo $analisisContexto->id; ?>
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

                                                                        value="<?php echo s($analisisContexto->codigo_interno); ?>"
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
                                                                value="<?php echo s($analisisContexto->denominador); ?>"
                                                                
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

                                                        <svg class="ico ico__proceso b"></svg>

                                                        <div class="textbox">

                                                            <select 
                                                                name="tipo" 
                                                                id="tipo" 
                                                                class="valid"
                                                                value="<?php echo s($analisisContexto->tipo); ?>"
                                                                
                                                                <?php if($crud == 1): ?>
                                                                    required='required'
                                                                <?php endif; ?>

                                                                <?php if($crud == 2): ?>
                                                                    disabled
                                                                <?php endif; ?>
                                                            
                                                            >
                                                            
                                                                <option selected value=""> Seleccione el tipo de análisis de contexto </option>    

                                                                <?php foreach($tiposAnalisisContexto as $tipo) { ?>
                                                                    
                                                                    <option <?php echo s($tipo->id) === s($analisisContexto->tipo) ? 'selected' : '' ?> value="<?php echo s($tipo->id);?>"> <?php echo s($tipo->tipo); ?> </option>

                                                                <?php } ?>

                                                            </select>

                                                            <label class="label">
                                                                <span class="label__text">Tipo</span>
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
                                                            ><?php if($crud == 2 || $crud == 3):echo s($analisisContexto->comentarios);endif;?></textarea>

                                                            <label class="label">
                                                                <span class="label__text">Comentarios</span>
                                                            </label> 

                                                        </div>                                        

                                                    </div>

                                                </form>

                                            </div>
                                        
                                           

                                        </div>

                                    <!-- Acciones -->
                                        <?php if($auth && isset($h) && !$h): ?>

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
                                                                        form="form__analisiscontexto"
                                                                        class="button button__primary button__blue w100"
                                                                        onclick="validate__analisisContexto_Form(form__analisiscontexto, <?php echo $crud ?>)"
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

                                                                        <input type="hidden" name="id" value="<?php echo $analisisContexto->id; ?>">

                                                                        <button 
                                                                            type="button" 
                                                                            class="button button__primary button__yellow w100"
                                                                            onclick="location.href='/contexto/analisisContexto/update?id=<?php echo $analisisContexto->id; ?>'"
                                                                        > 
                                                                            <svg class="ico ico__lapicero w"></svg>
                                                                            <span>Modificar análisis de contexto</span>
                                                                        </button>                                                                                                                 

                                                                    </form>

                                                                </li>

                                                            <?php endif; ?> 

                                                            
                                                            <?php if($crud == 2 && $auth) :?>  <!-- Eliminar -->

                                                                <li class="toolbar__item">   

                                                                    <form 
                                                                        method="POST" 
                                                                        action="/contexto/analisisContexto/delete" 
                                                                        id="formEliminarAnalisisContexto"
                                                                    >

                                                                        <input type="hidden" name="id" value="<?php echo $analisisContexto->id; ?>">

                                                                        <button 
                                                                            type="button" 
                                                                            class="button button__primary button__red w100"
                                                                            onclick="notificarEliminar(this.form, '<?php echo $analisisContexto->id;?>', '<?php echo $analisisContexto->codigo_interno;?>')"
                                                                        > 
                                                                            <svg class="ico ico__papelera w"></svg>
                                                                            <span>Eliminar análisis de contexto</span>
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
                    
                    <?php if($crud == 2 && $analisisContexto->tipo == 1): ?>

                        <div class="tab"> <!-- Revisiones -->

                            <div class="block__table">

                            <p> Deberá realizarse una revisión del contexto, como mínimo, cada 6 meses.</p>

                            <? if(isset($ultimaRevision[0]->id) && $ultimaRevision[0]->fecha != 0){ ?>

                            <p> 
                                La última revisión del contexto se realizó el <a href="/contexto/analisisContexto/read-historico?id=<?php echo $ultimaRevision[0]->id; ?>"><?php echo date('d/m/Y', strtotime($ultimaRevision[0]->fecha)); ?></a>. 
                                La próxima revisión deberá hacerse antes de <span style='color: red'> <?php echo date('d/m/Y', strtotime($ultimaRevision[0]->fecha."+ 6 months")); ?> </span> .
                            </p>

                            <? }else{ ?>

                                <p style='color: red'>Todavía no se han realizado revisiones de este análisis del contexto.</p>


                            <? } ?>

                                <div class="table__header">

                                    <div class="table__title">
                                        <h2>
                                            <svg class="ico ico__basededatos b"></svg>
                                            Histórico de revisiones
                                        </h2>
                                    </div>

                                    <?php if($auth && isset($h) && !$h): ?>

                                        <div class="table__button">

                                            <div class="tooltip">
                                                
                                                <button 
                                                    class="button button__primary button__regular button__green w100"
                                                    type="button"
                                                    onclick="dialogRevision(
                                                                            '<?php echo $analisisContexto->id; ?>', 
                                                                            '<?php echo $analisisContexto->codigo_interno ?>', 
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

                                <?php if(isset($historico) && !empty($historico)):?>

                                    <table>  

                                        <thead>
                                            <th>Revisión</th>
                                            <th class="ocultarColumna">id</th>
                                            <th>Fecha</th>
                                            <th>Comentarios</th>
                                            <th></th>
                                        </thead>

                                        <tbody>
                                            
                                            <!-- Introducimos la función php para cargar los datos en la tabla -->
                                            <?php 
                                                $i = 0;
                                                foreach ($historico as $row):
                                            ?>

                                                <!-- Esto bebe de la función php de arriba -->
                                                <tr class='linea'>
                                                    <td onclick="location.href='/contexto/analisisContexto/read-historico?id=<?php echo $row->id; ?>'"> <?php echo $row->revision ?> </td> 
                                                    <td class="ocultarColumna" onclick="location.href='/contexto/analisisContexto/read-historico?id=<?php echo $row->id; ?>'"> <?php echo $row->id ?> </td>
                                                    
                                                    <td onclick="location.href='/contexto/analisisContexto/read-historico?id=<?php echo $row->id; ?>'"> 
                                                        <?php 
                                                            if ( !$row->fecha == null) { echo date('d/m/Y', strtotime($row->fecha)); }
                                                            else { echo ''; }                                                
                                                        ?> 
                                                    </td>

                                                    <td onclick="location.href='/contexto/analisisContexto/read-historico?id=<?php echo $row->id; ?>'"> <?php echo $row->comentarios ?> </td>

                                                    <!-- Ahora se generan dinámicamente los botones -->
                                                    <td> 

                                                        <div class="btn-group">

                                                            <form 
                                                                method="POST" 
                                                                action="/contexto/analisisContexto/delete-historical" 
                                                                id="form__EliminarHistorico"
                                                            >
                                                                
                                                                <input type="hidden" name="id" value="<?php echo $row->id; ?>">
                                                                
                                                                <div class="tooltip">

                                                                    <button 
                                                                        type="button" 
                                                                        class="button button__primary button__small button__blue"
                                                                        onclick="location.href='/contexto/analisisContexto/read-historico?id=<?php echo $row->id; ?>'"
                                                                    > 
                                                                        <svg class="ico ico__ojo w"></svg>
                                                                    </button>

                                                                    <span class="tooltiptext">Ver análisis DAFO del registro histórico</span>

                                                                </div>

                                                                <?php if($auth && isset($h) && !$h): ?>

                                                                    <?php for($i = $i; $i < 1; $i++) { ?> 

                                                                        <div class="tooltip">
                                                                        
                                                                            <button 
                                                                                type="button" 
                                                                                class="button button__primary button__small button__red"
                                                                                onclick="notificarEliminarHistorico(this.form, '<?php echo $row->id; ?>', '<?php echo $row->codigo_interno; ?>', <?php echo $row->revision; ?>)"
                                                                            > 
                                                                                <svg class="ico ico__papelera w"></svg>

                                                                            </button>

                                                                            <span class="tooltiptext">Eliminar registro histórico</span>

                                                                        </div>

                                                                    <?php } ?>
                                                                    
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
                                    <p> Por el momento, no se ha realizado ninguna revisión del análisis DAFO. </p>
                                <?php endif; ?>

                            </div>

                            <?php if(isset($h) && $h): ?>

                                <div class="block__table">

                                    <div class="table__content">

                                        <div class="table__header">

                                            <div class="table__title">
                                                <h2>
                                                    <svg class="ico ico__basededatos b"></svg>
                                                    Análisis DAFO vivo
                                                </h2>
                                            </div>

                                        </div>

                                        <?php if($analisisContexto__fuente != ''): ?>

                                            <table>  

                                                <thead>
                                                    <th>Código</th>
                                                    <th>Nombre</th>
                                                    <th></th>
                                                </thead>

                                                <tbody>

                                                    <tr class='linea'>
                                                        
                                                        <td onclick="location.href='/contexto/analisisContexto/read?id=<?php echo $analisisContexto__fuente->id; ?>'"> <?php echo $analisisContexto__fuente->codigo_interno ?> </td> 
                                                        <td onclick="location.href='/contexto/analisisContexto/read?id=<?php echo $analisisContexto__fuente->id; ?>'"> <?php echo $analisisContexto__fuente->denominador ?> </td>

                                                        <!-- Ahora se generan dinámicamente los botones -->
                                                        <td> 

                                                            <div class="btn-group">

                                                                <form 
                                                                >
                                                                    
                                                                    <input type="hidden" name="id" value="<?php echo $r->id; ?>">

                                                                    <div class="tooltip">                                           
                                                                        <button 
                                                                            type="button" 
                                                                            class="button button__primary button__small button__blue"
                                                                            value="" 
                                                                            onclick="location.href='/contexto/analisisContexto/read?id=<?php echo $r->id; ?>'"
                                                                        > 
                                                                            <svg class="ico ico__ojo w"></svg>

                                                                        </button>
                                                                        <span class="tooltiptext">Ver análisis DAFO vivo</span>
                                                                    </div>

                                                                </form>
                                                                
                                                            </div>

                                                        </td>

                                                    </tr>

                                                </tbody>

                                            </table>

                                        <?php else: ?>     
                                            <p> No se ha encontrado la versión viva del Análisis DAFO. </p>
                                        <?php endif; ?>   

                                    </div>

                                </div>

                            <?php endif; ?> 

                        </div>

                    <?php endif; ?> 

                    <?php if($crud == 2): ?>
                        <div class="tab" id="Tab__log"></div> <!-- Relaciones -->
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

        function validate__analisisContexto_Form(form, crud) {

            if (document.getElementById('denominador').value.length == 0) {
                showSnackbar('¡Falta el denominador!','ico__alerta w','red');
                return false;
            }
            if (document.getElementById('tipo').value.length == 0) {
                showSnackbar('¡Falta el tipo!','ico__alerta w','red');
                return false;
            }


            //Seleccionamos la acción dependiendo del CRUD

                switch(crud){
                    case 1:
                        notificarCrear(form__analisiscontexto);
                    break;

                    case 3:
                        notificarActualizar(form__analisiscontexto);
                    break;
                }

        }

        function notificarCrear(form){

            Dialog.open({
                title: 'CREAR ANÁLISIS DE CONTEXTO',
                message: 'Va a crear un nuevo análisis de contexto ¿Desea continuar?',
                color: 'blue',
                ico: 'ico__internet d',
                okText: '¡Adelante, créalo!',
                cancelText: 'Mmm no, mejor no',
                onok: () => { 

                    submit_form(form);
                
                }                

            })
        }  
        
        function notificarActualizar(form){

            Dialog.open({
                title: 'ACTUALIZAR ANÁLISIS DE CONTEXTO',
                message: 'Va a actualizar un nuevo análisis de contexto ¿Desea continuar?',
                color: 'blue',
                ico: 'ico__internet d',
                okText: '¡Los cambios siempre son buenos!',
                cancelText: 'Si algo funciona, ¿Por qué cambiarlo?',
                onok: () => { submit_form(form); }                

            })
        }   
        
        function dialogRevision(AnalisisDAFO, codigo_interno, revision){

            Dialog.open({
                title: 'Nueva revisión Análisis DAFO',
                message: '¿Has realizado la revisión del Análisis DAFO?',
                color: 'blue',
                ico: 'ico__lanzar d',
                okText: 'Por supuesto, ¿Dudas de mi?',
                cancelText: 'Emmmmmmmm, nope',
                onok: () => { 

                                RevisionAnalisisContexto.open({
                                    id: AnalisisDAFO,
                                    codigo_interno: codigo_interno,
                                    revision: revision,
                                    fecha: obtenerFechaHoy(),
                                })
                            },    
                                   
                oncancel: () => { window.location.href = "http://localhost/contexto/analisisContexto/read?id=" + AnalisisDAFO; }       

            })
        }   

        function notificarEliminar(form, id, codigo){

            Dialog.open({
                title: 'Eliminar análisis de contexto' + codigo,
                message: '¿Desea eliminar el análisis de contexto ' + codigo + '? (esta acción es irreversible).',
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

        function notificarEliminarHistorico(form, id, codigo, revision){

            Dialog.open({
                title: 'Eliminar ' + codigo + ' Rev.' + revision,
                message: '¿Desea eliminar la revisión ' + revision + ' del análisis de contexto ' + codigo + '? (esta acción es irreversible).',
                color: 'red',
                ico: 'ico__papelera d',
                okText: 'Adelante, bórralo',
                cancelText: 'Nooooooooooooo',
                onok: () => { 
                    showSnackbar('Revisión ' + revision + ' eliminada correctamente', 'ico__papelera w', 'red');
                    form.submit(),'_self'; 
                }                

            })
        }

    </script>

<!-- #endregion -->