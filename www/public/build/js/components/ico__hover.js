
//La siguiente función la ejecuta cuando el documento está listo.
    $(document).ready(function(){

        $(".download__item a").hover(function(){
    
            $(".icoChange", this)
                                        .addClass("w")
                                        .removeClass("d");
        }, function () {
            $(".icoChange", this)
                                        .addClass("d")
                                        .removeClass("w");
        });
    
    });

//La siguiente función la ejecuta cuando carga los adjuntos y relaciones por Ajax
    function OnloadFuncion(){

        $(".download__item a").hover(function(){
    
            $(".icoChange", this)
                                        .addClass("w")
                                        .removeClass("d");
        }, function () {
            $(".icoChange", this)
                                        .addClass("d")
                                        .removeClass("w");
        });
    
    };