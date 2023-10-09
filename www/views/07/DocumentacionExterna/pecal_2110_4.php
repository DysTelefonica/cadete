<head>

    <!-- Título -->
        <title> PECAL 2110 Ed.4 | Telefónica DyS </title> 

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
            <li class="breadcrumb__item actual"> <a href="/apoyo/informacion-documentada/documentacion-externa/pecal_2110_4"> PECAL 2110 Ed.4 </a> </li>
        </ol>

    </nav>

<!-- #endregion -->

<!-- #region Artículo -->

    <article>

        <header class="entry-header">
            <h1>
                <svg class="ico ico__version b"></svg>

                <span id='titulo'>

                    <?php 

                        if(isset($apartado) && ($apartado != null) ){
                            echo('Apartado '); echo($apartado->id); 
                        }
                        else{ ?>

                            <a 
                                href="/gestorArchivos?r=../adj/PECAL 2110_Ed.4.pdf" 
                                target="_blank" 
                                download="PECAL 2110 Ed.4.pdf">
                                PECAL 2110 Ed.4
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
                                <svg class="ico ico__version b"></svg>
                                <span><?php echo($apartado->denominador); ?></span>
                            </h2>

                            <div class="form__leftContent">

                                <form 
                                    class="form"
                                >

                                <p>
                                    
                                    <?php echo($apartado->contenido); ?>

                                </p>
                    

                                </form>

                            </div>

                        </div>
                    
                    <!-- Acciones -->

                        <div class="form__right">

                            <h2>
                                <svg class="ico ico__version b"></svg>
                                <span>Apartados</span>
                            </h2>

                            <div class="form__rightContent">

                                <form class="form">

                                    <ul>
                                        <?php foreach ($pecal as $p): ?>
                                            
                                            <li class="compact">
                                                <a href="/apoyo/informacion-documentada/documentacion-externa/pecal_2110_4?id=<?php echo $p->id; ?>"> <?php echo $p->id; ?> - <?php echo $p->denominador; ?></a>
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

                    <?php foreach ($pecal as $p):

                        switch ($p->indice) {

                            case '1': ?>

                                <h2>
                                    <a href="/apoyo/informacion-documentada/documentacion-externa/pecal_2110_4?id=<?php echo $p->id; ?>"> <?php echo $p->id; ?> - <?php echo $p->denominador; ?></a>
                                </h2>

                                <?php break;
                            
                            case '2': ?>

                                <h3>
                                    <a href="/apoyo/informacion-documentada/documentacion-externa/pecal_2110_4?id=<?php echo $p->id; ?>"> <?php echo $p->id; ?> - <?php echo $p->denominador; ?></a>
                                </h3>

                                <?php break;

                            case '3': ?>

                                <h4>
                                    <a href="/apoyo/informacion-documentada/documentacion-externa/pecal_2110_4?id=<?php echo $p->id; ?>"> <?php echo $p->id; ?> - <?php echo $p->denominador; ?></a>
                                </h4>

                                <?php break;

                            case '4': ?>

                                <h5>
                                    <a href="/apoyo/informacion-documentada/documentacion-externa/pecal_2110_4?id=<?php echo $p->id; ?>"> <?php echo $p->id; ?> - <?php echo $p->denominador; ?></a>
                                </h5>

                                <?php break;

                            case '5': ?>

                                <h6>
                                    <a href="/apoyo/informacion-documentada/documentacion-externa/pecal_2110_4?id=<?php echo $p->id; ?>"> <?php echo $p->id; ?> - <?php echo $p->denominador; ?></a>
                                </h6>

                                <?php break;

                        } 

                    endforeach; ?>

                </div>


            <? } ?>
        </div>
    
        </div>
                   

    </article>               

<!-- #endregion -->