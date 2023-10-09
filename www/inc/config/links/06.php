<?php

    //region 06_Planificación

        //Proyectos mejora
            use ModelProyectoMejora\ProyectoMejora;    
            ProyectoMejora::setDB($db_proyectosmejora);        

            use ModelProyectoMejora\EstadoProyectoMejora;    
            EstadoProyectoMejora::setDB($db_proyectosmejora);  

        //Planes de Acción
            use ModelPlanAccion\PlanAccion;    
            PlanAccion::setDB($db_planesaccion);      
            
            use ModelPlanAccion\Accion;    
            Accion::setDB($db_planesaccion);  

            use ModelPlanAccion\EstadoPlanAccion;    
            EstadoPlanAccion::setDB($db_planesaccion);  

            use ModelPlanAccion\TareaCircular;    
            TareaCircular::setDB($db_planesaccion);   

        //Riesgos y oportunidades
            use ModelRiesgoOportunidad\RiesgoOportunidad;    
            RiesgoOportunidad::setDB($db_riesgosoportunidades);  

            use ModelRiesgoOportunidad\TipoRiesgoOportunidad;    
            TipoRiesgoOportunidad::setDB($db_riesgosoportunidades);  

            use ModelRiesgoOportunidad\DecisionRiesgoOportunidad;    
            DecisionRiesgoOportunidad::setDB($db_riesgosoportunidades);  

            use ModelRiesgoOportunidad\EstadoRiesgoOportunidad;    
            EstadoRiesgoOportunidad::setDB($db_riesgosoportunidades);  

            use ModelRiesgoOportunidad\RevisionRiesgoOportunidad;    
            RevisionRiesgoOportunidad::setDB($db_riesgosoportunidades);  

            use ModelRiesgoOportunidad\RiesgoOportunidadHistorico;    
            RiesgoOportunidadHistorico::setDB($db_riesgosoportunidades);  

        //Objetivos
            use ModelObjetivo\Objetivo;    
            Objetivo::setDB($db_objetivos);  

    //endregion