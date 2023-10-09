<head>

    <!-- Título -->
        <title> Información documentada | <?php echo $_SESSION["nombreApp"]; ?> </title>

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
            <li class="breadcrumb__item"> <a href="/apoyo"> Apoyo </a> </li>
            <li class="breadcrumb__item"> <span> / </span> </li>               
            <li class="breadcrumb__item actual"> <a href="/apoyo/informacion-documentada"> Información documentada </a> </li>

        </ol>

    </nav>

    <article>

        <header class="entry-header">
            <h1>
                <svg class="ico ico__documento d"></svg>
                Información documentada
            </h1>
        </header>

        <div class="entry-content">

            <div class="block">

                <div class="block__content">
                    
                    <p>
                        Telefónica España asume el compromiso de cumplir con los requisitos legales y
                        reglamentarios, del Cliente y el desarrollo, implementación y requisitos del Sistema de
                        Gestión de la Calidad, así como con la mejora continua.
                    </p> 

                    <p>
                        
                        En DyS se dispone del procedimiento interno 
                        <a href="/apoyo/informacion-documentada/read?id=070201.220708.133051.254745">“Confección y Codificación de la documentación de DyS (EM-300-PR-002)”</a>, en el cual se detallan:
                    </p> 

                    <ul class="list--dots">
                        <li>Los métodos de los procesos y actividades que componen su ciclo de vida.</li>
                        <li>Los procesos de creación, edición, revisión, aprobación, publicación, archivo, distribución, etc. de los documentos.</li>
                        <li>Los métodos de codificación para la documentación.</li>
                        <li>La sistemática para la confección de la documentación.</li>
                    </ul>

                </div>

                <div class="block__media">

                    <div class="block__img" style="background-image: url(/build/img/content_dys/papeles.jpg)"></div>

                </div>

            </div>

            <!-- Documentación interna -->
            <div class="tab__container">

                <div class="tab__title">

                    <h2>
                        <svg class="ico ico__documento d"></svg>
                        Documentación interna DyS
                    </h2>

                </div>      

                <div class="tab__header n_tabs_4">

                    <div class="active"><svg class="ico ico__documento d"></svg>Procedimientos, manuales, instrucciones y guías</div>
                    <div> <svg class="ico ico__documento d"></svg> Formatos</div>
                    <div> <svg class="ico ico__documento d"></svg> Plantillas</div>
                    <div> <svg class="ico ico__documento d"></svg> Doc. Apoyo</div>

                </div>

                <div class="tab__body">

                    <div class="tab active"> <!-- Documentos -->

                        <h3>
                            <svg class="ico ico__documento d"></svg>
                            Procedimientos
                        </h3>

                        <div class="block__table">

                            <?php if($procedimientos && $procedimientos != ''): ?>
                            
                                <table>  

                                    <thead>

                                        <th style="text-align: center;"> Código </th>
                                        <th class=ocultarColumna>id</th>
                                        <th style="text-align: center;"> Documento </th>
                                        <th style="text-align: center;"> Última edición </th>
                                        <th style="text-align: center;"></th>
                                    </thead>

                                    <tbody id="table_procedimientos"></tbody>

                                </table>
                            
                            <?php else: ?>     
                                <p> Por el momento, no se ha detectado ningún procedimiento. </p>
                            <?php endif; ?>   

                        </div>    

                        <h3>
                            <svg class="ico ico__documento d"></svg>
                            Procedimientos de seguridad
                        </h3>

                        <div class="block__table">

                            <?php if($procedimientos_seguridad && $procedimientos_seguridad != ''): ?>
                            
                                <table>  

                                    <thead>

                                        <th style="text-align: center;"> Código </th>
                                        <th class=ocultarColumna>id</th>
                                        <th style="text-align: center;"> Documento </th>
                                        <th style="text-align: center;"> Última edición </th>
                                        <th style="text-align: center;"></th>
                                    </thead>

                                    <tbody id="table_procedimientos_seguridad"></tbody>

                                </table>
                            
                            <?php else: ?>     
                                <p> Por el momento, no se ha detectado ningún procedimiento de seguridad. </p>
                            <?php endif; ?>   

                        </div>   

                        <h3>
                            <svg class="ico ico__documento d"></svg>
                            Manuales
                        </h3>

                        <div class="block__table">

                            <?php if($manuales && $manuales != ''): ?>
                                
                                <table>  

                                    <thead>

                                        <th style="text-align: center;"> Código </th>
                                        <th class=ocultarColumna>id</th>
                                        <th style="text-align: center;"> Documento </th>
                                        <th style="text-align: center;"> Última edición </th>
                                        <th style="text-align: center;"></th>
                                    </thead>

                                    <tbody id="table_manuales"></tbody>

                                </table>
                            
                            <?php else: ?>     
                                <p> Por el momento, no se ha detectado ningún manual. </p>
                            <?php endif; ?>  
                            
                        </div>

                        <h3>
                            <svg class="ico ico__documento d"></svg>
                            Instrucciones
                        </h3>

                        <div class="block__table">

                            <?php if($instrucciones && $instrucciones != ''): ?>
                                
                                <table>  

                                    <thead>

                                        <th style="text-align: center;"> Código </th>
                                        <th class=ocultarColumna>id</th>
                                        <th style="text-align: center;"> Documento </th>
                                        <th style="text-align: center;"> Última edición </th>
                                        <th style="text-align: center;"></th>
                                    </thead>

                                    <tbody id="table_instrucciones"></tbody>

                                </table>
                            
                            <?php else: ?>     
                                <p> Por el momento, no se ha detectado ninguna instrucción. </p>
                            <?php endif; ?>   

                        </div>

                        <h3>
                            <svg class="ico ico__documento d"></svg>
                            Guías
                        </h3>

                        <div class="block__table">

                            <?php if($guias && $guias != ''): ?>
                                
                                <table>  

                                    <thead>

                                        <th style="text-align: center;"> Código </th>
                                        <th class=ocultarColumna>id</th>
                                        <th style="text-align: center;"> Documento </th>
                                        <th style="text-align: center;"> Última edición </th>
                                        <th style="text-align: center;"></th>
                                    </thead>

                                    <tbody id="table_guias"></tbody>

                                </table>
                            
                            <?php else: ?>     
                                <p> Por el momento, no se ha detectado ninguna guia. </p>
                            <?php endif; ?>  
                            
                        </div>

                    </div>

                    <div class="tab"> <!-- Formatos -->

                        <h3>
                            <svg class="ico ico__documento d"></svg>
                            Formatos
                        </h3>

                            <div class="block__table">

                                <?php if($formatos && $formatos != ''): ?>
                                    
                                    <table>  

                                        <thead>

                                            <th style="text-align: center;"> Código </th>
                                            <th class=ocultarColumna>id</th>
                                            <th style="text-align: center;"> Documento </th>
                                            <th style="text-align: center;"> Última edición </th>
                                            <th style="text-align: center;"></th>
                                        </thead>

                                        <tbody id="table_formatos"></tbody>

                                    </table>
                                
                                <?php else: ?>     
                                    <p> Por el momento, no se ha detectado ningún formato. </p>
                                <?php endif; ?>  
                                
                            </div>

                    </div>

                    <div class="tab"> <!-- Plantillas -->

                        <h3>
                            <svg class="ico ico__documento d"></svg>
                            Plantillas
                        </h3>

                        <div class="block__table">

                            <?php if($plantillas && $plantillas != ''): ?>
                                
                                <table>  

                                    <thead>

                                        <th style="text-align: center;"> Código </th>
                                        <th class=ocultarColumna>id</th>
                                        <th style="text-align: center;"> Documento </th>
                                        <th style="text-align: center;"> Última edición </th>
                                        <th style="text-align: center;"></th>
                                    </thead>

                                    <tbody id="table_plantillas"></tbody>

                                </table>

                            <?php else: ?>     
                                <p> Por el momento, no se ha detectado ninguna plantilla. </p>
                            <?php endif; ?>  

                        </div>

                    </div>

                    <div class="tab"> <!-- Doc. Apoyo -->

                        <h3>
                            <svg class="ico ico__documento d"></svg>
                            Documentación de apoyo
                        </h3>

                        <div class="block__table">

                        <p style='color: red; font-weight: bold;'>
                            La siguiente documentación ha sigo generada por Calidad para facilitar la elaboración de 
                            la documentación para los proyectos. Por tanto, son generalidades que contempla los requisitos de la 
                            norma PECAL 2110 y que <span style='text-decoration: underline;'> deben ser adaptados a las peculiaridades y/o circunstancias del proyecto/expediente. </span>
                        </p> 

                            <?php if($docApoyo && $docApoyo != ''): ?>
                                
                                <table>  

                                    <thead>

                                        <th style="text-align: center;"> Código </th>
                                        <th class=ocultarColumna>id</th>
                                        <th style="text-align: center;"> Documento </th>
                                        <th style="text-align: center;"> Última edición </th>
                                        <th style="text-align: center;"></th>
                                    </thead>

                                    <tbody id="table_docapoyo"></tbody>

                                </table>

                            <?php else: ?>     
                                <p> Por el momento, no se ha detectado ninguna documentación de apoyo. </p>
                            <?php endif; ?>  

                        </div>

                    </div>

                </div>

            </div>
            
            <!-- Documentación externa -->

            <div class="tab__container">

                <div class="tab__title">

                    <h2>
                        <svg class="ico ico__documento d"></svg>
                        Documentación externa a DyS
                    </h2>

                </div>      

                <div class="tab__header n_tabs_4">

                    <div class="active"><svg class="ico ico__documento d"></svg> Formatos AII</div>
                    <div> <svg class="ico ico__documento d"></svg> Normativa </div>
                    <div> <svg class="ico ico__documento d"></svg> Otra normativa Telefónica</div>
                    <div> <svg class="ico ico__documento d"></svg> Otra documentación</div>

                </div>

                <div class="tab__body">

                    <div class="tab active">

                        <h3>
                            <svg class="ico ico__documento d"></svg>
                            Formatos AII
                        </h3>

                        <div class="block__table">

                            <?php if($formatosAII && $formatosAII != ''): ?>
                            
                                <table>  

                                    <tbody id="table_formatosaii"></tbody>

                                </table>
                            
                            <?php else: ?>     
                                <p> Por el momento, no se ha detectado formatos del Área de Inspecciones Industriales (AII). </p>
                            <?php endif; ?>   

                        </div> 

                    </div>

                    <div class="tab">

                        <h3>
                            <svg class="ico ico__documento d"></svg>
                            Normativa
                        </h3>

                            <div class="block__table">

                            <?php if($normativa && $normativa != ''): ?>
                                
                                <table>  

                                    <thead>

                                        <th style="text-align: center;"> Código </th>
                                        <th class=ocultarColumna>id</th>
                                        <th style="text-align: center;"> Documento </th>
                                        <th style="text-align: center;"></th>
                                    </thead>

                                    <tbody id="table_normativa"></tbody>

                                </table>

                            <?php else: ?>     
                                <p> Por el momento, no se ha detectadonormativa externa. </p>
                            <?php endif; ?>  
                        </div> 

                    </div>

                    <div class="tab">

                        <h3>
                            <svg class="ico ico__documento d"></svg>
                            Otra Normativa Telefónica
                        </h3>

                        <div class="block__table">

                            <?php if($otraNormativaTelefonica && $otraNormativaTelefonica != ''): ?>
                            
                                <table>  

                                    <tbody id="table_otraNormativaTelefonica"></tbody>

                                </table>                            
                            
                            <?php else: ?>     
                                <p> Por el momento, no se ha detectado otra normtiva de Telefónica. </p>
                                
                            <?php endif; ?>   

                            <p> 
                                Si desea consultar consultar más normativa del grupo Telefónica, visite la
                                <a href="https://intranet.telefonica.com/wp-login.php?redirect_to=/noticias/nuevo-portal-de-normas/?utm_source=diario&utm_medium=link" target="_blank">Intranet Global de Telefónica</a>
                            </p>

                        </div> 

                    </div>

                    <div class="tab">

                        <h3>
                            <svg class="ico ico__documento d"></svg>
                            Otra documentación
                        </h3>

                            <div class="block__table">

                            <?php if($otraDocumentacion && $otraDocumentacion != ''): ?>
                            
                                <table>  

                                    <tbody id="table_otraDocumentacion"></tbody>

                                </table>
                            
                            <?php else: ?>     
                                <p> Por el momento, no se ha detectado otra documentación. </p>
                            <?php endif; ?>   

                        </div> 

                    </div>

                </div>

            </div>           

        </div>

    </article>

</main>

</html>

<script>

    //Definimos los datos para construir y filtrar la tabla
    var data_procedimientos =           <?php echo json_encode($procedimientos) ?>;
    var data_procedimientos_seguridad = <?php echo json_encode($procedimientos_seguridad) ?>;
    var data_manuales =                 <?php echo json_encode($manuales) ?>;
    var data_instrucciones =            <?php echo json_encode($instrucciones) ?>;
    var data_guias =                    <?php echo json_encode($guias) ?>;
    var data_plantillas =               <?php echo json_encode($plantillas) ?>;
    var data_formatos =                 <?php echo json_encode($formatos) ?>;
    var data_docapoyo =                 <?php echo json_encode($docApoyo) ?>;
    var data_normativa =                <?php echo json_encode($normativa) ?>;

    //Definimos el row
    var row1 = `
            <tr>
                <td onclick="location.href='/apoyo/informacion-documentada/read?id={{edicion.id}}'" style="text-align: center;"> {{codigo_interno}} </td> 
                <td onclick="location.href='/apoyo/informacion-documentada/read?id={{edicion.id}}'" style="text-align: center;" class='ocultarColumna'> {{id}} </td>
                <td onclick="location.href='/apoyo/informacion-documentada/read?id={{edicion.id}}'" style="text-align: center;"> {{edicion.denominador}} </td>
                <td onclick="location.href='/apoyo/informacion-documentada/read?id={{edicion.id}}'" style="text-align: center;"> {{edicion.edicion}} </td>
                <td style="text-align: center;">

                 <div class="btn-group">

                    <form 
                        method="POST" 
                        action="/apoyo/informacion-documentada/delete?id={{id}}" 
                        id="form_pm"
                    >

                    
    `;

    var row2 = `

                        <div class="tooltip" >

                            <button 
                                type="button" 
                                class="button button__primary button__small button__green"
                                onclick="openDocument('{{edicion.id}}')"
                            > 
                                <svg class="ico ico__descargar w"></svg>                          

                            </button>
                            
                            <span class="tooltiptext">Abrir documento</span>

                        </div>

                    
    `;

    var row3 = `
                    
                        <input type="hidden" name="id" value="{{id}}">

                        <div class="tooltip">

                            <button 
                                type="button" 
                                class="button button__primary button__small button__blue"
                                onclick="location.href='/apoyo/informacion-documentada/read?id={{edicion.id}}'"
                            > 
                                <svg class="ico ico__ojo w"></svg>
                            
                            </button>
                        
                            <span class="tooltiptext">Ver Ficha del documento</span>

                        </div>

                    
    `;

    var row4 = `

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
    
    var row5 = `

                    </form>
                
                </div>

            </td>

        </tr>

    `;

    var row = [   
                    [row1, false, ''], 
                    [row2, true, ''], 
                    [row3, false, ''], 
                    [row4, true, <?php echo $_SESSION['auth'] ? 'true' : 'false' ?>], 
                    [row5, false, '']
                ];  


    var row_externa1 = `
            <tr>
                <td onclick="location.href='/apoyo/informacion-documentada/read?id={{edicion.id}}'" style="text-align: center;"> {{codigo_interno}} </td> 
                <td onclick="location.href='/apoyo/informacion-documentada/read?id={{edicion.id}}'" style="text-align: center;" class='ocultarColumna'> {{id}} </td>
                <td onclick="location.href='/apoyo/informacion-documentada/read?id={{edicion.id}}'" style="text-align: center;"> {{denominador}} </td>
                <td style="text-align: center;">

                 <div class="btn-group">

                    <form 
                        method="POST" 
                        action="/apoyo/informacion-documentada/delete?id={{id}}" 
                        id="form_pm"
                    >

                    
    `;

    var row_docexterna = [   
        [row_externa1, false, ''], 
        [row2, true, ''], 
        [row3, false, ''], 
        [row4, true, <?php echo $_SESSION['auth'] ? 'true' : 'false' ?>], 
        [row5, false, '']
    ];  

    //Construimos las tablas

    if(data_procedimientos != ''){
        buildTable(data_procedimientos, 'table_procedimientos', row);
    }

    if(data_procedimientos_seguridad != ''){
        buildTable(data_procedimientos_seguridad, 'table_procedimientos_seguridad', row);   
    }

    if(data_manuales != ''){
        buildTable(data_manuales, 'table_manuales', row);
    }

    if(data_instrucciones != ''){
        buildTable(data_instrucciones, 'table_instrucciones', row);
    }

    if(data_guias != ''){
        buildTable(data_guias, 'table_guias', row);
    }

    if(data_plantillas != ''){
        buildTable(data_plantillas, 'table_plantillas', row);
    }

    if(data_formatos != ''){
        buildTable(data_formatos, 'table_formatos', row);
    }

    if(data_docapoyo != ''){
        buildTable(data_docapoyo, 'table_docapoyo', row);
    }  

    
    if(data_normativa != ''){
        buildTable(data_normativa, 'table_normativa', row_docexterna);
    }  

</script>