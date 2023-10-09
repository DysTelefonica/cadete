const Auth = {
    
    open (options) {
        options = Object.assign({}, {
            okText: 'Iniciar sesión',
            cancelText: 'Cancelar',
            onok: function () { return true },
            oncancel: function () { return false }
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
                        <svg class="ico ico__cadete b" style=" width: 160px; height: 42px;"> </svg>
                    </div>
                    
                    <div class="dialog__title">
                        <h2 class="dialog__title">Iniciar sesión en Telefónica CADETE</h2>
                    </div>
        
                    <div class="dialog__message">
                        <span class="dialog__content">Área de Defensa y Seguridad de Telefónica</span>

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
        const pass = template.content.getElementById('password');    

        dialog.addEventListener('click', e => {
            if (e.target === dialog) {
                options.oncancel();
                this._close(dialog);
            }
        });

        btnOk.addEventListener('click', () => {
            options.onok();

            if(validateAuth(form__auth)){
                this._close(dialog);
            };
            
        });

        pass.addEventListener('keypress', (e) => {
            
            if (e.key === 'Enter') {

                console.log('enter');

                options.onok();

                if(validateAuth(form__auth)){
                    this._close(dialog);
                };

            }
            
        });

        [btnCancel, btnClose].forEach(el => {
            el.addEventListener('click', () => {
                options.oncancel();
                this._close(dialog);
            });
        });

        document.body.appendChild(template.content);
    },

    _close (dialog) {
        dialog.classList.add('dialog--close');

        dialog.addEventListener('animationend', () => {
            document.body.removeChild(dialog);
        });
    }
};

     function validateAuth(form) {

        if (document.getElementById('email').value.length == 0) {
            showSnackbar('¡Falta el usuario!','ico__alerta w','red');
            return false;
        }
        
        if (document.getElementById('password').value.length == 0) {
            showSnackbar('¡Falta la contraseña!','ico__alerta w','red');
            return false;
        }

        //Con este método vamos a asignar la url de la página actual
         //a un input hidden y lo vamos a enviar con post para recargar la pagina
             if (document.getElementById('urlAuth').value.length == 0) {
                 document.getElementById("urlAuth").value = window.location;
             }
      
        form.submit();
   }