<head>
    
    <title> Ficha de Usuario | <?php echo $_SESSION["nombreApp"]; ?></title> <!-- Título -->
    <link rel="icon" href="/build/img/layout/Internet_2Regular.svg" sizes="any" type="image/svg+xml"> <!-- Icono -->
    
</head>

<main class="main">

    <!-- Breadcrumb -->

        <nav class="breadcrumb">

            <ol class="breadcrumb__list">

                <li class="breadcrumb__item"> <svg class="ico ico__puntos b"> </svg> </li>
                <li class="breadcrumb__item"> <a href="/"> Inicio </a> </li>
                <li class="breadcrumb__item"> <span> / </span> </li>                        
                <li class="breadcrumb__item actual"> <a href="/usuario"> <?php echo "$usuario->nombre $usuario->primer_apellido $usuario->segundo_apellido "; ?> </a> </li>

            </ol>

        </nav>

    <!-- Articulo -->
    <article>

        <header class="entry-header">
            <h1>
                <svg class="ico ico__usuario b"></svg>

                <?php 

                    switch ($crud){

                        case 1: //Create
                            echo "Nuevo usuario";
                            break;

                        case 2: //Read
                            echo "$usuario->nombre $usuario->primer_apellido $usuario->segundo_apellido ";
                            break;

                        case 3: //Update
                            echo "Actualizar $usuario->nombre $usuario->primer_apellido $usuario->segundo_apellido";
                            break;

                    }

                ?>

            </h1>
        </header>

        <div class="entry-content">

            <div class="block">

                <div class="block__content form">


                <div class="form__two">

                    <!-- Formulario -->

                        <div class="form__left">

                            <h2>
                                <svg class="ico ico__documento b"></svg>
                                <span>Ficha</span>
                            </h2>

                            <div class="form__leftContent">

                                <form 
                                    class="form"
                                    id="form__usuario" 
                                    method='POST'
                                
                                    <?php switch ($crud){

                                        case 1: ?>
                                            action=""
                                        <?php break;

                                        case 3: ?>
                                            action=""
                                        <?php break;}?>>
                                    
                                    <!-- USUARIO -->
                                    <div class="control text w100"> 

                                        <div class="textbox">

                                            <input 
                                                type="text" 
                                                name="email" 
                                                id="email" 
                                                
                                                <?php switch ($crud){

                                                    case ($crud == 1): ?>

                                                        value="<?php echo s($usuario->email); ?>"" 
                                                        disabled
                                                        class="valid"

                                                    <?php break;

                                                    case ($crud == 2 || $crud == 3): ?>

                                                        value="<?php echo s($usuario->email); ?>""
                                                        readonly
                                                        class="valid"

                                                    <?php break; } ?>
                                            >

                                            <label class="label">
                                                <span class="label__text">Usuario (correo de Telefónica)</span>
                                            </label> 

                                        </div>                                        

                                    </div>

                                    <!-- NOMBRE -->
                                    <div class="control text w100"> 

                                        <div class="textbox">

                                            <input 
                                                type="text" 
                                                name="nombre" 
                                                id="nombre" 
                                                
                                                <?php switch ($crud){

                                                    case ($crud == 1): ?>

                                                        value="<?php echo s($usuario->nombre); ?>"" 
                                                        disabled
                                                        class="valid"

                                                    <?php break;

                                                    case ($crud == 2 || $crud == 3): ?>

                                                        value="<?php echo s($usuario->nombre); ?>""
                                                        readonly
                                                        class="valid"

                                                    <?php break; } ?>
                                            >

                                            <label class="label">
                                                <span class="label__text">Nombre</span>
                                            </label> 

                                        </div>                                        

                                    </div>

                                    <!-- PRIMER APELLIDO -->
                                    <div class="control text w100"> 

                                        <div class="textbox">

                                            <input 
                                                type="text" 
                                                name="nombre" 
                                                id="nombre" 
                                                
                                                <?php switch ($crud){

                                                    case ($crud == 1): ?>

                                                        value="<?php echo s($usuario->primer_apellido); ?>"" 
                                                        disabled
                                                        class="valid"

                                                    <?php break;

                                                    case ($crud == 2 || $crud == 3): ?>

                                                        value="<?php echo s($usuario->primer_apellido); ?>""
                                                        readonly
                                                        class="valid"

                                                    <?php break; } ?>
                                            >

                                            <label class="label">
                                                <span class="label__text">Primer apellido</span>
                                            </label> 

                                        </div>                                        

                                    </div>

                                    <!-- SEGUNDO APELLIDO -->
                                    <div class="control text w100"> 

                                        <div class="textbox">

                                            <input 
                                                type="text" 
                                                name="nombre" 
                                                id="nombre" 
                                                
                                                <?php switch ($crud){

                                                    case ($crud == 1): ?>

                                                        value="<?php echo s($usuario->segundo_apellido); ?>"" 
                                                        disabled
                                                        class="valid"

                                                    <?php break;

                                                    case ($crud == 2 || $crud == 3): ?>

                                                        value="<?php echo s($usuario->segundo_apellido); ?>""
                                                        readonly
                                                        class="valid"

                                                    <?php break; } ?>
                                            >

                                            <label class="label">
                                                <span class="label__text">Segundo apellido</span>
                                            </label> 

                                        </div>                                        

                                    </div>

                                    <!-- ROL -->
                                    <div class="control text w100"> 

                                        <div class="textbox">

                                            <input 
                                                type="text" 
                                                name="nombre" 
                                                id="nombre" 
                                                
                                                <?php switch ($crud){

                                                    case ($crud == 1): ?>

                                                        value="<?php echo s($usuario->rol); ?>"" 
                                                        disabled
                                                        class="valid"

                                                    <?php break;

                                                    case ($crud == 2 || $crud == 3): ?>

                                                        value="<?php echo s($usuario->rol); ?>""
                                                        readonly
                                                        class="valid"

                                                    <?php break; } ?>
                                            >

                                            <label class="label">
                                                <span class="label__text">Rol</span>
                                            </label> 

                                        </div>                                        

                                    </div>

                                </form>

                            </div>

                        </div>
                        
                        <div class="form__right">

                            <div class="block__media">

                                <div 
                                    class="block__img" 
                                    style="background-image: url('<?php echo s($usuario->avatar); ?>')"
                                >
                            </div>

                            </div>

                        </div>

                </div>

            </div>

        </div>

    </article>

</main>

</html>