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
                <li class="breadcrumb__item actual"> <a href="/apoyo/recursos/personal/read=<?php echo($personal->id);?>"> <?php echo "$personal->nombre $personal->primer_apellido $personal->segundo_apellido "; ?> </a> </li>

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
                            echo "$personal->nombre $personal->primer_apellido $personal->segundo_apellido ";
                            break;

                        case 3: //Update
                            echo "Actualizar $personal->nombre $personal->primer_apellido $personal->segundo_apellido";
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


                                    <!-- ID -->
                                    <input 
                                        type="hidden"
                                        name="id"
                                        id="id"
                                        value=""
                                    >

                                    <!-- USER -->
                                    <input 
                                        type="hidden"
                                        name="user"
                                        id="user"
                                        value=""
                                    >
                    
                                    <!-- USUARIO -->
                                    <div class="control text w100"> 

                                        <svg class="ico ico__correo b"></svg>

                                        <div class="textbox">

                                            <input 
                                                type="text" 
                                                name="email" 
                                                id="email" 
                                                value=""
                                                
                                                <?php switch ($crud){

                                                    case ($crud == 3): ?>

                                                        value="<?php echo s($personal->email); ?>""
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

                                        <svg class="ico ico__usuario b"></svg>

                                        <div class="textbox">

                                            <input 
                                                type="text" 
                                                name="nombre" 
                                                id="nombre" 
                                                value=""
                                                
                                                <?php switch ($crud){

                                                    case ($crud == 2 || $crud == 3): ?>

                                                        value="<?php echo s($personal->nombre); ?>""
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

                                        <svg class="ico ico__usuario b"></svg>

                                        <div class="textbox">

                                            <input 
                                                type="text" 
                                                name="primer_apellido" 
                                                id="primer_apellido" 
                                                value=""
                                                
                                                <?php switch ($crud){

                                                    case ($crud == 2 || $crud == 3): ?>

                                                        value="<?php echo s($personal->primer_apellido); ?>""
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

                                        <svg class="ico ico__usuario b"></svg>

                                        <div class="textbox">

                                            <input 
                                                type="text" 
                                                name="segundo_apellido" 
                                                id="segundo_apellido" 
                                                value=""
                                                
                                                <?php switch ($crud){

                                                    case ($crud == 2 || $crud == 3): ?>

                                                        value="<?php echo s($personal->segundo_apellido); ?>""
                                                        readonly
                                                        class="valid"

                                                    <?php break; } ?>
                                            >

                                            <label class="label">
                                                <span class="label__text">Segundo apellido</span>
                                            </label> 

                                        </div>                                        

                                    </div>

                                    <!-- MATRICULA -->
                                    <div class="control text w100"> 

                                        <svg class="ico ico__usuario b"></svg>

                                        <div class="textbox">

                                            <input 
                                                type="text" 
                                                name="matricula" 
                                                id="matricula" 
                                                value=""
                                                
                                                <?php switch ($crud){

                                                    case ($crud == 2 || $crud == 3): ?>

                                                        value="<?php echo s($personal->matricula); ?>""
                                                        readonly
                                                        class="valid"

                                                    <?php break; } ?>
                                            >

                                            <label class="label">
                                                <span class="label__text">Matricula</span>
                                            </label> 

                                        </div>                                        

                                    </div>

                                    <!-- TELÉFONO FIJO -->
                                    <div class="control text w100"> 

                                        <svg class="ico ico__usuario b"></svg>

                                        <div class="textbox">

                                            <input 
                                                type="text" 
                                                name="telefono_fijo" 
                                                id="telefono_fijo" 
                                                value=""
                                                
                                                <?php switch ($crud){

                                                    case ($crud == 2 || $crud == 3): ?>

                                                        value="<?php echo s($personal->telefono_fijo); ?>""
                                                        readonly
                                                        class="valid"

                                                    <?php break; } ?>
                                            >

                                            <label class="label">
                                                <span class="label__text">Teléfono fijo</span>
                                            </label> 

                                        </div>                                        

                                    </div>

                                    <!-- TELÉFONO MOVIL -->
                                    <div class="control text w100"> 

                                        <svg class="ico ico__usuario b"></svg>

                                        <div class="textbox">

                                            <input 
                                                type="text" 
                                                name="telefono_movil" 
                                                id="telefono_movil" 
                                                value=""
                                                
                                                <?php switch ($crud){

                                                    case ($crud == 2 || $crud == 3): ?>

                                                        value="<?php echo s($personal->telefono_movil); ?>""
                                                        readonly
                                                        class="valid"

                                                    <?php break; } ?>
                                            >

                                            <label class="label">
                                                <span class="label__text">Teléfono móvil</span>
                                            </label> 

                                        </div>                                        

                                    </div>

                                    <!-- ROL -->
                                    <div class="control text w100"> 

                                        <svg class="ico ico__puzzle b"></svg>

                                        <div class="textbox">

                                            <input 
                                                type="text" 
                                                name="rol" 
                                                id="rol" 
                                                value=""
                                                
                                                <?php switch ($crud){

                                                    case ($crud == 2 || $crud == 3): ?>

                                                        value="<?php echo s($personal->rol); ?>""
                                                        readonly
                                                        class="valid"

                                                    <?php break; } ?>
                                            >

                                            <label class="label">
                                                <span class="label__text">Rol / Puesto</span>
                                            </label> 

                                        </div>                                        

                                    </div>

                                    <!-- NUEVA CONTRASEÑA -->
                                        <div class="control text w100"> 

                                            <div class="textbox">

                                                <input 
                                                    type="password" 
                                                    name="pass_nueva" 
                                                    id="pass_nueva"
                                                    autocomplete="new-password"
                                                >

                                                <label class="label">
                                                    <span class="label__text">Introduzca contraseña</span>
                                                </label> 

                                            </div>                                        

                                        </div>

                                        <!-- REPITA CONTRASEÑA -->
                                        <div class="control text w100"> 

                                            <div class="textbox">

                                                <input 
                                                    type="password" 
                                                    name="pass_repetida" 
                                                    id="pass_repetida"
                                                    autocomplete="new-password"
                                                >

                                                <label class="label">
                                                    <span class="label__text">Repita la contraseña</span>
                                                </label> 

                                            </div>                                        

                                        </div>

                                        <!-- FOTOGRAFÍA AVATAR -->
                                        <div class="control file w100"> 
                        
                                            <div class="textbox">

                                                <label for="avatar" class="input" id='change'>
                                                    <input 
                                                        type="file"
                                                        name="avatar" 
                                                        id="avatar" 
                                                        class="valid"
                                                        accept="image/jpeg"
                                                    >
                                                    Buscar archivo...
                                                </label>
                        
                                                <label class="label">
                                                    <span class="label__text">Modificar fotografía de perfil </span>
                                                </label>                                
                                                
                                                <svg class="ico ico__buscar b"></svg>
                        
                                            </div>                                        
                        
                                            <div class="helper__text">
                                                Seleccione una imagen en su ordenador, en JPG o JPEG.
                                            </div>
                        
                                        </div> 

                                </form>

                            </div>

                        </div>
                        
                        <?php if($auth): ?>

                            <div class="form__right">

                                <h2>
                                    <svg class="ico ico__rayo b"></svg>
                                    <span>Acciones</span>
                                </h2>

                                <div class="form__rightContent">

                                    <nav class="toolbar">

                                        <ol class="toolbar__list">                                           

                                            <li class="toolbar__item"> 

                                                <button 
                                                    type="button" 
                                                    form="form__analisiscontexto"
                                                    class="button button__primary button__blue w100"
                                                    onclick="validate__analisisContexto_Form(form__analisiscontexto, <?php echo $crud ?>)"
                                                > 
                                                    <svg class="ico ico__discoduro w"></svg>
                                                    
                                                    <span> Guardar </span>                                                           

                                                </button>
                                                
                                            </li>                                                                                        

                                        </ol>

                                    </nav>

                                </div>                                  
                                
                            </div>

                        <?php endif; ?>

                </div>

            </div>            

        </div>

    </article>

</main>

</html>

<script type="text/javascript">

    function validateFormPass(form) {

        //Ponemos la animación de carga
        loading();

        if (document.getElementById('pass_antigua').value.length == 0) {
            showSnackbar('¡Falta la contraseña antigua!','ico__alerta w','red');
            stopLoading();
            return false;
        }
        if (document.getElementById('pass_nueva').value.length == 0) {
            showSnackbar('¡Falta la contraseña nueva!','ico__alerta w','red');
            stopLoading();
            return false;
        }
        if (document.getElementById('pass_repetida').value.length == 0) {
            showSnackbar('¡Falta la confirmación de la contraseña nueva!','ico__alerta w','red');
            stopLoading();
            return false;
        }
        if (document.getElementById('pass_nueva').value != document.getElementById('pass_repetida').value) {
            showSnackbar('¡Las contraseñas no coinciden!','ico__alerta w','red');
            stopLoading();
            return false;
        }

        //Validamos la password
        if (document.getElementById('pass_antigua').value.length !== 0) {

            //Definimos la url (definida en index.php) con el método a ejecutar en el controller
                const Url = "/validarPass";

            //Le pasamos los datos para alimentar la funcion del controller
                const Data = { 
                    pass: document.getElementById('pass_antigua').value, 
                    user: document.getElementById('user').value
                }

            //Creamos el método ajax
                $.ajax({
                    url: Url,
                    type: "POST",
                    data: Data,
                    cache: false,

                    success: function(r){

                        var d = JSON.parse(r);

                        if(d.check == false){
                            showSnackbar('¡La contraseña antigua indicada no es correcta!','ico__alerta w','red');
                            loaded();
                            return false; 
                        }

                        //Quitamos la animación de carga
                        loaded();

                        //Si es correcta, confirmarmos el cambio de contraseña y ejecutamos el proceso
                        notificarCambiarPass(form);

                    },

                    error:function(e){

                    }
                })

        }

    }

    function notificarCambiarPass(form){

        Dialog.open({
            title: 'Modificar contraseña',
            message: 'Va a modificar su contraseña, ¿Desea continuar?',
            color: 'blue',
            ico: 'ico__internet d',
            okText: 'Sí',
            cancelText: 'No',
            onok: () => { 
                form.submit(); 
            }                

        })
    }  
    
    function validateFormAvatar(form) {

        if (document.getElementById('avatar').value.length == 0) {
            showSnackbar('¡Falta adjuntar la imagen!','ico__alerta w','red');
            return false;
        }

        notificarAvatar(form);

    }

    function notificarAvatar(form){

        Dialog.open({
            title: 'Modificar avatar',
            message: 'Va a modificar su fotografía de avatar ¿Desea continuar?',
            color: 'blue',
            ico: 'ico__adjuntar b',
            okText: '¡Quiero un cambio de look!',
            cancelText: 'Mejor no, que menudos pelos llevo en la foto...',
            onok: () => { form.submit(); }                

        })
    }  

    function confirmacionCambioPassword() {

        //Obtenemos la url
        var url = window.location.href;

        // Obtener los parámetros de la cadena de consulta (query string)
        var params = new URLSearchParams(window.location.search);

        // Obtener el valor del parámetro 'nombre'
        var pass = params.get('p');

        //Si es ok, sacamos el snackbar
        if (pass === '1') {
            console.log('afkhbasf');
            showSnackbar('¡Contraseña actualizada correctamente!','ico__check w','green');
            return false;
        }

    }   

    window.onload = confirmacionCambioPassword;

</script>