<?php

    namespace ControllerInformacionDocumentada;
    use MVC\Router;

    //Modelos
        Use ModelInformacionDocumentada\Documento;
        Use ModelInformacionDocumentada\TipoDocumento;
        Use ModelInformacionDocumentada\JuridicaDocumento;
        use ModelInformacionDocumentada\EdicionDocumento;

        Use ModelDocumentacionExterna\DocumentoExterno;
        
        Use ModelGeneral\Codigo;
        Use ModelGeneral\Adjuntos;
        Use ModelGeneral\Relacion;
        Use ModelGeneral\Bitacora;
        Use ModelGeneral\Cambio;
        Use ModelGeneral\Personal;

        Use ControllerGeneral\GeneralController;

    class InformacionDocumentadaController {

        //region RUTAS

            public static function informacion_documentada(Router $router) {
                    
                $crud = 2;

                //Documentación interna
                $procedimientos = Documento::cargarProcedimientos();
                $procedimientos_seguridad = Documento::cargarProcedimientosSeguridad();
                $manuales = Documento::cargarManuales();
                $instrucciones = Documento::cargarInstrucciones();
                $guias = Documento::cargarGuias();
                $formatos = Documento::cargarFormatos();
                $plantillas = Documento::cargarPlantillas();
                $docApoyo = Documento::cargarDocApoyo();

                //Documentación externa
                $formatos_aii = DocumentoExterno::cargarFormatosAII();
                $normativa = DocumentoExterno::cargarNormativaExterna();
                $otraNormativa = DocumentoExterno::cargarOtraNormativaTelefonica();
                $otraDocumentacion = DocumentoExterno::cargarOtraDocumentacion();

                //Invovamos el método router
                    $router->render('/07/informacionDocumentada/informacion-documentada', [
                    
                        'crud' => $crud,
                        'procedimientos' => $procedimientos,
                        'procedimientos_seguridad' => $procedimientos_seguridad,
                        'manuales' => $manuales,
                        'instrucciones' => $instrucciones,
                        'guias' => $guias,
                        'formatos' => $formatos,
                        'plantillas' => $plantillas,
                        'docApoyo' => $docApoyo,
                        'normativa' => $normativa,
                    ]);

            }

        //endregion

        //region READ

            public static function read__informacion_documentada(Router $router){
                    
                //Cargamos los datos y lo guardamos en una variable, que luego pasaremos por al router
                $doc = Documento::find_edicion($_GET['id']);
                $ediciones = edicionDocumento::cargarTodasEdiciones($doc->id);

                //Cargamos los posibles responsables
                $personal = Personal::readAll();

                //Definimos la acción CRUD
                $crud = 2;

                //Invovamos el método router
                $router->render('/07/InformacionDocumentada/informacion-documentada_form' , [

                    //Ahora le pasamos los datos
                        'crud' => $crud,
                        'doc' => $doc,      
                        'ediciones' => $ediciones,           
                        'personal' => $personal,
            
                ]);

            }

        //endregion

    }