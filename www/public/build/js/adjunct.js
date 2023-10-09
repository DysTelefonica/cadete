const Adjunct = {
    
    open (options) {
        options = Object.assign({}, {
            id: '',
            okText: '¡Adjuntar!',
            cancelText: '¡Deja el archivo donde estaba!',
            onok: function () { return true},
            oncancel: function () { return false}
        }, options);
        
        const html = `
        <dialog class="dialog">

        <div class="dialog__window dialog__auth">
    
            <div class="dialog__close">
                <button>
                    <svg class="ico ico__cerrar d"></svg>
                </button>
    
            </div>
    
            <div class="dialog__content">
    
                <div class="dialog__img">
                    <svg class="ico ico__adjuntar b"> </svg>
                </div>
                
                <div class="dialog__title">
                    <h2 class="dialog__title">Adjuntar documento</h2>
                </div>
    
                <div class="dialog__message">
                
                    <form 
                        class="form"
                        id="form__adjuntar" 
                        method='POST'
                        enctype='multipart/form-data'
                        action='/gestorArchivos?id=${options.id}'
                        style="padding: 0px"
                    >
    
                        <input 
                            type="hidden"
                            name="item_referencia"
                            id="item_referencia"
                            value='${options.id}'
                        >

                        <input 
                            type="hidden"
                            name="url"
                            id="url"
                        >
                    
                        <div class="control file w100"> 

                            <svg class="ico ico__adjuntar b"></svg>
        
                            <div class="textbox">

                                <input 
                                    type="file"
                                    name="archivo" 
                                    id="archivo" 
                                    class="valid"
                                    required 
                                >

                                <label for="archivo" class="input">
                                    <span id='change'>Ningún archivo seleccionado</span>
                                </label>
        
                                <label class="label">
                                    <span class="label__text">Buscar archivo...</span>
                                </label>                                
                                
                                <svg class="ico ico__buscar b"></svg>
        
                            </div>                                        
        
                        </div> 

                        <div class="helper__text">
                            Seleccione un archivo de su sistema
                        </div>

                        <div class="control text w100"> 

                            <svg class="ico ico__adjuntar b"></svg>

                            <div class="textbox">

                                <input 
                                    name="nombreAdjunto" 
                                    id="nombreAdjunto"
                                    autocomplete='off'
                                    value=""
                                    required='required'
                                >

                                <label class="label">
                                    <span class="label__text">Nombre del archivo adjunto</span>
                                </label> 

                            </div>                                        

                        </div>

                        <div class="helper__text">
                            Ej: Documentación de calidad
                        </div>

                    </form>
                    
                </div>

                <div class="dialog__buttons">
    
                    <button 
                        type="button" 
                        id="button__login"
                        class="button button__primary button__blue w100 dialog__button--ok"
                    > 
                        ${options.okText}
                    </button>
    
                    <button 
                        type="button" 
                        class="button button__secundary button__blue w100 dialog__button--cancel"
                    > 
                        ${options.cancelText}
                    </button>
    
                </div>
                
            </div>
    
        </div>

        <script src="/build/js/components/input__file.js"></script>

    </dialog>   
        `;

        const template = document.createElement('template');
        template.innerHTML = html;

        // Elements
            const dialog =          template.content.querySelector('.dialog');
            const btnCancel =       template.content.querySelector('.dialog__button--cancel');
            const btnClose =        template.content.querySelector('.dialog__close');
            const btnOk =           template.content.querySelector('.dialog__button--ok');    

            const archivo =         template.content.getElementById('archivo');   
            const label =           template.content.getElementById('change'); 
            const nombreAdjunto =   template.content.getElementById('nombreAdjunto');   

        //Eventos y funciones

            btnOk.addEventListener('click', () => {
                options.onok();

                if(validateFormAdjuntos(form__adjuntar)){
                    this._close(dialog);
                };
                
            });

            document.addEventListener('keypress', (e) => {  
            
                if (e.key === 'Enter') {

                    validateFormAdjuntos(form__adjuntar);
                    this._close(dialog);
        
                }

            });

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

            [btnCancel, btnClose].forEach(el => {
                el.addEventListener('click', () => {
                        options.oncancel();
                        this._close(dialog);
                });
            });

            function validateFormAdjuntos(form) {

                if (nombreAdjunto.value.length == 0) {
                    showSnackbar('¡Falta darle un nombre al archivo!','ico__alerta w','red');
                    return false;
                }
        
                if (archivo.value.length == 0) {
                    showSnackbar('¡Falta adjuntar el archivo!','ico__alerta w','red');
                    return false;
                }
        
                if (document.getElementById('url').value.length == 0) {
                    document.getElementById("url").value = window.location;
                }
        
                notificarAdjuntar(form);
        
            }
        
            function notificarAdjuntar(form){
        
                Dialog.open({
                    title: 'Adjuntar arhivo',
                    message: 'Va a adjuntar el archivo ¿Desea continuar?',
                    color: 'blue',
                    ico: 'ico__adjuntar b',
                    okText: '¡Lo quiero como evidencia!',
                    cancelText: 'Pues quizá no sea tan buena evidencia...',
                    onok: () => { 

                        loading();    

                        // Espera 1 segundo antes de cargar la URL
                        setTimeout(function() {
                            form.submit(); 
                        }, 1000); 
                       
                        
                    }                
        
                })
            }    
        
            //Creamos el modal
            document.body.appendChild(template.content);

    },

    _close (dialog) {
        dialog.classList.add('dialog--close');

        dialog.addEventListener('animationend', () => {
            document.body.removeChild(dialog);
        });
    }

}

    function showAdjuntos(id, url) {
                        
        Adjunct.open( {
            id: id,
            url: url,
        }) 
    }

    function confirmarEliminarAdjuntar(form){

        Dialog.open({
            title: 'Eliminar archivo adjunto',
            message: 'Va a eliminar el archivo adjunto ¿Desea continuar?',
            color: 'red',
            ico: 'ico__papelera d',
            okText: 'Sí',
            cancelText: 'No',
            onok: () => { 

                loading();

                // Espera 1 segundo antes de cargar la URL
                setTimeout(function() {
                    form.submit(); 
                }, 1000); 

            }                

        })
    }    