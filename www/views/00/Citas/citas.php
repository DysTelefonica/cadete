<head>

    <title> Citas célebres | <?php echo $_SESSION["nombreApp"]; ?> </title>     <!-- Título -->
    <link rel="shortcut icon" href="/build/img/layout/Miembros_3Masa.svg">     <!-- Icono -->

</head>

<body>

<main class="main">

    <!-- Breadcrumb -->

        <nav class="breadcrumb">

            <ol class="breadcrumb__list">

                <li class="breadcrumb__item"> <svg class="ico ico__puntos b"> </svg> </li>
                <li class="breadcrumb__item"> <a href="/"> Inicio </a> </li>
                <li class="breadcrumb__item"> <span> / </span> </li>               
                <li class="breadcrumb__item"> <a href="/citas"> Citas </a> </li>

            </ol>

        </nav>

    <!-- Articulo -->
    <article>

        <header class="entry-header">
            <h1>
                <svg class="ico ico__premio d"></svg>
                Citas célebres
            </h1>
        </header>

        <div class="entry-content">

            <div class="block">

                <div class="block__content">

                    <div class="text-align-center">

                        <div class="cita" style='font-size: 150%; font-style: italic;'>
                            "<?php echo($cita->denominador); ?>."
                        </div>

                        <br>

                        <div class="autor">
                            <?php echo($cita->personal); ?>, <?php echo($cita->fecha); ?>
                        </div>
                        
                      
                    </div>

                </div>

            </div>

            <div class="block">

                <div class="block__content">

                    <h2>
                        <svg class="ico ico__premio d"></svg>
                        Otras citas célebres
                    </h2>

                    <ul class="list--dots">

                        <?php foreach ($citas as $c):?>

                            <li>
                                <a href="/citas?id=<?php echo($c->id); ?>" style='text-decoration: none;'>

                                    <div class="cita" style='font-style: bold, italic;'>
                                        "<?php echo($c->denominador); ?>."
                                    </div>
                                    <div class="autor" style='font-size: 85%;'>
                                        <?php echo($c->personal); ?>, <?php echo($c->fecha); ?>
                                    </div>

                                </a>
                            </li>                           
                        
                        <?php endforeach; ?>

                    </ul>

                </div>

            </div>

        </div>

    </article>

</main>

</body>

</html>