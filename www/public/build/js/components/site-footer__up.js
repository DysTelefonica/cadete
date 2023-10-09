// Código a implementar para el botón que te lleva al principio de la página

    $(document).ready(function(){

        $('.site-footer__up').click(function(){

            $('body, html').animate({
                scrollTop: '0px'
            }, 600);

        });

    });
