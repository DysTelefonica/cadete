window.addEventListener('scroll', function() {

  //Oculta el menu hamburguesa cuando se ve el header
    var header = document.querySelector('header');
    var scrollMenu = document.querySelector('#scroll-menu-open');
    
    var headerHeight = header.offsetHeight;
    var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    
    if (scrollTop > headerHeight) {
      scrollMenu.style.display = 'flex';
    } else {
      scrollMenu.style.display = 'none';
    }

 //Oculta el botón de subir cuando se llega al footer o llega al top, y lo muestra cuando no se ve.
      var footer = document.querySelector('footer');
      var helpButton = document.getElementById('up__btn');

      var footerRect = footer.getBoundingClientRect();
      var windowHeight = window.innerHeight || document.documentElement.clientHeight;
      var scrollTop = window.pageYOffset || document.documentElement.scrollTop;

      var isFooterVisible = footerRect.top <= windowHeight && footerRect.bottom >= 0;
      var isButtonVisible = scrollTop > 0;

      if (isFooterVisible || !isButtonVisible) {
        helpButton.style.display = 'none';
      } else {
        helpButton.style.display = 'flex';
      }
});

// Mostrar el menú desplegable cuando se pulsa el botón hamburguesa

  var openMenu = document.querySelector('#scroll-menu-open');

  openMenu.addEventListener('click', function() {

    scroll_menu.open({})

  });

  const scroll_menu = {
    
    open (options) {
        options = Object.assign({}, {
            onok: function () { return true},
            oncancel: function () { return false}
        }, options);
  
        const html = `
        <dialog class="scroll_menu__window">
  
        <div class="scroll_menu__header">
    
            <div class="navigationBar__logo" id="navigationBar__logo">
    
                <a href="/">
                    <svg class="ico ico__cadete b"> </svg>
    
                </a>
    
                <div class="descripcion_web">
                    Calidad de Defensa de Telefónica
                </div>
    
            </div>
    
            <div class="scroll_menu__close">
                <button>
                    <svg class="ico ico__cerrar b"></svg>
                </button>
            </div>
    
        </div>
        
        <div class="scroll_menu__content">
    
            <div class="scroll_menu__left">
    
                <ul>
    
                    <li>  <!-- 04. Contexto -->
    
                        <a href="/contexto" class="index">
                            <svg class="ico ico__internet b"> </svg>
                            <span class="link_name">Contexto</span>
                        </a>
    
                        <button class="submenu-view active">
                            <svg class="ico ico__anadirmas b"> </svg>
                        </button>
    
                    </li>
    
                    <li>  <!-- 05. Liderazgo -->
                        
                        <a href="/liderazgo" class="index">
                            <svg class="ico ico__equipo b"> </svg>
                            <span class="link_name">Liderazgo</span>
                        </a>
    
                        <button class="submenu-view">
                            <svg class="ico ico__anadirmas b"> </svg>
                        </button>
    
                    </li>
    
                    <li> <!-- 06. Planificación -->
                        
                        <a href="/planificacion" class="index">
                            <svg class="ico ico__diana b"> </svg>
                            <span class="link_name">Planificación</span>
                        </a>
    
                        <button class="submenu-view">
                            <svg class="ico ico__anadirmas b"> </svg>
                        </button>
    
                    </li>
    
                    <li> <!-- 07. Apoyo -->
                        
                        <a href="/apoyo" class="index">
                            <svg class="ico ico__callcenter b"> </svg>
                            <span class="link_name">Apoyo</span>
                        </a>
    
                        <button class="submenu-view">
                            <svg class="ico ico__anadirmas b"> </svg>
                        </button>
    
                    </li>
                    
                    <li> <!-- 08. Operación -->
                        
                        <a href="/operacion" class="index">
                            <svg class="ico ico__serviciotecnico b"> </svg>
                            <span class="link_name">Operación</span>
                        </a>
    
                        <button class="submenu-view">
                            <svg class="ico ico__anadirmas b"> </svg>
                        </button>
    
                    </li>
    
                    <li> <!-- 09. Desempeño -->
                        
                        <a href="/desempeno" class="index">
                            <svg class="ico ico__podium b"> </svg>
                            <span class="link_name">Ev. del Desempeño</span>
                        </a>
    
                        <button class="submenu-view">
                            <svg class="ico ico__anadirmas b"> </svg>
                        </button>
    
                    </li>
    
                    <li> <!-- 10. Mejora -->
                        
                        <a href="/mejora" class="index">
                            <svg class="ico ico__progreso b"> </svg>
                            <span class="link_name">Mejora  </span>
                        </a>
    
                        <button class="submenu-view">
                            <svg class="ico ico__anadirmas b"> </svg>
                        </button>
    
                    </li>
    
                </ul>   
    
            </div>
    
            <div class="scroll_menu__right">
    
                <ul class="submenu active"> <!-- 04. Contexto -->
                    <li> 
                        <a href="/contexto/analisisContexto">      
                            <svg class="ico ico__internet b"></svg>     
                            <span class="text">Comprensión de la organización y de su contexto</span> 
                        </a> 
                    </li>
    
                    <li> 
                        <a href="/contexto/partesinteresadas">     
                            <svg class="ico ico__miembros b"></svg>     
                            <span class="text">Necesidades y expectativas de las Partes Interesadas</span> 
                        </a> 
                    </li>
    
                    <li> 
                        <a href="/contexto/alcance">               
                            <svg class="ico ico__target b"></svg>       
                            <span class="text">Determinación del Alcance del sistema de gestón de la calidad</span> 
                        </a> 
                    </li>
    
                    <li> 
                        <a href="/contexto/procesos">              
                            <svg class="ico ico__intranet b"></svg>     
                            <span class="text">Sistema de gestión de la calidad y sus procesos</span> 
                        </a> 
                    </li>
    
                    <li> 
                        <a href="/contexto/mision">                
                            <svg class="ico ico__bandera b"></svg>      
                            <span class="text">Misión y visión</span> 
                        </a> 
                    </li>

                    
                    <li> 
                        <a href="https://www.telefonica.es/es/nosotros/telefonica-en-espana/politica-de-calidad/certificados/" target='_blank'>                
                            <svg class="ico ico__certificado b"></svg>      
                            <span class="text">Certificados</span> 
                        </a> 
                    </li>
    
                </ul>
                                    
                <ul class="submenu"> <!-- 05. Liderazgo -->
                    <li>
                        <a href="/liderazgo/liderazgo"> 
                            <svg class="ico ico__equipo b"></svg>   
                            <span class="text">Liderazgo y compromiso  </span>
                        </a>
                    </li>
    
                    <li>
                        <a href="/liderazgo/politica">  
                            <svg class="ico ico__museo b"></svg>    
                            <span class="text">Política </span>
                        </a>
                    </li>
    
                    <li>
                        <a href="/liderazgo/roles">     
                            <svg class="ico ico__cuidar b"></svg>   
                            <span class="text">Roles, responsabilidades y autoridades en la organización </span>
                        </a>
                    </li>
    
                </ul>
                        
                <ul class="submenu"> <!-- 06. Planificación -->
                    <li>
                        <a href="/planificacion/riesgos-oportunidades">     
                            <svg class="ico ico__teatro  b"></svg>          
                            <span class="text">Acciones para abordar riesgos y oportunidades del sistema</span> 
                        </a>
                    </li>
    
                    <li>
                        <a href="/planificacion/objetivos">                 
                            <svg class="ico ico__diana b"></svg>            
                            <span class="text">Objetivos de la calidad y planificación para lograrlos</span> 
                        </a>
                    </li>
    
                    <li>
                        <a href="/planificacion/proyectos-mejora">          
                            <svg class="ico ico__copa b"></svg>             
                            <span class="text">Proyectos de mejora <p class="subtext">Planificación de los cambios</p></span>
                        </a>
                    </li>
    
                    <li>
                        <a href="/planificacion/planificacion-cambios">     
                            <svg class="ico ico__rutarecorrido b"></svg>    
                            <span class="text">Planes de acción  <p class ="subtext">Planificación de los cambios</p> </span> 
                        </a>
                    </li>
    
                </ul>
    
                <ul class="submenu"> <!-- 07. Apoyo -->
    
                    <li>
                        <a href="/obras">
                            <svg class="ico ico__subidaDinero b"></svg>     
                            <span class="text"> Recursos </span> 
                        </a>
                    </li>
    
                    <li>
                        <a href="/obras">
                            <svg class="ico ico__edificio b"></svg>     
                            <span class="text"> Competencia </span>
                        </a>
                    </li>
    
                    <li>
                        <a href="/obras">
                            <svg class="ico ico__cerebro b"></svg>     
                            <span class="text"> Toma de conciencia </span>
                        </a>
                    </li>
    
                    <li>
                        <a href="/apoyo/comunicados">
                            <svg class="ico ico__noticias b"></svg> 
                            <span class="text"> Comunicación </span>
                        </a>
                    </li>
    
                    <li>
                        <a href="/apoyo/informacion-documentada">
                            <svg class="ico ico__documento b"></svg>
                            <span class="text"> Información documentada </span>
                        </a>
                    </li>
    
                </ul>
    
                <ul class="submenu"> <!-- 08. Operación -->
    
                    <li> 
                        <a href="/obras">
                            <svg class="ico ico__serviciotecnico b"></svg>     
                            <span class="text"> Planificación y control operacional </span> 
                        </a>
                    </li>
    
                    <li> 
                        <a href="/obras">
                            <svg class="ico ico__carrito b"></svg>     
                            <span class="text"> Requisitos para los productos y servicios </span>
                        </a>
                    </li>
    
                    <li> 
                        <a href="/obras">
                            <svg class="ico ico__regla b"></svg>     
                            <span class="text"> Diseño y desarrollo de productos y servicios </span>
                        </a>
                    </li>
    
                    <li> 
                        <a href="/obras">
                            <svg class="ico ico__maletas_carro b"></svg>     
                            <span class="text"> Control de procesos, productos y servicios suministrados externamente </span>
                        </a>
                    </li>
    
                    <li> 
                        <a href="/obras">
                            <svg class="ico ico__caja b"></svg>     
                            <span class="text"> Producción y provisión del servicio </span>
                        </a>
                    </li>
    
                    <li> 
                        <a href="/obras">
                            <svg class="ico ico__camion b"> </svg>
                            <span class="text"> Liberación de los productos </span>
                        </a>
                    </li>
    
                    <li> 
                        <a href="/obras">
                            <svg class="ico ico__cancelar b"> </svg>
                            <span class="text"> Control de salidas no conformes </span>
                        </a>
                    </li>
    
                </ul>
    
                <ul class="submenu"> <!-- 09. Desmpeño -->
    
                    <li> 
                        <a href="/obras">
                            <svg class="ico ico__velocidad b"></svg>  
                            <span class="text"> Seguimiento, medición. análisis y evaluación </span> 
                        </a>
                    </li>
    
                    <li> 
                        <a href="/obras">
                            <svg class="ico ico__podium b"></svg>  
                            <span class="text"> Auditoría </span>
                        </a>
                    </li>   
    
                    <li> 
                        <a href="/obras">
                            <svg class="ico ico__grupo b"></svg>  
                            <span class="text"> Revisión por la dirección <p class ="subtext">Revisión por la dirección</p> </span>
                        </a>
                    </li>
    
                    <li> 
                        <a href="/obras">
                            <svg class="ico ico__grupo b"></svg>  
                            <span class="text"> Reuniones de comité <p class ="subtext">Revisión por la dirección</p> </span>
                        </a>
                    </li>
    
                </ul>
    
                <ul class="submenu"> <!-- 10. Mejora -->
    
                    <li> 
                        <a href="/obras">
                            <svg class="ico ico__progreso b"></svg>  
                            <span class="text"> No Conformidad y acción correctiva </span>
                        </a> 
                    </li>
    
                    <li> 
                        <a href="/obras">
                            <svg class="ico ico__progreso b"></svg>  
                            <span class="text"> Mejora continua </span>
                        </a> 
                    </li>
    
                </ul>
    
            </div>
    
        </div>
    
    </dialog>
        `;
  
        const template = document.createElement('template');
        template.innerHTML = html;
  
        // Elements
        const scroll_menu = template.content.querySelector('.scroll_menu__window');
        const btnClose = template.content.querySelector('.scroll_menu__close');  
  
        [btnClose].forEach(el => {
            el.addEventListener('click', () => {
                options.oncancel();
                this._close(scroll_menu);
            });
        });
  
        document.body.appendChild(template.content);
    },
  
    _close (scroll_menu) {
        scroll_menu.classList.add('scroll_menu--close');
  
        scroll_menu.addEventListener('animationend', () => {
            document.body.removeChild(scroll_menu);
        });
    }
  
  };


//Script para mostrar el submenu

  // Crear una instancia de MutationObserver con una función de devolución de llamada
    const observer = new MutationObserver(function(mutationsList) {

    // Iterar sobre las mutaciones detectadas
      for (let mutation of mutationsList) {

      // Verificar si se ha agregado un nodo al DOM
        if (mutation.type === 'childList') {

          // Buscar los elementos cuando estén disponibles
            let left = document.getElementsByClassName("scroll_menu__left")[0];
            let right = document.getElementsByClassName("scroll_menu__right")[0];

            if (left) {

              let panel = left.getElementsByTagName("button");

                for (let i = 0; i < panel.length; i++) {

                  panel[i].addEventListener("click", function() {
                    // Quita el botón activo
                    left.getElementsByClassName("active")[0].classList.remove("active");

                    // Pone el botón activo
                    panel[i].classList.add("active");

                    // Ponemos el contenido según la pestaña seleccionada
                    right.getElementsByClassName("active")[0].classList.remove("active");
                    right.getElementsByTagName("ul")[i].classList.add("active");
                  });
                }

              // Detener la observación una vez que se hayan encontrado los elementos
                observer.disconnect();
            }
        }
    }
  });

  // Observar los cambios en el nodo padre del diálogo (ajusta el selector según tu estructura HTML)
  observer.observe(document.body, { childList: true, subtree: true });