<?php

    namespace ControllerGeneral;
    use MVC\Router;

    //Modelos
        use ModelAnalisisContexto\AnalisisContexto;
        use ModelAnalisisContexto\RevisionAnalisisContexto;
        use ModelParteInteresada\ContenedorParteInteresada;  
        use ModelParteInteresada\RevisionParteInteresada;  
        use ModelPlanAccion\PlanAccion;  
        use ModelGeneral\Version;
        use ModelGeneral\Ayuda;
        use ModelInformacionDocumentada\EdicionDocumento;
        use ModelInformacionDocumentada\Documento;

    class DashboardController {

        public static function dashboard(Router $router) {

            $alarmas = [];
            $dashboardContexto = [];
            $dashboardPartesInteresadas = [];
            $dashboardPlanesAccion = [];
            $dashboardDocumentos = [];

            //region Análisis de Contexto
                $analisisContexto = AnalisisContexto::readAll();

                foreach($analisisContexto as $a){

                    $revision_ac = RevisionAnalisisContexto::cargarUltimoHistorico($a->codigo_interno);

                    foreach ($revision_ac as $r) {
                        $r->alarma = asignarAlarma($r->proximaRevision);
                        $alarmas[] = $r->alarma;
                    }

                    $dashboardContexto[] = $revision_ac;

                }      
                
            //endregion

            //region Partes interesadas
                $partesInteresadas = ContenedorParteInteresada::readAll();               

                foreach($partesInteresadas as $a){

                    $revision_pi = RevisionParteInteresada::cargarUltimaRevision($a);

                    foreach ($revision_pi as $r) {
                        $r->alarma = asignarAlarma($r->proximaRevision);
                        $alarmas[] = $r->alarma;
                    }

                    $dashboardPartesInteresadas[] = $revision_pi;

                }

            //endregion

            //region Planes de acción
                $planesAccion = PlanAccion::readAll_Dashboard();               

                if($planesAccion <>""){

                    foreach($planesAccion as $pa){

                        $pa->alarma = asignarAlarma($pa->fechaFinPrevisto);
                        $alarmas[] = $pa->alarma;
    
                        $dashboardPlanesAccion[] = $pa;
    
                    }

                }    
                
            //region Planes de acción
                $documentos = PlanAccion::readAll_Dashboard();               

                if($documentos <>""){

                    foreach($documentos as $doc){

                        $doc->alarma = asignarAlarma($doc->fechaFinPrevisto);
                        $alarmas[] = $doc->alarma;

                        $dashboardDocumentos[] = $doc;

                    }

                }  

            //endregion

            //Invovamos el método router
                $router->render('00/Dashboard/Dashboard', [

                    //Ahora le pasamos los datos
                        'dashboardContexto' => $dashboardContexto,     
                        'dashboardPartesInteresadas' => $dashboardPartesInteresadas, 
                        'dashboardPlanesAccion' => $dashboardPlanesAccion,  
                        'dashboardDocumentos' => $dashboardDocumentos,            
                ]);

        }

        public static function generarAlarmas(){

            $alarmas = [];
            $dashboardContexto = [];
            $dashboardPartesInteresadas = [];
            $dashboardPlanesAccion = [];

            //region Análisis de Contexto
                $analisisContexto = AnalisisContexto::readAll();

                foreach($analisisContexto as $a){

                    $revision_ac = RevisionAnalisisContexto::cargarUltimoHistorico($a->codigo_interno);

                    foreach ($revision_ac as $r) {
                        $r->alarma = asignarAlarma($r->proximaRevision);
                        $alarmas[] = $r->alarma;
                    }

                    $dashboardContexto[] = $revision_ac;

                }   
                
            //endregion

            //region Partes interesadas
                $partesInteresadas = ContenedorParteInteresada::readAll();               

                foreach($partesInteresadas as $a){

                    $revision_pi = RevisionParteInteresada::cargarUltimaRevision($a);

                    foreach ($revision_pi as $r) {
                        $r->alarma = asignarAlarma($r->proximaRevision);
                        $alarmas[] = $r->alarma;
                    }

                    $dashboardPartesInteresadas[] = $revision_pi;

                }

            //endregion

            //region Planes de acción
                $planesAccion = PlanAccion::readAll_Dashboard();               

                if($planesAccion <>""){

                    foreach($planesAccion as $pa){

                        $pa->alarma = asignarAlarma($pa->fechaFinPrevisto);
                        $alarmas[] = $pa->alarma;
    
                        $dashboardPlanesAccion[] = $pa;
    
                    }

                }

            //endregion

                $alarmas = array_count_values($alarmas);

                return $alarmas;

        }

    }