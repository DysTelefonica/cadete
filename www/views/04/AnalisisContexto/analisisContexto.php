<head>

    <!-- Título -->
        <title> Organización y su contexto | <?php echo $_SESSION["nombreApp"]; ?></title>

    <!-- Icono -->
        <link rel="icon" href="/build/img/layout/Internet_2Regular.svg" sizes="any" type="image/svg+xml">
    
</head>

<main class="main">

    <!-- Breadcrumb -->

        <nav class="breadcrumb">

            <ol class="breadcrumb__list">

                <li class="breadcrumb__item"> <svg class="ico ico__puntos b"> </svg> </li>
                <li class="breadcrumb__item"> <a href="/"> Inicio </a> </li>
                <li class="breadcrumb__item"> <span> / </span> </li>               
                <li class="breadcrumb__item"> <a href="/contexto"> Contexto </a> </li>
                <li class="breadcrumb__item"> <span> / </span> </li>               
                <li class="breadcrumb__item actual"> <a href="/contexto/analisisContexto"> Analisis del Contexto </a> </li>

            </ol>

        </nav>

    <!-- Articulo -->
    <article>

        <header class="entry-header">
            <h1>
                <svg class="ico ico__internet d"></svg>
                La organización y su contexto
            </h1>
        </header>

        <div class="entry-content">

            <div class="block">

                <div class="block__content">

                    <p>
                        El Sistema de Gestión de Calidad de Telefónica se ha establecido, 
                        documentado e implementado como un sistema efectivo y económico para satisfacer 
                        tanto los requisitos de la Norma 
                        
                        <a href="/apoyo/informacion-documentada/documentacion-externa/iso_9001_2015">UNE-EN ISO 9001</a>, como los requisitos contractuales 
                        con terceros. En el caso de DyS se han hecho coincidir los requisitos 
                        con el punto equivalente de la norma 
                        <a 
                            href="/gestorArchivos?r=../adj/PECAL 2110_Ed.4.pdf" 
                            target="_blank" 
                            download="PECAL 2110 Ed.4.pdf">PECAL 2110</a>.
                    </p>

                    <p>
                        Está orientado de forma que la organización pueda dar cumplimiento a los principios básicos 
                        que informan la actividad de gestión en general, y suponen la base de todo conocimiento de 
                        gestión de la calidad, que sustentan la política de la calidad adoptada por la organización 
                        según se expresa en el <a href="#">Manual del Sistema de Gestión de Calidad (SGC) de TdE (TE-000-MA-003)</a>.
                    </p>

                    <p>
                        Para la comprensión de la organización y su contexto, en Telefónica DyS se realizan diversos análisis de contexto, descritos en el documento <a href="#"> Gestión de la calidad de DyS (EM-300-MA-002)</a>.
                        A continuación, se muestra una tabla con todos los diferentes Análisis de contexto que se han realizado:
                    </p>

                </div>

                <div class="block__media">

                    <div class="block__img" style="background-image: url(/build/img/content/contacto-cover.webp)"></div>

                </div>

            </div>

        </div>

    </article>

    <div class="tab__container">

        <div class="tab__title">
            
            <h2>
                <svg class="ico ico__internet d"></svg>
                Análisis de Contexto
            </h2>
    
        </div>

        <div class="tab__header n_tabs_2">

            <div class="active"><svg class="ico ico__internet d"></svg>Análisis DAFO</div>
            <div> <svg class="ico ico__internet d"></svg> Otros Análisis de Contexto</div>

        </div>

        <div class="tab__body">
            
            <div class="tab active"> <!-- Análisis DAFO -->

                <div class="block__table">

                    <div class="table__content">

                        <p>
                            El análisis DAFO es un método sencillo utilizado como proceso previo a la toma de decisiones. 
                            El objetivo es identificar aquellos factores que pueden condicionar positiva y negativamente
                            al desempeño previsto.
                        </p>

                        <?php if($auth): ?>

                            <div class="table__button">

                                <div class="tooltip">

                                    <button 
                                        type="button" 
                                        class="button button__primary button__regular button__green"
                                        onclick="location.href='/contexto/analisisContexto/create';"
                                    > 
                                        <svg class="ico ico__anadirmas w"></svg>

                                    </button>

                                    <span class="tooltiptext">Crear nuevo Análisis DAFO</span>

                                </div>

                            </div>      

                        <?php endif; ?>

                        <?php if($analisisDAFO && $analisisDAFO != ''): ?>

                            <table>  

                                <thead>
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th style="text-align: center;">Tipo</th>
                                    <th style="text-align: center;"></th>
                                </thead>

                                <tbody>
                                    
                                    <!-- Introducimos la función php para cargar los datos en la tabla -->
                                    <?php 
                                        foreach ($analisisDAFO as $row):
                                    ?>

                                        <!-- Esto bebe de la función php de arriba -->
                                        <tr class='linea'>
                                            <td onclick="location.href='/contexto/analisisContexto/read?id=<?php echo $row->id; ?>'"> <?php echo $row->codigo_interno ?> </td> 
                                            <td onclick="location.href='/contexto/analisisContexto/read?id=<?php echo $row->id; ?>'"> <?php echo $row->denominador ?> </td>
                                            <td onclick="location.href='/contexto/analisisContexto/read?id=<?php echo $row->id; ?>'" style="text-align: center;"> <?php echo $row->tipo ?> </td>

                                            <!-- Ahora se generan dinámicamente los botones -->
                                            <td style="text-align: center;"> 

                                                <div class="btn-group">

                                                    <form 
                                                        method="POST" 
                                                        action="/contexto/analisisContexto/delete?id=<?php echo $row->id; ?>" 
                                                        id="formEliminarAnalisisContexto"
                                                    >
                                                        
                                                        <input type="hidden" name="id" value="<?php echo $row->id; ?>">

                                                        <div class="tooltip">                                           
                                                            <button 
                                                                type="button" 
                                                                class="button button__primary button__small button__blue"
                                                                value="" 
                                                                onclick="location.href='/contexto/analisisContexto/read?id=<?php echo $row->id; ?>'"
                                                            > 
                                                                <svg class="ico ico__ojo w"></svg>

                                                            </button>
                                                            <span class="tooltiptext">Ver ficha</span>
                                                        </div>

                                                        <?php if($auth): ?>
                                                            
                                                            <div class="tooltip">
                                                            
                                                                <button 
                                                                    type="button" 
                                                                    class="button button__primary button__small button__yellow"
                                                                    value="" 
                                                                    onclick="location.href='/contexto/analisisContexto/update?id=<?php echo $row->id; ?>'"
                                                                > 
                                                                    <svg class="ico ico__lapicero w"></svg>

                                                                </button>

                                                                <span class="tooltiptext">Modificar</span>

                                                            </div>

                                                            <div class="tooltip">

                                                                <button 
                                                                    type="button" 
                                                                    class="button button__primary button__small button__red"
                                                                    onclick="notificarEliminar(this.form, '<?php echo $row->id;?>', '<?php echo $row->codigo_interno;?>')"
                                                                > 
                                                                    <svg class="ico ico__papelera w"></svg>
                                                                </button>

                                                                <span class="tooltiptext">Eliminar análisis de contexto</span>

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
                            <p> Por el momento, no se ha realizado ningún análisis DAFO. </p>
                        <?php endif; ?>   

                    </div>

                </div>

            </div>       
            
            <div class="tab"> <!-- Otros análisis -->

                <div class="block__table">

                    <div class="table__content">

                        <p>
                            Existen otros métodos utilizados para profundizar en el contexto. A continuación, se muestran los
                            realizados en el área.
                        </p>

                        <?php if($auth): ?>

                            <div class="table__button">

                                <div class="tooltip">

                                    <button
                                        type="button" 
                                        class="button button__primary button__regular button__green"
                                        onclick="location.href='/contexto/analisisContexto/create';"
                                    > 
                                        <svg class="ico ico__anadirmas w"></svg>

                                    </button>

                                    <span class="tooltiptext">Añadir otro análisis de contexto</span>

                                </div>

                            </div>      

                        <?php endif; ?>

                    </div>

                    <?php if($otrosAnalisisContexto && $otrosAnalisisContexto != ''): ?>

                        <table>  

                            <thead>
                                <th>Código</th>
                                <th>Nombre</th>
                                <th style="text-align: center;">Tipo</th>
                                <th style="text-align: center;"></th>
                            </thead>

                            <tbody>
                                
                                <!-- Introducimos la función php para cargar los datos en la tabla -->
                                <?php 
                                    foreach ($otrosAnalisisContexto as $row):
                                ?>

                                    <!-- Esto bebe de la función php de arriba -->
                                    <tr class='linea'>
                                        <td onclick="location.href='/contexto/analisisContexto/read?id=<?php echo $row->id; ?>'"> <?php echo $row->codigo_interno ?> </td> 
                                        <td onclick="location.href='/contexto/analisisContexto/read?id=<?php echo $row->id; ?>'"> <?php echo $row->denominador ?> </td>
                                        <td onclick="location.href='/contexto/analisisContexto/read?id=<?php echo $row->id; ?>'" style="text-align: center;"> <?php echo $row->tipo ?> </td>

                                        <!-- Ahora se generan dinámicamente los botones -->
                                        <td style="text-align: right;"> 

                                            <div class="btn-group">

                                                <form 
                                                    method="POST" 
                                                    action="/contexto/analisisContexto/delete" 
                                                    id="formEliminarAnalisisContexto"
                                                >
                                                    
                                                    <input type="hidden" name="id" value="<?php echo $row->id; ?>">

                                                    <div class="tooltip">                                       

                                                        <button 
                                                            type="button" 
                                                            class="button button__primary button__small button__blue"
                                                            onclick="location.href='/contexto/analisisContexto/read?id=<?php echo $row->id; ?>'"
                                                        > 
                                                            <svg class="ico ico__ojo w"></svg>

                                                        </button>

                                                        <span class="tooltiptext">Ver ficha</span>

                                                    </div>

                                                    <?php if($auth): ?>
                                                        
                                                        <div class="tooltip">

                                                            <button 
                                                                type="button" 
                                                                class="button button__primary button__small button__yellow"
                                                                onclick="location.href='/contexto/analisisContexto/update?id=<?php echo $row->id; ?>'"
                                                            > 
                                                                <svg class="ico ico__lapicero w"></svg>

                                                            </button>

                                                            <div class="tooltiptext">Modificar</div>

                                                        </div>

                                                        <div class="tooltip">                                           

                                                            <button 
                                                                type="button" 
                                                                class="button button__primary button__small button__red"
                                                                onclick="notificarEliminar(this.form, '<?php echo $row->id;?>', '<?php echo $row->codigo_interno;?>')"
                                                            > 
                                                                <svg class="ico ico__papelera w"></svg>

                                                            </button>

                                                            <span class="tooltiptext">Eliminar análisis de contexto</span>

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
                        <p> Por el momento, no se ha realizado ningún otro análisis de contexto.  </p>
                    <?php endif; ?>   
                    </div>
                
                </div>

            </div>

        </div>  

    </div>

</main>

<!-- region Script JS  -->
    
    <script>

        function notificarEliminar(form, id, codigo){

            Dialog.open({
                title: 'Eliminar análisis de contexto ' + codigo,
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

    </script>
    
<!-- endregion -->

</html>