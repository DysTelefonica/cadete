<head>

    <!-- Título -->
        <title> Gestor de Comunicados | <?php echo $_SESSION["nombreApp"]; ?> </title>

    <!-- Icono -->
        <link rel="icon" href="/build/img/layout/Internet_2Regular.svg" sizes="any" type="image/svg+xml">
    
</head>

<?php

    if(!isset($_SESSION)){
        session_start();
    }
    
    $auth = $_SESSION['login'] ?? false;

?>

<main>

    <!-- Breadcrumb -->

        <nav class="breadcrumb">

            <ol class="breadcrumb__list">

                <li class="breadcrumb__item"> <svg class="ico ico__puntos b"> </svg> </li>
                <li class="breadcrumb__item"> <a href="/"> Inicio </a> </li>
                <li class="breadcrumb__item"> <span> / </span> </li>               
                <li class="breadcrumb__item"> <a href="/apoyo"> Apoyo </a> </li>
                <li class="breadcrumb__item"> <span> / </span> </li>               
                <li class="breadcrumb__item"> <a href="/apoyo/comunicados"> Comunicados </a> </li>
                <li class="breadcrumb__item"> <span> / </span> </li>               
                <li class="breadcrumb__item actual"> <a href="/apoyo/comunicados/gestorComunicados"> Gestor de comunicados </a> </li>

            </ol>

        </nav>

<article>  

<h2>Reestablecer comunicados</h2>

    <button 
        type="button" 
        class="button button__primary button__blue"
        onclick="location.href='/apoyo/comunicados/reestablecerComunicados'"
    > 
        <svg class="ico ico__noticias w"></svg>
        <span>Reestablecer comunicados</span>
    </button>

    Al pulsar este botón, se borra toda la Configuración de los comunicados

<h2>Reordenar comunicados</h2>

    <form   
        class="form"
        id="form__gestorComunicados" 
        method='POST'
        action="/apoyo/comunicados/gestorComunicados/priorizarComunicados"
    >   

        <!-- Comunicado 1 -->
        <div class="control select w100"> 

            <svg class="ico ico__noticias b"></svg>

            <div class="textbox">

                <select 
                    name="com1" 
                    id="com1" 
                    class="valid"
                    value="1"
                    required='required'                
                >
                
                    <option selected value=""> Seleccione el comunicado 1</option>    

                    <?php foreach($comunicados as $c) { ?>
                        
                        <option <?php echo s($c->id) === s($portadas[0]->id) ? 'selected' : '' ?> value="<?php echo s($c->id); ?>"> <?php echo s($c->codigo_interno . " - " . $c->denominador); ?> </option>

                    <?php } ?>

                </select>

                <label class="label">
                    <span class="label__text">Comunicado 1</span>
                </label> 

            </div>                                        

        </div>

        <!-- Comunicado 2 -->
        <div class="control select w100"> 

            <svg class="ico ico__noticias b"></svg>

            <div class="textbox">

                <select 
                    name="com2" 
                    id="com2" 
                    class="valid"
                    value="2"
                    required='required'                
                >
                
                    <option selected value=""> Seleccione el comunicado 1</option>    

                    <?php foreach($comunicados as $c) { ?>
                        
                        <option <?php echo s($c->id) === s($portadas[1]->id) ? 'selected' : '' ?> value="<?php echo s($c->id); ?>"> <?php echo s($c->codigo_interno . " - " . $c->denominador); ?> </option>

                    <?php } ?>

                </select>

                <label class="label">
                    <span class="label__text">Comunicado 2</span>
                </label> 

            </div>                                        

        </div>

        <!-- Comunicado 3 -->
        <div class="control select w100"> 

            <svg class="ico ico__noticias b"></svg>

            <div class="textbox">

                <select 
                    name="com3" 
                    id="com3" 
                    class="valid"
                    value="3"
                    required='required'                
                >
                
                    <option selected value=""> Seleccione el comunicado 1</option>    

                    <?php foreach($comunicados as $c) { ?>
                        
                        <option <?php echo s($c->id) === s($portadas[2]->id) ? 'selected' : '' ?> value="<?php echo s($c->id); ?>"> <?php echo s($c->codigo_interno . " - " . $c->denominador); ?> </option>

                    <?php } ?>

                </select>

                <label class="label">
                    <span class="label__text">Comunicado 3</span>
                </label> 

            </div>                                        

        </div>

    </form>

    <button 
        type="button" 
        form="form_gestorComunicados"
        class="button button__primary button__blue"
        onclick="validate__Form_gestorComunicados(form__gestorComunicados)"
    > 
        <svg class="ico ico__noticias w"></svg>
        <span>Guardar configuración</span>
    </button>

</article>

</main>

<script type="text/javascript">

    function validate__Form_gestorComunicados(form) {

        if (document.getElementById('com1').value.length == 0) {
            showSnackbar('¡Falta el comunicado 1!','ico__alerta w','red');
            return false;
        }
        if (document.getElementById('com2').value.length == 0) {
            showSnackbar('¡Falta el comunicado 2!','ico__alerta w','red');
            return false;
        }
        if (document.getElementById('com3').value.length == 0) {
            showSnackbar('¡Falta el comunicado 3!','ico__alerta w','red');
            return false;
        }

         notificarCrear(form__gestorComunicados);

    }

    function notificarCrear(form){

        Dialog.open({
            title: 'PRIORIZAR COMUNICADOS',
            message: 'Se van a priorizar los comunicados ¿Desea continuar?',
            color: 'blue',
            ico: 'ico__noticias d',
            okText: '¡Hay que tener a la gente informada!',
            cancelText: 'Creo que los comunicados seleccionados no son relevantes...',
            onok: () => { form.submit(); }                

        })
    } 

</script>

</html>