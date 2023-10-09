<head>

    <!-- Título -->
        
        <title> 

            <?php if($crud == 1): 

                switch ($tipo){

                    case '1':
                        echo 'Nueva debilidad | <?php echo $_SESSION["nombreApp"]; ?>';
                        break;

                    case '2':
                        echo 'Nueva amenaza | <?php echo $_SESSION["nombreApp"]; ?>';
                        break;

                    case '3':
                        echo 'Nueva fortaleza | <?php echo $_SESSION["nombreApp"]; ?>';
                        break;

                    case '4':
                        echo 'Nueva oportunidad | <?php echo $_SESSION["nombreApp"]; ?>';
                        break;

                };
                
            else: 

                echo "$analisisDAFO->codigo_interno" ?> | <?php echo $_SESSION["nombreApp"]; ?>  

            <?php endif; ?>

        </title> 

    <!-- Icono -->
        <link rel="shortcut icon" href="/build/img/layout/Internet_2Regular_azul.svg">
    
</head>

<!-- #endregion -->

<main>

 <!-- #region Breadcrumb -->

    <nav class="breadcrumb">

        <ol class="breadcrumb__list">

        <li class="breadcrumb__item"> <svg class="ico ico__puntos b"> </svg> </li>
            <li class="breadcrumb__item"> <a href="/"> Inicio </a> </li>
            <li class="breadcrumb__item"> <span> / </span> </li>               
            <li class="breadcrumb__item"> <a href="/contexto"> Contexto </a> </li>
            <li class="breadcrumb__item"> <span> / </span> </li>               
            <li class="breadcrumb__item"> <a href="/contexto/analisisContexto"> Análisis del Contexto </a> </li>
            <li class="breadcrumb__item"> <span> / </span> </li>   
            
            <!-- Análisis DAFO -->
            <?php if($h): ?>
                <li class="breadcrumb__item"> <a href="/contexto/analisisContexto/read?id=<?php echo $analisisContexto->id ?>"> <?php echo $analisisContexto->denominador ?> </a> </li>
                <li class="breadcrumb__item"> <span> / </span> </li>    
                <li class="breadcrumb__item"> <a href="/contexto/analisisContexto/read-historico?id=<?php echo $revision->id ?>"> Revisión <?php echo $revision->revision; ?> </a> </li>
            <?php else: ?>
                <li class="breadcrumb__item"> <a href="/contexto/analisisContexto/read?id=<?php echo $analisisContexto->id ?>"> <?php echo $analisisContexto->denominador ?> </a> </li>
            <?php endif;?>

            <li class="breadcrumb__item"> <span> / </span> </li>   

            <!-- Item DAFO -->       
            
            <?php if($h): ?>

                <li class="breadcrumb__item actual"> <a href="/contexto/analisisContexto/AnalisisDAFO/read-historico?id=<?php echo $analisisDAFO->id ?>"> <?php echo $analisisDAFO->denominador ?> </a> </li> 

            <?php else: ?>

                <?php if($crud == 1):?>

                    <?php switch ($tipo) {

                        case '1':
                            $breadcrumb = 'Nueva debilidad';
                            break;

                        case '2':
                            $breadcrumb = 'Nueva amenaza';
                            break;

                        case '3':
                            $breadcrumb = 'Nueva fortaleza';
                            break;

                        case '4':
                            $breadcrumb = 'Nueva oportunidad';
                            break;

                    } ?>

                    <li class="breadcrumb__item actual"> <a href=""> <?php echo $breadcrumb; ?> </a> </li>  
                
                <?php else:?>

                    <li class="breadcrumb__item actual"> <a href="/contexto/analisisContexto/AnalisisDAFO/read?id=<?php echo $analisisDAFO->id ?>"> <?php echo $analisisDAFO->denominador ?> </a> </li> 

                <?php endif;?>   
            
            <?php endif;?>

        </ol>

    </nav>

<!-- #endregion -->

<!-- #region Artículo -->

    <article>

        <header class="entry-header">
            <h1>

                <svg class="ico ico__internet b"></svg>

                    <?php 

                        switch ($crud){

                            case 1: //Create 

                                switch ($tipo){

                                    case '1':
                                        echo 'Nueva debilidad';
                                        break;

                                    case '2':
                                        echo 'Nueva amenaza';
                                        break;

                                    case '3':
                                        echo 'Nueva fortaleza';
                                        break;

                                    case '4':
                                        echo 'Nueva oportunidad';
                                        break;

                                }
                                
                            break;

                            case 2: //Read

                                switch ($tipo){

                                    case '1':
                                        echo 'Debilidad ' . $analisisDAFO->codigo_interno;
                                        break;

                                    case '2':
                                        echo 'Amenaza ' . $analisisDAFO->codigo_interno;
                                        break;

                                    case '3':
                                        echo 'Fortaleza ' . $analisisDAFO->codigo_interno;
                                        break;

                                    case '4':
                                        echo 'Oportunidad ' . $analisisDAFO->codigo_interno;
                                        break;

                                };

                            break;

                            case 3: //Read

                                switch ($tipo){

                                    case '1':
                                        echo 'Actualizar Debilidad ' . $analisisDAFO->codigo_interno;
                                        break;

                                    case '2':
                                        echo 'Actualizar Amenaza ' . $analisisDAFO->codigo_interno;
                                        break;

                                    case '3':
                                        echo 'Actualizar Fortaleza ' . $analisisDAFO->codigo_interno;
                                        break;

                                    case '4':
                                        echo 'Actualizar Oportunidad ' . $analisisDAFO->codigo_interno;
                                        break;

                                };
                        }
                    
                    ?>

            </h1>  

        </header>

        <!-- #region tabs -->

            <div class="tab__container">
                    
                <div class="tab__header n_tabs_5">
                    
                    <div class="active"> <svg class="ico ico__documento d"></svg> Metadatos </div>

                    <?php if($crud == 2): ?>
                        <div id="tab__header__log"> <svg class="ico ico__tiempo d"></svg> Log </div>
                        <div id="tab__header__relations"> <svg class="ico ico__conexiones d"></svg> Relaciones </div>
                        <div id="tab__header__adjunct"> <svg class="ico ico__adjuntar d"></svg> Adjuntos </div>
                    <?php endif; ?> 
                    
                </div>

                <div class="tab__body">

                    <div class="tab active"> <!-- Metadatos -->

                        <div class="entry-content">

                            <div class="block">

                                <div class="block__content form">

                                    <div class="form__two">

                                        <div class="form__left">

                                            <h2>
                                                <svg class="ico ico__documento b"></svg>
                                                <span>Metadatos</span>
                                            </h2>

                                            <div class="form__leftContent">

                                                <form 
                                                    class="form"
                                                    id="form__analisisdafo" 
                                                    name="form__analisisdafo"
                                                    method='POST'
                                                
                                                    <?php switch ($crud){

                                                        case 1: ?>
                                                            action="/contexto/analisisContexto/AnalisisDAFO/create?analisisContexto=<?php echo $analisisContexto->id; ?>"
                                                        <?php break;

                                                        case 3: ?>
                                                            action=""
                                                        <?php break;
                                                    };?>
                                                >

                                                    <!-- ID -->
                                                    <input 
                                                        type="hidden"
                                                        name="id"
                                                        id="id"
                                                        value="<?php echo $analisisDAFO->id ?>" 
                                                    >

                                                    <!-- CODIGO INTERNO -->
                                                    <div class="control text w100"> 

                                                        <svg class="ico ico__huella b"></svg>

                                                        <div class="textbox">

                                                            <input 
                                                                type="text" 
                                                                name="codigo_interno" 
                                                                id="codigo_interno" 
                                                                
                                                                <?php switch ($crud){

                                                                    case ($crud == 1): ?>
                                                                        readonly
                                                                        class="valid"
                                                                        value="<?php echo s($codigoCalculado); ?>" 

                                                                    <?php break;

                                                                    case ($crud == 2 || $crud == 3): ?>
                                                                        readonly
                                                                        class="valid"
                                                                        value="<?php echo s($analisisDAFO->codigo_interno); ?>"

                                                                    <?php break; } ?>
                                                            >

                                                            <label class="label">
                                                                <span class="label__text">Codigo</span>
                                                            </label> 

                                                        </div>                                        

                                                    </div>

                                                    <!-- ANALISIS CONTEXTO -->

                                                        <?php if(isset($_GET['h'])==true): ?>

                                                            <div class="control text w100"> 

                                                                <svg class="ico ico__internet b"></svg>

                                                                <div class="textbox">

                                                                    <input 
                                                                        type="text" 
                                                                        name="analisisContexto" 
                                                                        id="analisisContexto" 
                                                                        readonly
                                                                        class="valid"
                                                                        value="<?php echo $analisisContexto->codigo_interno; ?>" 
                                                                    >

                                                                    <label class="label">
                                                                        <span class="label__text">Análisis de contexto</span>
                                                                    </label> 

                                                                </div>                                        

                                                            </div>

                                                        <?php else: ?>

                                                            <input 
                                                                type="hidden"
                                                                name="analisisContexto"
                                                                id="analisisContexto"
                                                                value="<?php echo $analisisContexto->id ?>" 
                                                            >

                                                        <?php endif; ?>
                                                    

                                                    <!-- TIPO -->
                                                    <div class="control select w100"> 

                                                        <svg class="ico ico__proceso b"></svg>

                                                        <div class="textbox">

                                                            <select 
                                                                name="tipo" 
                                                                id="tipo" 
                                                                class="valid"
                                                                value="<?php echo s($analisisDAFO->tipo); ?>"
                                                                
                                                                <?php if($crud == 1): ?>
                                                                    required='required'
                                                                    value="<?php echo s($tipo); ?>"
                                                                    disabled
                                                                <?php endif; ?>

                                                                <?php if($crud == 2): ?>
                                                                    disabled
                                                                <?php endif; ?>
                                                                
                                                                <?php if($crud == 3): ?>
                                                                    disabled
                                                                <?php endif; ?>
                                                            
                                                            >
                                                            
                                                                <option selected value=""> Seleccione el tipo de análisis DAFO </option>    

                                                                <?php foreach($tipoAnalisisDAFO as $tipos) { ?>
                                                                    
                                                                    <option <?php echo s($tipos->id) === s($tipo) ? 'selected' : '' ?> value="<?php echo s($tipos->id);?>"> <?php echo s($tipos->tipo); ?> </option>

                                                                <?php } ?>

                                                            </select>

                                                            <label class="label">
                                                                <span class="label__text">Tipo</span>
                                                            </label> 

                                                        </div>                                        

                                                    </div>

                                                    <!-- DENOMINADOR -->
                                                    <div class="control textarea w100 h100"> 

                                                        <svg class="ico ico__chat b"></svg>

                                                        <div class="textbox">

                                                            <textarea 
                                                                name="denominador" 
                                                                id="denominador" 

                                                                <?php if($crud == 1): ?>
                                                                    autofocus='autofocus'
                                                                    required='required'
                                                                <?php endif; ?>

                                                                <?php if($crud == 2): ?>
                                                                    class="valid"
                                                                    disabled
                                                                <?php endif; ?>

                                                                <?php if($crud ==3): ?>
                                                                    class="valid"
                                                                <?php endif; ?>
                                                            ><?php if($crud == 2 || $crud == 3):echo s($analisisDAFO->denominador);endif;?></textarea>

                                                            <label class="label">
                                                                <span class="label__text">Denominador</span>
                                                            </label> 

                                                        </div>                                        

                                                    </div>

                                                    <!-- ORIGEN -->
                                                    <div class="control text w100"> 

                                                        <svg class="ico ico__mapa b"></svg>

                                                        <div class="textbox">

                                                            <input 
                                                                name="origen" 
                                                                id="origen"
                                                                value="<?php echo s($analisisDAFO->origen); ?>"
                                                                
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
                                                                <span class="label__text">Origen</span>
                                                            </label> 

                                                        </div>                                        

                                                    </div>

                                                    <!-- FECHA -->
                                                    <?php switch ($crud) {

                                                        case 1: ?>

                                                            <input 
                                                                type="hidden" 
                                                                name="fechaDeteccion" 
                                                                id="fechaDeteccion"  
                                                                value=""
                                                            >

                                                        <?php break; ?>

                                                        <?php case 2: ?>

                                                            <?php if(isset($analisisDAFO->fechaDeteccion) && $analisisDAFO->fechaDeteccion != ""): ?>

                                                                <div class="control date w100"> 

                                                                    <svg class="ico ico__calendario b"></svg>

                                                                    <div class="textbox">

                                                                        <input 
                                                                            type="date" 
                                                                            name="fechaDeteccion" 
                                                                            id="fechaDeteccion"  
                                                                            class="valid"
                                                                            readonly
                                                                            value ="<?php echo s($analisisDAFO->fechaDeteccion); ?>"                                                            
                                                                        >

                                                                        <label class="label">
                                                                            <span class="label__text">Fecha de alta</span>
                                                                        </label> 

                                                                        <svg class="ico ico__calendario b"></svg>

                                                                    </div>                                        

                                                                </div>

                                                            <?php endif; ?>

                                                        <?php break; ?>

                                                        <?php case 3: ?>

                                                            <?php if(isset($analisisDAFO->fechaDeteccion) && $analisisDAFO->fechaDeteccion != ""): ?>

                                                                <div class="control date w100"> 

                                                                    <svg class="ico ico__calendario b"></svg>

                                                                    <div class="textbox">

                                                                        <input 
                                                                            type="date" 
                                                                            name="fechaDeteccion" 
                                                                            id="fechaDeteccion"  
                                                                            class="valid"
                                                                            value="<?php echo s($analisisDAFO->fechaDeteccion); ?>"
                                                                        >

                                                                        <label class="label">
                                                                            <span class="label__text">Fecha de alta</span>
                                                                        </label> 

                                                                        <svg class="ico ico__calendario b"></svg>

                                                                    </div>                                        

                                                                </div>

                                                            <?php endif; ?>

                                                        <?php break; ?>
                                                    
                                                    <?php }; ?>

                                                    <!-- COMENTARIOS -->
                                                    <div class="control textarea w100"> 

                                                        <svg class="ico ico__foro b"></svg>

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
                                                            ><?php if($crud == 2 || $crud == 3):echo s($analisisDAFO->comentarios);endif;?></textarea>

                                                            <label class="label">
                                                                <span class="label__text">Comentarios</span>
                                                            </label> 

                                                        </div>                                        

                                                    </div>

                                                    <!-- URL -->
                                                    <input 
                                                        type="hidden"
                                                        name="url"
                                                        id="url"
                                                        value="/contexto/analisisContexto/AnalisisDAFO?id=<?php echo $analisisContexto->id ?>" 
                                                    >

                                                </form>

                                            </div>

                                        </div>

                                        <div class="form__right">

                                            <?php if($auth && !$h): ?>

                                                <h2>
                                                    <svg class="ico ico__rayo b"></svg>
                                                    <span>Acciones</span>
                                                </h2>

                                                <div class="form__rightContent">

                                                    <nav class="toolbar">

                                                        <ol class="toolbar__list">   

                                                            <!-- GUARDAR/ACTUALIZAR -->
                                                                <?php if($auth && $crud <> 2): ?>                                                    

                                                                    <li class="toolbar__item"> 

                                                                        <button 
                                                                            type="button" 
                                                                            form="form__analisiscontexto"
                                                                            class="button button__primary button__blue w100"
                                                                            onclick="validateFormAnalisisDAFO(form__analisisdafo, <?php echo $crud ?>)"
                                                                        > 
                                                                            <svg class="ico ico__discoduro w"></svg>
                                                                            
                                                                            <span>
                                                                                <?php if($crud == 1): ?>
                                                                                    Guardar
                                                                                <?php elseif($crud == 3):?>
                                                                                    Actualizar
                                                                                <?php endif; ?> 

                                                                            </span>                                                           

                                                                        </button>
                                                                        
                                                                    </li>

                                                                <?php endif; ?>    

                                                            <!-- MODIFICAR Y ELIMINAR-->                
                                                                <?php if($auth && $crud == 2) :?>

                                                                    <li class="toolbar__item">   

                                                                        <form 
                                                                            method="POST" 
                                                                            action="" 
                                                                            id=""
                                                                        >

                                                                            <input type="hidden" name="id" value="<?php echo $analisisContexto->id; ?>">

                                                                            <button 
                                                                                type="button" 
                                                                                class="button button__primary button__yellow w100"
                                                                                onclick="location.href='/contexto/analisisContexto/AnalisisDAFO/update?id=<?php echo $analisisDAFO->id; ?>'"
                                                                            > 
                                                                                <svg class="ico ico__lapicero w"></svg>

                                                                                <span>
                                                                                    Modificar 
                                                                                    
                                                                                    <?php switch ($tipo) {

                                                                                        case '1':
                                                                                            echo ' debilidad';
                                                                                            break;

                                                                                        case '2':
                                                                                            echo ' amenaza';
                                                                                            break;

                                                                                        case '3':
                                                                                            echo ' fortaleza';
                                                                                            break;

                                                                                        case '4':
                                                                                            echo ' oportunidad';
                                                                                            break;

                                                                                        } ?>
                                                                                    
                                                                                </span>
                                                                        
                                                                            </button>                                                                                                                 

                                                                        </form>

                                                                    </li>

                                                                    <li class="toolbar__item">   

                                                                        <form 
                                                                            method="POST" 
                                                                            action="/contexto/analisisContexto/AnalisisDAFO/delete" 
                                                                            id="formEliminarDAFO"
                                                                        >

                                                                            <input type="hidden" name="id" value="<?php echo $analisisDAFO->id; ?>">

                                                                            <button 
                                                                                type="button" 
                                                                                class="button button__primary button__red w100"
                                                                                onclick="notificarEliminar(this.form, '<?php echo $analisisDAFO->id;?>', '<?php echo $analisisDAFO->codigo_interno;?>')"
                                                                            > 
                                                                                <svg class="ico ico__papelera w"></svg>

                                                                                <span>
                                                                                    Eliminar 
                                                                                    
                                                                                    <?php switch ($tipo) {

                                                                                        case '1':
                                                                                            echo ' debilidad';
                                                                                            break;

                                                                                        case '2':
                                                                                            echo ' amenaza';
                                                                                            break;

                                                                                        case '3':
                                                                                            echo ' fortaleza';
                                                                                            break;

                                                                                        case '4':
                                                                                            echo ' oportunidad';
                                                                                            break;

                                                                                        } ?>
                                                                                    
                                                                                </span>

                                                                            </button>                                                                                                                 

                                                                        </form>

                                                                    </li>
                                                                
                                                                <?php endif; ?> 

                                                        </ol>

                                                    </nav>

                                                </div>      

                                            <?php endif; ?>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <?php if($crud == 2): ?>
                        <div class="tab" id="Tab__log"></div> <!-- Relaciones -->
                        <div class="tab" id="Tab__relations"></div> <!-- Relaciones -->
                        <div class="tab" id="Tab__adjunct"> </div> <!-- Adjuntos -->
                    
                    <?php endif; ?> 

                </div>
    
        <!-- #endregion -->       

    </article>               

<!-- #endregion -->

</main>

<!-- #region Script JS  -->

    <script type="text/javascript">

        function validateFormAnalisisDAFO(form, crud) {

            if (document.getElementById('codigo_interno').value.length == 0) {
                showSnackbar('¡Falta el código!','ico__alerta w','red');
                return false;
            }
            if (document.getElementById('denominador').value.length == 0) {
                showSnackbar('¡Falta el denominador!','ico__alerta w','red');
                return false;
            }
            if (document.getElementById('tipo').value.length == 0) {
                showSnackbar('¡Falta el tipo!','ico__alerta w','red');
                return false;
            }

            //Seleccionamos la acción dependiendo del CRUD

            switch(crud){
                    case 1:
                        asignarFechaDeteccion();

                        notificarCrear(form__analisisdafo);
                    break;

                    case 3:
                        notificarActualizar(form__analisisdafo);
                    break;
                }

        }

        function especificarTipo(){
            
            var tipo_dafo = document.getElementById('tipo').value;

            switch(tipo_dafo){
                case '1':
                    tipo_dafo = "Debilidad"
                    break;
                case '2':
                    tipo_dafo = "Amenaza"
                    break;
                case '3':
                    tipo_dafo = "Fortaleza"
                    break;
                case '4':
                    tipo_dafo = "Oportunidad"
                    break;
            }

            return tipo_dafo;

        }

        function eliminarRestricciones(){

            //hay que eliminar la propiedad disabled de los input para que puedan ser pasados por submit
                document.getElementById('codigo_interno').disabled = false;
                document.getElementById('tipo').disabled = false;
                document.getElementById('denominador').disabled = false;
                document.getElementById('origen').disabled = false;

                if(document.getElementById('fechaDeteccion')){
                    document.getElementById('fechaDeteccion').disabled = false;
                }

                if( document.getElementById('comentarios')){
                    document.getElementById('comentarios').disabled = false;
                }

               
        }

        function asignarFechaDeteccion(){

            document.getElementById('fechaDeteccion').value = obtenerFechaHoy();
            
        }

        function notificarCrear(form){

            Dialog.open({
                title: 'Nueva ' + especificarTipo(),
                message: 'Va a crear la ' + especificarTipo() + ' "' + document.getElementById('denominador').value + '" ¿Desea continuar?',
                color: 'blue',
                ico: 'ico__internet d',
                okText: 'Sí',
                cancelText: 'No',
                onok: () => { 
                    eliminarRestricciones();
                    form.submit(); 
                }                

            })
        }    

        function notificarActualizar(form){

            Dialog.open({
                title: 'Actualizar ' + especificarTipo(),
                message: 'Va a actualizar la ' + especificarTipo() + ' "' + document.getElementById('denominador').value + '" ¿Desea continuar?',
                color: 'blue',
                ico: 'ico__internet d',
                okText: 'Sí',
                cancelText: 'No',
                onok: () => { 
                    eliminarRestricciones();
                    form.submit(); 
                }                

            })
        }    

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

<!-- #endregion -->