// Obtener elementos del DOM
    var helpBtn = document.getElementById('help__btn');
    var dialogContainer = document.getElementById('dialogContainer');
    var closeButton = document.getElementById('closeButton');

    function fetchHelp(){

        // Muestra el elemento de carga
        loading();

        // Realiza la solicitud AJAX después de que se haya cargado el template
        return fetch('/helpAjax?r=' + window.location.pathname)

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
                loaded();
            });
    };

// Mostrar diálogo cuando se pulsa el botón de ayuda
    helpBtn.addEventListener('click', function() {

        // Procesa la respuesta de la solicitud AJAX aquí. 
        fetchHelp().then(data => {

            // Oculta el elemento de carga
            loadingDiv.style.display = 'none'; 

            //Abre el dialog
            help.open({
                data: data
            })

        })   
    
    });

    const help = {
    
        open (options) {
            options = Object.assign({}, {
                data: [],
                onok: function () { return true},
                oncancel: function () { return false}
            }, options);
    
            const html = `
                <dialog class="help help__opacityLayer">
    
                    <div class="help__window">
    
                        <div class="help__close">
                            <button>
                                <svg class="ico ico__cerrar d"></svg>
                            </button>
                        </div>
    
                        <div class="help__content">
    
                            <div class="help__title">
                                <h2 class="help__title">Ayuda</h2>
                            </div>
    
                            <div class="help__message">
                                <ul id="text__help"></ul>
                            </div>
    
                            <div class="help__title">
                            <h2 class="help__title">Trazabilidad con <a href="/apoyo/informacion-documentada/documentacion-externa/iso_9001_2015">ISO 9001:2015</a></h2>
                            </div>
    
                            <div class="help__message">

                                <ul id="iso__help"></ul>

                            </div>
    
                            <div class="help__title">
                                <h2 class="help__title">Trazabilidad con <a href="/apoyo/informacion-documentada/documentacion-externa/pecal_2110_4">PECAL 2110 Ed.4</a></h2>
                            </div>
    
                            <div class="help__message">
                                <ul id="pecal__help"></ul>
                            </div>
                            
                        </div>
    
                    </div>
    
                </dialog>
            `;
    
            const template = document.createElement('template');
            template.innerHTML = html;
    
            // Elements
            const help = template.content.querySelector('.help');
            const btnClose = template.content.querySelector('.help__close');  
    
            help.addEventListener('click', e => {
                if (e.target === help) {
                    options.oncancel();
                    this._close(help);
                }
            });
    
            [btnClose].forEach(el => {
                el.addEventListener('click', () => {
                    options.oncancel();
                    this._close(help);
                });
            });
    
            document.body.appendChild(template.content);

            //ISO
                var iso_content = document.getElementById('iso__help');

                var iso_data = options.data['iso'];

                var iso_row = `

                <li>

                    <div>

                        <a href='/apoyo/informacion-documentada/documentacion-externa/iso_9001_2015?id={{id}}'>

                            <div>
                                {{codigo_interno}}
                                | 
                                {{denominador}}
                            </div>                                

                        </a>

                    </div>

                </li>

                `;

                if (iso_data.length === 0) {
                    iso_content.innerHTML += 'No se ha encontrado trazabilidad con ISO 9001:2015.';
                }
                else{
                    //recorremos el array
                    iso_data.forEach(function (iso_data) {

                        var iso_data_apartado = iso_data['apartado'];

                        iso_data_apartado.forEach(function (iso_data_apartado) {

                            //Sustituimos los placeholders por el valor de data
                            var newRow = iso_row.replace(/{{id}}/g, iso_data_apartado.id)
                                                .replace(/{{codigo_interno}}/g, iso_data_apartado.codigo_interno)
                                                .replace(/{{denominador}}/g, iso_data_apartado.denominador)
                                                .replace(/{{ruta}}/g, iso_data_apartado.ruta);


                            //Insertamos el código
                            if(iso_content !== null){
                                iso_content.innerHTML += newRow;
                            }                            

                        });
                    
                    });          
                }
        },
    
        _close (help) {
            help.classList.add('help--close');
    
            help.addEventListener('animationend', () => {
                document.body.removeChild(help);
            });
        }
    };