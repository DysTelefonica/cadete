function loading(){

    // Crear el elemento div
    var loadingDiv = document.createElement("div");

    // Establecer el id y el estilo del div
    loadingDiv.id = "loadingDiv";
    loadingDiv.style.display = "flex";
    loadingDiv.style.zIndex = "999999";

    // Crear el elemento div interno (spinner)
    var spinnerDiv = document.createElement("div");
    spinnerDiv.className = "spinner";

    // Agregar el elemento interno al div principal
    loadingDiv.appendChild(spinnerDiv);

    // Agregar el div principal al cuerpo del documento
    document.body.appendChild(loadingDiv);

}

function loaded(){

    // Obtener el elemento div por su id
    var loadingDiv = document.getElementById("loadingDiv");

    // Verificar si el elemento existe antes de intentar eliminarlo
    if (loadingDiv) {

        // Eliminar el elemento del DOM
        loadingDiv.parentNode.removeChild(loadingDiv);
       
    }
    
}

function checkBloqMayus(e){

    var capsLockOn = e.getModifierState && e.getModifierState('CapsLock');

    if (capsLockOn) {

        if(document.querySelector('.CapsLock') == null){
            showSnackbar('¡Bloq. Mayús está activado!','ico__alerta w','yellow CapsLock');
        }

    }
    if (capsLockOn == false) {
        deleteSnackbar(document.querySelector('.CapsLock'));
    }

}

function checkEnter(e){
    
    document.addEventListener('keypress', (e) => {  
            
        if (e.key === 'Enter') {

            if(validateAuth(form__auth)){
                this._close(dialog);
            };

        }
        
    });
}

function submit_form(form){

    //Ponemos pantalla de carga
    loading(); 

    //Haceos submit al form
    setTimeout(function() { form.submit(); }, 1); 

}

function showAuth() { Auth.open( {} ) }

function showBitacora() {Bitacora.open( {} ) }

function abrirPDF(ruta, nombre){

    loading();

    var ruta = '/mostrarPDF?r={{adjunto.rutaAdjunto}}&n={{adjunto.nombreAdjunto}}.{{adjunto.tipoAdjunto}}';
    var nombre = '{{adjunto.nombreAdjunto}}';

    var nuevaVentana = window.open('', '_blank');
    nuevaVentana.document.write('Cargando el archivo "' + nombre + '", espere por favor...');
    
    // Espera 1 segundo antes de cargar la URL
    setTimeout(function() {
        nuevaVentana.location.href = ruta;
    }, 1000); 

    loaded();

}