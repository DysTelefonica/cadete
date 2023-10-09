<?php
    use MVC\Router;
    use ModelGeneral\Version;
    use ModelGeneral\Cita;

    $cita = Cita::cargarCitaAlAzar();
    $v = Version::cargarUltimaVersion();

?>

<footer class=site-footer>

    <div class="wrap">

        <div class="site-footer__up">

            <a class="block__link" href="#page"> 
                <span class="hide">Subir</span>
                <span class="block__opacity"></span>
                <span class="arrow ico__flechaderecha w"></span>
            </a>

        </div>

        <div class="site-footer__content">

            <div class="site-footer__logo">

                <a href="/">
                    <svg class="ico ico__cadete w"> </svg>
                </a>

                <div class="quote">

                    <a href="/citas?id=<?php echo($cita[0]->id); ?>">

                        <div class="cita">
                        "<?php echo($cita[0]->denominador); ?>."
                        </div>

                        <div class="autor">
                            <?php echo($cita[0]->personal); ?>, <?php echo($cita[0]->fecha); ?>
                        </div>

                    </a>

                </div>

            </div>

            <div class="site-footer__social">

                <button 
                    type="button"
                    class="button button__primary button__blue"
                    style="height: 50px"
                    onclick="showBuzon('<?php echo($_SESSION['id_user']); ?>' , '<?php echo($_SERVER['REQUEST_URI']); ?>' )"
                > 
                    <svg class="ico ico__correo w"></svg>
                    
                    <span> Buzón de sugerencias </span>                                                           

                </button>

            </div>

            <div class="site-footer__local">

                <div class="site-footer__version">
                    <svg class="ico ico__version w"></svg>
                    <a href="/versiones?id=<?php echo($v[0]->id);?>"> Versión: <?php echo($v[0]->id);?></a>
                </div>
                
            </div>

        </div>

    </div>

    <div class="site-footer__links">

        <div class="wrap">

            <ul class="menu-footer">

                <li class="list__item">
                    <a href="https://telefonica.com/" 
                        target="_blank"
                        rel="noreferrer noopener"
                    >
                        Telefónica.com
                    </a>
                </li>

                <li class="list__item">
                    <a href="https://intranet.telefonica.com/" 
                        target="_blank"
                        rel="noreferrer noopener"
                    >
                        Intranet
                    </a>
                </li>

                <li class="list__item">
                    <a href="https://edomus.tesa/nw/accessoLdap.do" 
                        target="_blank"
                        rel="noreferrer noopener"
                    >
                        Normatel
                    </a>
                </li>

                <li class="list__item">
                    <a href="https://brandfactory.telefonica.com/hub/326" 
                        target="_blank"
                        rel="noreferrer noopener"
                    >
                        Brand factory
                    </a>
                </li>

                <li class="list__item">
                    <a href="https://performancemanager5.successfactors.eu/usernamehelp?company=Telefonica#/usernameHelp" 
                        target="_blank"
                        rel="noreferrer noopener"
                    >
                        Successfactors
                    </a>
                </li>

                <li class="list__item">
                    <a href="\\datoste\aplicaciones_dys\Aplicaciones PpD\0Lanzadera\ParaLanzadera.accde" 
                        target="_blank"
                        rel="noreferrer noopener"
                    > 
                        <img src="/build/img/layout/IconoAplicacion.ico" height="50" >
                     </a>
                </li>

                <li class="list__item end">
                    <a href="http://www.tinuca.es/menu/" 
                        target="_blank"
                        rel="noreferrer noopener"
                    > 
                        <img src="/build/img/layout/Tinuca.png" alt="Menú del día de Tinuca" height="50" >
                     </a>
                </li>
               
            </ul>

        </div>

    </div>

</footer>