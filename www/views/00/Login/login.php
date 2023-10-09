<head>

    <title> <? echo $_SESSION["nombreApp"]; ?> </title> 
    <link rel="shortcut icon" href="/build/img/layout/Telefonica.png">

    <link async rel="stylesheet" type="text/css" href="/build/css/fonts.css">
    <link async rel="stylesheet" type="text/css" href="/build/css/colours.css">
    <link async rel="stylesheet" type="text/css" href="/build/css/ico__root.css">
    <link async rel="stylesheet" type="text/css" href="/build/css/ico__class.css">
    <link async rel="stylesheet" type="text/css" href="/build/css/fundamentals/login.css">
    <link async rel="stylesheet" type="text/css" href="/build/css/components/buttons.css">
    <link async rel="stylesheet" type="text/css" href="/build/css/components/forms.css">
    <link async rel="stylesheet" type="text/css" href="/build/css/components/control.css">
    <link async rel="stylesheet" type="text/css" href="/build/css/components/scrollbar.css">
    <link async rel="stylesheet" type="text/css" href="/build/css/components/snackbar.css">
    <link async rel="stylesheet" type="text/css" href="/build/css/components/loading.css">

</head>

<body>

    <div class="container">

        <div class="left__section">
        </div>
    
        <div class="right__section">

            <div class="img">
                <svg class="ico ico__cadete b" style=" width: 160px; height: 42px;"> </svg>
            </div>
            
            <div class="title">
                <h2 class="dialog__title">Iniciar sesión en Telefónica CADETE</h2>
            </div>

            <div class="message">
                <span>Está intentando acceder a la intranet del Área de Defensa y Seguridad de Telefónica.</span>

                <form 
                    class="form"
                    id="form__auth" 
                    method='POST'
                    action="/login"
                    style="padding: 0px"
                >
                                            
                <div class="control text w100"> 

                    <svg class="ico ico__usuario b"></svg>

                    <div class="textbox">

                        <input 
                            type="text" 
                            name="email" 
                            id="email"
                            style="margin: 0px 0px 8px 0px"
                            required                             
                        >

                        <label class="label">
                            <span class="label__text">Usuario</span>
                        </label> 

                    </div>               

                </div>

                <div class="helper__text">
                    Correo electrónico. Ej: Usuario@telefonica.com
                </div>

                <div class="control text w100"> 

                    <svg class="ico ico__candadoabierto b"></svg>

                    <div class="textbox">

                        <input 
                            type="password" 
                            name="password" 
                            id="password"
                            style="margin: 0px 0px 8px 0px"
                            required        
                            autocomplete               
                        >

                        <label class="label">
                            <span class="label__text">Contraseña</span>
                        </label> 

                    </div>           

                </div>

                <div class="helper__text">
                    Contraseña. Ej: Telefonica1234
                </div>

                <input 
                    type="hidden" 
                    id="urlAuth"
                    name="urlAuth"                          
                >

            </div>
            
            <div class="buttons">

                <button 
                    type="button" 
                    id="button__login"
                    class="button button__primary button__blue w100 dialog__button--ok"
                    onclick="validateAuth(form__auth)"
                > 
                    Acceder a CADETE
                </button>

            </div>
            
        </div>

    </div>

</body>

<script src="/build/js/components/snackbar.js"></script>
<script src="/build/js/functions.js"></script>

<script>

    document.getElementById('password').addEventListener('keyup', checkBloqMayus);

    document.addEventListener('keypress', (e) => {  
            
        if (e.key === 'Enter') {

            if(validateAuth(form__auth)){
                this._close(dialog);
            };

        }
        
    });

    function validateAuth(form) {

        loading();

        if (document.getElementById('email').value.length == 0) {
            showSnackbar('¡Falta el usuario!','ico__alerta w','red');
            loaded();
            return false;
        }

        if (document.getElementById('password').value.length == 0) {
            showSnackbar('¡Falta la contraseña!','ico__alerta w','red');
            loaded();
            return false;
        }

        //Con este método vamos a asignar la url de la página actual a un input hidden y lo vamos a enviar con post para recargar la pagina
        if (document.getElementById('urlAuth').value.length == 0) {
            document.getElementById("urlAuth").value = window.location;
           
        }
        
        form.submit();

    }

</script>

<?

    if( isset( $_GET['auth'] ) && ( $_GET['auth'] = 'error') ){

        echo "<script> showSnackbar('El usuario o la contraseña son erróneos.','ico__alerta w','red'); </script>";

    }

?>