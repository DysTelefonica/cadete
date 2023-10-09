const Buzon = {
    
    open (options) {
        options = Object.assign({}, {
            user: '',
            okText: '¡Informar!',
            cancelText: 'Mejor me lo pienso...',
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
                    <svg class="ico ico__correo b"> </svg>
                </div>
                
                <div class="dialog__title">
                    <h2 class="dialog__title">Reportar</h2>
                </div>
    
                <div class="dialog__message">
                
                    <form 
                        class="form"
                        id="form__buzon" 
                        method='POST'
                        action="/buzon/create"
                        style="padding: 0px"
                    >
    
                        <input 
                            type="hidden"
                            name="user"
                            id="user"
                            value='${options.user}'
                        >

                        <input 
                            type="hidden"
                            name="url"
                            id="url"
                            value='${options.url}'
                        >

                        <input 
                            type="hidden"
                            name="date"
                            id="date"
                            value=''
                        >

                        <!-- ORIGEN -->
                        <div class="control select w100"> 
    
                            <svg class="ico ico__mapa b"></svg>
        
                            <div class="textbox">
        
                                <select 
                                    name="selector" 
                                    id="selector" 
                                    class="valid"
                                    required
                                >
                                
                                    <option selected value=""> Seleccione una de las opciones </option>    
                                    <option value="Sugerencia">Sugerencia</option>
                                    <option value="Error">Error</option>
        
                                </select>
        
                                <label class="label">
                                    <span class="label__text">¿Qué desea reportar?</span>
                                </label> 
        
                            </div>                                        
        
                        </div>
    
                        <div class="helper__text">
                            Ej: Sugerencia
                        </div>
        
                        <!-- REPORTE -->
                        <div class="control textarea w100"> 
    
                            <svg class="ico ico__chat b"></svg>
        
                            <div class="textbox">
        
                                <textarea  
                                    name="reporte" 
                                    id="reporte"
                                    cols="30" 
                                    rows="10"              
                                ></textarea>

                                <label class="label">
                                    <span class="label__text">Reporte</span>
                                </label> 
        
                            </div>           
        
                        </div>
    
                        <div class="helper__text">
                            Describe la sugerencia o error detectado.
                        </div>

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
    
    </dialog>
        `;

        const template = document.createElement('template');
        template.innerHTML = html;

        // Elements
        const dialog = template.content.querySelector('.dialog');
        const btnCancel = template.content.querySelector('.dialog__button--cancel');
        const btnClose = template.content.querySelector('.dialog__close');
        const btnOk = template.content.querySelector('.dialog__button--ok');    
        
        //Eventos y funciones
        dialog.addEventListener('click', e => {
            if (e.target === dialog) {
                options.oncancel();
                this._close(dialog);
            }
        });

        btnOk.addEventListener('click', () => {
            options.onok();

            if(validateFormBuzon(form__buzon)){
                this._close(dialog);
            };
            
        });

        [btnCancel, btnClose].forEach(el => {
            el.addEventListener('click', () => {
                    options.oncancel();
                    this._close(dialog);
            });
        });
        
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

    function validateFormBuzon(form) {

        if (document.getElementById('selector').value.length == 0) {
            showSnackbar('¡Falta seleccionar qué se reporta!','ico__alerta w','red');
            return false;
        }

        if (document.getElementById('reporte').value.length == 0) {
            showSnackbar('¡Falta el reporte!','ico__alerta w','red');
            return false;
        }

        document.getElementById('date').value = obtenerFechaHoy();

        form.submit()

    }

    function showBuzon(user, url) {

        Buzon.open( {
            user: user,
            url: url,
        }) 
    }