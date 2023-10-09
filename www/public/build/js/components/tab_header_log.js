if (typeof tab__header__relations !== 'undefined') {

    tab__header__relations.addEventListener('click', function(){

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

                },

                error:function(e){

                }
            })
    });

};