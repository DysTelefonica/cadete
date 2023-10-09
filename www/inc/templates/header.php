<?php

    require_once  __DIR__ . "/../../inc/app.php";

    use ModelGeneral\Personal;
    use ModelGeneral\Buzon;
    use ControllerGeneral\DashboardController;

    //Iniciamos sesión

       $login = iniciarSesion();
       $auth = asignarPermisos($login);
       $_SESSION['auth'] = asignarPermisos($login);


       $alarmas = DashboardController::generarAlarmas();
       $tu_personal = Personal::findByEmail($_SESSION['usuario']);
       $buzon = Buzon::readAllDesatendidas();

?>

<header class="navigationBar" id="navigationBar">

    <div class="navigationBar__logo" id="navigationBar__logo">

        <a href="/">
            <svg class="ico ico__cadete b"> </svg>

        </a>
        
        <div class="descripcion_web">
            Calidad de Defensa de Telefónica
        </div>

    </div>

    <div class="navigationBar__user" id="navigationBar__user">

        <ul class="user">

            <?php if($auth): ?>

                <?php if(isset($buzon) && count($buzon) >= 1){ ?>

                    <li>

                        <button 
                            type="button" 
                            onclick="location.href='/buzon';"
                        > 
                            <svg class="ico ico__correo b"></svg>
                        
                            <span class="text">Sugerencias y errores </span>

                        </button>
                    </li>

                <?php }; ?>

                <li>

                    <button 
                        type="button" 
                        onclick="location.href='/alarmas';"
                    > 
                        <svg class="ico ico__campana b"></svg>

                        <div class="alarmas">

                            <?php if(isset($alarmas[2]) && $alarmas[2] <> ""){ ?>

                                <div class="alarma alarma2">  
                                    <p> <?php echo($alarmas[2]); ?> </p>
                                </div>

                            <?php }; ?>

                            <?php if(isset($alarmas[1]) && $alarmas[1] <> ""){ ?>

                                <div class="alarma alarma1">  
                                    <p> <?php echo($alarmas[1]); ?> </p>
                                </div>

                            <?php }; ?>

                        </div>
                    
                        <span class="text">Alarmas</span>

                    </button>
                </li>
                
                <?php 
                    if( $_SERVER["REQUEST_URI"] == '/' || 
                        $_SERVER["REQUEST_URI"] == '/apoyo/comunicados' || 
                        $_SERVER["REQUEST_URI"] == '/apoyo/comunicados/gestorComunicados'
                    ): 
                ?>
                    <li>
                        <button 
                            type="button" 
                            onclick="location.href='/apoyo/comunicados/gestorComunicados'"
                        > 
                            <svg class="ico ico__noticias b"> </svg>
                            <span class="text">Gestionar comunicados</span>
                        </button>
                    </li>

                <?php endif; ?>
<!-- 
                <li class="bitacora up">

                    <button 
                        type="button" 
                        onclick="showBitacora()"
                    > 
                        <svg class="ico ico__blog b"> </svg>
                        <span class="text">Bitácora</span>
                    </button>

                    <ul>
                        <li> 

                            <button 
                                type="button" 
                                onclick="location.href='/bitacora';"
                            > 
                                <span class="text">Ver Bitácora</span>
                            </button>
                        
                        </li>

                        <li> 
                        
                            <button 
                                type="button" 
                                onclick="showBitacora()"
                            > 
                                <span class="text">Añadir entrada de bitácora</span>
                            </button>
                        
                        </li>
                    </ul>

                </li> -->
                
            <?php endif; ?>

                <li class="profile up" id="btn-usuario">

                    <?php if($login): ?>

                        <a href="/apoyo/recursos/personal/read?id=<?php echo($tu_personal->id);?>">
                            
                                <!-- Nombre -->
                                <?php if(isset($_SESSION['nombre']) && $_SESSION['nombre'] <> "  "): ?>
                                    <span class="link_name"> <?php echo($_SESSION['nombre']) ?> </span> 
                                <?php else:?>
                                    <span class="link_name"> Nombre desconocido </span> 
                                <?php endif;?> 

                                <!-- Avatar -->
                                <img class="ico avatar" src="<?php echo($tu_personal->avatar)?>">

                        </a>

                        <ul>
                            <li> <a href="/apoyo/recursos/personal/read?id=<?php echo($tu_personal->id);?>"> <span class="text"> Ver perfil </span> </a> </li>
                            <li> 
                                <a 
                                    href="/logout?url=<?php echo($_SERVER["REQUEST_URI"]) ?>"> 
                                    <span class="text"> Cerrar sesión </span>
                                </a> 
                            </li>
                        </ul>

                    <?php else: ?>

                        <button 
                            type="button" 
                            onclick="showAuth()"
                        > 
                            <svg class="ico ico__usuario b"> </svg>
                            <span class="text">Iniciar sesión</span>
                        </button>

                    <?php endif; ?>

                </li>             
            
            </li>

        </ul>

    </div>
    
    <div class="navigationBar__nav" id="navigationBar__nav">

        <ul class="nav">

            <li>  <!-- 04. Contexto -->

                <a href="/contexto" class="index">
                    <svg class="ico ico__internet b"> </svg>
                    <span class="link_name"> Contexto </span>
                </a>

                <ul>
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

            </li>

            <li>  <!-- 05. Liderazgo -->
                
                <a href="/liderazgo" class="index">
                    <svg class="ico ico__equipo b"> </svg>
                    <span class="link_name"> Liderazgo </span>
                </a>
                            
                <ul>
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

            </li>

            <li> <!-- 06. Planificación -->
                
                <a href="/planificacion" class="index">
                    <svg class="ico ico__diana b"> </svg>
                    <span class="link_name"> Planificación </span>
                </a>
                
                <ul>
                    <li>
                        <a href="/planificacion/riesgos-oportunidades">     
                            <svg class="ico ico__teatro  b"></svg>          
                            <span class="text">Acciones para abordar riesgos y oportunidades del sistema</span> 
                        </a>
                    </li>

                    <li>
                        <a href="/obras">                 
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

            </li>

            <li> <!-- 07. Apoyo -->
                
                <a href="/apoyo" class="index">
                    <svg class="ico ico__callcenter b"> </svg>
                    <span class="link_name"> Apoyo </span>
                </a>

                <ul>

                    <li>
                        <a href="/apoyo/recursos/personal">
                            <svg class="ico ico__subidaDinero b"></svg>     
                            <span class="text"> Recursos <p class="subtext"> Personal </p></span> 
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
                            <span class="text"> Información documentada </span> </span>
                        </a>
                    </li>

                </ul>

            </li>
            
            <li> <!-- 08. Operación -->
                
                <a href="/operacion" class="index">
                    <svg class="ico ico__serviciotecnico b"> </svg>
                    <span class="link_name"> Operación </span>
                </a>

                <ul>

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

            </li>

            <li> <!-- 09. Desmpeño -->
                
                <a href="/desempeno" class="index">
                    <svg class="ico ico__podium b"> </svg>
                    <span class="link_name"> Ev. del Desempeño </span>
                </a>

                <ul>

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

            </li>

            <li> <!-- 10. Mejora -->
                
                <a href="/mejora" class="index">
                    <svg class="ico ico__progreso b"> </svg>
                    <span class="link_name"> Mejora </span>
                </a>

                <ul>

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

            </li>

        </ul>

    </div>

</header>

