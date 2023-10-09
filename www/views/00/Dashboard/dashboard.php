    <head>

        <!-- Título -->
            <title> Alarmas | <?php echo $_SESSION["nombreApp"]; ?></title>

        <!-- Icono -->
            <link rel="shortcut icon" href="/build/img/layout/Telefonica.png">
            
    </head>

<body>

 <!-- #region Breadcrumb -->

<nav class="breadcrumb">

    <ol class="breadcrumb__list">

        <li class="breadcrumb__item"> <svg class="ico ico__puntos b"> </svg> </li>
        <li class="breadcrumb__item"> <a href="/"> Inicio </a> </li>
        <li class="breadcrumb__item"> <span> / </span> </li>               
        <li class="breadcrumb__item"> <a href="/alarmas"> Alarmas </a> </li>

    </ol>

</nav>

<article>

    <div class="tab__container dashboard__panel">

        <div class="tab__title">
            <h2>
                <svg class="ico ico__campana d"></svg>
                Alarmas
            </h2>
    
        </div>

        <div class="tab__header n_tabs_2">

            <div class="active"><svg class="ico ico__campana d"></svg>Vista modular</div>
            <div> <svg class="ico ico__campana d"></svg> Vista tabla</div>

        </div>

        
        <div class="tab__body">

            <div class="tab active">

                <div class="wp-block-columns-2">

                    <div class="wp-block-column"> <!-- Análisis Contexto -->

                        <div class="block dashboard">

                            <div class="block__table">

                                <div class="table__header">
                    
                                    <div class="table__title">
                                        <h2>
                                            <svg class="ico ico__internet d"></svg>
                                            Análisis de Contexto
                                        </h2>
                                    </div>

                                </div>

                                <?php if($dashboardContexto && $dashboardContexto != ''): ?>

                                    <table class=tablajs>                     
                
                                        <tbody>
                                        
                                            <?php 
                                                foreach ($dashboardContexto as $analisis): 
                                                    foreach ($analisis as $row): 
                                            ?>

                                                <tr
                                                    class='linea dashboard ind<?php echo $row->alarma; ?>'
                                                    ondblclick="location.href='/contexto/analisisContexto/read?id=<?php echo $row->analisisContexto; ?>'" 
                                                >
                                                    <td> <?php echo $row->codigo_interno ?> </td> 
                                                    <td class=ocultarColumna> <?php echo $row->id ?> </td>
                                                    <td> <?php echo $row->denominador ?> </td> 
                                                    <td> <?php echo date('d/m/Y', strtotime($row->fecha."+ 6 months")); ?>  </td> 
                                                    
                                                    <td>
                                                        <div class="btn-group">

                                                            <div class="tooltip">
                                                            
                                                                <button 
                                                                    type="button" 
                                                                    class="button button__primary button__small button__blue"
                                                                    onclick="location.href='/contexto/analisisContexto/read?id=<?php echo $row->analisisContexto; ?>'"
                                                                
                                                                        > 
                                                                    <svg class="ico ico__ojo w"></svg>

                                                                </button>

                                                                <span class="tooltiptext">Ver <?php echo $row->denominador ?></span>

                                                            </div>

                                                        </div>

                                                    </td>

                                                </tr>

                                            <?php 
                                                    endforeach; 
                                                endforeach; 
                                            ?>

                                        </tbody>
                                    
                                    </table>

                                <?php else: ?>     
                                    <p> Por el momento, no se ha detectado ningún análisis de contexto. </p>
                                <?php endif; ?>   

                            </div>

                        </div>

                    </div>

                    <div class="wp-block-column"> <!-- Partes interesadas -->

                        <div class="block dashboard">

                            <div class="block__table">

                                <div class="table__header">
                    
                                    <div class="table__title">
                                        <h2>
                                            <svg class="ico ico__miembros d"></svg>
                                            Partes interesadas
                                        </h2>
                                    </div>

                                </div>

                                <?php if($dashboardPartesInteresadas && $dashboardPartesInteresadas != ''): ?>

                                    <table class=tablajs>                     
                
                                        <tbody>
                                        
                                            <?php 
                                                foreach ($dashboardPartesInteresadas as $pi): 
                                                    foreach ($pi as $row): 
                                            ?>

                                                <tr
                                                    class='linea dashboard ind<?php echo $row->alarma; ?>'
                                                    ondblclick="location.href='/contexto/partesinteresadas/estudio/read?id=<?php echo $row->contenedor; ?>'" 
                                                >
                                                    <td> <?php echo $row->codigo_interno ?> </td> 
                                                    <td class=ocultarColumna> <?php echo $row->id ?> </td>
                                                    <td> <?php echo $row->denominador ?> </td> 
                                                    <td> <?php echo date('d/m/Y', strtotime($row->fecha."+ 6 months")); ?>  </td> 
                                                    
                                                    <td>
                                                        <div class="btn-group">

                                                            <div class="tooltip">
                                                            
                                                                <button 
                                                                    type="button" 
                                                                    class="button button__primary button__small button__blue"
                                                                    onclick="location.href='/contexto/partesinteresadas/estudio/read?id=<?php echo $row->contenedor; ?>'"
                                                                
                                                                        > 
                                                                    <svg class="ico ico__ojo w"></svg>

                                                                </button>

                                                                <span class="tooltiptext">Ver <?php echo $row->denominador ?></span>

                                                            </div>

                                                        </div>

                                                    </td>

                                                </tr>

                                            <?php 
                                                    endforeach; 
                                                endforeach; 
                                            ?>

                                        </tbody>
                                    
                                    </table>

                                <?php else: ?>     
                                    <p> Por el momento, no se ha detectado ninguna parte interesada. </p>
                                <?php endif; ?>   

                            </div>

                        </div>

                    </div>

                </div>

                <div class="wp-block-columns-2">

                    <div class="wp-block-column"> <!-- Planes Accion -->

                        <div class="block dashboard">

                            <div class="block__table">

                                <div class="table__header">
                    
                                    <div class="table__title">
                                        <h2>
                                            <svg class="ico ico__rutarecorrido d"></svg>
                                            Planes de acción
                                        </h2>
                                    </div>

                                </div>

                                <?php if($dashboardPlanesAccion && $dashboardPlanesAccion != ''): ?>

                                    <table class=tablajs>                     
                
                                        <tbody>
                                        
                                            <?php foreach ($dashboardPlanesAccion as $row): ?>

                                                <tr
                                                    class='linea dashboard ind<?php echo $row->alarma; ?>'
                                                    ondblclick="location.href='/planificacion/planificacion-cambios/read?id=<?php echo $row->id; ?>'" 
                                                >
                                                    <td> <?php echo $row->codigo_interno ?> </td> 
                                                    <td class=ocultarColumna> <?php echo $row->id ?> </td>
                                                    <td> <?php echo $row->denominador ?> </td> 
                                                    <td> <?php echo date('d/m/Y', strtotime($row->fechaFinPrevisto)); ?>  </td> 
                                                    
                                                    <td>
                                                        <div class="btn-group">

                                                            <div class="tooltip">
                                                            
                                                                <button 
                                                                    type="button" 
                                                                    class="button button__primary button__small button__blue"
                                                                    onclick="location.href='/planificacion/planificacion-cambios/read?id=<?php echo $row->id; ?>'"
                                                                
                                                                        > 
                                                                    <svg class="ico ico__ojo w"></svg>

                                                                </button>

                                                                <span class="tooltiptext">Ver <?php echo $row->denominador ?></span>

                                                            </div>

                                                        </div>

                                                    </td>

                                                </tr>

                                            <?php endforeach; ?>

                                        </tbody>
                                    
                                    </table>

                                <?php else: ?>     
                                    <p> Por el momento, no se ha detectado ningún plan de acción. </p>
                                <?php endif; ?>   

                            </div>

                        </div>

                    </div>

                     <div class="wp-block-column">  <!-- En blacno --> 

                        <div class="block dashboard">

                        </div>

                    </div>
                </div>

            </div>

            <div class="tab">

                ¡En construcción!

            </div>

        </div>

    </div>

</article>

<!-- #endregion -->

</body>

</html>