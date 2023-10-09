<head>

    <!-- Título -->
        <title> Procesos | <?php echo $_SESSION["nombreApp"]; ?></title>

    <!-- Icono -->
        <link rel="shortcut icon" href="/build/img/layout/Internet_2Regular.svg">

    <!-- Autentificación -->

        <?php

            if(!isset($_SESSION)){
                session_start();
            }
            
            $auth = $_SESSION['login'] ?? false;

        ?>

</head>

<body>

    <main>

        <!-- Breadcrumb -->

            <nav class="breadcrumb">

                <ol class="breadcrumb__list">

                    <li class="breadcrumb__item"> <svg class="ico ico__puntos b"> </svg> </li>
                    <li class="breadcrumb__item"> <a href="/"> Inicio </a> </li>
                    <li class="breadcrumb__item"> <span> / </span> </li>               
                    <li class="breadcrumb__item"> <a href="/contexto"> Contexto </a> </li>
                    <li class="breadcrumb__item"> <span> / </span> </li>               
                    <li class="breadcrumb__item actual"> <a href="/contexto/procesos"> Procesos </a> </li>

                </ol>

            </nav>

        <!-- Artículo -->

            <article>

                <header class="entry-header">
                    <h1>
                        <svg class="ico ico__intranet d"></svg>
                        Sistema de gestión y sus procesos
                    </h1>
                </header>

                <div class="entry-content">

                    <div class="block">

                        <div class="block__content">
                            <p>
                                Dentro del escenario que constituye el sistema integrado, cobra especial 
                                relevancia la adopción del enfoque basado en procesos.
                            </p>
                            
                            <p>
                                Telefónica consta de procesos interrelacionados, en los cuales se describenlas actividades
                                que se realizan en la casa. Todos estos procesos están recogidos en la
                               
                                de Telefónica de España.
                            </p>

                            <p>
                                DyS tiene identificados los procesos que configuran la gestión de su actividad 
                                y sus interrelaciones, los cuales están incluidos en el 
                                <a href="https://telefonica-pp103514.boc-cloud.com/main.view?forceConnectorType=SAML#0" target="_blank"> mapa de procesos de Telefónica</a>, la cual es una lista completa de los procesos de las Direcciones 
                                Generales de Telefónica en las cuales se apoya DyS para realizar su labor. 
                                
                                En este 
                                <a href="https://telefonica-pp103514.boc-cloud.com/main.view?forceConnectorType=SAML#0" target="_blank"> mapa de procesos</a>
                                se establecen los criterios, metodología y normativa, 
                                necesarios para su operatividad y control, así como la asignación de los recursos 
                                pertinentes.
                            </p>

                            <p>
                                DyS, para la ejecución de los contratos con el Ministerio de Defensa, realiza los siguientes procesos:
                            </p>

                        </div>

                    <div class="block__media">

                        <div class="block__img" style="background-image: url(/build/img/content/Empresarios-con-tableta-digital-trabajando-hasta-tarde-en-la-oficina.jpg)"></div>

                    </div>

                </div>

            </article>

            <div class="block__table">

                <div class="table__header">

                    <div class="table__title">
                        <h2>
                            <svg class="ico ico__intranet d"></svg>
                            Procesos del área de Defesa y Seguridad (DyS)
                        </h2>
                    </div>

                    <?php if($auth): ?>

                        <div class="table__button">

                            <div class="tooltip">

                                <button 
                                    type="button" 
                                    class="button button__primary button__regular button__green"
                                    onclick="location.href='/contexto/procesos/create';"
                                > 
                                    <svg class="ico ico__anadirmas w"></svg>
                                    <!-- <span>Añadir</span> -->
                                </button>

                                <span class="tooltiptext">Añadir proceso de DyS</span>

                            </div>

                        </div>      
                    
                    <?php endif; ?>

                </div>

                <table>  

                    <thead>
                        <th> Código</th>
                        <th class='ocultarColumna'>id</th>
                        <th> Denominador</th>
                        <th></th>
                    </thead>

                    <tbody>
                        
                        <?php  foreach ($procesosDYS as $proceso): ?>

                                <tr class='linea'>
                                    <td onclick="location.href='/contexto/procesos/read?id=<?php echo $proceso->id ?>'">  <?php echo $proceso->codigo_interno ?> </td>
                                    <td class='ocultarColumna'>  <?php echo $proceso->id ?> </td>
                                    <td onclick="location.href='/contexto/procesos/read?id=<?php echo $proceso->id ?>'">  <?php echo $proceso->denominador ?> </td>

                                    <td onclick="location.href='/contexto/procesos/read?id=<?php echo $proceso->id ?>'">  

                                        <div class="btn-group">

                                            <form 
                                                method="POST" 
                                                action="/contexto/procesos/delete" 
                                                id="delete__Proceso"
                                            >
                                            
                                                <!-- ID -->
                                                <input 
                                                    type="hidden"
                                                    name="id"
                                                    id="id"
                                                    value="<?php echo $proceso->id ?>" 
                                                >

                                                <div class="tooltip">

                                                    <button 
                                                        type="button" 
                                                        class="button button__primary button__small button__blue"
                                                        onclick="location.href='/contexto/procesos/read?id=<?php echo $proceso->id ?>'"
                                                    > 
                                                        <svg class="ico ico__ojo w"></svg>
                                                        
                                                    </button>

                                                    <span class="tooltiptext">Ver ficha del proceso</span>

                                                </div>

                                                <div class="tooltip">

                                                    <button 
                                                        type="button" 
                                                        class="button button__primary button__small button__blue"
                                                        onclick="window.open('<?php echo $proceso->href ?>'), '_blank'"
                                                    > 
                                                        <svg class="ico ico__intranet w"></svg>
                                                        
                                                    </button>

                                                    <span class="tooltiptext">Ver proceso en la intranet de Telefónica</span>

                                                </div>

                                                <?php if($auth): ?>

                                                    <div class="tooltip">

                                                        <button 
                                                            type="button" 
                                                            class="button button__primary button__small button__yellow"
                                                            onclick="location.href='/contexto/procesos/update?id=<?php echo $proceso->id ?>'"
                                                        > 
                                                            <svg class="ico ico__lapicero w"></svg>
                                                        
                                                        </button>

                                                        <span class="tooltiptext">Modificar proceso</span>

                                                    </div>

                                                    <div class="tooltip">

                                                        <button 
                                                            type="button" 
                                                            class="button button__primary button__small button__red"
                                                            onclick="notificarEliminar(this.form, '<?php echo $proceso->id;?>', '<?php echo $proceso->codigo_interno;?>')"
                                                        > 
                                                            <svg class="ico ico__papelera w"></svg>
                                                        
                                                        </button>

                                                        <span class="tooltiptext">Eliminar proceso</span>

                                                    </div>
                                                
                                                <?php endif; ?>

                                            </form>
                                            
                                        </div>

                                    </td>

                                </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>

                <div class="table__content">

                    <p>
                        DyS dispone de un 
                        <a href="/gestorArchivos?r=000300.231003.170123.209615" target="_blank">Flujograma</a> 
                        donde se desarrollan más en detalle todas las fases, actores y documentación de entrada y salida de
                        cada uno de los procesos.
                    </p>

                    <p>
                        A su vez, DyS dispone de una sistemática de 
                        <a href="/obras" >indicadores de proceso</a>
                        medición (cuando sea aplicable) y análisis de los procesos, de manera que permiten 
                        contrastar la información resultante con las previsiones de la planificación, 
                        implantando en su caso las acciones pertinentes para asegurar la consecución de 
                        los objetivos establecidos. 
                    </p>

                    <p>
                        El seguimiento de estos indicadores es punto de partida 
                        para la detección de oportunidades de mejora que contribuyan a mantener la mejora 
                        continua del sistema de calidad.
                    </p>

                </div>

            </div>

            <div class="block__table">

                <div class="table__header">

                    <div class="table__title">
                        <h2>
                            <svg class="ico ico__intranet d"></svg>
                            Procesos de Telefónica Matriz
                        </h2>
                    </div>

                    <?php if($auth): ?>

                        <div class="table__button">

                            <div class="tooltip">

                                <button 
                                    type="button" 
                                    class="button button__primary button__regular button__green"
                                    onclick="location.href='/contexto/procesos/create';"
                                > 
                                    <svg class="ico ico__anadirmas w"></svg>
                                    <!-- <span>Añadir</span> -->
                                </button>

                                <span class="tooltiptext">Añadir proceso de Telefónica matriz</span>

                            </div>

                        </div>      
                    
                    <?php endif; ?>

                </div>

                <table>  

                    <thead>
                        <th> Código</th>
                        <th class='ocultarColumna'>id</th>
                        <th> Denominador</th>
                        <th></th>
                    </thead>

                    <tbody>
                        
                        <?php  foreach ($procesosTDE as $proceso): ?>

                                <tr class='linea'>
                                    <td onclick="location.href='/contexto/procesos/read?id=<?php echo $proceso->id ?>'">  <?php echo $proceso->codigo_interno ?> </td>
                                    <td class='ocultarColumna'>  <?php echo $proceso->id ?> </td>
                                    <td onclick="location.href='/contexto/procesos/read?id=<?php echo $proceso->id ?>'">  <?php echo $proceso->denominador ?> </td>

                                    <td onclick="location.href='/contexto/procesos/read?id=<?php echo $proceso->id ?>'"> 

                                        <div class="btn-group">

                                            <form 
                                                method="POST" 
                                                action="/contexto/procesos/delete" 
                                                id="delete__Proceso"
                                            >

                                                <!-- ID -->
                                                <input 
                                                    type="hidden"
                                                    name="id"
                                                    id="id"
                                                    value="<?php echo $proceso->id ?>" 
                                                >

                                                <div class="tooltip">

                                                    <button 
                                                        type="button" 
                                                        class="button button__primary button__small button__blue"
                                                        onclick="location.href='/contexto/procesos/read?id=<?php echo $proceso->id ?>'"
                                                    > 
                                                        <svg class="ico ico__ojo w"></svg>
                                                    
                                                    </button>

                                                    <span class="tooltiptext">Ver ficha del proceso</span>

                                                </div>

                                                <div class="tooltip">

                                                    <button 
                                                        type="button" 
                                                        class="button button__primary button__small button__blue"
                                                        onclick="window.open('<?php echo $proceso->href?>'), '_blank'"
                                                    > 
                                                        <svg class="ico ico__intranet w "></svg>
                                                    
                                                    </button>

                                                    <span class="tooltiptext">Ver proceso en la intranet de Telefónica</span>

                                                </div>

                                                <?php if($auth): ?>

                                                    <div class="tooltip">

                                                        <button 
                                                            type="button" 
                                                            class="button button__primary button__small button__red"
                                                            onclick="notificarEliminar(this.form, '<?php echo $proceso->id;?>', '<?php echo $proceso->codigo_interno;?>')"
                                                        > 
                                                            <svg class="ico ico__papelera w"></svg>
                                                        
                                                        </button>

                                                        <span class="tooltiptext">Eliminar proceso</span>

                                                    </div>
                                                
                                                <?php endif; ?>

                                            </form>
                                            
                                        </div>

                                    </td>

                                </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

            <article>

            <div class="entry-content">

                <div class="block">

                    <div class="block__content">

                        <h2>
                            <svg class="ico ico__intranet d"></svg>
                            Procesos de compras
                        </h2>

                        <h3> 1.- Dar de alta a un proveedor </h3>

                        <ul class="list--dots">
                            <li>
                                1. El Jefe de Proyecto enviará al proveedor que quiere dar de alta la "FICHA DE ALTA", poniendo en 
                                copia a Gestión Económica (<a href="/apoyo/recursos/personal/read?id=070501.191956.544298.595256">Mª Ángeles Cabezas Miguel</a> para TSOL, 
                                y <a href="/apoyo/recursos/personal/read?id=070501.221878.393594.691590">Eduardo Martinez Fernández</a> para TDE).
                                <br>
                                En TSOL solo se puede solicitar el alta de proveedores para aquellas compras que no gestione compras, es decir, menores de 3000€.
                            </li>
                        
                            <li>
                                2. El nuevo proveedor completará la ficha y la remitirá  de nuevo a Gestión Económica, poninedo en copia al Jefe de
                                Proyecto (hasta el momento no se puede iniciar el proceso).
                            </li>

                            <li>
                                3. Gestión económica inician internamente el proceso, donde el tiempo máximo estimado en TSOL será de 1 mes, mientras que el tiempo máximo estimado para TDE será de 2 días.
                            </li>

                            <li>
                                4. Gestión económica comunicará al Jefe de Proyecto el alta del nuevo proveedor, para que puedan tramitar los pedidos.
                            </li>

                        </ul>

                        <div class="relation__area">

                            <div class="relation__body">
                            
                                <ul class="download__list">

                                    <li class="download__item">

                                        <div class="download__archive">

                                            <a 
                                                href='/gestorArchivos?r=000300.231003.122804.838488' 
                                                target="_blank"
                                            >

                                                <div class="download__title">
                                                    <svg class="ico ico__xlsx d icoChange"></svg>
                                                    Listado de Compradores por Catálogo de Producto
                                                </div>      

                                            </a>

                                        </div>

                                    </li>

                                    <li class="download__item">

                                        <div class="download__archive">

                                            <a 
                                                href='/gestorArchivos?r=000300.231003.122726.496547' 
                                                target="_blank"
                                            >

                                                <div class="download__title">
                                                    <svg class="ico ico__xlsx d icoChange"></svg>
                                                    Ficha de alta TDE
                                                </div>      

                                            </a>

                                        </div>

                                    </li>

                                    <li class="download__item">

                                        <div class="download__archive">

                                            <a 
                                                href='/gestorArchivos?r=000300.231003.122746.933460' 
                                                target="_blank"
                                            >

                                                <div class="download__title">
                                                    <svg class="ico ico__xlsx d icoChange"></svg>
                                                    Ficha de alta TSOL
                                                </div>      

                                            </a>

                                        </div>

                                    </li>

                                </ul>

                            </div>

                        </div>

                        <p>Para cualquier consulta, deberá dirigirse al <a href="mailto:soporteprocesosespana@telefonica.com">Buzón de seguimiento de pedidos TE_SOPORTE PROCESOS ESPAÑA</a></p>

                        <h3> 2.- Cierre de provisiones TDE </h3>

                        <p>
                            La fecha de provisiones varía de un mes a otro. Por ello, se enviará un correo electrónico
                            desde AGEDYS en cuto el departamento de Gestión Económica disponga de la fecha.
                        </p>

                        <h3> 3.- Previsión de pago a proveedores </h3>

                        <ul class="list--dots">

                            <li>
                                Para <span class="bold">TDE</span> los pagos o abaonos en cuenta a los suministradores sólo se realizarán a primeros de mes, pasados 
                                60 días de entrada de factura en TDE (Ej. si la factura entra un 7 de agosto, se cuentan 60 días,
                                aproximadamente el 7 de octubre, pero no se abonará hasta el 1 de noviembre).
                            </li>
                        
                            <li>
                                Para <span class="bold">TSOL</span> el sistema para el pago será según las condiciones del pedido (máximo 60 días), que deberá contar desde
                                la fecha de carga de la factura en Adquira. Para que la factura sea admitida, el pedido debe estar contabilizado (albarán tramitado)
                                y para el pago de servicios (troes) la factura debe ser aprobada por el Jefe de Proyecto en la intranet.
                                <br>
                                Transcurrido el periodo de pago, se abonará el día 2 o 3 de cada mes (apertura del mes contable) y día 15 (no teniendo
                                en cuenta sábados y festivos, pasando a ser el día de pago el siguiente día laboral).
                            </li>


                        </ul>

                        <h3> 4.- Factura electrónica (Para TDE/TSOL) </h3>

                        <p>
                            Para acelerar el pago a proveedores, estos pueden darse de alta en "Factura electrónica".
                            <br><br>
                            Para ello, han de completar la plantilla adjunta y remitirla a <a href="mailto: raquel.llanosburgos@telefonica.com">Raquel Llanos Burgos</a>,
                            quien enviará a los proveedores un acuerdo gratuito para usar Adquira. Una vez aceptado el acuerdo con el proveedor,
                            éste podrá subir la factura electrónica a Adquira, agilizando así el proceso.
                        </p>

                        <div class="relation__area">

                            <div class="relation__body">
                            
                                <ul class="download__list">

                                    <li class="download__item">

                                        <div class="download__archive">

                                            <a 
                                                href='/gestorArchivos?r=000300.231003.122837.647443' 
                                                target="_blank"
                                            >

                                                <div class="download__title">
                                                    <svg class="ico ico__xlsx d icoChange"></svg>
                                                    Plantilla de factura electrónica
                                                </div>      

                                            </a>

                                        </div>

                                    </li>

                                </ul>

                            </div>

                        </div>

                    </div>

                </div>

            </article>
    
    </main>

</body>


<!-- region Script JS  -->
    
    <script>

        function notificarEliminar(form, id, codigo){

            Dialog.open({
                title: 'Eliminar proceso ' + codigo,
                message: '¿Desea eliminar el proceso ' + codigo + '? (esta acción es irreversible).',
                color: 'red',
                ico: 'ico__papelera d',
                okText: 'Adelante, bórralo',
                cancelText: 'Nooooooooooooo',
                onok: () => { 
                    showSnackbar('Proceso eliminado correctamente', 'ico__papelera w', 'red');
                    form.submit(),'_self'; 
                }                

            })
        }

    </script>
    
<!-- endregion -->

</html>