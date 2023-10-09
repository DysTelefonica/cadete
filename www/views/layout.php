<!DOCTYPE html>

<html lang="es">

    <head>

        <?php require_once __DIR__ . "/../inc/app.php"; ?>

        <!-- Required meta tags -->
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Icono -->
            <link rel="shortcut icon" href="/build/img/layout/Telefonica.png">

        <!-- CSS-->
            <?php require_once "css.php"; ?>
            <?php require_once "scripts.php"; ?>

    </head>

    <?php incluirTemplate('header'); ?>

    <?php echo $contenido; ?>

    <?php incluirTemplate('scroll-menu'); ?>

    <?php incluirTemplate('footer'); ?>

<!-- SCRIPTS -->
    <script src="/build/js/components/tabs.js"></script>
    <script src="/build/js/components/adjunt_dialog.js"></script>
    <script src="/build/js/bitacora.js"></script>
    <script src="/build/js/relation.js"></script>
    <script src="/build/js/adjunct.js"></script>
    <script src="/build/js/buzon.js"></script>
    <script src="/build/js/functions.js"></script>
    
    <script>

        if (typeof tab__header__adjunct !== 'undefined') {
        
            tab__header__adjunct.addEventListener('click', function(){

                loading();

                const div = document.getElementById('Tab__adjunct');
                var id =            "<?php if(isset($_GET['id'])): echo($_GET['id']); endif; ?>";
                var auth =          "<?php echo($auth); ?>";
                var url_recarga =   "<?php echo($_SERVER["REQUEST_URI"]); ?>";

                //Definimos la url (definida en index.php) con el método a ejecutar en el controller
                    const Url = "/gestorArchivos/ajax";

                //Le pasamos los datos para alimentar la funcion del controller
                    const Data = { id: id, auth: auth, url_recarga: url_recarga }

                //Creamos el método ajax
                    $.ajax({
                        url: Url,
                        type: "POST",
                        data: Data,
                        cache: false,

                        success: function(r){

                            $(div).html(r);
                            $(document).ready(OnloadFuncion);

                            loaded();

                        },

                        error:function(e){

                            loaded();

                        }
                    })

                
            });

            
        };

        if (typeof tab__header__relations !== 'undefined') {            

            tab__header__relations.addEventListener('click', function(){

                loading();

                const div = document.getElementById('Tab__relations');

                var id =            "<?php if(isset($_GET['id'])): echo($_GET['id']); endif; ?>";
                var auth =          "<?php echo($auth); ?>"
                var url_recarga =   "<?php echo($_SERVER["REQUEST_URI"]); ?>";

                //Definimos la url (definida en index.php) con el método a ejecutar en el controller
                    const Url = "/relaciones/ajax";

                //Le pasamos los datos para alimentar la funcion del controller
                    const Data = { id: id, auth: auth, url_recarga: url_recarga }

                //Creamos el método ajax
                    $.ajax({
                        url: Url,
                        type: "POST",
                        data: Data,
                        cache: false,

                        success: function(r){

                            $(div).html(r);
                            $(document).ready(OnloadFuncion);

                            loaded();

                        },

                        error:function(e){

                            loaded();

                        }
                    })

                

            });          

        };

        if (typeof tab__header__log !== 'undefined') {
 

            tab__header__log.addEventListener('click', function(){

                loading();

                const div = document.getElementById('Tab__log');

                var id =            "<?php if(isset($_GET['id'])): echo($_GET['id']); endif; ?>";
                var auth =          "<?php echo($auth); ?>"
                var url_recarga =   "<?php echo($_SERVER["REQUEST_URI"]); ?>";

                //Definimos la url (definida en index.php) con el método a ejecutar en el controller
                    const Url = "/log/ajax";

                //Le pasamos los datos para alimentar la funcion del controller
                    const Data = { id: id, auth: auth, url_recarga: url_recarga }

                //Creamos el método ajax
                    $.ajax({
                        url: Url,
                        type: "POST",
                        data: Data,
                        cache: false,

                        success: function(r){

                            $(div).html(r);
                            $(document).ready(OnloadFuncion);

                            loaded();

                        },

                        error:function(e){

                            loaded();

                        }
                    })

               

            });

        };

    </script>

<!-- Error login -->
<?

    if( isset( $_GET['auth'] ) && ( $_GET['auth'] = 'error') ){

        echo "<script> showSnackbar('El usuario o la contraseña son erróneos.','ico__alerta w','red'); </script>";

    }

?>