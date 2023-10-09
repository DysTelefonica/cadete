const Dialog = {
    
    open (options) {
        options = Object.assign({}, {
            title: '',
            message: '',
            color: '',
            ico: '',
            okText: 'Aceptar',
            cancelText: 'Cancelar',
            onok: function () { return true},
            oncancel: function () { return false}
        }, options);

        const html = `
            <dialog class="dialog dialog__opacityLayer">

                <div class="dialog__window">

                    <div class="dialog__close">
                        <button>
                            <svg class="ico ico__cerrar d"></svg>
                        </button>
                    </div>

                    <div class="dialog__content">

                        <div class="dialog__img">
                            <svg class="ico ${options.ico}"></svg>
                        </div>

                        <div class="dialog__title">
                            <h2 class="dialog__title">${options.title}</h2>
                        </div>

                        <div class="dialog__message">
                            <span class="dialog__content">${options.message}</span>
                        </div>
                        
                        <div class="dialog__buttons">
            
                            <button 
                                type="button" 
                                class="button button__primary button__${options.color} w100 dialog__button--ok"
                            > 
                                ${options.okText}
                            </button>

                            <button 
                                type="button" 
                                class="button button__secundary button__${options.color} w100 dialog__button--cancel"
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

        dialog.addEventListener('click', e => {
            if (e.target === dialog) {
                options.oncancel();
                this._close(dialog);
            }
        });

        btnOk.addEventListener('click', () => {
            options.onok();
            this._close(dialog);
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