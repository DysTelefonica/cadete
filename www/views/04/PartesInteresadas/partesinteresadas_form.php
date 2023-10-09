<head>

    <!-- Título -->
        
        <title> 

            <?php if($crud == 1): ?>

                    Nueva Parte interesada | <?php echo $_SESSION["nombreApp"]; ?>   

            <?php else: 

                echo "$parteInteresada->denominador" ?> | <?php echo $_SESSION["nombreApp"]; ?>  

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
            <li class="breadcrumb__item"> <a href="/contexto/partesinteresadas"> Partes Interesadas </a> </li>
            <li class="breadcrumb__item"> <span> / </span> </li>   
            <li class="breadcrumb__item"> <a href="/contexto/partesinteresadas/estudio/read?id=<?php echo $contenedor->id; ?>"> <?php echo $contenedor->denominador; ?> </a> </li>
            <li class="breadcrumb__item"> <span> / </span> </li>   

            <?
                switch ($crud) {
                    case 1: ?>
                        <li class="breadcrumb__item actual"> <a href="/contexto/partesinteresadas/pi/create?c=<? echo $contenedor->id ?>&type=<? echo $tipo ?>">Nueva Parte Interesada</a> </li>
                        <? break;
                    case 2:
                    case 3: ?> 
                        <? if (isset($h) && $h){ //En caso de ser histórico, genera un link a la revisión ?>
                            <li class="breadcrumb__item"> <a href="/contexto/partesinteresadas/pi/read?id=<?php echo $parteInteresada_original->id; ?>"> <?php echo $parteInteresada_original->denominador; ?> </a> </li>
                        <? }else{ ?>
                            <li class="breadcrumb__item actual"> <a href="/contexto/partesinteresadas/pi/read?id=<?php echo $parteInteresada->id; ?>"> <?php echo $parteInteresada->denominador; ?> </a> </li>
                        <? } ?>
                        <? break;
                }
            ?> 

            <? if (isset($h) && $h) { //En caso de ser histórico, genera un link a la revisión ?>
                <li class="breadcrumb__item"> <span> / </span> </li> 
                <li class="breadcrumb__item actual"> <a href="/contexto/partesinteresadas/pi/historico/read?id=<? echo $contenedor->id ?>&type=<? echo $tipo ?>">Revisión <?php echo($revision->revision); ?></a> </li>
            <? }; ?> 

        </ol>

    </nav>

<!-- #endregion -->

<!-- #region Artículo -->

    <article>

        <header class="entry-header">
            <h1>

                <svg class="ico ico__miembros b"></svg>

                    <?php 

                        switch ($crud){

                            case 1: //Create ?>
                                <span>Nueva Parte interesada</span> 
                                <?php break;

                            case 2: //Read ?>
                                <span> <?php echo "$parteInteresada->denominador"; ?></span>                                          
                                <?php break;

                            case 3: //Read ?>
                                <span>Actualizar "<?php echo "$parteInteresada->denominador"; ?>"</span>                                                            
                                <?php break;

                        }
                    
                    ?>

            </h1>

            <? if (isset($h) && $h){ ?>

                <h2>
                    <span> Revisión  <?php echo "$revision->revision"; ?></span>              
                </h2>
                                    
            <? } ?>  
            
        </header>

        <!-- #region Tabs -->

        <div class="tab__container">
                    
                <div class="tab__header">

                    <div class="active"> <svg class="ico ico__documento d"></svg> Metadatos </div>

                    <?php if($crud == 2): ?>
                        <div> <svg class="ico ico__basededatos d"></svg> Revisiones </div>
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
                                                    method='POST'
                                                    class="form"
                                                    id="form__parteinteresada" 
                                                    name="form__parteinteresada"
                                                
                                                    <?php switch ($crud){

                                                        case 1: ?>
                                                            action="/contexto/partesinteresadas/pi/create?c=<? echo $contenedor->id; ?>&type=<? echo $_GET['type']; ?>"
                                                        <?php break;

                                                        case 3: ?>
                                                            action="/contexto/partesinteresadas/pi/update?id=<? echo $parteInteresada->id; ?>"
                                                        <?php break;
                                                    };?>
                                                >
                                                
                                                    <!-- CODIGO -->
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
                                                                        value="<?php echo s($parteInteresada->codigo_interno); ?>"

                                                                    <?php break; } ?>
                                                            >

                                                            <label class="label">
                                                                <span class="label__text">Codigo</span>
                                                            </label> 

                                                        </div>                                        

                                                    </div>

                                                    <!-- TIPO -->
                                                    <div class="control select w100"> 

                                                        <svg class="ico ico__proceso b"></svg>

                                                        <div class="textbox">

                                                            <select 
                                                                name="tipo" 
                                                                id="tipo" 
                                                                class="valid"
                                                                
                                                                <?php switch ($crud) {
                                                                    case 1: ?>
                                                                        required='required'

                                                                        <?php switch ($_GET['type']) {
                                                                            case 1: ?>
                                                                                value=1
                                                                                disabled
                                                                                <? break;
                
                                                                            case 2: ?>
                                                                                value=2
                                                                                disabled
                                                                                <? break;
                                                                            
                                                                            default:
                                                                                # code...
                                                                                break;
                                                                        }

                                                                        break;

                                                                    case 2:
                                                                    case 3: ?>
                                                                        value="<?php echo s($parteInteresada->tipo); ?>"
                                                                        disabled
                                                                        <? break;

                                                                    default:
                                                                        # code...
                                                                        break;
                                                                }?>
                                                            
                                                            >
                                                            
                                                                <option selected value=""> Seleccione el tipo de parte interesada </option>    

                                                                <?php foreach($tipospartesInteresadas as $tipos) { ?>
                                                                    
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
                                                            ><?php if($crud == 2 || $crud == 3):echo s($parteInteresada->denominador);endif;?></textarea>

                                                            <label class="label">
                                                                <span class="label__text">Denominador</span>
                                                            </label> 

                                                        </div>                                        

                                                    </div>

                                                    <!-- CONTENEDOR -->                                                
                                                    <a href="/contexto/partesinteresadas/estudio/read?id=<?php echo $contenedor->id; ?>">
                                                        
                                                        <input 
                                                            type="hidden"
                                                            name="contenedor"
                                                            id="contenedor"
                                                            value="<?php echo s($contenedor->id); ?>"
                                                        >

                                                        <div class="control text w100"> 

                                                            <svg class="ico ico__miembros b"></svg>

                                                            <div class="textbox">

                                                                <input 
                                                                    type="text" 
                                                                    name="contenedor_name" 
                                                                    id="contenedor_name" 
                                                                    
                                                                    <?php switch ($crud){

                                                                        case ($crud == 1): ?>
                                                                            readonly
                                                                            class="valid link"
                                                                            value="<?php echo s($contenedor->codigo_interno); ?> - <?php echo s($contenedor->denominador); ?>" 

                                                                        <?php break;

                                                                        case ($crud == 2 || $crud == 3): ?>
                                                                            readonly
                                                                            class="valid link"
                                                                            value="<?php echo s($contenedor->codigo_interno); ?> - <?php echo s($contenedor->denominador); ?>"

                                                                        <?php break; } ?>
                                                                >

                                                                <label class="label">
                                                                    <span class="label__text">Contenedor</span>
                                                                </label> 

                                                            </div>   
                                                        </div>

                                                    </a>
                                                
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

                                                            <?php if(isset($parteInteresada->fechaDeteccion) && $parteInteresada->fechaDeteccion != ""): ?>

                                                                <div class="control date w100"> 

                                                                    <svg class="ico ico__calendario b"></svg>

                                                                    <div class="textbox">

                                                                        <input 
                                                                            type="date" 
                                                                            name="fechaDeteccion" 
                                                                            id="fechaDeteccion"  
                                                                            class="valid"
                                                                            disabled
                                                                            value ="<?php echo s($parteInteresada->fechaDeteccion); ?>"                                                            
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

                                                            <?php if(isset($parteInteresada->fechaDeteccion) && $parteInteresada->fechaDeteccion != ""): ?>

                                                                <div class="control date w100"> 

                                                                    <svg class="ico ico__calendario b"></svg>

                                                                    <div class="textbox">

                                                                        <input 
                                                                            type="date" 
                                                                            name="fechaDeteccion" 
                                                                            id="fechaDeteccion"  
                                                                            class="valid"
                                                                            value="<?php echo s($parteInteresada->fechaDeteccion); ?>"
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
                                                            ><?php if($crud == 2 || $crud == 3):echo s($parteInteresada->comentarios);endif;?></textarea>

                                                            <label class="label">
                                                                <span class="label__text">Comentarios</span>
                                                            </label> 

                                                        </div>                                        

                                                    </div>

                                                </form>

                                            </div>

                                        </div>

                                        <? if (!isset($h) || !$h) { ?>
                                            <div class="form__right">

                                                <h2>
                                                    <svg class="ico ico__rayo b"></svg>
                                                    <span>Acciones</span>
                                                </h2>

                                                <div class="form__rightContent">

                                                    <nav class="toolbar">

                                                        <ol class="toolbar__list">         
                                                            
                                                        <!-- Guardar/Actualizar -->
                                                            <?php if($auth && $crud <> 2): ?>                                                    

                                                                <li class="toolbar__item"> 

                                                                    <button 
                                                                        type="button" 
                                                                        form="form__parteinteresada"
                                                                        class="button button__primary button__blue w100"
                                                                        onclick="validateFormParteInteresada(form__parteinteresada, <?php echo $crud ?>)"
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

                                                        <!-- MODIFICAR -->
                                                            <?php if($crud == 2 && $auth) :?>

                                                                <li class="toolbar__item">   

                                                                    <button 
                                                                        type="button" 
                                                                        class="button button__primary button__yellow w100"
                                                                        onclick="location.href='/contexto/partesinteresadas/pi/update?id=<?php echo $parteInteresada->id; ?>'"
                                                                    > 
                                                                        <svg class="ico ico__lapicero w"></svg>
                                                                        <span>Modificar parte interesada</span>
                                                                    </button>                                                                                                                 

                                                                </li>

                                                            <?php endif; ?> 

                                                        <!-- ELIMINAR -->
                                                            <?php if($crud == 2 && $auth) :?>

                                                                <li class="toolbar__item">   

                                                                    <form 
                                                                        method="POST" 
                                                                        action="/contexto/partesinteresadas/pi/delete" 
                                                                        id="form__deleteParteInteresada"
                                                                    >

                                                                        <input type="hidden" name="id" value="<?php echo $parteInteresada->id; ?>">

                                                                        <button 
                                                                            type="button" 
                                                                            class="button button__primary button__red w100"
                                                                            onclick="notificarEliminar(this.form, '<?php echo $parteInteresada->id;?>', '<?php echo $parteInteresada->codigo_interno;?>')"
                                                                        > 
                                                                            <svg class="ico ico__papelera w"></svg>
                                                                            <span>Eliminar parte interesada</span>
                                                                        </button>                                                                                                                 

                                                                    </form>

                                                                </li>

                                                            <?php endif; ?> 

                                                        </ol>

                                                    </nav>

                                                </div>                                  
                                                
                                            </div>
                                        <? } ?>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <?php if($crud == 2): ?>

                        <div class="tab">

                            <div class="block__table">

                                <div class="table__header">

                                    <div class="table__title">
                                        
                                        <h2>
                                            <svg class="ico ico__basededatos b"></svg>
                                            Revisiones
                                        </h2>
                
                                    </div>     

                                </div>

                                <?php if($revisiones && $revisiones != ''): ?>

                                    <table>  

                                        <thead>
                                            <th>Fecha revisión</th>
                                            <th class=ocultarColumna>id</th>
                                            <th >Denominador</th>
                                            <th></th>
                                        </thead>

                                        <tbody>

                                            <?php foreach ($revisiones as $row): ?>
                                                
                                                <tr class='linea'>
                                                    <td onclick="location.href='/contexto/partesinteresadas/pi/historico/read?id=<?php echo $row->id; ?>'"> <?php echo $row->fechaDeteccion ?> </td> 
                                                    <td class=ocultarColumna onclick="location.href='/contexto/partesinteresadas/pi/historico/read?id=<?php echo $row->id; ?>'"> <?php echo $row->id ?> </td>
                                                    <td onclick="location.href='/contexto/partesinteresadas/pi/historico/read?id=<?php echo $row->id; ?>'"> <?php echo $row->denominador ?> </td>

                                                    <!-- Ahora se generan dinámicamente los botones -->
                                                    <td> 

                                                        <div class="btn-group">

                                                            <form 
                                                                method="POST" 
                                                                action="/contexto/partesinteresadas/estudio/delete?id=<?php echo $row->id; ?>" 
                                                                id="formEliminarRevisionPartesInteresadas"
                                                            >
                                                                
                                                                <input type="hidden" name="id" value="<?php echo $row->id; ?>">

                                                                <div class="tooltip">                                           
                                                                    <button 
                                                                        type="button" 
                                                                        class="button button__primary button__small button__blue"
                                                                        value="" 
                                                                        onclick="location.href='/contexto/partesinteresadas/estudio/read?id=<?php echo $row->id; ?>'"
                                                                    > 
                                                                        <svg class="ico ico__ojo w"></svg>

                                                                    </button>
                                                                    <span class="tooltiptext">Ver ficha</span>
                                                                </div>
                                                                
                                                                <?php if($auth && isset($h) && !$h): ?>

                                                                    <?php for($i = $i; $i < 1; $i++) { ?> 

                                                                        <div class="tooltip">
                                                                        
                                                                            <button 
                                                                                type="button" 
                                                                                class="button button__primary button__small button__red"
                                                                                onclick="notificarEliminarHistorico(this.form, '<?php echo $row->id; ?>', '<?php echo $row->codigo_interno; ?>', <?php echo $row->revision; ?>)"
                                                                            > 
                                                                                <svg class="ico ico__papelera w"></svg>

                                                                            </button>

                                                                            <span class="tooltiptext">Eliminar registro histórico</span>

                                                                        </div>

                                                                    <?php } ?>
                                                                    
                                                                <?php endif; ?>     

                                                            </form>
                                                            
                                                        </div>

                                                    </td>

                                                </tr>

                                            <?php endforeach; ?>

                                         </tbody>

                                    </table>
                                
                                <?php else: ?>     
                                    <p> Por el momento, no se ha realizado ninguna revisión de esta parte interesada. </p>
                                <?php endif; ?>   
                            </div>

                        </div>

                        <div class="tab" id="Tab__log"></div>
                        <div class="tab" id="Tab__relations"></div>
                        <div class="tab" id="Tab__adjunct"> </div>

                    <?php endif; ?> 

                </div>

            </div>
    
        <!-- #endregion -->       

    </article>               

<!-- #endregion -->

</main>

<!-- #region Script JS  -->

    <script type="text/javascript">

        function validateFormParteInteresada(form, crud) {

            if (document.getElementById('codigo_interno').value.length == 0) {
                showSnackbar('¡Falta el código!','ico__alerta w','red');
                return false;
            }
            if (document.getElementById('tipo').value.length == 0) {
                showSnackbar('¡Falta el tipo!','ico__alerta w','red');
                return false;
            }
            if (document.getElementById('denominador').value.length == 0) {
                showSnackbar('¡Falta el denominador!','ico__alerta w','red');
                return false;
            }    

            //Seleccionamos la acción dependiendo del CRUD
                switch(crud){

                    case 1:
                        asignarFechaDeteccion(); 
                        confirmarCrear(form);
                    break;

                    case 3:
                        confirmarActualizar(form);
                    break;
                }

        }

        function especificarTipo(){
            
            var tipo_pi = document.getElementById('tipo').value;

            switch(tipo_pi){
                case '1':
                    tipo_pi = "Parte Interesada Interna"
                    break;
                case '2':
                    tipo_pi = "Parte Interesad Externa"
                    break;
                
            }

            return tipo_pi;

        }

        function eliminarRestricciones(){

            //hay que eliminar la propiedad disabled de los input para que puedan ser pasados por submit
                document.getElementById('codigo_interno').disabled = false;
                document.getElementById('tipo').disabled = false;
                document.getElementById('denominador').disabled = false;
                document.getElementById('fechaDeteccion').disabled = false;
                document.getElementById('comentarios').disabled = false;
        }

        function asignarFechaDeteccion(){

            document.getElementById('fechaDeteccion').value = obtenerFechaHoy();
            
        }

        function confirmarCrear(form){

            Dialog.open({
                title: 'Nueva ' + especificarTipo(),
                message: 'Va a crear la ' + especificarTipo() + ' "' + document.getElementById('denominador').value + '" ¿Desea continuar?',
                color: 'blue',
                ico: 'ico__miembros d',
                okText: 'Sí',
                cancelText: 'No',
                onok: () => { 
                    eliminarRestricciones();
                    form.submit(); 
                }                

            })
        }    

        function confirmarActualizar(form){

            Dialog.open({
                title: 'Actualizar ' + especificarTipo(),
                message: 'Va a actualizar la ' + especificarTipo() + ' "' + document.getElementById('denominador').value + '" ¿Desea continuar?',
                color: 'blue',
                ico: 'ico__miembros d',
                okText: 'Sí',
                cancelText: 'No',
                onok: () => { 
                    eliminarRestricciones();
                    form.submit(); 
                }                

            })
        }    

        function notificarEliminar(form, id, codigo){

            Dialog.open({
                title: 'Eliminar parte interesada' + codigo,
                message: '¿Desea eliminar la parte interesada ' + codigo + '? (esta acción es irreversible).',
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

         function notificarEliminarHistorico(form, id, codigo, revision){

            Dialog.open({
                title: 'Eliminar ' + codigo + ' Rev.' + revision,
                message: '¿Desea eliminar la revisión ' + revision + ' del análisis de contexto ' + codigo + '? (esta acción es irreversible).',
                color: 'red',
                ico: 'ico__papelera d',
                okText: 'Adelante, bórralo',
                cancelText: 'Nooooooooooooo',
                onok: () => { 
                    showSnackbar('Revisión ' + revision + ' eliminada correctamente', 'ico__papelera w', 'red');
                    form.submit(),'_self'; 
                }                

            })
        }

    </script>

<!-- #endregion -->