<head>
    
    <title> Riesgos y Oportunidades del Sistema | <?php echo $_SESSION["nombreApp"]; ?> </title> <!-- Título -->
    <link rel="icon" href="/build/img/layout/Internet_2Regular.svg" sizes="any" type="image/svg+xml"> <!-- Icono -->

    <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="/build/css/fundamentals/estadosplanaccion.css">
    
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

            </ol>

        </nav>

        <article>

            <header class="entry-header">
                <h1>
                    <svg class="ico ico__teatro d"></svg>
                    Acciones para abordar Riesgos y Oportunidades
                </h1>
            </header>

            <div class="entry-content">

                <div class="block">

                    <div class="block__content">
                        
                        <p>
                        La Dirección de Defensa y Seguridad (en adelante, "DyS") debe planificar las acciones para abordar y tratar los riesgos y oportunidades del sistema de gestión, 
                        con el objetivo de prevenir efectos no deseados y lograr la mejora continua del sistema.
                        </p>

                        <p>
                        Para ello, DyS debe:
                        </p>

                        <ul class="list--dots">
                        <li>
                            Identificar los riesgos y oportunidades de los procesos del sistema de gestión.
                        </li>
                    
                        <li>
                            Establecer e implementar acciones para abordar esos riesgos y oportunidades.
                        </li>
                        
                        <li>
                            Evaluar la eficacia de las acciones llevadas a cabo. 
                        </li>

                        <li>
                            Revisar los riesgos y oportuniaddes del sistema periódicamente, cada seis (6) meses.
                        </li>

                    </ul>

                    </div>

                    <div class="block__media">

                        <div class="block__img" style="background-image: url(/build/img/content_dys/cactus.jpg)"></div>

                    </div>

                </div>

            </div>

            <div class="tab__container">

                <div class="tab__title">
                    <h2>
                        <svg class="ico ico__teatro d"></svg>
                        Riesgos y oportunidades del sistema
                    </h2>

                </div>

                <div class="tab__header n_tabs_2">

                    <div class="active"><svg class="ico ico__teatro d"></svg> Riesgos</div>
                    <div> <svg class="ico ico__teatro d"></svg> Oportunidades</div>

                </div>

                <div class="tab__body">

                    <div class="tab active">
                        
                        <div class="block__table">

                            <div class="table__content">

                                <?php if($auth): ?>

                                    <div class="table__button">

                                        <div class="tooltip">

                                            <button 
                                                type="button" 
                                                class="button button__primary button__regular button__green"
                                                onclick="location.href='/planificacion/riesgos-oportunidades/create?tipo=1'"
                                            > 
                                                <svg class="ico ico__anadirmas w"></svg>
                                            </button>
                                            
                                            <span class="tooltiptext">Añadir Riesgo</span>

                                        </div>

                                    </div>      
                                
                                <?php endif; ?>

                            </div>

                            <?php if($riesgos_sistema && $riesgos_sistema != ''): ?>
                            
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
                                            foreach ($riesgos_sistema as $row):
                                        ?>

                                            <!-- Esto bebe de la función php de arriba -->
                                            <tr>
                                                <td onclick="location.href='/planificacion/riesgos-oportunidades/read?id=<?php echo $row->id; ?>'" style="width: 100px"><?php echo $row->codigo_interno ?> </td> 
                                                <td onclick="location.href='/planificacion/riesgos-oportunidades/read?id=<?php echo $row->id; ?>'" class=ocultarColumna> <?php echo $row->id ?> </td>
                                                <td onclick="location.href='/planificacion/riesgos-oportunidades/read?id=<?php echo $row->id; ?>'" style="width: 800px"> <?php echo $row->denominador ?> </td>
                                                <td onclick="location.href='/planificacion/riesgos-oportunidades/read?id=<?php echo $row->id; ?>'" style="width: 100px; text-align: center;"> <div class="E_burbuja <?php if(isset($row->indicador)):echo s('RO_E'. $row->indicador); endif; ?>"> <?php echo $row->estado ?> </div> </td>

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
                                                                
                                                                <span class="tooltiptext">Ver <?php echo $row->tipo ?></span>

                                                            </div>

                                                        <?php if($auth): ?>

                                                            <div class="tooltip">

                                                                <button 
                                                                    type="button" 
                                                                    class="button button__primary button__small button__yellow"
                                                                    onclick="location.href='/planificacion/riesgos-oportunidades/update?id=<?php echo $row->id; ?>'"
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
                                <p> Por el momento, no se ha detectado ningún riesgo del sistema. </p>
                            <?php endif; ?>   

                        </div>        

                    </div>

                    <div class="tab">
                        
                        <div class="block__table">

                            <div class="table__content">

                                <?php if($auth): ?>

                                    <div class="table__button">

                                        <div class="tooltip">

                                            <button 
                                                type="button" 
                                                class="button button__primary button__regular button__green"
                                                onclick="location.href='/planificacion/riesgos-oportunidades/create?tipo=2'"
                                            > 
                                                <svg class="ico ico__anadirmas w"></svg>

                                            </button>
                                            
                                            <span class="tooltiptext">Añadir Oportunidad</span>

                                        </div>

                                    </div>      
                                
                                <?php endif; ?>

                            </div>

                            <?php if($oportunidades_sistema && $oportunidades_sistema != ''): ?>
                            
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
                                            foreach ($oportunidades_sistema as $row):
                                        ?>

                                            <!-- Esto bebe de la función php de arriba -->
                                            <tr>
                                                <td onclick="location.href='/planificacion/riesgos-oportunidades/read?id=<?php echo $row->id; ?>'" style="width: 100px"> <?php echo $row->codigo_interno ?> </td> 
                                                <td onclick="location.href='/planificacion/riesgos-oportunidades/read?id=<?php echo $row->id; ?>'" class=ocultarColumna> <?php echo $row->id ?> </td>
                                                <td onclick="location.href='/planificacion/riesgos-oportunidades/read?id=<?php echo $row->id; ?>'" style="width: 800px"> <?php echo $row->denominador ?> </td>
                                                <td onclick="location.href='/planificacion/riesgos-oportunidades/read?id=<?php echo $row->id; ?>'" style="width: 100px; text-align: center;"> <div class="E_burbuja <?php if(isset($row->indicador)):echo s('RO_E'. $row->indicador); endif; ?>"> <?php echo $row->estado ?> </div> </td>

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
                                                                
                                                                <span class="tooltiptext">Ver <?php echo $row->tipo ?></span>

                                                            </div>

                                                        <?php if($auth): ?>

                                                            <div class="tooltip">

                                                                <button 
                                                                    type="button" 
                                                                    class="button button__primary button__small button__yellow"
                                                                    onclick="location.href='/planificacion/riesgos-oportunidades/update?id=<?php echo $row->id; ?>'"
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
                                <p class="no-entry"> Por el momento, no se ha detectado ninguna oportunidad del sistema. </p>
                            <?php endif; ?>   

                        </div>

                    </div>
                
                </div>

            </div>

             <!-- Revisiones -->
            <div class="block__table">

                <div class="table__header">

                    <div class="table__title">
                        
                        <h3>
                            <svg class="ico ico__teatro d"></svg>
                            Revisiones de los riesgos y oportunidades
                        </h3>

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
                                
                                <span class="tooltiptext">Añadir revisión de riesgos y oportunidades del sistema</span>

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
        
            <div class="entry-content">

                <div class="block">

                    <div class="block__content">

                        <h2>
                            <svg class="ico ico__teatro d"></svg>
                            Riesgos y Oportunidades de proyectos
                        </h2>
                        
                        <p>
                        La Dirección de Defensa y Seguridad y sus proveedores, deberán (si aplica) aportar evidencias de que en la fase de 
                        planificación se han considerado los riesgos, incluyendo, pero no limitando a la Identificación de Riesgos, 
                        Análisis de Riesgos, Control de Riesgos y Mitigación de Riesgos, tal y como se indica en el procedimiento                        
                        <a href="#">“Elaboración y Revisión de Ofertas (EM-300-PR-003)”</a>.
                        </p>

                        <p>
                        La planificación deberá iniciarse con la identificación de riesgos durante la revisión del contrato y deberá ser actualizada periódicamente. 
                        Estos datos se reflejarán en la Oferta y/o en el Plan de la Calidad del contrato, o en documento aparte si es necesario.
                        </p>

                        <p>
                        A no ser que se establezca de otra forma en el contrato, la Gestión de Riesgos aplicada debe cumplir los principios generales 
                        y las directrices de la norma <a href="#">UNE-EN ISO 31000:2010</a>.
                        </p>

                        <p>
                        En el caso de ser necesario elaborar este tipo de documento, se seguirán las indicaciones de la 
                        <a href="#">“Instrucción técnica. Proceso de gestión de riesgos. Elaboración y evaluación de planes de gestión de riesgos (IT4201 01)” </a>
                        de la DGAM.
                        </p>                        

                    </div>

                </div>

            </div>

        </article>

</main>

<script>

        function notificarEliminar(form, id, codigo){

            Dialog.open({
                title: 'Eliminar plan de acción ' + codigo,
                message: '¿Desea eliminar plan de acción ' + codigo + '? (esta acción es irreversible).',
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

</html>