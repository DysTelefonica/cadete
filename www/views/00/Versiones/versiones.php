<head>

    <!-- Título -->
        <title> Control de versiones | Telefónica DyS </title> 

    <!-- Icono -->
        <link rel="shortcut icon" href="/build/img/layout/Internet_2Regular_azul.svg">
    
</head>

<main>

 <!-- #region Breadcrumb -->

    <nav class="breadcrumb">

        <ol class="breadcrumb__list">

            <li class="breadcrumb__item"> <svg class="ico ico__puntos b"> </svg> </li>
            <li class="breadcrumb__item"> <a href="/"> Inicio </a> </li>
            <li class="breadcrumb__item"> <span> / </span> </li>               
            <li class="breadcrumb__item"> <a href="/versiones?id=<?php echo($version->id);?>"> Versiones </a> </li>

        </ol>

    </nav>

<!-- #endregion -->

<!-- #region Artículo -->

    <article>

        <header class="entry-header">
            <h1>
                <svg class="ico ico__version b"></svg>

                <span id='titulo'>

                    <?php echo('Versión '); echo($version->id); ?>

                </span> 

            </h1>

        </header>
        
        <div class="entry-content">

        <div class="block">

            <div class="block__content form">

                <div class="form__two">

                <!-- Formulario -->

                    <div class="form__left">

                        <h2>
                            <svg class="ico ico__version b"></svg>
                            <span>Control de cambios</span>
                        </h2>

                        <div class="form__leftContent">

                            <form 
                                class="form"
                            >
                            
                            <p>
                                <strong>Fecha de lanzamiento: </strong> <?php echo($version->fecha); ?>   

                            </p>

                            <p>
                                
                                <?php echo($version->control_cambios); ?>

                            </p>
                

                            </form>

                        </div>

                    </div>
                
                <!-- Acciones -->

                    <div class="form__right">

                        <h2>
                            <svg class="ico ico__version b"></svg>
                            <span>Otras versiones</span>
                        </h2>

                        <div class="form__rightContent">

                            <form class="form">

                                <ul>
                                    <?php foreach ($versiones as $v): ?>
                                        
                                        <li class="compact">
                                            <a href="/versiones?id=<?php echo $v->id; ?>"> Versión <?php echo $v->id; ?></a>
                                        </li>                          

                                    <?php endforeach; ?>

                                </ul>

                            </form>

                        </div>                                  
                        
                    </div>

                </div>

            </div>

        </div>
    
        </div>
                   

    </article>               

<!-- #endregion -->

</main>

<!-- #region Script JS  -->

    <script type="text/javascript">

        function validate__riesgooportunidad_Form(form, crud) {

            if (document.getElementById('codigo_interno').value.length == 0) {
                showSnackbar('¡Falta el codigo!','ico__alerta w','red');
                return false;
            }
            if (document.getElementById('denominador').value.length == 0) {
                showSnackbar('¡Falta el denominador!','ico__alerta w','red');
                return false;
            }
            if (document.getElementById('tipo').value.length == 0) {
                showSnackbar('¡Falta el tipo!','ico__alerta w','red');
                return false;
            }
            if (document.getElementById('estado').value.length == 0) {
                showSnackbar('¡Falta el estado!','ico__alerta w','red');
                return false;
            }

            //Seleccionamos la acción dependiendo del CRUD

                switch(crud){
                    case 1:
                        notificarCrear(form__riesgooportunidad);
                    break;

                    case 3:
                        notificarActualizar(form__riesgooportunidad);
                    break;
                }

        }

        function notificarCrear(form){

            Dialog.open({
                title: 'CREAR ' + document.getElementById('tipo').value.toUpperCase(),
                message: 'Va a crear un/a nuevo/a ' + document.getElementById('tipo').value + ', ¿Desea continuar?',
                color: 'blue',
                ico: 'ico__teatro d',
                okText: '¡Adelante, créalo!',
                cancelText: 'Mmm no, mejor no',
                onok: () => { 
                    document.getElementById('tipo').disabled = false;
                    form.submit(); 
                }                

            })
        }  
        
        function notificarActualizar(form){

            Dialog.open({
                title: 'ACTUALIZAR ' + document.getElementById('tipo').value.toUpperCase(),
                message: 'Va a actualizar un ' + document.getElementById('tipo').value + ' ¿Desea continuar?',
                color: 'blue',
                ico: 'ico__teatro d',
                okText: '¡Los cambios siempre son buenos!',
                cancelText: 'Si algo funciona, ¿Por qué cambiarlo?',
                onok: () => { 
                    document.getElementById('tipo').disabled = false;
                    form.submit(); 
                }                

            })
        }            

        function notificarEliminar(form, id, codigo){

            Dialog.open({
                title: 'Eliminar riesgo/oportunidad ' + codigo,
                message: '¿Desea eliminar el riesgo/oportunidad ' + codigo + '? (esta acción es irreversible).',
                color: 'red',
                ico: 'ico__papelera d',
                okText: 'Adelante, bórralo',
                cancelText: 'Nooooooooooooo',
                onok: () => { 
                    showSnackbar('Registro eliminado correctamente', 'ico__papelera w', 'red');
                    form.submit(),'_self'; 
                }                

            })
        }

</script>

<!-- #endregion -->