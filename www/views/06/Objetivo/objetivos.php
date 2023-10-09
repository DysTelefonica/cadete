<head>

    <!-- Título -->
        <title> Objetivos | <?php echo $_SESSION["nombreApp"]; ?> </title>

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
                <li class="breadcrumb__item actual"> <a href="/planificacion/objetivos"> Objetivos </a> </li>

            </ol>

        </nav>

        <article>

            <header class="entry-header">
                <h1>
                    <svg class="ico ico__diana d"></svg>
                    Objetivos
                </h1>
            </header>

            <div class="entry-content">

                <div class="block">

                    <div class="block__content">
                        
                        <p>
                            El grado de cumplimiento de los objetivos definidos por DyS se mide a través de 
                            <a href="#">Indicadores de calidad</a> referenciados a los
                            <a href="/contexto/procesos">Procesos</a>, 
                            los cuales son la base fundamental utilizada como fuente de información para:
                        </p>

                        <ul class="list--dots">

                            <li>
                                El control de los Procesos.
                            </li>
                        
                            <li>
                                El cumplimiento de los objetivos marcados.
                            </li>
                            
                            <li>
                                La mejora continua.
                            </li>

                        </ul>

                        <p>
                            De las mediciones realizadas a través de los indicadores se realiza un análisis de los resultados, lo que deriva en la toma de acciones de mejora, correctivas o preventivas necesarias para la eliminación de las desviaciones reales o potenciales que puedan aparecer.
                        </p>

                    </div>

                    <div class="block__media">

                        <div class="block__img" style="background-image: url(/build/img/content/Varios-simbolos-y-tabletas.jpg)"></div>

                    </div>

                </div>

            </div>

            <div class="block__table">

                <div class="table__header">

                    <div class="table__title">
                        <h2>
                            <svg class="ico ico__diana d"></svg>
                            Objetivos de calidad
                        </h2>
                    </div>

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

                <?php if($objetivos && $objetivos != ''): ?>
                
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
                                    <td ondblclick="location.href='/planificacion/riesgos-oportunidades/read?id=<?php echo $row->id; ?>'" style="width: 100px"><?php echo $row->codigo_interno ?> </td> 
                                    <td ondblclick="location.href='/planificacion/riesgos-oportunidades/read?id=<?php echo $row->id; ?>'" class=ocultarColumna> <?php echo $row->id ?> </td>
                                    <td ondblclick="location.href='/planificacion/riesgos-oportunidades/read?id=<?php echo $row->id; ?>'" style="width: 800px"> <?php echo $row->denominador ?> </td>
                                    <td ondblclick="location.href='/planificacion/riesgos-oportunidades/read?id=<?php echo $row->id; ?>'" style="width: 100px"> <?php echo $row->estado ?> </td>

                                    <!-- Ahora se generan dinámicamente los botones -->
                                    <td ondblclick="location.href='/planificacion/riesgos-oportunidades/read?id=<?php echo $row->id; ?>'" style="width: 150px">

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
                                                    
                                                    <span class="tooltiptext">Ver Riesgo <?php echo $row->tipo ?></span>

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
                                                    
                                                    <span class="tooltiptext">Modificar Riesgo <?php echo $row->tipo ?></span>

                                                </div>

                                                <div class="tooltip">

                                                    <button 
                                                        type="button" 
                                                        class="button button__primary button__small button__red"
                                                        onclick="notificarEliminar(this.form, '<?php echo $row->id;?>', '<?php echo $row->codigo_interno;?>')"
                                                    > 
                                                        <svg class="ico ico__papelera w"></svg>
                                                        
                                                    </button>
                                                    
                                                    <span class="tooltiptext">Eliminar Riesgo <?php echo $row->tipo ?></span>

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
                    <p> Por el momento, no se ha llevado a cabo ningún objetivo de calidad. </p>
                <?php endif; ?>   

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