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
                <li class="breadcrumb__item"> <a href="/apoyo"> Apoyo </a> </li>
                <li class="breadcrumb__item"> <span> / </span> </li>               
                <li class="breadcrumb__item"> <a href="/obras"> Recursos </a> </li>
                <li class="breadcrumb__item"> <span> / </span> </li>               
                <li class="breadcrumb__item"> <a href="/apoyo/recursos/personal"> Personal </a> </li>
                <li class="breadcrumb__item"> <span> / </span> </li>                 
                
                <?php if($crud == 2){ ?>
                    <li class="breadcrumb__item actual"> <a href="/apoyo/recursos/personal/read=<?php echo($personal->id);?>"> <?php echo "$personal->nombre $personal->primer_apellido $personal->segundo_apellido "; ?> </a> </li>
                <?php }elseif($crud == 1){ ?>
                    <li class="breadcrumb__item actual"> <a href="/apoyo/recursos/personal/create"> Nuevo usuario </a> </li>
                <?php } ?>

            </ol>

        </nav>

    <!-- Articulo -->

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

    <article>

        <div class="entry-content">

            <div class="block">

                <div class="tab__container">

                    <div class="tab__header">

                        <div class="active"><svg class="ico ico__documento d"></svg>Ficha</div>
                        <div> <svg class="ico ico__candadoabierto  d"></svg>Cambiar contraseña</div>
                        <div> <svg class="ico ico__imagen d"></svg>Cambiar avatar</div>

                    </div>

                    <div class="tab__body">

                        <div class="tab active">

                            <div class="block__content form">

                                <div class="form__two">

                                    <div class="form__left">                                                            

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
                                                    value=<?php echo $personal->id; ?>
                                                >

                                                <!-- USER -->
                                                <input 
                                                    type="hidden"
                                                    name="user"
                                                    id="user"
                                                    value=<?php echo $personal->user; ?>
                                                >
                                
                                                <!-- USUARIO -->
                                                <div class="control text w100"> 

                                                    <svg class="ico ico__correo b"></svg>

                                                    <div class="textbox">

                                                        <input 
                                                            type="text" 
                                                            name="email" 
                                                            id="email" 
                                                            
                                                            <?php switch ($crud){

                                                                case ($crud == 1): ?>

                                                                    value=""

                                                                <?php break;

                                                                case ($crud == 2 || $crud == 3): ?>

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
                                                            
                                                            <?php switch ($crud){

                                                                case ($crud == 1): ?>

                                                                    value=""

                                                                <?php break;

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
                                                            
                                                            <?php switch ($crud){

                                                                case ($crud == 1): ?>

                                                                    value=""

                                                                <?php break;

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
                                                            
                                                            <?php switch ($crud){

                                                                case ($crud == 1): ?>

                                                                    value=""

                                                                <?php break;

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

                                                    <svg class="ico ico__T b"></svg>

                                                    <div class="textbox">

                                                        <input 
                                                            type="text" 
                                                            name="matricula" 
                                                            id="matricula" 
                                                            
                                                            <?php switch ($crud){

                                                                case ($crud == 1): ?>

                                                                    value=""

                                                                <?php break;

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

                                                <!-- EMPRESA -->
                                                <div class="control text w100"> 

                                                    <svg class="ico ico__T b"></svg>

                                                    <div class="textbox">

                                                        <input 
                                                            type="text" 
                                                            name="empresa" 
                                                            id="empresa" 
                                                            
                                                            <?php switch ($crud){

                                                                case ($crud == 1): ?>

                                                                    value=""

                                                                <?php break;

                                                                case ($crud == 2 || $crud == 3): ?>

                                                                    value="<?php echo s($personal->empresa); ?>""
                                                                    readonly
                                                                    class="valid"

                                                                <?php break; } ?>
                                                        >

                                                        <label class="label">
                                                            <span class="label__text">Empresa</span>
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
                                                            
                                                            <?php switch ($crud){

                                                                case ($crud == 1): ?>

                                                                    value=""

                                                                <?php break;

                                                                case ($crud == 2 || $crud == 3): ?>

                                                                    value="<?php echo s($personal->rol); ?>""
                                                                    readonly
                                                                    class="valid"

                                                                <?php break; } ?>
                                                        >

                                                        <label class="label">
                                                            <span class="label__text">Rol</span>
                                                        </label> 

                                                    </div>                                        

                                                </div>

                                                <!-- TELÉFONO 1 -->
                                                <div class="control text w100"> 

                                                    <svg class="ico ico__telefono b"></svg>

                                                    <div class="textbox">

                                                        <input 
                                                            type="text" 
                                                            name="telefono" 
                                                            id="telefono" 
                                                            
                                                            <?php switch ($crud){

                                                                case ($crud == 1): ?>

                                                                    value=""

                                                                <?php break;

                                                                case ($crud == 2 || $crud == 3): ?>

                                                                    value="<?php echo s($personal->telefono_fijo); ?>""
                                                                    readonly
                                                                    class="valid"

                                                                <?php break; } ?>
                                                        >

                                                        <label class="label">
                                                            <span class="label__text">Teléfono 1</span>
                                                        </label> 

                                                    </div>                                        

                                                </div>

                                                <!-- TELÉFONO 2 -->
                                                <div class="control text w100"> 

                                                    <svg class="ico ico__telefono b"></svg>

                                                    <div class="textbox">

                                                        <input 
                                                            type="text" 
                                                            name="telefono" 
                                                            id="telefono" 
                                                            
                                                            <?php switch ($crud){

                                                                case ($crud == 1): ?>

                                                                    value=""

                                                                <?php break;

                                                                case ($crud == 2 || $crud == 3): ?>

                                                                    value="<?php echo s($personal->telefono_movil); ?>""
                                                                    readonly
                                                                    class="valid"

                                                                <?php break; } ?>
                                                        >

                                                        <label class="label">
                                                            <span class="label__text">Teléfono 2</span>
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
                                                style="background-image: url('<?php echo s($personal->avatar);?>')"
                                                >
                                            </div>  

                                        </div>

                                        <div class="form__rightContent">

                                            <nav class="toolbar">

                                                <ol class="toolbar__list">

                                                    <?php if($auth && $crud <> 2): ?>  <!-- Guardar/Actualizar -->                                                   

                                                        <li class="toolbar__item"> 

                                                            <button 
                                                                type="button" 
                                                                form="form__usuario"
                                                                class="button button__primary button__blue w100"
                                                                onclick="validateForm(form, <?php echo $crud ?>)"
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
                                                    
                                                    <?php if($crud == 2 && $auth) :?> <!-- Modificar -->

                                                        <li class="toolbar__item">   

                                                            <form 
                                                                method="POST" 
                                                                action="" 
                                                                id=""
                                                            >

                                                                <input type="hidden" name="id" value="<?php echo $personal->id; ?>">

                                                                <button 
                                                                    type="button" 
                                                                    class="button button__primary button__yellow w100"
                                                                    onclick="location.href='/apoyo/recursos/personal/update?id=<?php echo $personal->id; ?>'"
                                                                > 
                                                                    <svg class="ico ico__lapicero w"></svg>
                                                                    <span>Modificar personal</span>
                                                                </button>                                                                                                                 

                                                            </form>

                                                        </li>

                                                    <?php endif; ?> 
                                                    
                                                    <?php if($crud == 2 && $auth) :?>  <!-- Eliminar -->

                                                        <li class="toolbar__item">   

                                                            <form 
                                                                method="POST" 
                                                                action="/apoyo/recursos/personal/delete" 
                                                                id="formEliminarAnalisisContexto"
                                                            >

                                                                <input type="hidden" name="id" value="<?php echo $personal->id; ?>">

                                                                <button 
                                                                    type="button" 
                                                                    class="button button__primary button__red w100"
                                                                    onclick="notificarEliminar(this.form, '<?php echo $personal->id;?>', '<?php echo $analisisContexto->codigo_interno;?>')"
                                                                > 
                                                                    <svg class="ico ico__papelera w"></svg>
                                                                    <span>Eliminar personal</span>
                                                                </button>                                                                                                                 

                                                            </form>

                                                        </li>

                                                    <?php endif; ?>                                       

                                                    <?php if($crud == 2 && $_SESSION['rol'] === 'Admin' && ($personal->user === NULL || $personal->user === '')): ?>                                                

                                                        <li class="toolbar__item">
                                                            
                                                            <button 
                                                                type="button" 
                                                                class="button button__primary button__blue w100"
                                                                onclick="location.href='/crearUsuario?user=<?php echo s($personal->email);?>&url=<?php echo $_SERVER["REQUEST_URI"]; ?>'"
                                                            > 
                                                                <svg class="ico ico__usuario w"></svg>
                                                                <span>Crear Usuario</span>
                                                            </button> 

                                                        </li>
                                                
                                                    <?php endif; ?>             
                                                    
                                                    <?php if($crud == 2 && $_SESSION['rol'] === 'Admin' && ($personal->user != null || $personal->user != '')): ?>                                                

                                                        <li class="toolbar__item">
                                                            
                                                            <button 
                                                                type="button" 
                                                                class="button button__primary button__blue w100"
                                                                onclick="location.href='/reestablecerPassword?user=<?php echo s($personal->email);?>'"
                                                            > 
                                                                <svg class="ico ico__candadoabierto w"></svg>
                                                                <span>Reestablecer Contraseña</span>
                                                            </button> 

                                                        </li>
                                                
                                                    <?php endif; ?> 

                                                </ol>

                                            </nav>

                                        </div> 

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="tab">

                            <?php if($personal->user == $_SESSION['id_user']): ?>

                                <div class="entry-content">

                                    <div class="block">

                                        <div class="block__content form">

                                            <div class="form__two">

                                                <div class="form__left">

                                                    <div class="form__leftContent">

                                                        <form 
                                                            class="form"
                                                            id="form__pass" 
                                                            method='POST'
                                                            action="/modificarPass?id=<?php echo $personal->user; ?>"
                                                        >

                                                            <!-- CONTRASEÑA ANTIGUA -->
                                                            <div class="control text w100"> 

                                                                <div class="textbox">

                                                                    <input 
                                                                        type="password" 
                                                                        name="pass_antigua" 
                                                                        id="pass_antigua"
                                                                        autocomplete="current-password"
                                                                        
                                                                    >

                                                                    <label class="label">
                                                                        <span class="label__text">Contraseña antigua</span>
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
                                                                        <span class="label__text">Introduzca la nueva contraseña</span>
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
                                                                        <span class="label__text">Repita la nueva contraseña</span>
                                                                    </label> 

                                                                </div>                                        

                                                            </div>

                                                            <!-- BOTÓN -->
                                                            <button 
                                                                type="button" 
                                                                form="form__pass"
                                                                class="button button__primary button__blue w100"
                                                                onclick="validateFormPass(form__pass)"
                                                            > 
                                                                <svg class="ico ico__discoduro w"></svg>
                                                                
                                                                <span> Modificar contraseña </span>                                                           

                                                            </button>

                                                        </form>

                                                    </div>

                                                </div>
                                                
                                            </div>                    

                                        </div>

                                    </div>

                                </div>

                            <?php else: ?>

                                <p>No tienes los permisos suficientes para modificar la contraseña de este usuario.</p>

                            <?php endif; ?>

                        </div>

                        <div class="tab">

                            <?php if($personal->user == $_SESSION['id_user'] || $_SESSION['rol'] === 'Admin'): ?>

                                <div class="entry-content">

                                    <div class="block">

                                        <div class="block__content form">

                                            <div class="form__two">

                                                <div class="form__left">

                                                    <div class="form__leftContent">

                                                        <form 
                                                            class="form"
                                                            id="form__avatar" 
                                                            method='POST'
                                                            enctype='multipart/form-data'
                                                            action="/modificarAvatar?id=<?php echo $personal->id; ?>"
                                                        >

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

                                                            <!-- BOTÓN -->
                                                            <button 
                                                                type="button" 
                                                                form="form__avatar"
                                                                class="button button__primary button__blue w100"
                                                                onclick="validateFormAvatar(form__avatar)"
                                                            > 
                                                                <svg class="ico ico__discoduro w"></svg>
                                                                
                                                                <span> Modificar fotografía de perfil </span>                                                           

                                                            </button>

                                                        </form>

                                                    </div>

                                                </div>
                                                
                                            </div>                    

                                        </div>

                                    </div>

                                </div>

                            <?php else: ?>

                                <p>No tienes los permisos suficientes para modificar la foto de perfil de este usuario.</p>

                            <?php endif; ?>

                        </div>   

                    </div>                        

                </div>  

            </div>

        </div>  

    </article>

</main>

</html>

<script src="/build/js/functions.js"></script>

<script type="text/javascript">

   document.getElementById('pass_antigua').addEventListener('keyup', checkBloqMayus);
   document.getElementById('pass_nueva').addEventListener('keyup', checkBloqMayus);
   document.getElementById('pass_repetida').addEventListener('keyup', checkBloqMayus);

   document.getElementById('pass_antigua').addEventListener('keypress', (e) => {if (e.key === 'Enter') {validateFormPass(form__pass)}} );
   document.getElementById('pass_nueva').addEventListener('keypress', (e) => {if (e.key === 'Enter') {validateFormPass(form__pass)}} );
   document.getElementById('pass_repetida').addEventListener('keypress', (e) => {if (e.key === 'Enter') {validateFormPass(form__pass)}} );

    function validateForm(form) {

        //Ponemos la animación de carga
        loading();

        if (document.getElementById('user').value.length == 0) {
            showSnackbar('¡Falta el correo!','ico__alerta w','red');
            loaded();
            return false;
        }
        if (document.getElementById('nombre').value.length == 0) {
            showSnackbar('¡Falta el nombre!','ico__alerta w','red');
            loaded();
            return false;
        }
        if (document.getElementById('primer_apellido').value.length == 0) {
            showSnackbar('¡Falta el primer apellido!','ico__alerta w','red');
            loaded();
            return false;
        }
        if (document.getElementById('segundo_apellido').value.length == 0) {
            showSnackbar('¡Falta el segundo apellido!','ico__alerta w','red');
            loaded();
            return false;
        }
        if (document.getElementById('rol').value.length == 0) {
            showSnackbar('¡Falta el rol!','ico__alerta w','red');
            loaded();
            return false;
        }

    }

    function validateFormPass(form) {

        //Ponemos la animación de carga
        loading();

        if (document.getElementById('pass_antigua').value.length == 0) {
            showSnackbar('¡Falta la contraseña antigua!','ico__alerta w','red');
            loaded();
            return false;
        }
        if (document.getElementById('pass_nueva').value.length == 0) {
            showSnackbar('¡Falta la contraseña nueva!','ico__alerta w','red');
            loaded();
            return false;
        }
        if (document.getElementById('pass_repetida').value.length == 0) {
            showSnackbar('¡Falta la confirmación de la contraseña nueva!','ico__alerta w','red');
            loaded();
            return false;
        }
        if (document.getElementById('pass_nueva').value != document.getElementById('pass_repetida').value) {
            showSnackbar('¡Las contraseñas no coinciden!','ico__alerta w','red');
            loaded();
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

    function confirmacionCambioPassword() {

        //Obtenemos la url
        var url = window.location.href;

        // Obtener los parámetros de la cadena de consulta (query string)
        var params = new URLSearchParams(window.location.search);

        //Si es ok, sacamos el snackbar
        if (params.get('passModificada') === 'True') {
            showSnackbar('¡Contraseña actualizada correctamente!','ico__check w','green');
            return false;
        }

    }   

    function confirmacionCambioAvatar() {

        //Obtenemos la url
        var url = window.location.href;

        // Obtener los parámetros de la cadena de consulta (query string)
        var params = new URLSearchParams(window.location.search);

        //Si es ok, sacamos el snackbar
        if (params.get('avatarModificado') === 'True') {
            showSnackbar('Foto de perfil actualizada correctamente!','ico__check w','green');
            return false;
        }

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

    const archivo = document.getElementById('change');   

    archivo.addEventListener('change', function(){
                
        if (archivo.files.length > 0) {

            //Obtenemos el nombre del archivo
            const nombreArchivo = archivo.files[0].name;

            //Susituimos el texto del input
            label.innerHTML = nombreArchivo;

            //Sustituimos el nombre del archivo quitando la extensión
            nombreAdjunto.value = nombreArchivo.split('.').slice(0, -1).join('.');

        } else {

            archivo.closest('.input').textContent = 'Ningún archivo seleccionado';
            nombreAdjunto.value = '';

        }

    });

    window.onload = confirmacionCambioPassword();
    window.onload = confirmacionCambioAvatar();


</script>