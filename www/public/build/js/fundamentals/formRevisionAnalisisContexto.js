const RevisionAnalisisContexto = {
    
    open (options) {
        options = Object.assign({}, {
            id: '',
            codigo_interno: '',
            revision: '',
            fecha: '',
            okText: '¡Habemus revisión!',
            cancelText: 'Antes tengo que revisar unas cosas...',
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
                        <svg class="ico ico__lanzar b"> </svg>
                    </div>
                    
                    <div class="dialog__title">
                        <h2 class="dialog__title">Revisión Análisis Contexto</h2>
                    </div>

                    <div class="dialog__message">
                    
                        <form 
                            class="form"
                            id="form__revisionAnalisisContexto" 
                            method='POST'
                            action='/contexto/analisisContexto/create-revision'
                            style="padding: 0px"
                        >

                            <input 
                                type="hidden"
                                name="id"
                                id="id"
                                value=${options.id}
                            >

                            <input 
                                type="hidden"
                                name="analisisContexto"
                                id="analisisContexto"
                            >

                        <!-- CODIGO -->
                        <div class="control text w100"> 

                            <div class="textbox">

                                <input 
                                    name="codigo_interno" 
                                    id="codigo_interno"
                                    readonly
                                    class="valid"
                                    value=${options.codigo_interno}
                                >

                                <label class="label">
                                    <span class="label__text">Código del Análisis de Contexto</span>
                                </label> 

                            </div>                                        

                        </div>

                        <!-- REVISIÓN -->
                        <div class="control text w100"> 

                            <div class="textbox">

                                <input 
                                    type="text" 
                                    name="revision" 
                                    id="revision" 
                                    readonly
                                    class="valid"
                                    value=${options.revision}
                                >

                                <label class="label">
                                    <span class="label__text">Nueva revisión</span>
                                </label> 

                            </div>                                        

                        </div>

                            <!-- FECHA -->
                            <div class="control date w100"> 

                            <div class="textbox">

                                <input 
                                    type="date" 
                                    name="fecha" 
                                    class='valid'
                                    id="datepicker"  
                                    value =${options.fecha}
                                >

                                <label class="label">
                                    <span class="label__text">Fecha</span>
                                </label> 

                                <svg class="ico ico__calendario b"></svg>

                            </div>                                        

                        </div>

                        <!-- COMENTARIOS -->
                        <div class="control textarea w100"> 

                            <div class="textbox">

                                <textarea 
                                    name="comentarios" 
                                    id="comentarios" 
                                    cols="30" 
                                    rows="10"
                                    value=""
                                    autofocus
                                ></textarea>

                                <label class="label">
                                    <span class="label__text">Comentarios</span>
                                </label> 

                            </div>                                        

                        </div>

                        <input 
                            type="hidden"
                            name="url"
                            id="url"
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

            <script src="/build/js/components/input__file.js"></script>
            <script src="/build/js/components/date.js"></script>

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

                if(validateFormRevisionAnalisisContexto(form__revisionAnalisisContexto)){
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

    function validateFormRevisionAnalisisContexto(form) {

        if (document.getElementById('codigo_interno').value.length == 0) {
            showSnackbar('¡Falta código del Análisis de Contexto!','ico__alerta w','red');
            return false;
        }

        if (document.getElementById('revision').value.length == 0) {
            showSnackbar('¡Falta el número de la revisión del Análisis de Contexto!','ico__alerta w','red');
            return false;
        }

        if (document.getElementById('datepicker').value.length == 0) {
            showSnackbar('¡Falta la fecha de la revisión!','ico__alerta w','red');
            return false;
        }

        if (document.getElementById('url').value.length == 0) {
            document.getElementById("url").value = window.location;
        }

        confirmarRevision(form);

    }

    function confirmarRevision(form){

        var codigo = document.getElementById('codigo_interno').value;
        var revision = document.getElementById('revision').value

        Dialog.open({
            title: 'Nueva revisión',
            message: 'Va a generar la revisión ' + revision + ' del Análisis de Contexto ' + codigo + ' ¿Desea continuar?',
            color: 'blue',
            ico: 'ico__lanzar b',
            okText: '¡Adelante!',
            cancelText: '¡Espera!',
            onok: () => { form.submit(); }                

        })
    }    