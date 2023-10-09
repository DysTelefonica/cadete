<head>

    <!-- Título -->
        <title> ISO 9001:2015 | Telefónica DyS </title> 

    <!-- Icono -->
        <link rel="shortcut icon" href="/build/img/layout/Internet_2Regular_azul.svg">
    
</head>

<main>

 <!-- #region Breadcrumb -->

    <nav class="breadcrumb">

        <ol class="breadcrumb__list">

            <li class="breadcrumb__item"> <svg class="ico ico__ids b"> </svg> </li>
            <li class="breadcrumb__item"> <a href="/"> Inicio </a> </li>
            <li class="breadcrumb__item"> <span> / </span> </li>               
            <li class="breadcrumb__item"> <a href="/apoyo"> Apoyo </a> </li>
            <li class="breadcrumb__item"> <span> / </span> </li>               
            <li class="breadcrumb__item"> <a href="/apoyo/informacion-documentada"> Información documentada </a> </li>
            <li class="breadcrumb__item"> <span> / </span> </li>               
            <li class="breadcrumb__item"> <a href="/obras"> Documentación externa </a> </li>
            <li class="breadcrumb__item"> <span> / </span> </li>               
            <li class="breadcrumb__item actual"> <a href="/apoyo/informacion-documentada/documentacion-externa/iso_9001_2015"> ISO 9001:2015 </a> </li>
        </ol>

    </nav>

<!-- #endregion -->

<!-- #region Artículo -->

    <article>

        <header class="entry-header">
            <h1>
                <svg class="ico ico__ISO_9001_2015 b"></svg>

                <span id='titulo'>

                    <?php 

                        if(isset($apartado) && ($apartado != null) ){
                            echo('Apartado '); echo($apartado->codigo_interno); 
                        }
                        else{ ?>

                            <a 
                                href="/gestorArchivos?r=../adj/ISO 9001_2015_Requisitos.pdf" 
                                target="_blank" 
                                download="ISO 9001_2015.pdf">
                                UNE-EN ISO 9001
                            </a> 
                            
                        <? } ?>

                </span> 

            </h1>

        </header>
        
        <div class="entry-content">

        <div class="block">

            <? if(isset($apartado) && $apartado !== null){ ?>

                <div class="block__content form">

                    <div class="form__two">

                    <!-- Formulario -->

                        <div class="form__left">

                            <h2>
                                <svg class="ico ico__ISO_9001_2015 b"></svg>
                                <span><?php echo($apartado->denominador); ?></span>
                            </h2>

                            <div class="form__leftContent">

                                <form class="form">

                                    <p> <?php echo($apartado->contenido); ?> </p>

                                </form>

                            </div>

                        </div>
                    
                    <!-- Acciones -->

                        <div class="form__right">

                            <h2>
                                <svg class="ico ico__ISO_9001_2015 b"></svg>
                                <span>Apartados</span>
                            </h2>

                            <div class="form__rightContent">

                                <form class="form">

                                    <ul>
                                        <?php foreach ($iso as $i): ?>
                                            
                                            <li class="compact">
                                                <a href="/apoyo/informacion-documentada/documentacion-externa/iso_9001_2015?id=<?php echo $i->id; ?>"> <?php echo $i->codigo_interno; ?> - <?php echo $i->denominador; ?></a>
                                            </li>                          

                                        <?php endforeach; ?>

                                    </ul>

                                </form>

                            </div>                                  
                            
                        </div>

                    </div>

                </div>

            <? }else{ ?>

                <div class="indice_normas">

                    <?php foreach ($iso as $i):

                        switch ($i->indice) {

                            case 1: ?>

                                <h2>
                                    <a href="/apoyo/informacion-documentada/documentacion-externa/iso_9001_2015?id=<?php echo $i->id; ?>"> <?php echo $i->codigo_interno; ?> - <?php echo $i->denominador; ?></a>
                                </h2>

                                <?php break;
                            
                            case 2: ?>

                                <h3>
                                    <a href="/apoyo/informacion-documentada/documentacion-externa/iso_9001_2015?id=<?php echo $i->id; ?>"> <?php echo $i->codigo_interno; ?> - <?php echo $i->denominador; ?></a>
                                </h3>

                                <?php break;

                            case 3: ?>

                                <h4>
                                    <a href="/apoyo/informacion-documentada/documentacion-externa/iso_9001_2015?id=<?php echo $i->id; ?>"> <?php echo $i->id; ?> - <?php echo $i->denominador; ?></a>
                                </h4>

                                <?php break;

                            default: ?>

                                <h4>
                                    <a href="/apoyo/informacion-documentada/documentacion-externa/iso_9001_2015?id=<?php echo $i->id; ?>"> <?php echo $i->id; ?> - <?php echo $i->denominador; ?></a>
                                </h4>

                                <?php break;

                        } 

                    endforeach; ?>

                </div>

            <? } ?>
        </div>
    
        </div>
                   

    </article>               

<!-- #endregion -->

</main>