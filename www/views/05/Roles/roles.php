<head>

    <!-- Título -->
        <title> Roles | <?php echo $_SESSION["nombreApp"]; ?> </title>

    <!-- Icono -->
        <link rel="shortcut icon" href="/build/img/layout/Miembros_3Masa.svg">

</head>

<body>

<main class="main">

    <!-- Breadcrumb -->

        <nav class="breadcrumb">

            <ol class="breadcrumb__list">

                <li class="breadcrumb__item"> <svg class="ico ico__puntos b"> </svg> </li>
                <li class="breadcrumb__item"> <a href="/"> Inicio </a> </li>
                <li class="breadcrumb__item"> <span> / </span> </li>               
                <li class="breadcrumb__item"> <a href="/liderazgo"> Liderazgo </a> </li>
                <li class="breadcrumb__item"> <span> / </span> </li>               
                <li class="breadcrumb__item actual"> <a href="/liderazgo/roles"> Roles </a> </li>

            </ol>

        </nav>

    <!-- Articulo -->
    <article>

        <header class="entry-header">
            <h1>
                <svg class="ico ico__cuidar d"></svg>
                Roles, responsabilidades y autoridades de la organización
            </h1>
        </header>

        <div class="entry-content">

            <div class="block">

                <div class="block__content">

                    <p>
                        En los contratos entre el Ministerio de Defensa y DyS, 
                        el Representante de la Dirección de Telefónica, 
                        será nombrado por la Dirección del Área de Defensa, de quien tendrá dependencia funcional.
                    </p>

                </div>

                <div class="block__media">

                    <div class="block__img" style="background-image: url(/build/img/content/Software-developers.jpg)"></div>

                </div>

            </div>

             <div class="block">

                <div class="block__content">

                    <h2>
                        <svg class="ico ico__equipo d"></svg>
                        Organigrama
                    </h2>

                    <div class="block__media">

                        <div class="img">

                            <img class="img__media" src="/build/img/content_dys/organigrama.jpg" alt="Organigrama">
                            
                        </div>                       

                    </div>               

                </div>

            </div>

        </div>

    </article>

</main>

</body>

</html>