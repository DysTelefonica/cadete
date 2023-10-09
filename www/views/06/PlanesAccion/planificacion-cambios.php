<head>

    <!-- Título -->
        <title> Planificación de los cambios | <?php echo $_SESSION["nombreApp"]; ?> </title>

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
                <li class="breadcrumb__item"> <a href="/planificacion"> Planificación </a> </li>
                <li class="breadcrumb__item"> <span> / </span> </li>               
                <li class="breadcrumb__item actual"> <a href="/planificacion/planificacion-cambios"> Planificación de los cambios </a> </li>

            </ol>

        </nav>

        <article>

            <header class="entry-header">
                <h1>
                    <svg class="ico ico__rutarecorrido d"></svg>
                    Planificación de los cambios
                </h1>
            </header>

            <div class="entry-content">

                <div class="block">

                    <div class="block__content">
                        
                       <p>
                        Cuando se determine la necesidad de cambios en el sistema de gestión de calidad, estos cambios se deben llevar a cabo de una manera planificada, considerando:
                       </p>

                       <ul class="list--dots">
                            <li>
                                el propósito de los cambios y sus consecuencias potenciales;
                            </li>
                        
                            <li>
                               la integridad en el sistema de gestión de la calidad;
                            </li>

                            <li>
                                la disponibilidad de recursos;
                            </li>

                            <li>
                                la asignación o reasignación de resposabilidades y autoridades.
                            </li>

                        </ul>

                    </div>

                    <div class="block__media">

                        <div class="block__img" style="background-image: url(/build/img/content_dys/rubik.jpg)"></div>

                    </div>

                </div>

            </div>

        </article>

        <div class="tab__container">

            <div class="tab__title">
                <h2>
                    <svg class="ico ico__internet d"></svg>
                    Planes de Acción
                </h2>

            </div>

            <div class="tab__header n_tabs_2">

                <div class="active"><svg class="ico ico__rutarecorrido d"></svg>Planes de Acción</div>
                <div> <svg class="ico ico__rutarecorrido d"></svg> Tareas circulares</div>

            </div>

            <div class="tab__body">

                <div class="tab active"> <!-- Planes de acción -->
                    
                    <div class="block__table">

                        <div class="table__content">

                            <p>
                                A continuación, se muestran los planes de acción de actividades que no se repiten en el tiempo.
                            </p>

                            <?php if($auth): ?>

                                <div class="table__button">

                                    <div class="tooltip">

                                        <button 
                                            type="button" 
                                            class="button button__primary button__regular button__green"
                                            onclick="location.href='/planificacion/planificacion-cambios/create?tipo=1'"
                                        > 
                                            <svg class="ico ico__anadirmas w"></svg>
                                        </button>
                                        
                                        <span class="tooltiptext">Añadir Plan de Acción</span>

                                    </div>

                                </div>      
                            
                            <?php endif; ?>

                        </div>

                        <?php if($planesAccion && $planesAccion != ''): ?>
                        
                            <table>  

                                <thead>
                                    <th>Código</th>
                                    <th class=ocultarColumna>id</th>
                                    <th> Plan de Acción </th>
                                    <th style="text-align: center;"> Responsable </th>
                                    <th style="text-align: center;"> Estado </th>
                                    <th style="text-align: center;"> Acciones </th>
                                </thead>

                                <tbody>
                                    
                                    <!-- Introducimos la función php para cargar los datos en la tabla -->
                                    <?php 
                                        foreach ($planesAccion as $row):
                                    ?>

                                        <!-- Esto bebe de la función php de arriba -->
                                        <tr>
                                            <td onclick="location.href='/planificacion/planificacion-cambios/read?id=<?php echo $row->id; ?>'" style="width: 100px"><?php echo $row->codigo_interno ?> </td> 
                                            <td onclick="location.href='/planificacion/planificacion-cambios/read?id=<?php echo $row->id; ?>'" class=ocultarColumna> <?php echo $row->id ?> </td>
                                            <td onclick="location.href='/planificacion/planificacion-cambios/read?id=<?php echo $row->id; ?>'" style="width: 800px"> <?php echo $row->denominador ?> </td>
                                            <td onclick="location.href='/planificacion/planificacion-cambios/read?id=<?php echo $row->id; ?>'" style="width: 30px; text-align: center">  
                                                
                                                <?php if (!isset($row->r)): ?>
                                                    Sin determinar
                                                <?php else: ?>

                                                    <a href="/apoyo/recursos/personal/read?id=<?php echo($row->responsable);?>" style="text-decoration: none;">
                                                        
                                                        <?php if ($row->r->avatar <> ""): ?>
                                                            <img src=<?php echo $row->r->avatar; ?> class="avatar">  
                                                        <?php else: ?>
                                                            <img src="/build/img/users/sinAvatar.png" class="avatar"> 
                                                        <?php endif; ?>
                                                    </a>
                                                    
                                                <?php endif; ?>
                                            </td>

                                            <td onclick="location.href='/planificacion/planificacion-cambios/read?id=<?php echo $row->id; ?>'" style="width: 100px; text-align: center;"> <div class="E_burbuja <?php if(isset($row->indicador)):echo s('PA_E'. $row->indicador); endif; ?>"> <?php echo $row->estado ?> </div> </td>

                                            <!-- Ahora se generan dinámicamente los botones -->
                                            <td onclick="location.href='/planificacion/planificacion-cambios/read?id=<?php echo $row->id; ?>'" style="width: 150px; text-align: center;">

                                                <div class="btn-group">

                                                    <form 
                                                        method="POST" 
                                                        action="/planificacion/planificacion-cambios/delete?id=<?php echo $row->id; ?>'" 
                                                        id="form_pa"
                                                    >
                                                        
                                                        <input type="hidden" name="id" value="<?php echo $row->id; ?>">

                                                        <div class="tooltip">

                                                            <button 
                                                                type="button" 
                                                                class="button button__primary button__small button__blue"
                                                                onclick="location.href='/planificacion/planificacion-cambios/read?id=<?php echo $row->id; ?>'"
                                                            > 
                                                                <svg class="ico ico__ojo w"></svg>
                                                                
                                                            </button>
                                                            
                                                            <span class="tooltiptext">Ver Plan de Acción</span>

                                                        </div>

                                                    <?php if($auth): ?>

                                                        <div class="tooltip">

                                                            <button 
                                                                type="button" 
                                                                class="button button__primary button__small button__yellow"
                                                                onclick="location.href='/planificacion/planificacion-cambios/update?id=<?php echo $row->id; ?>'"
                                                            > 
                                                                <svg class="ico ico__lapicero w"></svg>

                                                            </button>
                                                            
                                                            <span class="tooltiptext">Modificar Plan de Acción</span>

                                                        </div>

                                                        <div class="tooltip">

                                                            <button 
                                                                type="button" 
                                                                class="button button__primary button__small button__red"
                                                                onclick="notificarEliminar(this.form, '<?php echo $row->id;?>', '<?php echo $row->codigo_interno;?>')"
                                                            > 
                                                                <svg class="ico ico__papelera w"></svg>
                                                                
                                                            </button>
                                                            
                                                            <span class="tooltiptext">Eliminar Plan de Acción</span>

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
                            <p> Por el momento, no se ha detectado ningun plan de acción singular. </p>
                        <?php endif; ?>   

                    </div>        

                </div>

                <div class="tab"> <!-- Tareas circulares  -->
                    
                    <div class="block__table">

                        <div class="table__content">

                            <p>
                                A continuación, se muestran tareas y actividades que se repiten en el tiempo (revisiones periódicas, actualización de documentación, calibración de equipos, etc.).
                            </p>

                            <?php if($auth): ?>

                                <div class="table__button">

                                    <div class="tooltip">

                                        <button 
                                            type="button" 
                                            class="button button__primary button__regular button__green"
                                            onclick="location.href='/planificacion/planificacion-cambios/create?tipo=2'"
                                        > 
                                            <svg class="ico ico__anadirmas w"></svg>

                                        </button>
                                        
                                        <span class="tooltiptext">Añadir Tarea Cicular</span>

                                    </div>

                                </div>      
                            
                            <?php endif; ?>

                        </div>

                        <?php if($tareascirculares && $tareascirculares != ''): ?>
                        
                            <table>  

                                <thead>
                                    <th> Código</th>
                                    <th class=ocultarColumna>id</th>
                                    <th> Tarea Cicular </th>
                                    <th style="text-align: center;"> Responsable </th>
                                    <th style="text-align: center;"> Estado </th>
                                    <th style="text-align: center;"> Acciones </th>
                                </thead>

                                <tbody>
                                    
                                    <!-- Introducimos la función php para cargar los datos en la tabla -->
                                    <?php 
                                        foreach ($tareascirculares as $row):
                                    ?>

                                        <!-- Esto bebe de la función php de arriba -->
                                        <tr>
                                            <td onclick="location.href='/planificacion/planificacion-cambios/read?id=<?php echo $row->id; ?>'" style="width: 100px"> <?php echo $row->codigo_interno ?> </td> 
                                            <td onclick="location.href='/planificacion/planificacion-cambios/read?id=<?php echo $row->id; ?>'" class=ocultarColumna> <?php echo $row->id ?> </td>
                                            <td onclick="location.href='/planificacion/planificacion-cambios/read?id=<?php echo $row->id; ?>'" style="width: 800px"> <?php echo $row->denominador ?> </td>
                                            
                                            <td onclick="location.href='/planificacion/planificacion-cambios/read?id=<?php echo $row->id; ?>'" style="width: 30px; text-align: center;">  
                                                
                                                <a href="/apoyo/recursos/personal/read?id=<?php echo($row->responsable);?>" style="text-decoration: none;">
                                                    <?php if ($row->r->avatar <> ""): ?>
                                                        <img src=<?php echo $row->r->avatar; ?> style="width:28px; height:28px; margin-right: 10px; border-radius:50%">  
                                                    <?php else: echo $row->r->nombre . " " . $row->r->primer_apellido . " " . $row->r->segundo_apellido; endif; ?>
                                                </a>
                                            </td>
                                            
                                            
                                            <td onclick="location.href='/planificacion/planificacion-cambios/read?id=<?php echo $row->id; ?>'" style="width: 100px; text-align: center;"> <div class="E_burbuja <?php if(isset($row->indicador)):echo s('PA_E'. $row->indicador); endif; ?>"> <?php echo $row->estado ?> </div> </td>

                                            <!-- Ahora se generan dinámicamente los botones -->
                                            <td onclick="location.href='/planificacion/planificacion-cambios/read?id=<?php echo $row->id; ?>'" style="width: 150px; text-align: center;">

                                                <div class="btn-group">

                                                    <form 
                                                        method="POST" 
                                                        action="/planificacion/planificacion-cambios/delete?id=<?php echo $row->id;?>'" 
                                                        id="form_par"
                                                    >
                                                        
                                                        <input type="hidden" name="id" value="<?php echo $row->id; ?>">

                                                        <div class="tooltip">

                                                            <button 
                                                                type="button" 
                                                                class="button button__primary button__small button__blue"
                                                                onclick="location.href='/planificacion/planificacion-cambios/read?id=<?php echo $row->id; ?>'"
                                                            > 
                                                                <svg class="ico ico__ojo w"></svg>
                                                                
                                                            </button>
                                                            
                                                            <span class="tooltiptext">Ver Tarea Cicular</span>

                                                        </div>

                                                    <?php if($auth): ?>

                                                        <div class="tooltip">

                                                            <button 
                                                                type="button" 
                                                                class="button button__primary button__small button__yellow"
                                                                onclick="location.href='/planificacion/planificacion-cambios/update?id=<?php echo $row->id; ?>'"
                                                            > 
                                                                <svg class="ico ico__lapicero w"></svg>

                                                            </button>
                                                            
                                                            <span class="tooltiptext">Modificar Tarea Cicular</span>

                                                        </div>

                                                        <div class="tooltip">

                                                            <button 
                                                                type="button" 
                                                                class="button button__primary button__small button__red"
                                                                onclick="notificarEliminar(this.form, '<?php echo $row->id;?>', '<?php echo $row->codigo_interno;?>')"
                                                            > 
                                                                <svg class="ico ico__papelera w"></svg>
                                                                
                                                            </button>
                                                            
                                                            <span class="tooltiptext">Eliminar Plan de Acción <?php echo $row->tipo ?></span>

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
                            <p> Por el momento, no se ha detectado ningun plan de acción repetitivo. </p>
                        <?php endif; ?>   

                    </div>

                </div>
            
            </div>

        </div>

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