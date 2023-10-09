<head>

    <!-- Título -->
        <title> Bitácora | <?php echo $_SESSION["nombreApp"]; ?></title>

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
                <li class="breadcrumb__item actual"> <a href="/bitacora"> Bitácora </a> </li>

            </ol>

        </nav>

    <!-- Articulo -->
    <article>

        <header class="entry-header">
            <h1>
                <svg class="ico ico__blog d"></svg>
                Cuaderno de bitácora
            </h1>
        </header>

    </article>

    <div class="block__table">

        <div class="table__header">
            
            <div class="table__title">
                <h2>
                    <!-- <svg class="ico ico__internet d"></svg>
                    Análisis DAFO -->
                </h2>
            </div>

            <?php if($auth): ?>

                <div class="table__button">

                    <div class="tooltip">

                        <button 
                            type="button" 
                            class="button button__primary button__regular button__green"
                            onclick="showBitacora()"
                        > 
                            <svg class="ico ico__anadirmas w"></svg>

                        </button>

                        <span class="tooltiptext">Nueva entrada al cuadérno de bitácora</span>

                    </div>

                </div>      
            
            <?php endif; ?>

        </div>

        <div class="table__content">

            <?php if($bitacora && $bitacora != ''): ?>

                <table>  

                    <thead>
                        <th>Bitácora</th>
                        <th>Fecha</th>
                        <th></th>
                    </thead>

                    <tbody>
                        
                        <!-- Introducimos la función php para cargar los datos en la tabla -->
                        <?php 
                            foreach ($bitacora as $row):
                        ?>

                            <!-- Esto bebe de la función php de arriba -->
                            <tr>
                                <td ondblclick="location.href='/bitacora/read?id=<?php echo $row->id; ?>'"> <?php echo $row->bitacora ?> </td> 

                                <td ondblclick="location.href='/bitacora/read?id=<?php echo $row->id; ?>'">
                                    <?php 
                                        if ( !$row->fecha == null) { echo date('d/m/Y', strtotime($row->fecha)); }
                                        else { echo ''; }                                                
                                    ?> 
                                </td>

                                <!-- Ahora se generan dinámicamente los botones -->
                                <td ondblclick="location.href='/bitacora/read?id=<?php echo $row->id; ?>'"> 

                                    <div class="btn-group">

                                        <form 
                                            method="POST" 
                                            action="/bitacora/delete" 
                                            id="form_EliminarBitacora"
                                        >
                                                                                    
                                            <input type="hidden" name="id" value="<?php echo $row->id; ?>">

                                            <div class="tooltip">                                           
                                                <button 
                                                    type="button" 
                                                    class="button button__primary button__small button__blue"
                                                    onclick="location.href='/bitacora/read?id=<?php echo $row->id; ?>'"
                                                > 
                                                    <svg class="ico ico__ojo w"></svg>

                                                </button>
                                                <span class="tooltiptext">Ver entrada de bitácora</span>
                                            </div>

                                            <? if($row->rutaIndex != ""): ?>

                                                <div class="tooltip">                                           
                                                    <button 
                                                        type="button" 
                                                        class="button button__primary button__small button__blue"
                                                        onclick="location.href='<?php echo $row->rutaIndex . $row->referencia; ?>'"
                                                    > 
                                                        <svg class="ico <?php echo $row->ico ?> w"></svg>

                                                    </button>
                                                    <span class="tooltiptext">Ver referencia</span>
                                                </div>

                                            <? endif; ?>

                                            <?php if($auth): ?>
                                                
                                                <div class="tooltip">
                                                
                                                    <button 
                                                        type="button" 
                                                        class="button button__primary button__small button__yellow"
                                                        onclick="location.href='/bitacora/update?id=<?php echo $row->id; ?>'"
                                                    > 
                                                        <svg class="ico ico__lapicero w"></svg>

                                                    </button>

                                                    <span class="tooltiptext">Modificar entrada de bitácora</span>

                                                </div>

                                                <div class="tooltip">

                                                    <button 
                                                        type="button" 
                                                        class="button button__primary button__small button__red"
                                                        onclick="notificarEliminar(this.form, '<?php echo $row->id;?>')"
                                                    > 
                                                        <svg class="ico ico__papelera w"></svg>
                                                    </button>

                                                    <span class="tooltiptext">Eliminar entrada de bitácora</span>

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
                <p> No hay ninguna entrada del cuadérno de bitácora que mostrar por el momento :( </p>
            <?php endif; ?>   

        </div>
    </div>

</main>

</html>

<script>

    function notificarEliminar(form){

        Dialog.open({
            title: 'ELIMINAR ENTRADA DE BITÁCORA',
            message: '¿Desea eliminar la entrada de bitácora? (esta acción es irreversible).',
            color: 'red',
            ico: 'ico__papelera d',
            okText: 'Borra, BORRA',
            cancelText: 'Déjalo, DÉJALO',
            onok: () => { 
                showSnackbar('Bitácora eliminada correctamente', 'ico__papelera w', 'red');
                form.submit(),'_self'; 
            }                

        })
    }

</script>