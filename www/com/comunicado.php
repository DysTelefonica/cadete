<head>

    <title> <?php echo($comunicado->denominador); ?> | <?php echo $_SESSION["nombreApp"]; ?> </title>     <!-- Título -->
    <link rel="shortcut icon" href="/build/img/layout/Miembros_3Masa.svg">     <!-- Icono -->

</head>

<body>

<main class="main">

    <!-- Breadcrumb -->

        <?php echo($breadcrumb); ?>

    <!-- Articulo -->
    <article class='comunicado'>

        <header class="encabezado__comunicado">

            <div class="titulo">
                <h1> <?php echo $comunicado->denominador; ?> </h1>
            </div>

            <div class="subtitulo">

                <div class="izq">
                    <?php if(isset($autor) && $autor<> ""): ?>

                        <?php if(isset($autor->avatar) && $autor<> ""): ?>
                            <img src=<?php echo $autor->avatar; ?> class="avatar"> 
                        <?php endif; ?>

                        <div class="autor">  
                            <a href="/apoyo/recursos/personal/read?id=<?php echo($autor->id); ?>"> <?php echo($autor->nombre . " " . $autor->primer_apellido . " " . $autor->segundo_apellido); ?> </a>
                        </div>

                    <?php endif; ?>
                    <br>
                    <?php if(isset($comunicado->fecha) && $comunicado->fecha<> ""): ?>

                        <div class="fecha">
                            <?php echo "Publicado el " .  fechaLarga($comunicado->fecha); ?>
                        </div>

                    <?php endif; ?>  
                </div> 

                <div class="der"> 
                        
                    <div class="tooltip">

                        <button 
                            type="button" 
                            class="button button__primary button__blue w100"
                            onclick="location.href='/apoyo/comunicados/read?id=<?php echo $comunicado->id; ?>'"
                        > 
                            <svg class="ico ico__ojo w"></svg>
                            <!-- <span>Ver ficha</span> -->
                        </button>

                        <span class="tooltiptext">Ver ficha del comunicado</span>

                    </div>
                    
                </div>

            </div>

            <?php if(isset($comunicado->indicador) && $comunicado->indicador<> ""): ?>
                <div class="CQ_burbuja CQ_<?php if(isset($comunicado->indicador) && $comunicado->indicador <> ""): echo($comunicado->indicador); endif; ?>"><?php echo($comunicado->tipo); ?></div>
            <?php endif; ?>
            
        </header>

        <div class="columnas">

            <div class="contenido__comunicado">

                <?php 

                    $d = __DIR__ . '/' . $direccion . '.php';

                    if(file_exists($d)) {
                    
                        include $direccion . '.php'; 

                    } else {

                        echo "No se ha encontrado el comunicado.";

                    }
                
                ?>
            </div>                

            <div class="otrosComunicados">

                <div class="head">
                    <div class="titulo">
                        Otros comunicados
                    </div>
                </div>

                <div class="content">

                    <ol>

                        <?php 
                        
                        //Limitamos a 5 comunicados
                        for ($i=0; $i < 5 ; $i++) { 
                            
                            if(isset($otrosComunicados[$i]) && $otrosComunicados[$i]<>""){
                        ?>

                            <li>

                                <a href="<?php echo($otrosComunicados[$i]->ruta); ?>">

                                <div class="cabecera">
                                    <div class="titulo"><?php echo($otrosComunicados[$i]->denominador); ?></div>
                                    <br>
                                    <div class="fecha"><?php echo($otrosComunicados[$i]->codigo_interno . ", " . $otrosComunicados[$i]->fecha); ?></div>
                                </div>

                                    <div class="imagen"><img src="<?php echo($otrosComunicados[$i]->portada); ?>" alt=""></div>
                                </a>

                            </li>

                        <?php 
                        
                        }; }; 
                        
                        ?>
                        
                    </ol>

                </div>

            </div>

        </div>

        <?php if(isset($archivosAdjuntos) && !empty($archivosAdjuntos)): ?>

            <div class="download__area">

                <div class="download__header">
                    <h2>
                        <svg class="ico ico__adjuntar b"></svg>
                        Archivos adjuntos
                    </h2>                

                </div>

                <div class="download__body">

                    <ul class="download__list">

                        <?php foreach ($archivosAdjuntos as $adjunto): ?>

                            <li class="download__item">

                                <div class="download__archive">

                                    <a 
                                        href='/gestorArchivos?r=<?php echo $adjunto->rutaAdjunto; ?>' 
                                        target="_blank"
                                        download="<?php echo $adjunto->nombreAdjunto . "." . $adjunto->tipoAdjunto ?>"
                                    >
                                        <div class="download__title">
                                            <svg 
                                                <?php 
                                                    
                                                    switch ($adjunto->tipoAdjunto) {

                                                        case 'pdf':
                                                            $icono = 'ico__pdf';
                                                            break;

                                                        case 'xlsx':
                                                        case 'xls':
                                                            $icono = 'ico__xlsx';
                                                            break;

                                                        case 'png':
                                                        case 'jpg':
                                                        case 'jpeg':
                                                        case 'svg':
                                                            $icono = 'ico__imagen';
                                                            break;

                                                        case 'zip':
                                                        case 'rar':
                                                            $icono = 'ico__zip';
                                                            break;
                                                        
                                                        default:
                                                            $icono = 'ico__exportar';
                                                            break;
                                                    }

                                                ?>

                                                class="ico <?php echo $icono?> d icoChange"
                                                id="icoChange"                              
                                        
                                            ></svg>
                                            <?php echo $adjunto->nombreAdjunto ?>
                                        </div>

                                        <div class="download__info">
                                            <?php echo $adjunto->tipoAdjunto ?> 
                                            
                                            | 
                                            
                                            <?php 

                                                $bytes =$adjunto->tamanoAdjunto;

                                                if ($bytes >= 1073741824)
                                                {
                                                    $bytes = number_format($bytes / 1073741824, 2) . ' GB';
                                                }
                                                elseif ($bytes >= 1048576)
                                                {
                                                    $bytes = number_format($bytes / 1048576, 2) . ' MB';
                                                }
                                                elseif ($bytes >= 1024)
                                                {
                                                    $bytes = number_format($bytes / 1024, 2) . ' KB';
                                                }
                                                elseif ($bytes > 1)
                                                {
                                                    $bytes = $bytes . ' bytes';
                                                }
                                                elseif ($bytes == 1)
                                                {
                                                    $bytes = $bytes . ' byte';
                                                }
                                                else
                                                {
                                                    $bytes = '0 bytes';
                                                }
                                            
                                            ?>

                                            <?php echo $bytes ?>                                 

                                        </div>

                                    </a>

                                </div>

                            </li>
                        
                        <?php endforeach; ?>

                    </ul>

                </div>       

            </div>

        <?php endif; ?>

        <?php if(isset($relaciones) && !empty($relaciones)):?>

                <div class="relation__area">

                    <div class="relation__header">
                        <h2>
                            <svg class="ico ico__conexiones b"></svg>
                            Elementos relacionados
                        </h2>

                    </div>

                    <div class="relation__body">

                        <ul class="download__list">

                            <?php foreach ($relaciones as $relacion): ?>

                                <li class="download__item">

                                    <div class="download__archive">

                                        <a 
                                            href='<?php echo $relacion->rutaIndex; ?>' 
                                        >
                                            <div class="download__title">
                                                <svg class="ico <?php echo $relacion->ico?> d icoChange"></svg>
                                                <?php echo $relacion->descripcion ?>
                                            </div>

                                            <div class="download__info">
                                                <?php echo $relacion->codigo_interno ?>
                                                |
                                                <?php echo $relacion->elementoSistema ?>                       
                                            </div>                                   

                                        </a>

                                    </div>

                                </li>
                            
                            <?php endforeach; ?>

                        </ul>

                    </div>       

                </div>

        <?php endif; ?>  

    </article>

</main>

</body>

</html>