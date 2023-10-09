// Obtener elementos del DOM
    var adjuntBtn = document.getElementById('adjunt__btn');
    var dialogContainer = document.getElementById('dialogContainer');
    var closeButton = document.getElementById('closeButton');      

    function fetchAdjunt(id){

        // Muestra el elemento de carga
        loading();

        // Realiza la solicitud AJAX después de que se haya cargado el template
        return fetch('/fetchAdjuntAjax?id=' + id)

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

    function openDocument(id){

        // Procesa la respuesta de la solicitud AJAX aquí. 
        fetchAdjunt(id).then(data => {

            //Si hay más de un archivo adjunto, te abre un menú de elección
            if(data.length > 1){

                //Abre el dialog
                adjuntDialog.open({
                    data: data
                })

            //Si solo hay un archivo adjunto, lo abre/descarga automaticamente
            }else{

                window.open('/gestorArchivos?r=' + data[0].id);

            }          

            // Oculta el elemento de carga
            loaded();

        })

    };

    function descargarArchivo(ruta, nombre_del_archivo){

        // Crear un elemento <a> para simular el clic y descargar el archivo
        var enlaceDeDescarga = document.createElement('a');
        enlaceDeDescarga.href = ruta;
        enlaceDeDescarga.target = "_blank";
        enlaceDeDescarga.download = nombre_del_archivo; // Puedes establecer el nombre del archivo aquí
        enlaceDeDescarga.style.display = 'none';

        // Agregar el elemento <a> al DOM
        document.body.appendChild(enlaceDeDescarga);

        // Simular un clic en el enlace para iniciar la descarga
        enlaceDeDescarga.click();

        // Eliminar el elemento <a> del DOM después de la descarga
        document.body.removeChild(enlaceDeDescarga);

    }

    const adjuntDialog = {
        
        open (options) {
            
            options = Object.assign({}, {
                data: [],
                onok: function () { return true},
                oncancel: function () { return false}
            }, options);

            const html = `
                <dialog class="adjunt_dialog adjunt_dialog__opacityLayer">

                    <div class="adjunt_dialog__window">

                        <div class="adjunt_dialog__close">
                            <button>
                                <svg class="ico ico__cerrar d"></svg>
                            </button>
                        </div>

                        <div class="adjunt_dialog__content">

                        <div class="relation__title">

                            <h1> El registro tiene más de un documento adjunto, ¿Cuál desea ver/descargar?</h1>

                        </div> 

                            <div class="relation__body">

                                <ul class="download__list" id="table_adjunt"> </ul>

                            </div> 

                        </div>

                    </div>

                </dialog>
            `;

            const template = document.createElement('template');
            template.innerHTML = html;

            // Elements
            const adjunt_dialog =   template.content.querySelector('.adjunt_dialog');
            const btnClose =        template.content.querySelector('.adjunt_dialog__close');  

            adjunt_dialog.addEventListener('click', e => {
                if (e.target === adjunt_dialog) {
                    options.oncancel();
                    this._close(adjunt_dialog);
                }
            });
                
            function cargarTabla(){

                //Obtenemos el valor escrito
                var data = options.data;
                var table = adjunt_dialog.querySelector('#table_adjunt');

                //Definimos el row
                var row = `

                    <li class="download__item">

                    <div class="download__archive">

                        <a 
                            href='/gestorArchivos?r={{id}}'
                            target="_blank"
                        >
                            <div class="download__title">
                                <svg 
                                    class="ico {{icono}} d icoChange"
                                    id="icoChange"                              
                            
                                ></svg>
                               {{nombreAdjunto}}
                            </div>

                            <div class="download__info">
                                {{tipoAdjunto}}
                                
                                | 

                                {{bytes}}                                 

                            </div>

                        </a>

                    </div>

                </li>

                `;

                //Construimos la tabla con los resultados
                table.innerHTML = '';

                //Si no se encuentran resultados, da un mensaje de feedback
                if (data.length === 0) {
                    table.innerHTML += 'No se han encontrado registros con la consulta realizada.';
                }
                else{

                    //recorremos el array
                    data.forEach(function (data) {

                        //Sustituimos los placeholders por el valor de data
                        var newRow = row.replace(/{{id}}/g, data.id)
                                            .replace(/{{nombreAdjunto}}/g, data.nombreAdjunto)
                                            .replace(/{{tipoAdjunto}}/g, data.tipoAdjunto)
                                            .replace(/{{icono}}/g, data.icono)
                                            .replace(/{{bytes}}/g, data.bytes)
                                            .replace(/{{elementoSistema}}/g, data.elementoSistema)
                                            .replace(/{{rutaAdjunto}}/g, data.rutaAdjunto);

                            

                        //Insertamos el código
                        table.innerHTML += newRow;
                    
                    }); 

                }
            }

            [btnClose].forEach(el => {
                el.addEventListener('click', () => {
                    options.oncancel();
                    this._close(adjunt_dialog);
                });
            });

            document.body.appendChild(template.content);

            cargarTabla();
           
        },

        _close (adjunt_dialog) {
            adjunt_dialog.classList.add('adjunt_dialog--close');

            adjunt_dialog.addEventListener('animationend', () => {
                document.body.removeChild(adjunt_dialog);
            });
        }

    };