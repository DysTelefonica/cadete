<?php

    //region 04_Contexto

        //Análisis del contexto
            use ModelAnalisisContexto\AnalisisContexto;    
            AnalisisContexto::setDB($db_contexto);

            use ModelAnalisisContexto\TipoAnalisisContexto;    
            TipoAnalisisContexto::setDB($db_contexto);

            use ModelAnalisisContexto\RevisionAnalisisContexto;    
            RevisionAnalisisContexto::setDB($db_contexto);

            //Analisis DAFO
                use ModelAnalisisContexto\AnalisisDAFO;    
                AnalisisDAFO::setDB($db_contexto);

                use ModelAnalisisContexto\TipoAnalisisDAFO;    
                TipoAnalisisDAFO::setDB($db_contexto);

                use ModelAnalisisContexto\HistoricoAnalisisDAFO;    
                HistoricoAnalisisDAFO::setDB($db_contexto);

        //Partes interesadas

            use ModelParteInteresada\ParteInteresada;    
            ParteInteresada::setDB($db_partesinteresadas);

            use ModelParteInteresada\TipoParteInteresada;    
            TipoParteInteresada::setDB($db_partesinteresadas);

            use ModelParteInteresada\ContenedorParteInteresada;    
            ContenedorParteInteresada::setDB($db_partesinteresadas);

            use ModelParteInteresada\RevisionParteInteresada;    
            RevisionParteInteresada::setDB($db_partesinteresadas);

            use ModelParteInteresada\HistoricoParteInteresada;    
            HistoricoParteInteresada::setDB($db_partesinteresadas);

        //Proceso
            use ModelProceso\Proceso;    
            Proceso::setDB($db_procesos);

        //Alcance
            use ModelAlcance\Alcance;    
            Alcance::setDB($db_alcance);

        //endregion