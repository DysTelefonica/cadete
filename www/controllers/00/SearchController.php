<?php

    namespace ControllerGeneral;
    use MVC\Router;

        //00
            use ModelGeneral\Personal;   
            use ModelGeneral\Codigo;     
            use ModelGeneral\Indice;     

        //04
            use ModelParteInteresada\ParteInteresada;
            use ModelAnalisisContexto\AnalisisContexto;
            use ModelAnalisisContexto\AnalisisDAFO;
            use ModelProceso\Proceso;

        //05
            use ModelPolitica\Politica;

        //06
            use ModelProyectoMejora\ProyectoMejora;
            use ModelPlanAccion\PlanAccion;
            use ModelRiesgoOportunidad\RiesgoOportunidad;

        //07
            Use ModelComunicado\Comunicado;
            Use ModelInformacionDocumentada\Documento;
            Use ModelInformacionDocumentada\EdicionDocumento;
            Use ModelDocumentacionExterna\DocumentoExterno;
            Use ModelDocumentacionExterna\ISO_9001_2015;
            Use ModelDocumentacionExterna\PECAL_2110_4;


    class SearchController {

        public static function searchAjax(Router $router) {

            //00
                $indice = Indice::readAll();
                $personal = Personal::readAll_search();

            //04
                $analisisDAFO = AnalisisContexto::read__searchAjax();
                $pi = ParteInteresada::read__searchAjax();
                $procesos = Proceso::read__searchAjax();

            //05
                $politica = Politica::read__searchAjax();

            //06
                $proyectosMejora = ProyectoMejora::read__searchAjax();
                $planesAccion = PlanAccion::read__searchAjax();
                $ro = RiesgoOportunidad::read__searchAjax();

            //07
                $comunicados = Comunicado::read__searchAjax();
                $documentacion = Documento::read__searchAjax2();
                $documentacionExterna = DocumentoExterno::read__searchAjax();
                $iso = ISO_9001_2015::read__searchAjax();

            //Juntamos los arrays
                $r = array_merge(
                                $indice, 
                                $documentacion,
                                $documentacionExterna,
                                $procesos,
                                $proyectosMejora,
                                $planesAccion,
                                $ro,
                                $analisisDAFO, 
                                $pi, 
                                $personal,
                                $politica,
                                $comunicados,
                                $iso
                );

            echo(json_encode($r));

        }

    }