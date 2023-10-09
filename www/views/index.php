    <head>

        <!-- Título -->
            <title> Inicio | <?php echo $_SESSION["nombreApp"]; ?> </title>

        <!-- Icono -->
            <link rel="shortcut icon" href="/build/img/layout/Telefonica.png">
            
    </head>

<?php 

    require_once __DIR__ . "/../inc/app.php";

?>

<body>

    <main class="principal">   

        <?php if(isset($portada[0]) && $portada[0] <> ""){?>

            <div class="hero">

                <div class="hero__wrap">

                    <div class="hero__image">
                        <img src="<?php if(isset($portada[0]->portada) && $portada[0]->portada <> ""): echo($portada[0]->portada); endif;?>">
                    </div>

                    <div class="hero__content">

                        <div class="hero__data">

                            <div class="hero__info">

                                <a class="info_cat CQ_burbuja CQ_<?php if(isset($portada[0]->indicador) && $portada[0]->indicador <> ""): echo($portada[0]->indicador); endif; ?>">
                                    <?php if(isset($portada[0]->tipo) && $portada[0]->tipo <> ""): echo($portada[0]->tipo); endif; ?>
                                </a>

                                <div class="info_date">
                                    <?php if(isset($portada[0]->fecha) && $portada[0]->fecha <> ""): echo(transformarFecha($portada[0]->fecha)); endif; ?>
                                </div>

                            </div>                       

                        </div>

                        <div class="hero__text">

                            <a class="hero__title" href="<?php echo($portada[0]->ruta); ?>">
                                <span><?php echo($portada[0]->denominador); ?></span>
                                <div class="cta--white-arrow ico__flechaderecha w"></div>
                            </a>

                            <div class="hero__subtext">
                            <?php echo($portada[0]->copete); ?>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        <?php } ?>

        <div class="separador"></div>

        <div class="wp-block-columns-2">

        <?php if(isset($portada[1]) && $portada[1] <> ""){?>
            <div class="wp-block-column">

                <div class="block">

                    <div class="block__text">

                        <h3 class="block__title"> 
                            <?php echo($portada[1]->denominador); ?> 
    
                        </h3>        
                        
                        <div class="block__sub">
                            <div class="info_date"><?php echo(fechaLarga($portada[1]->fecha));?></div>
                            <div class="info_cat CQ_burbuja CQ_<?php if(isset($portada[1]->indicador) && $portada[1]->indicador <> ""): echo($portada[1]->indicador); endif; ?>"><?php echo($portada[1]->tipo); ?></div>
                        </div>   

                        <div class="block__desc">
                            <?php echo($portada[1]->copete); ?>
                        </div>

                        <a class="block__link" href="<?php echo($portada[1]->ruta); ?>"> 
                            <span class="hide"><?php echo($portada[1]->copete); ?></span>
                            <span class="block__opacity"></span>
                            <span class="arrow ico__flechaderecha w"></span>
                        </a>

                    </div>

                    <div class="block__image" role="img"> 

                        <div class="mega__media">
                            <img src="<?php echo($portada[1]->portada); ?>">
                        </div>

                    </div>

                </div>

            </div>
        <?php } ?>

        <?php if(isset($portada[2]) && $portada[2] <> ""){?>
            <div class="wp-block-column">

                <div class="block">

                    <div class="block__text">

                        <h3 class="block__title"> <?php echo($portada[2]->denominador); ?> </h3>

                        <div class="block__sub">
                            <div class="info_date"><?php echo(fechaLarga($portada[2]->fecha));?></div>
                            <div class="info_cat CQ_burbuja CQ_<?php if(isset($portada[2]->indicador) && $portada[2]->indicador <> ""): echo($portada[2]->indicador); endif; ?>"><?php echo($portada[2]->tipo); ?></div>
                        </div>   

                        <div class="block__desc">
                            <?php echo($portada[2]->copete); ?>
                        </div>

                        <a class="block__link" href="<?php echo($portada[2]->ruta); ?>"> 
                            <span class="hide"></span>
                            <span class="block__opacity"></span>
                            <span class="arrow ico__flechaderecha w"></span>
                        </a>

                    </div>

                    <div class="block__image" role="img"> 

                        <div class="mega__media">
                            <img src="<?php echo($portada[2]->portada); ?>">
                        </div>

                    </div>

                </div>

            </div>
        <?php } ?>

        </div>

    </main>

</body>

</html>