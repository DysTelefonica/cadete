<head>

    <!-- Título -->
        <title> Liderazgo y compromiso | <?php echo $_SESSION["nombreApp"]; ?> </title>

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
                <li class="breadcrumb__item actual"> <a href="/liderazgo/liderazgo"> Liderazgo y compromiso </a> </li>

            </ol>

        </nav>

    <!-- Articulo -->
    <article>

        <header class="entry-header">
            <h1>
                <svg class="ico ico__equipo d"></svg>
                Liderazgo y compromiso
            </h1>
        </header>

        <div class="entry-content">

            <div class="block">

                <div class="block__content">

                    <p>
                        La cadena de mando de la Dirección de Defensa y Seguridad de Telefónica 
                        está reflejada en el “Manual de Organización y Funciones” disponible en 
                        la web de TdE, y en el 
                        <a href="/apoyo/informacion-documentada/read?id=070201.220829.100810.137484">“Manual de Organización y Funciones de DyS (EM-300-MA-001)”</a>.
                        
                    </p>

                    <p>
                        La Dirección de la Empresa está personificada por el Presidente 
                        Ejecutivo y por el Comité de Dirección de Telefónica, 
                        siendo éste el órgano que:
                    </p>

                    <ul class="list--dots">
                        <li> Dirige la Entidad, y por lo tanto ejerce la autoridad y el liderazgo de la misma.</li>
                        <li> Se responsabiliza y se compromete directamente con la definición, 
                            implantación y difusión del Sistema de la Calidad, que ha de desarrollar 
                            la 
                            <a href="/liderazgo/politica">Política de la Calidad</a>
                            de la organización, recogida en el 
                            <a href="#"> “Manual del Sistema Integrado de Gestión (SIG) de TdE (TE-000-MA-003)”</a>.
                           
                        </li>
                    </ul>

                </div>

                <div class="block__media">

                    <div class="block__img" style="background-image: url(/build/img/content/Business-people-talking-working-at-laptops-in-office-meeting.jpg)"></div>

                </div>

            </div>

            <div class="block">

                <div class="block__content">

                    <h2>
                        <svg class="ico ico__equipo d"></svg>
                        Comité de Calidad de Defensa y Seguridad
                    </h2>

                    <p>
                        Dadas las características especiales del Ministerio de Defensa como cliente de 
                        DyS se tiene establecido un Comité de Calidad de Defensa y Seguridad, 
                        el cual se reúne de forma periódica para adoptar las decisiones pertinentes 
                        relativos a la gestión interna de la dirección de la unidad. Esto se refleja en 
                        actas, puestas a disposición de los integrantes de la cadena de mando de DyS. 
                    </p>

                    <p>  

                        Este comité está formado por:
                    </p>

                    <ul class="list--no_dots">

                        <?php foreach ($comite as $c ) { ?>

                            <li> 

                                <div class="li__content">

                                    <img src="
                                        <?php 
                                            if (isset($c->personal) && !empty($c->personal)){
                                                echo($c->personal->avatar); 
                                            }else{
                                                echo("/build/img/users/sinAvatar.png"); 
                                            }
                                        ?>" 
                                        class="li__img"> 

                                        <div class="li__text">

                                            <?php echo('El ' . $c->denominador);

                                                if (isset($c->personal) && !empty($c->personal)):

                                                    echo(', cargo desempeñado por'); ?>                                      

                                                    <a href="/apoyo/recursos/personal/read?id=<?php echo($c->personal->id); ?>"> 

                                                        <?php echo $c->personal->nombre; echo(" "); echo $c->personal->primer_apellido; echo(" "); echo $c->personal->segundo_apellido;?>.

                                                    </a>
                                                    
                                            <?php endif; ?>

                                        </div>

                                </div>

                            </li>
                            
                        <?php } ?>

                    </ul>

                </div>

            </div>

            <div class="block">

                <div class="block__content">

                    <h2>
                        <svg class="ico ico__equipo d"></svg>
                        Enfoque a cliente
                    </h2>

                    <p>
                        Telefónica manifiesta y demuestra su compromiso con respecto al enfoque al 
                        cliente con el hecho de que el Área de Defensa y Seguridad (DyS) 
                        es una unidad dedicada a la atención de las necesidades de nuestro cliente, 
                        el Ministerio de Defensa, identificando sus expectativas y necesidades.
                    </p>

                </div>

            </div>

        </div>

    </article>

</main>

</body>

</html>