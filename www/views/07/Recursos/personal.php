<head>

    <!-- Título -->
        <title> Proyectos de mejora | <?php echo $_SESSION["nombreApp"]; ?> </title>

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
                <li class="breadcrumb__item"> <a href="/apoyo"> Apoyo </a> </li>
                <li class="breadcrumb__item"> <span> / </span> </li>               
                <li class="breadcrumb__item"> <a href="/obras"> Recursos </a> </li>
                <li class="breadcrumb__item"> <span> / </span> </li>               
                <li class="breadcrumb__item actual"> <a href="/apoyo/recursos/personal"> Personal </a> </li>

            </ol>

        </nav>

        <article>

            <header class="entry-header">
                <h1>
                    <svg class="ico ico__usuario d"></svg>
                    Personal
                </h1>
            </header>

        </article>

        <div class="block__table">

            <div class="table__content">

                <?php if($auth): ?>

                    <div class="table__button">

                        <div class="tooltip">

                            <button 
                                type="button" 
                                class="button button__primary button__regular button__green"
                                onclick="location.href='/apoyo/recursos/personal/create'"
                            > 
                                <svg class="ico ico__anadirmas w"></svg>
                            </button>
                            
                            <span class="tooltiptext">Añadir Personal</span>

                        </div>

                    </div>      
                
                <?php endif; ?>

            </div>

            <?php incluirTemplate('search-bar'); ?>

            <?php if($personal && $personal != ''): ?>
            
                <table>  

                    <thead>

                        <th style="text-align: center;"></th>
                        <th style="text-align: center;"> Nombre completo </th>
                        <th class=ocultarColumna>id</th>
                        <th style="text-align: center;"> Email </th>
                        <th style="text-align: center;"> Rol </th>
                        <th style="text-align: center;"></th>

                    </thead>

                    <tbody id="table_personal"></tbody>

                </table>
            
            <?php else: ?>     
                <p> Por el momento, no se ha detectado a nadie de personal. </p>
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
    var data = <?php echo json_encode($personal) ?>;
    var t = 'table_personal';
    var row = `
            <tr>

                <td onclick="location.href='/apoyo/recursos/personal/read?id={{id}}'" style="text-align: center;"> <img src={{avatar}} class="avatar"> </td> 
                <td onclick="location.href='/apoyo/recursos/personal/read?id={{id}}'" style="text-align: center;"> {{denominador}} </td> 
                <td onclick="location.href='/apoyo/recursos/personal/read?id={{id}}'" style="text-align: center;" class='ocultarColumna'> {{id}} </td>
                <td onclick="location.href='/apoyo/recursos/personal/read?id={{id}}'" style="text-align: center;"> {{email}} </td>
                <td onclick="location.href='/apoyo/recursos/personal/read?id={{id}}'" style="text-align: center;"> {{rol}} </td>
                <td onclick="location.href='/apoyo/recursos/personal/read?id={{id}}'">

                <div class="btn-group">

                    <form 
                        method="POST" 
                        action="/apoyo/recursos/personal/delete?id={{id}}" 
                        id="form_pm"
                    >
                    
                        <input type="hidden" name="id" value="{{id}}">

                        <div class="tooltip">

                            <button 
                                type="button" 
                                class="button button__primary button__small button__blue"
                                onclick="location.href='/apoyo/recursos/personal/read?id={{id}}'"
                            > 
                                <svg class="ico ico__ojo w"></svg>
                            
                            </button>
                        
                            <span class="tooltiptext">Ver Proyecto de Mejora</span>

                        </div>

                        <?php if($auth): ?>

                                <div class="tooltip">

                                    <button 
                                        type="button" 
                                        class="button button__primary button__small button__yellow"
                                        onclick="location.href='/apoyo/recursos/personal/update?id={{id}}'"
                                    > 
                                        <svg class="ico ico__lapicero w"></svg>

                                    </button>
                                    
                                    <span class="tooltiptext">Modificar Personal</span>

                                </div>

                                <div class="tooltip">

                                    <button 
                                        type="button" 
                                        class="button button__primary button__small button__red"
                                        onclick="notificarEliminar(this.form, '{{id}}', '{{codigo_interno}}')"
                                    > 
                                        <svg class="ico ico__papelera w"></svg>
                                        
                                    </button>
                                    
                                    <span class="tooltiptext">Eliminar Personal</span>

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
    buildTable(data, t, row);

</script>

</html>