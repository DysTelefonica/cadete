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
                <li class="breadcrumb__item actual"> <a href="/contexto/partesinteresadas"> Partes Interesadas </a> </li>

            </ol>

        </nav>

        <article>

            <header class="entry-header">
                <h1>
                    <svg class="ico ico__miembros d"></svg>
                    Necesidades y expectativas de las partes interesadas
                </h1>
            </header>

            <div class="entry-content">

                <div class="block">

                    <div class="block__content">

                        <p>
                            Telefónica realiza el seguimiento y la revisión de la Información sobre esas partes interesadas y sus requisitos pertinentes.
                        </p>

                        <p>
                            Para cumplir con los requisitos PECAL, en contratos con el Ministerio de Defensa, debe 
                            ponerse a disposición del 
                            
                            <a href="/contexto/partesinteresadas/pi/read?id=040302-220504143401">Representante de Aseguramiento de la Calidad del MINISDEF</a>
                             (en adelante RAC) y/o comprador la información documentada sobre el alcance del sistema 
                            del suministrador, los registros de las auditorías, evaluaciones internas y cualquier 
                            otra evidencia objetiva que muestre que el sistema es conforme con esta publicación y que 
                            es eficaz.
                        </p>
                        
                        <p>
                            El Cliente o el <a href="/contexto/partesinteresadas/pi/read?id=040302-220504143401">RAC</a> se reservará el derecho de rechazar el sistema. 
                            Si esto ocurre, el suministrador debe presentar propuestas de acciones correctivas 
                            y de sus respectivas revisiones en el plazo acordado.
                        </p>

                    </div>

                <div class="block__media">

                    <div class="block__img" style="background-image: url(/build/img/content/Conectamos-Talento.webp)"></div>

                </div>

            </div>

            <div class="tab__container">

                <div class="tab__title">
                    <h2>
                        <svg class="ico ico__miembros d"></svg>
                        Partes interesadas de Telefonica DyS
                    </h2>

                    <p>
                        En este apartado, se muestran únicamente las partes interesdas internas y externas pertenecientes al  <a href="/contexto/partesinteresadas/estudio/read?id=<?php echo $contenedor[0]->id; ?>">área de defensa y seguridad de Telefónica DyS </a>.
                        Si desea consultar las partes interesadas de otro estudio, tendrá que verlas en su ficha correspondiente.
                    </p>

                </div>

                <div class="tab__header n_tabs_2">

                    <div class="active"><svg class="ico ico__miembros d"></svg>Partes Interesadas Internas</div>
                    <div> <svg class="ico ico__miembros d"></svg> Partes Interesadas Externas</div>

                </div>

                <div class="tab__body">

                    <div class="tab active"> <!-- Partes interesadas internas -->

                        <div class="block__table">

                            <div class="table__content">

                                <p>
                                    A continuación, se muestran las personas u organizaciones de Telefónica
                                    que pueden afectar o verse afectadas por una decisión o actividad del departamento:
                                </p>

                                <?php if($auth): ?>

                                    <div class="table__button">

                                        <div class="tooltip">

                                            <button 
                                                type="button" 
                                                class="button button__primary button__regular button__green"
                                                onclick="location.href='/contexto/partesinteresadas/pi/create?c=040300-20221219000000&type=1'"
                                            > 
                                                <svg class="ico ico__anadirmas w"></svg>
                                            </button>
                                            
                                            <span class="tooltiptext">Añadir parte interesada interna</span>

                                        </div>

                                    </div>      

                                <?php endif; ?>

                            </div>

                            <?php if($pii && $pii != ''): ?>

                                <table>  

                                    <thead>
                                        <th class=ocultarColumna>Parte interesada</th>
                                        <th>Parte Interesada</th>
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
                                            <tr class='linea'>
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

                                                            <?php if($auth): ?>

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

                    <div class="tab"> <!-- Partes interesadas externas -->

                        <div class="block__table">

                            <div class="table__content">

                                <p>
                                    A continuación, se muestran las personas u organizaciones externas a Telefónica
                                    que pueden afectar o verse afectadas por una decisión o actividad del departamento:
                                </p>

                                <?php if($auth): ?>

                                    <div class="table__button">

                                        <div class="tooltip">

                                            <button 
                                                type="button" 
                                                class="button button__primary button__regular button__green"
                                                onclick="location.href='/contexto/partesinteresadas/pi/create?c=040300-20221219000000&type=2'"
                                            > 
                                                <svg class="ico ico__anadirmas w"></svg>

                                            </button>
                                            
                                            <span class="tooltiptext">Añadir Parte Interesada Externa</span>

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

                                            <tr class='linea'>
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

                                                        <?php if($auth): ?>

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

                </div>

            </div>
            
            <div class="block__table"> <!-- Estudios -->

                <div class="table__header">

                    <div class="table__title">
                        
                        <h2>
                            <svg class="ico ico__miembros d"></svg>
                            Estudios de Partes interesadas
                        </h2>

                    </div>     

                </div>

                <div class="block__table">

                    <div class="table__content">

                        <p>
                            A continuación, se muestran los estudios de partes interesadas que se han realizado, tanto de dentro del departamento como fuera:
                        </p>

                        <?php if($auth): ?>

                            <div class="table__button">

                                <div class="tooltip">

                                    <button 
                                        type="button" 
                                        class="button button__primary button__regular button__green"
                                        onclick="location.href='/contexto/partesinteresadas/estudio/create';"
                                    > 
                                        <svg class="ico ico__anadirmas w"></svg>

                                    </button>

                                    <span class="tooltiptext">Nuevo estudio de Partes Interesadas</span>

                                </div>

                            </div>      

                        <?php endif; ?>

                        <?php if($contenedor && $contenedor != ''): ?>

                            <table>  

                                <thead>
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th>Última Revision</th>
                                    <th></th>
                                </thead>

                                <tbody>
                                    
                                    <!-- Introducimos la función php para cargar los datos en la tabla -->
                                    <?php 
                                        foreach ($contenedor as $row):
                                    ?>

                                        <!-- Esto bebe de la función php de arriba -->
                                        <tr class='linea'>
                                            <td onclick="location.href='/contexto/partesinteresadas/estudio/read?id=<?php echo $row->id; ?>'"> <?php echo $row->codigo_interno ?> </td> 
                                            <td onclick="location.href='/contexto/partesinteresadas/estudio/read?id=<?php echo $row->id; ?>'"> <?php echo $row->denominador ?> </td>
                                            <td onclick="location.href='/contexto/partesinteresadas/estudio/read?id=<?php echo $row->id; ?>'"> <?php echo $row->revision ?> </td>

                                            <!-- Ahora se generan dinámicamente los botones -->
                                            <td> 

                                                <div class="btn-group">

                                                    <form 
                                                        method="POST" 
                                                        action="/contexto/partesinteresadas/estudio/delete?id=<?php echo $row->id; ?>" 
                                                        id="formEliminarContenedorPartesInteresadas"
                                                    >
                                                        
                                                        <input type="hidden" name="id" value="<?php echo $row->id; ?>">

                                                        <div class="tooltip">                                           
                                                            <button 
                                                                type="button" 
                                                                class="button button__primary button__small button__blue"
                                                                value="" 
                                                                onclick="location.href='/contexto/partesinteresadas/estudio/read?id=<?php echo $row->id; ?>'"
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
                                                                    onclick="location.href='/contexto/partesinteresadas/estudio/update?id=<?php echo $row->id; ?>'"
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

                                                                <span class="tooltiptext">Eliminar estudio de partes interesadas</span>

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
                            <p> Por el momento, no se ha realizado ningún estudio de partes interesadas. </p>
                        <?php endif; ?>   

                    </div>

                </div>

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