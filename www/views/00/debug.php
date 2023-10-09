
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
                        action="/buzon"
                        style="padding: 0px"
                    >
    
                        <input 
                            type="hidden"
                            name="id_item1"
                            id="id_item1"
                            value='${options.id}'
                        >

                        <input 
                            type="hidden"
                            name="url"
                            id="url"
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
    
    </dialog>