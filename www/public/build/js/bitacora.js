const Bitacora = {
    
    open (options) {
        options = Object.assign({}, {
            id: '',
            okText: '¡Crear entrada!',
            cancelText: 'Cancelar',
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
                    <svg class="ico ico__blog b"> </svg>
                </div>
                
                <div class="dialog__title">
                    <h2 class="dialog__title">Nueva entrada de bitácora</h2>
                </div>
    
                <div class="dialog__message">
                
                    <form 
                        class="form"
                        id="form__bitacora" 
                        method='POST'
                        action="/bitacora/create"
                        style="padding: 0px"
                    >
    
                        <input 
                            type="hidden"
                            name="id"
                            id="id"
                            value='${options.id}'
                        >

                        <input 
                            type="hidden"
                            name="fecha"
                            id="fecha"
                        >

                        <input 
                            type="hidden"
                            name="url"
                            id="url"
                        >

                    <!-- ENTRADA -->
                        <div class="control text w100 h102"> 

                            <svg class="ico ico__chat b"></svg>
        
                            <div class="textbox">
        
                                <textarea  
                                    name="bitacora" 
                                    id="bitacora"
                                    cols="30" 
                                    rows="10"              
                                >
        
                                <label class="label">
                                    <span class="label__text">Entrada de bitácora</span>
                                </label> 
        
                            </div>           
        
                        </div>

                        <div class="helper__text">
                            Describe el registro de bitácora
                        </div>

                    <!-- ORIGEN -->
                        <div class="control select w100"> 

                            <svg class="ico ico__chat b"></svg>
        
                            <div class="textbox">
        
                                <select 
                                    name="selector1" 
                                    id="selector1" 
                                    class="valid"
                                    required
                                >
                                
                                    <option selected value=""> Seleccione el origen de la entrada </option>    
                                    <option value="Calidad">Calidad</option>
                                    <option value="Proyecto">Proyectos</option>
        
                                </select>
        
                                <label class="label">
                                    <span class="label__text">Origen</span>
                                </label> 
        
                            </div>                                        
        
                        </div>

                        <div class="helper__text">
                            Ej: Calidad o proyectos
                        </div>
    
                    <!-- CATEGORÍA -->
                        <div class="control select w100"> 

                            <svg class="ico ico__chat b"></svg>
        
                            <div class="textbox">
        
                                <select 
                                    name="selector2" 
                                    id="selector2" 
                                    class="valid"
                                    required
                                    disabled
                                >
                                
                                    <option selected value=""> Seleccione la categoría </option>    
        
                                </select>
        
                                <label class="label">
                                    <span class="label__text">Categoría</span>
                                </label> 
        
                            </div>                                        
        
                        </div>

                        <div class="helper__text">
                            Ej: 07. Apoyo
                        </div>
    
                    <!-- SUBCATEGORÍA -->
                        <div class="control select w100"> 

                            <svg class="ico ico__chat b"></svg>
        
                            <div class="textbox">
        
                                <select 
                                    name="selector3" 
                                    id="selector3" 
                                    class="valid"
                                    required
                                    disabled                            
                                >
                                
                                    <option selected value=""> Seleccione la subcategoría </option>    
        
                                </select>
        
                                <label class="label">
                                    <span class="label__text">Subcategoría</span>
                                </label> 
        
                            </div>                                     
    
                        </div> 

                        <div class="helper__text">
                            Ej: Información documentada
                        </div>
                    
                    <!-- REFERENCIA -->
                        <div class="control select w100"> 

                            <svg class="ico ico__chat b"></svg>
        
                            <div class="textbox">
        
                                <select 
                                    name="referencia" 
                                    id="referencia" 
                                    class="valid"
                                    required
                                    disabled     
                                >
                                
                                    <option selected value=""> Seleccione el elemento </option>    
        
                                    <?php foreach($tiposAnalisisContexto as $tipo) { ?>
                                        
                                        <option <?php echo s($tipo->id) === s($analisisContexto->tipo) ? 'selected' : '' ?> value="<?php echo s($tipo->id);?>"> <?php echo s($tipo->tipo); ?> </option>
        
                                    <?php } ?>
        
                                </select>
        
                                <label class="label">
                                    <span class="label__text">Referencia</span>
                                </label> 
        
                            </div>                                    
        
                        </div> 

                        <div class="helper__text">
                            Ej: Procedimiento EM-300-PR-001
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
            const dialog =      template.content.querySelector('.dialog');
            const btnCancel =   template.content.querySelector('.dialog__button--cancel');
            const btnClose =    template.content.querySelector('.dialog__close');
            const btnOk =       template.content.querySelector('.dialog__button--ok');    

        //Variables
            const selector1 =   template.content.querySelector("#selector1");
            const selector2 =   template.content.querySelector("#selector2");
            const selector3 =   template.content.querySelector("#selector3");
        
        //Eventos y funciones

            dialog.addEventListener('click', e => {
                if (e.target === dialog) {
                    options.oncancel();
                    this._close(dialog);
                }
            });

            btnOk.addEventListener('click', () => {
                options.onok();

                if(validateFormBitacora(form__bitacora)){
                    this._close(dialog);
                };
                
            });

            [btnCancel, btnClose].forEach(el => {
                el.addEventListener('click', () => {
                        options.oncancel();
                        this._close(dialog);
                });
            });

            selector1.addEventListener('change', function(){

                //Limpiamos las variables
                    selector2.value = "";
                    selector2.disabled = true;
                    selector3.value = "";
                    selector3.disabled = true;
                    referencia.value = "";
                    referencia.disabled = true;

                //Almacenamos en una variable el valor del apartado
                    var origen = this.value;

                if(origen && origen !=""){

                        selector2.value = "";
                        selector2.disabled = true;
                
                    //Definimos la url (definida en index.php) con el método a ejecutar en el controller
                        const Url = "/bitacora/cargarCategorias";

                    //Le pasamos los datos para alimentar la funcion del controller
                        const Data = { origen: origen }
                        

                    //Creamos el método ajax
                        $.ajax({
                            url: Url,
                            type: "POST",
                            data: Data,
                            cache: false,

                            success: function(r){
                                $(selector2).html(r);
                                selector2.disabled = false;
                            },

                            error:function(e){
                                selector2.disabled = true;
                            }
                        })

                }
                else{
                    selector2.value = "";
                    selector2.disabled = true;
                    referencia.value = "";
                    referencia.disabled = true;
                }
                
            });

            selector2.addEventListener('change', function(){

                //Limpiamos las variables
                    selector3.value = "";
                    selector3.disabled = true;
                    referencia.value = "";
                    referencia.disabled = true;

                //Almacenamos en una variable el valor del apartado
                    var categoria = this.value;

                if(categoria && categoria !=""){

                        selector3.value = "";
                        selector3.disabled = true;
                        referencia.value = "";
                        referencia.disabled = true;
                
                    //Definimos la url (definida en index.php) con el método a ejecutar en el controller
                        const Url = "/bitacora/cargarSubcategorias";

                    //Le pasamos los datos para alimentar la funcion del controller
                        const Data = { categoria: categoria }

                    //Creamos el método ajax
                        $.ajax({
                            url: Url,
                            type: "POST",
                            data: Data,
                            cache: false,

                            success: function(r){
                                $(selector3).html(r);
                                selector3.disabled = false;
                            },

                            error:function(e){
                                selector3.disabled = true;
                            }
                        })

                }
                else{
                    selector3.value = "";
                    selector3.disabled = true;
                    referencia.value = "";
                    referencia.disabled = true;
                }
                
            });

            selector3.addEventListener('change', function(){

                //Limpiamos las variables
                    referencia.value = "";
                    referencia.disabled = true;

                //Almacenamos en una variable el valor del apartado
                    var subcategoria = this.value;

                if(subcategoria && subcategoria !=""){

                        referencia.value = "";
                        referencia.disabled = true;
                
                    //Definimos la url (definida en index.php) con el método a ejecutar en el controller
                        const Url = "/bitacora/cargarElementos";
                    //Le pasamos los datos para alimentar la funcion del controller
                        const Data = {
                            subcategoria: subcategoria
                        }

                    //Creamos el método ajax
                        $.ajax({
                            url: Url,
                            type: "POST",
                            data: Data,
                            cache: false,

                            success: function(r){
                                $(referencia).html(r);
                                referencia.disabled = false;
                            },

                            error:function(e){
                                referencia.disabled = true;
                            }
                        })

                }
                else{
                    referencia.value = "";
                    referencia.disabled = true;
                }
                
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

    function validateFormBitacora(form) {

        if (document.getElementById('referencia').value.length == 0) {
            showSnackbar('¡Falta el elemento a referenciar!','ico__alerta w','red');
            return false;
        }

        if (document.getElementById('url').value.length == 0) {
            document.getElementById("url").value = window.location;
        }

        document.getElementById('fecha').value = obtenerFechaHoy();
        console.log( document.getElementById('fecha'));
        notificarCrearBitacora(form);

    }

    function notificarCrearBitacora(form){

        Dialog.open({
            title: 'Nueva entrada de bitácora',
            message: 'Va a crear una entrada en el cuaderno de bitácora ¿Desea continuar?',
            color: 'blue',
            ico: 'ico__blog d',
            okText: 'Querido diario:',
            cancelText: 'Necesito corregir algo...',
            onok: () => { form.submit(); }                

        })
    }    

    function showBitacora(id, url) {

        Relation.open( {
            id: id,
            url: url,
        }) 
    }

    function confirmarEliminarBitacora(form){

        Dialog.open({
            title: 'Eliminar relación',
            message: 'Va a eliminar la relación ¿Desea continuar?',
            color: 'red',
            ico: 'ico__papelera d',
            okText: 'Sí',
            cancelText: 'No',
            onok: () => { 
                form.submit(); 
            }                

        })
    }