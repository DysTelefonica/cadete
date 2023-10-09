<head>

    <!-- Título -->
        <title> Histórico Análisis Contexto | <?php echo $_SESSION["nombreApp"]; ?> </title>

    <!-- Icono -->
        <link rel="shortcut icon" href="/build/img/layout/Telefonica.png">  

    <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="/build/css/fundamentals/DAFO.css">
        
</head>

<article>

    <main class="template1">

        <!-- Breadcrumb -->

            <nav class="breadcrumb">

            <ol class="breadcrumb__list">

                <li class="breadcrumb__item"> <svg class="ico ico__puntos b"> </svg> </li>
                <li class="breadcrumb__item"> <a href="/"> Inicio </a> </li>
                <li class="breadcrumb__item"> <span> / </span> </li>               
                <li class="breadcrumb__item"> <a href="/contexto"> Contexto </a> </li>
                <li class="breadcrumb__item"> <span> / </span> </li>               
                <li class="breadcrumb__item"> <a href="/contexto/analisisContexto"> Analisis del Contexto </a> </li>
                <li class="breadcrumb__item"> <span> / </span> </li>               
                <li class="breadcrumb__item"> <a href="/contexto/analisisContexto/read?id=<?php echo $analisisContexto->id; ?>"> Análisis de contexto <?php echo $analisisContexto->codigo_interno ?> </a> </li>
                <li class="breadcrumb__item"> <span> / </span> </li>               
                <li class="breadcrumb__item"> <a href="/contexto/analisisContexto/read-historico?id=<?php echo $historicoAnalisisContexto->id; ?>"> Edicion <?php echo $historicoAnalisisContexto->edicion ?> </a> </li>     
            
            </ol>

            </nav>

        <!-- Título -->

        <header class="entry-header">

            <h1>
                <svg class="ico ico__internet d"></svg>

                <?php echo "Análisis Contexto " . $historicoAnalisisContexto->codigo_interno; ?>
                
            </h1>

            <h2>
                <?php echo 'Edición ' . $historicoAnalisisContexto->edicion . ' del Análisis de Contexto ' . $historicoAnalisisContexto->codigo_interno; ?>
            </h2>

        </header>

                <!-- #region Formulario -->

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
                                            id="form__analisiscontexto" 
                                            method='POST'
                                        
                                            <?php switch ($crud){

                                                case 1: ?>
                                                    action="/contexto/analisisContexto/create"
                                                <?php break;

                                                case 3: ?>
                                                    action="/contexto/analisisContexto/update?id=<?php echo $analisisContexto->id; ?>"
                                                <?php break;}?>>

                                            <!-- ID -->

                                            <input 
                                                type="hidden"
                                                name="id"
                                                id="id"
                                                value=<?php echo $analisisContexto->id; ?>
                                            >
                                            
                                            <!-- CODIGO -->
                                            <div class="control text w100"> 

                                                <div class="textbox">

                                                    <input 
                                                        type="text" 
                                                        name="codigo_interno" 
                                                        id="codigo_interno" 
                                                        
                                                        <?php switch ($crud){

                                                            case ($crud == 1): ?>

                                                                value="<?php echo s($codigoCalculado); ?>" 
                                                                disabled
                                                                class="valid"

                                                            <?php break;

                                                            case ($crud == 2 || $crud == 3): ?>

                                                                value="<?php echo s($analisisContexto->codigo_interno); ?>"
                                                                readonly
                                                                class="valid"

                                                            <?php break; } ?>
                                                    >

                                                    <label class="label">
                                                        <span class="label__text">Codigo</span>
                                                    </label> 

                                                </div>                                        

                                            </div>

                                            <!-- DENOMINADOR -->
                                            <div class="control text w100"> 

                                                <div class="textbox">

                                                    <input 
                                                        name="denominador" 
                                                        id="denominador"
                                                        autocomplete='off'
                                                        value="<?php echo s($analisisContexto->denominador); ?>"
                                                        
                                                        <?php if($crud == 1): ?>
                                                            autofocus='autofocus'
                                                            required='required'
                                                        <?php endif; ?>

                                                        <?php if($crud == 2): ?>
                                                            disabled
                                                            class="valid"
                                                        <?php endif; ?>

                                                        <?php if($crud ==3): ?>
                                                            class="valid"
                                                        <?php endif; ?>
                                                    >

                                                    <label class="label">
                                                        <span class="label__text">Denominador</span>
                                                    </label> 

                                                </div>                                        

                                            </div>

                                            <!-- TIPO -->
                                            <div class="control select w100"> 

                                                <div class="textbox">

                                                    <select 
                                                        name="tipo" 
                                                        id="tipo" 
                                                        class="valid"
                                                        value="<?php echo s($analisisContexto->tipo); ?>"
                                                        
                                                        <?php if($crud == 1): ?>
                                                            required='required'
                                                        <?php endif; ?>

                                                        <?php if($crud == 2): ?>
                                                            disabled
                                                        <?php endif; ?>
                                                    
                                                    >
                                                    
                                                        <option selected value=""> Seleccione el tipo de análisis de contexto </option>    

                                                        <?php foreach($tiposAnalisisContexto as $tipo) { ?>
                                                            
                                                            <option <?php echo s($tipo->id) === s($analisisContexto->tipo) ? 'selected' : '' ?> value="<?php echo s($tipo->id);?>"> <?php echo s($tipo->tipo); ?> </option>

                                                        <?php } ?>

                                                    </select>

                                                    <label class="label">
                                                        <span class="label__text">Tipo</span>
                                                    </label> 

                                                </div>                                        

                                            </div>

                                            <!-- COMENTARIOS -->
                                            <div class="control textarea w100"> 

                                                <div class="textbox">

                                                    <textarea 
                                                        name="comentarios" 
                                                        id="comentarios" 
                                                        cols="30" 
                                                        rows="10"

                                                        <?php if($crud == 1): ?>
                                                            value=""
                                                        <?php endif; ?>

                                                        <?php if($crud == 2): ?>
                                                            class="valid"
                                                            disabled
                                                        <?php endif; ?>

                                                        <?php if($crud ==3): ?>
                                                            class="valid"
                                                        <?php endif; ?>
                                                    ><?php if($crud == 2 || $crud == 3):echo s($analisisContexto->comentarios);endif;?></textarea>

                                                    <label class="label">
                                                        <span class="label__text">Comentarios (ficha)</span>
                                                    </label> 

                                                </div>                                        

                                            </div>

                                        </form>

                                        <h2>
                                            <svg class="ico ico__lanzar b"></svg>
                                            <span>Datos de la edición</span>
                                        </h2>  

                                        <form 
                                            class="form"
                                            action="">

                                            <!-- EDICION -->
                                            <div class="control text w100"> 

                                                <div class="textbox">

                                                    <input 
                                                        name="edicion" 
                                                        id="edicion"
                                                        autocomplete='off'
                                                        value="<?php echo s($historicoAnalisisContexto->edicion); ?>"
                                                        
                                                        <?php if($crud == 1): ?>
                                                            autofocus='autofocus'
                                                            required='required'
                                                        <?php endif; ?>

                                                        <?php if($crud == 2): ?>
                                                            disabled
                                                            class="valid"
                                                        <?php endif; ?>

                                                        <?php if($crud ==3): ?>
                                                            class="valid"
                                                        <?php endif; ?>
                                                    >

                                                    <label class="label">
                                                        <span class="label__text">Edición</span>
                                                    </label> 

                                                </div>                                        

                                            </div>

                                            <!-- FECHA -->
                                            <?php switch ($crud) {

                                                case 1: ?>

                                                    <input 
                                                        type="hidden" 
                                                        name="fecha" 
                                                        id="fecha"  
                                                        value=""
                                                    >

                                                <?php break; ?>

                                                <?php case 2: ?>

                                                    <?php if(isset($historicoAnalisisContexto->fecha) && $historicoAnalisisContexto->fecha != ""): ?>

                                                        <div class="control date w100"> 

                                                            <div class="textbox">

                                                                <input 
                                                                    type="date" 
                                                                    name="fecha" 
                                                                    id="fecha"  
                                                                    class="valid"
                                                                    readonly
                                                                    value ="<?php echo s($historicoAnalisisContexto->fecha); ?>"                                                            
                                                                >

                                                                <label class="label">
                                                                    <span class="label__text">Fecha de la edición</span>
                                                                </label> 

                                                                <svg class="ico ico__calendario b"></svg>

                                                            </div>                                        

                                                        </div>

                                                    <?php endif; ?>

                                                <?php break; ?>

                                                <?php case 3: ?>

                                                    <?php if(isset($historicoAnalisisContexto->fecha) && $historicoAnalisisContexto->fecha != ""): ?>

                                                        <div class="control date w100"> 

                                                            <div class="textbox">

                                                                <input 
                                                                    type="date" 
                                                                    name="fecha" 
                                                                    id="fecha"  
                                                                    class="valid"
                                                                    value="<?php echo s($historicoAnalisisContexto->fecha); ?>"
                                                                >

                                                                <label class="label">
                                                                    <span class="label__text">Fecha de la edición</span>
                                                                </label> 

                                                                <svg class="ico ico__calendario b"></svg>

                                                            </div>                                        

                                                        </div>

                                                    <?php endif; ?>

                                                <?php break; ?>
                                            
                                            <?php }; ?>
                                            
                                            <!-- CONTROL CAMBIOS -->
                                            <div class="control textarea w100"> 

                                                <div class="textbox">

                                                    <textarea 
                                                        name="control_cambios" 
                                                        id="control_cambios" 
                                                        cols="30" 
                                                        rows="15"

                                                        <?php if($crud == 1): ?>
                                                            value=""
                                                        <?php endif; ?>

                                                        <?php if($crud == 2): ?>
                                                            class="valid"
                                                            disabled
                                                        <?php endif; ?>

                                                        <?php if($crud ==3): ?>
                                                            class="valid"
                                                        <?php endif; ?>
                                                    ><?php if($crud == 2 || $crud == 3):echo s($historicoAnalisisContexto->control_cambios);endif;?></textarea>

                                                    <label class="label">
                                                        <span class="label__text">Control de cambios</span>
                                                    </label> 

                                                </div>                                        

                                            </div>

                                            <!-- COMENTARIOS EDICION -->
                                            <div class="control textarea w100"> 

                                                <div class="textbox">

                                                    <textarea 
                                                        name="comentarios_ed" 
                                                        id="comentarios_ed" 
                                                        cols="30" 
                                                        rows="5"

                                                        <?php if($crud == 1): ?>
                                                            value=""
                                                        <?php endif; ?>

                                                        <?php if($crud == 2): ?>
                                                            class="valid"
                                                            disabled
                                                        <?php endif; ?>

                                                        <?php if($crud ==3): ?>
                                                            class="valid"
                                                        <?php endif; ?>
                                                    ><?php if($crud == 2 || $crud == 3):echo s($historicoAnalisisContexto->comentarios);endif;?></textarea>

                                                    <label class="label">
                                                        <span class="label__text">Comentarios (edición)</span>
                                                    </label> 

                                                </div>                                        

                                            </div>

                                        </form>

                                    </div>

                                </div>
                            
                            <!-- Acciones -->

                                <div class="form__right">

                                    <h2>
                                        <svg class="ico ico__rayo b"></svg>
                                        <span>Acciones</span>
                                    </h2>

                                    <div class="form__rightContent">

                                        <nav class="toolbar">

                                            <ol class="toolbar__list">                                                  

                                                <!-- AÑADIR ADJUNTO -->
                                                    <div class="newRelation__button">

                                                        <button 
                                                            type="button" 
                                                            class="button button__primary button__regular button__blue w100"
                                                            onclick="showAdjuntos('<?php echo $_GET['id'] ?>')"
                                                        > 
                                                            <svg class="ico ico__adjuntar w"></svg>
                                                            <span>Adjuntar archivo</span>
                                                        </button>

                                                    </div>     

                                                <!-- AÑADIR RELACIONES -->                                                    
                                                    <div class="newRelation__button">

                                                        <button 
                                                            type="button" 
                                                            class="button button__primary button__regular button__blue w100"
                                                            onclick="showRelaciones('<?php echo $_GET['id'] ?>')"
                                                        > 
                                                            <svg class="ico ico__conexiones w"></svg>
                                                            <span>Añadir relación</span>
                                                        </button>

                                                    </div>      

                                            </ol>

                                        </nav>

                                    </div>                                  
                                    
                                </div>

                            </div>

                        </div>

                    </div>
                
                </div>
            
            <!-- #endregion -->    
        
        <!-- Tarjetas -->

        <header class="entry-header">

            <h1>
                <svg class="ico ico__internet d"></svg>
                <span>Análisis DAFO</span>  
            </h1>

        </header>

            <div class="wp-block-columns-2">

                <div class="wp-block-column">

                    <div class="block DAFO">

                        <div class="block__table">

                            <div class="table__header">
                
                                <div class="table__title">
                                    <h2>Debilidades</h2>
                                </div>

                            </div>

                            <?php if($debilidades && $debilidades != ''): ?>

                                <table class=tablajs>                     
            
                                    <tbody>
                                    
                                        <?php foreach ($debilidades as $row): ?>

                                            <tr class='linea'>
                                                <td onclick="location.href='/contexto/analisisContexto/AnalisisDAFO/read?id=<?php echo $row->id; ?>'"> <?php echo $row->codigo_interno ?> </td> 
                                                <td class=ocultarColumna> <?php echo $row->id ?> </td>
                                                <td class=ocultarColumna> <?php echo $row->analisisContexto ?> </td>
                                                <td onclick="location.href='/contexto/analisisContexto/AnalisisDAFO/read?id=<?php echo $row->id; ?>'"> <?php echo $row->denominador ?> </td> 
                                                <td class=ocultarColumna> <?php echo $row->tipo ?> </td>
                                                
                                                <td>
                                                    <div class="btn-group">

                                                        <form 
                                                            method="POST" 
                                                            action="/contexto/analisisContexto/AnalisisDAFO/delete" 
                                                            id="formEliminarAnalisisDAFO"
                                                        >

                                                            <input type="hidden" name="id" value="<?php echo $row->id; ?>">

                                                            <div class="tooltip">
                                                            
                                                                <button 
                                                                    type="button" 
                                                                    class="button button__primary button__small button__blue"

                                                                    <?php if(isset($_GET['h'])): ?>
                                                                        onclick="location.href='/contexto/analisisContexto/AnalisisDAFO/read?id=<?php echo $row->id; ?>&h=true'"
                                                                    <?php else: ?>
                                                                        onclick="location.href='/contexto/analisisContexto/AnalisisDAFO/read?id=<?php echo $row->id; ?>'"
                                                                    <?php endif; ?>
                                                                
                                                                        > 
                                                                    <svg class="ico ico__ojo w"></svg>

                                                                </button>

                                                                <span class="tooltiptext">Ver <?php echo $row->tipo ?></span>

                                                            </div>

                                                        </form>

                                                    </div>

                                                </td>

                                            </tr>

                                        <?php endforeach; ?>

                                    </tbody>
                                
                                </table>

                            <?php else: ?>     
                                <p> Por el momento, no se ha detectado ninguna debilidad </p>
                            <?php endif; ?>   

                        </div>

                    </div>

                </div>

                <div class="wp-block-column">

                    <div class="block DAFO">

                        <div class="block__table">
                        
                            <div class="table__header">
                
                                <div class="table__title">
                                    <h2>Amenazas</h2>
                                </div>

                            </div>

                            <?php if($amenazas && $amenazas != ''): ?>

                                <table class=tablajs>                     
                                                    
                                    <tbody>
                                    
                                        <?php foreach ($amenazas as $row): ?>

                                            <tr class='linea'>
                                                <td onclick="location.href='/contexto/analisisContexto/AnalisisDAFO/read?id=<?php echo $row->id; ?>'"> <?php echo $row->codigo_interno ?> </td> 
                                                <td class=ocultarColumna> <?php echo $row->analisisContexto ?> </td>
                                                <td onclick="location.href='/contexto/analisisContexto/AnalisisDAFO/read?id=<?php echo $row->id; ?>'"> <?php echo $row->denominador ?> </td> 
                                                <td class=ocultarColumna> <?php echo $row->tipo ?> </td>
                                                
                                                <td>
                                                    <div class="btn-group">

                                                        <form 
                                                            method="POST" 
                                                            action="/contexto/analisisContexto/AnalisisDAFO/delete" 
                                                            id="formEliminarAnalisisDAFO"
                                                        >

                                                            <input type="hidden" name="id" value="<?php echo $row->id; ?>">

                                                            <div class="tooltip">

                                                                <button 
                                                                    type="button" 
                                                                    class="button button__primary button__small button__blue"

                                                                    <?php if(isset($_GET['h'])): ?>
                                                                        onclick="location.href='/contexto/analisisContexto/AnalisisDAFO/read?id=<?php echo $row->id; ?>&h=true'"
                                                                    <?php else: ?>
                                                                        onclick="location.href='/contexto/analisisContexto/AnalisisDAFO/read?id=<?php echo $row->id; ?>'"
                                                                    <?php endif; ?>
                                                                > 
                                                                    <svg class="ico ico__ojo w"></svg>

                                                                </button>
                                                                
                                                                <span class="tooltiptext">Ver <?php echo $row->tipo ?></span>

                                                            </div>

                                                        </form>

                                                    </div>

                                                </td>

                                            </tr>

                                        <?php endforeach; ?>

                                    </tbody>
                                
                                </table>

                            <?php else: ?>     
                                <p> Por el momento, no se ha detectado ninguna amenaza. </p>
                            <?php endif; ?>   

                        </div>

                    </div>

                </div>

            </div>

            <div class="wp-block-columns-2">

                <div class="wp-block-column">

                    <div class="block DAFO">

                        <div class="block__table">

                            <div class="table__header">
                    
                                <div class="table__title">
                                    <h2>Fortalezas</h2>
                                </div>

                            </div>

                            <?php if($fortalezas && $fortalezas != ''): ?>

                                <table class=tablajs>                     
            
                                    <tbody>
                                    
                                        <?php foreach ($fortalezas as $row): ?>

                                            <tr class='linea'>
                                                <td onclick="location.href='/contexto/analisisContexto/AnalisisDAFO/read?id=<?php echo $row->id; ?>'"> <?php echo $row->codigo_interno ?> </td> 
                                                <td class=ocultarColumna> <?php echo $row->analisisContexto ?> </td>
                                                <td onclick="location.href='/contexto/analisisContexto/AnalisisDAFO/read?id=<?php echo $row->id; ?>'"> <?php echo $row->denominador ?> </td> 
                                                <td class=ocultarColumna> <?php echo $row->tipo ?> </td>
                                                
                                                <td>
                                                    <div class="btn-group">

                                                        <form 
                                                            method="POST" 
                                                            action="/contexto/analisisContexto/AnalisisDAFO/delete" 
                                                            id="formEliminarAnalisisDAFO"
                                                        >

                                                            <input type="hidden" name="id" value="<?php echo $row->id; ?>">

                                                            <div class="tooltip">

                                                                <button 
                                                                    type="button" 
                                                                    class="button button__primary button__small button__blue"
                                                                    
                                                                    <?php if(isset($_GET['h'])): ?>
                                                                        onclick="location.href='/contexto/analisisContexto/AnalisisDAFO/read?id=<?php echo $row->id; ?>&h=true'"
                                                                    <?php else: ?>
                                                                        onclick="location.href='/contexto/analisisContexto/AnalisisDAFO/read?id=<?php echo $row->id; ?>'"
                                                                    <?php endif; ?>

                                                                > 
                                                                    <svg class="ico ico__ojo w"></svg>
                                                                    
                                                                </button>
                                                                
                                                                <span class="tooltiptext">Ver <?php echo $row->tipo ?></span>

                                                            </div>
                                                        
                                                        </form>

                                                    </div>

                                                </td>

                                            </tr>

                                        <?php endforeach; ?>

                                    </tbody>
                                
                                </table>
                                
                            <?php else: ?>     
                                <p> Por el momento, no se ha detectado ninguna fortaleza. </p>
                            <?php endif; ?>   

                        </div>

                    </div>

                </div>

                <div class="wp-block-column">

                    <div class="block DAFO">

                        <div class="block__table">

                            <div class="table__header">
                
                                <div class="table__title">
                                    <h2>Oportunidades</h2>
                                </div>

                            </div>

                            <?php if($oportunidades && $oportunidades != ''): ?>

                                <table class=tablajs>                     
                                                    
                                    <tbody>
                                    
                                        <?php foreach ($oportunidades as $row): ?>

                                            <tr class='linea'>
                                                <td onclick="location.href='/contexto/analisisContexto/AnalisisDAFO/read?id=<?php echo $row->id; ?>'"> <?php echo $row->codigo_interno ?> </td> 
                                                <td class=ocultarColumna> <?php echo $row->analisisContexto ?> </td>
                                                <td onclick="location.href='/contexto/analisisContexto/AnalisisDAFO/read?id=<?php echo $row->id; ?>'"> <?php echo $row->denominador ?> </td> 
                                                <td class=ocultarColumna> <?php echo $row->tipo ?> </td>
                                                
                                                <td>
                                                    <div class="btn-group">

                                                        <form 
                                                            method="POST" 
                                                            action="/contexto/analisisContexto/AnalisisDAFO/delete" 
                                                            id="formEliminarAnalisisDAFO"
                                                        >

                                                            <input type="hidden" name="id" value="<?php echo $row->id; ?>">

                                                            <div class="tooltip">

                                                                <button 
                                                                    type="button" 
                                                                    class="button button__primary button__small button__blue"
                                                                    
                                                                    <?php if(isset($_GET['h'])): ?>
                                                                        onclick="location.href='/contexto/analisisContexto/AnalisisDAFO/read?id=<?php echo $row->id; ?>&h=true'"
                                                                    <?php else: ?>
                                                                        onclick="location.href='/contexto/analisisContexto/AnalisisDAFO/read?id=<?php echo $row->id; ?>'"
                                                                    <?php endif; ?>
                                                                > 
                                                                    <svg class="ico ico__ojo w"></svg>
                                                                    
                                                                </button>
                                                                
                                                                <span class="tooltiptext">Ver <?php echo $row->tipo ?></span>

                                                            </div>

                                                        </form>

                                                    </div>

                                                </td>

                                            </tr>

                                        <?php endforeach; ?>

                                    </tbody>
                                
                                </table>

                            <?php else: ?>     
                                <p> Por el momento, no se ha detectado ninguna oportunidad. </p>
                            <?php endif; ?>   

                        </div>

                    </div>

                </div>

            </div>
        
    </main>

</article>

</body>

<!-- region Script JS  -->
    
    <script>

        function notificarEliminar(form, id, codigo, tipo){

            Dialog.open({
                title: 'Eliminar ' + tipo + ' ' + codigo,
                message: '¿Desea eliminar la ' + tipo + ' ' + codigo + '? (esta acción es irreversible).',
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
    
<!-- endregion -->

</html>