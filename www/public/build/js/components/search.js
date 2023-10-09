// Obtener elementos del DOM
    var searchBtn = document.getElementById('search__btn');
    var dialogContainer = document.getElementById('dialogContainer');
    var closeButton = document.getElementById('closeButton');

    function fetchArray(){

        // Muestra el elemento de carga
        loading();

        // Realiza la solicitud AJAX después de que se haya cargado el template
        return fetch('/searchAjax')

            .then(response => {

                if (response.ok) {
                    return response.json();
                }
                throw new Error('Error en la respuesta de la solicitud AJAX');
                
                })
                    

            .catch(error => {

                // Maneja cualquier error ocurrido durante la solicitud AJAX
                console.error('Error en la solicitud AJAX:', error);

                // Oculta el elemento de carga
                loadingDiv.style.display = 'none'; 
            });
    };

    // Mostrar diálogo cuando se pulsa el botón de ayuda
    searchBtn.addEventListener('click', function() {

        // Procesa la respuesta de la solicitud AJAX aquí. 
        fetchArray().then(data => {

            // Oculta el elemento de carga
            loaded();

            //Abre el dialog
            search.open({
                data: data
            })

        })

    });

    const search = {
        
        open (options) {
            options = Object.assign({}, {
                data: [],
                onok: function () { return true},
                oncancel: function () { return false}
            }, options);

            const html = `
                <dialog class="search_dialog search_dialog__opacityLayer">

                    <div class="search_dialog__window">

                        <div class="search_dialog__close">
                            <button>
                                <svg class="ico ico__cerrar d"></svg>
                            </button>
                        </div>

                        <div id="loadingDiv">
                            <div class="spinner"></div>
                        </div>

                        <div class="search_dialog__content">

                            <div class="search-bar" id="search-bar">
                                <svg class="ico ico__buscar d"> </svg>   
                                <input type="text" id="search-input" class="search-input" autocomplete="off" placeholder="Buscar en Telefónica Cadete"> 
                            </div>

                            <div class="resultado">

                                <div class="relation__body">

                                    <ul class="download__list" id="table_search">

                                    </ul>

                                </div> 

                            </div>

                        </div>

                    </div>

                </dialog>
            `;

            var row = `

                <li class="download__item">

                    <div class="download__archive">

                        <a href='{{rutaIndex}}{{id}}'>
                            <div class="download__title">
                                <svg class="ico {{ico}} d icoChange"></svg>
                                {{denominador}}
                            </div>

                            <div class="download__info">
                                {{codigo_interno}}
                                |
                                {{elementoSistema}}                     
                            </div>                                   

                        </a>

                    </div>

                </li>

            `;

            const template = document.createElement('template');
            template.innerHTML = html;

            // Elements
            const search_dialog =   template.content.querySelector('.search_dialog');
            const search =          template.content.getElementById('search-bar');
            const btnClose =        template.content.querySelector('.search_dialog__close');  
            const loadingDiv =      template.content.getElementById('loadingDiv');

            search_dialog.addEventListener('click', e => {
                if (e.target === search_dialog) {
                    options.oncancel();
                    this._close(search_dialog);
                }
            });
            
            search.addEventListener('keyup', function(event) {  

                //Obtenemos el valor escrito
                var value = event.target.value;
                var data = options.data;
                var table = document.getElementById('table_search');
    
                if(value != "" && value.length > 1){

                    //Ponemos la animación de carga
                    loadingDiv.style.display = 'flex'; 

                    //Cargamos todos los datos y los comparamos
                    var filter = searchTable(value, data);  

                    //Construimos la tabla con los resultados
                    table.innerHTML = '';

                    //Si no se encuentran resultados, da un mensaje de feedback
                    if (filter.length === 0) {
                        table.innerHTML += 'No se han encontrado registros con la consulta realizada.';
                    }
                    else{

                        //recorremos el array
                        filter.forEach(function (filter) {

                            //Sustituimos los placeholders por el valor de data
                            var newRow = row.replace(/{{id}}/g, filter.id)
                                            .replace(/{{codigo_interno}}/g, filter.codigo_interno)
                                            .replace(/{{denominador}}/g, filter.denominador)
                                            .replace(/{{indicador}}/g, filter.indicador)
                                            .replace(/{{elementoSistema}}/g, filter.elementoSistema)
                                            .replace(/{{rutaIndex}}/g, filter.rutaIndex)
                                            .replace(/{{ico}}/g, filter.ico)
                                            .replace(/{{estado}}/g, filter.estado);

                            //Insertamos el código
                            table.innerHTML += newRow;
                        
                        });          
                    }
                }
                else{
                    //Vaciamos la tabla
                    table.innerHTML = '';

                };

                //Quitamos la animación de carga
                loadingDiv.style.display = 'none'; 
            
            });

            [btnClose].forEach(el => {
                el.addEventListener('click', () => {
                    options.oncancel();
                    this._close(search_dialog);
                });
            });

            document.body.appendChild(template.content);
        },

        _close (search_dialog) {
            search_dialog.classList.add('search_dialog--close');

            search_dialog.addEventListener('animationend', () => {
                document.body.removeChild(search_dialog);
            });
        }
    };


