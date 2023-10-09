<head>

    <!-- Título -->
        <title> Buzón de sugerencias | <?php echo $_SESSION["nombreApp"]; ?> </title>

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
                <li class="breadcrumb__item actual"> <a href="/buzon"> Buzón </a> </li>

            </ol>

        </nav>

        <article>

            <header class="entry-header">
                <h1>
                    <svg class="ico ico__correo d"></svg>
                    Buzón de sugerencias
                </h1>
            </header>

        </article>

        <div class="block__table">            

            <h1>Sugerencias</h1>

            <?php incluirTemplate('search-bar'); ?>

            <?php if($sugerencias && $sugerencias != ''): ?>
            
                <table>  

                    <thead>

                        <th style="text-align: center;"> Fecha </th>
                        <th class=ocultarColumna>id</th>
                        <th style="text-align: center;"> Reporte </th>
                        <th style="text-align: center;"> Atendida </th>
                        <th style="text-align: center;"></th>

                    </thead>

                    <tbody id="table_sugerencias"></tbody>

                </table>
            
            <?php else: ?>     
                <p> Por el momento, no se han detectado sugerencias. </p>
            <?php endif; ?>   

        </div>

        <div class="block__table">

            <h1>Errores</h1>

            <?php incluirTemplate('search-bar'); ?>

            <?php if($errores && $errores != ''): ?>
            
                <table>  

                    <thead>

                        <th style="text-align: center;"> Fecha </th>
                        <th class=ocultarColumna>id</th>
                        <th style="text-align: center;"> Reporte </th>
                        <th style="text-align: center;"> Atendida </th>
                        <th style="text-align: center;"></th>

                    </thead>

                    <tbody id="table_errores"></tbody>

                </table>
            
            <?php else: ?>     
                <p> Por el momento, no se han detectado errores. </p>
            <?php endif; ?>   

        </div>    

</main>

<script>

    function notificarEliminar(form, id, codigo){

        Dialog.open({
            title: 'Eliminar Proyecto de Mejora ' + codigo,
            message: '¿Desea eliminar Proyecto de Mejora ' + codigo + '? (esta acción es irreversible).',
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

<script>

    //Definimos los datos para construir y filtrar la tabla
    var data__sugerencias = <?php echo json_encode($sugerencias) ?>;
    var data__errores = <?php echo json_encode($errores) ?>;

    var row = `
            <tr>
                <td onclick="location.href='/buzon/read?id={{id}}'" style="text-align: center;"> {{date}} </td> 
                <td onclick="location.href='/buzon/read?id={{id}}'" style="text-align: center;" class='ocultarColumna'> {{id}} </td>
                <td onclick="location.href='/buzon/read?id={{id}}'" style="text-align: center;"> {{reporte}} </td>
                <td onclick="location.href='/buzon/read?id={{id}}'" style="text-align: center;"> {{atendida}} </td>
                <td onclick="location.href='/buzon/read?id={{id}}'">

                    <div class="btn-group">

                        <form 
                            method="POST" 
                            action="/buzon/delete?id={{id}}" 
                            id="form_pm"
                        >
                        
                            <input type="hidden" name="id" value="{{id}}">

                            <div class="tooltip">

                                <button 
                                    type="button" 
                                    class="button button__primary button__small button__blue"
                                    onclick="location.href='/buzon/read?id={{id}}'"
                                > 
                                    <svg class="ico ico__ojo w"></svg>
                                
                                </button>
                            
                                <span class="tooltiptext">Ver buzón</span>

                            </div>

                            <?php if($auth): ?>

                                    <div class="tooltip">

                                        <button 
                                            type="button" 
                                            class="button button__primary button__small button__yellow"
                                            onclick="location.href='/buzón/update?id={{id}}'"
                                        > 
                                            <svg class="ico ico__lapicero w"></svg>

                                        </button>
                                        
                                        <span class="tooltiptext">Modificar buzón</span>

                                    </div>

                                    <div class="tooltip">

                                        <button 
                                            type="button" 
                                            class="button button__primary button__small button__red"
                                            onclick="notificarEliminar(this.form, '{{id}}', '{{codigo_interno}}')"
                                        > 
                                            <svg class="ico ico__papelera w"></svg>
                                            
                                        </button>
                                        
                                        <span class="tooltiptext">Eliminar buzón</span>

                                    </div>
                                    
                                    <?php endif; ?>

                                </form>
                                
                            </div>

                        </form>
                    
                    </div>

                </td>

            </tr>
    `;

    //Construimos la tabla

    if(data__sugerencias != ''){
        buildTable(data__sugerencias,   'table_sugerencias',    row);
    }

    if(data__errores != ''){
        buildTable(data__errores,       'table_errores',        row);
    }

</script>

</html>