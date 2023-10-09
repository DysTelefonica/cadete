<head>

    <!-- Título -->
        <title> Comunicados | <?php echo $_SESSION["nombreApp"]; ?> </title>

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
                <li class="breadcrumb__item actual"> <a href="/apoyo/comunicados"> Comunicados </a> </li>

            </ol>

        </nav>

        <article>

            <header class="entry-header">
                <h1>
                    <svg class="ico ico__noticias d"></svg>
                    Comunicados
                </h1>
            </header>

            <div class="entry-content">

                <div class="block">

                    <div class="block__content">
                        
                       <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt veniam ex eos nemo sunt cum nam. 
                        Alias expedita aspernatur iure impedit consequatur. Aspernatur fugiat dolores optio aliquam amet officia 
                        aperiam necessitatibus ducimus perspiciatis consequatur, itaque facere et ipsam quam nihil debitis adipisci, 
                        ullam eaque alias soluta explicabo. Saepe, sapiente nobis.
                       </p> 

                    </div>

                    <div class="block__media">

                        <div class="block__img" style="background-image: url(/build/img/content_dys/Tablon1.jpg)"></div>

                    </div>

                </div>

            </div>

        </article>

        <div class="block__table">

            <div class="table__content">

                <?php if($auth): ?>

                    <div class="table__button">

                        <div class="tooltip">

                            <button 
                                type="button" 
                                class="button button__primary button__regular button__green"
                                onclick="location.href='/apoyo/comunicados/create'"
                            > 
                                <svg class="ico ico__anadirmas w"></svg>
                            </button>
                            
                            <span class="tooltiptext">Añadir Comunicado</span>

                        </div>

                    </div>      
                
                <?php endif; ?>

            </div>

            <?php if($comunicados && $comunicados != ''): ?>
            
                <table>  

                    <thead>
                        <th>Código</th>
                        <th class=ocultarColumna>id</th>
                        <th> Asunto </th>
                        <th> Fecha </th>
                        <th style="text-align: center;"></th>
                    </thead>

                    <tbody>
                        
                        <!-- Introducimos la función php para cargar los datos en la tabla -->
                        <?php foreach ($comunicados as $row): ?>
                            
                            <tr>
                                <td onclick="location.href='/apoyo/comunicados/comunicado?id=<?php echo $row->id; ?>'" style="width: 100px"><?php echo $row->codigo_interno ?> </td> 
                                <td onclick="location.href='/apoyo/comunicados/comunicado?id=<?php echo $row->id; ?>'" class=ocultarColumna> <?php echo $row->id ?> </td>
                                <td onclick="location.href='/apoyo/comunicados/comunicado?id=<?php echo $row->id; ?>'" style="width: 800px"> <?php echo $row->denominador ?> </td>
                                <td onclick="location.href='/apoyo/comunicados/comunicado?id=<?php echo $row->id; ?>'" style="width: 100px; text-align: center;"> <?php echo(transformarFecha($row->fecha)); ?> </td>

                                <!-- Ahora se generan dinámicamente los botones -->
                                <td onclick="location.href='/apoyo/comunicados/comunicado?id=<?php echo $row->id; ?>'" style="width: 150px; text-align: center;">

                                    <div class="btn-group">

                                        <form 
                                            method="POST" 
                                            action="/apoyo/comunicados/comunicado?id=<?php echo $row->id; ?>" 
                                            id="form_pm"
                                        >
                                            
                                            <input type="hidden" name="id" value="<?php echo $row->id; ?>">

                                            <div class="tooltip">

                                                <button 
                                                    type="button" 
                                                    class="button button__primary button__small button__blue"
                                                    onclick="location.href='/apoyo/comunicados/read?id=<?php echo $row->id; ?>'"
                                                > 
                                                    <svg class="ico ico__ojo w"></svg>
                                                    
                                                </button>
                                                
                                                <span class="tooltiptext">Ver Comunicado</span>

                                            </div>

                                        <?php if($auth): ?>

                                            <div class="tooltip">

                                                <button 
                                                    type="button" 
                                                    class="button button__primary button__small button__yellow"
                                                    onclick="location.href='/apoyo/comunicados/update?id=<?php echo $row->id; ?>'"
                                                > 
                                                    <svg class="ico ico__lapicero w"></svg>

                                                </button>
                                                
                                                <span class="tooltiptext">Modificar Comunicado</span>

                                            </div>

                                            <div class="tooltip">

                                                <button 
                                                    type="button" 
                                                    class="button button__primary button__small button__red"
                                                    onclick="notificarEliminar(this.form, '<?php echo $row->id;?>', '<?php echo $row->codigo_interno;?>')"
                                                > 
                                                    <svg class="ico ico__papelera w"></svg>
                                                    
                                                </button>
                                                
                                                <span class="tooltiptext">Eliminar Comunicado</span>

                                            </div>
                                            
                                            <?php endif; ?>

                                        </form>
                                        
                                    </div>

                                </td>

                            </tr>

                        <?php  endforeach; ?>

                    </tbody>

                </table>
            
            <?php else: ?>     
                <p> Por el momento, no se ha detectado ningun Comunicado. </p>
            <?php endif; ?>   

        </div>    

</main>

<script>

        function notificarEliminar(form, id, codigo){

            Dialog.open({
                title: 'Eliminar Comunicado ' + codigo,
                message: '¿Desea eliminar Comunicado ' + codigo + '? (esta acción es irreversible).',
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