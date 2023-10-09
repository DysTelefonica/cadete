<?php

    //region Nos conectamos a las bases de datos

        //00_general
            $db_general = conectar_db('00_general');
            $db_log = conectar_db('00_general');
            $db_ayuda = conectar_db('00_ayuda');

        //04_contexto
            $db_alcance = conectar_db('04_alcance');
            $db_contexto = conectar_db('04_contexto');
            $db_partesinteresadas = conectar_db('04_partesinteresadas');
            $db_procesos = conectar_db('04_procesos');

        //05_liderazgo
            $db_liderazgo = conectar_db('05_liderazgo');

        //06_planificacion
            $db_objetivos = conectar_db('06_objetivos');
            $db_proyectosmejora = conectar_db('06_proyectosmejora');
            $db_planesaccion = conectar_db('06_planesaccion');
            $db_riesgosoportunidades = conectar_db('06_riesgosoportunidades');
        
        //07_apoyo
            $db_comunicados = conectar_db('07_comunicados');
            $db_informaciondocumentada = conectar_db('07_informaciondocumentada');
            $db_documentacionexterna = conectar_db('07_documentacionexterna');

    
    //endregion

    //Vinculamos un modelo a una bbdd
            require_once 'links/00.php';
            require_once 'links/04.php';
            require_once 'links/05.php';
            require_once 'links/06.php';
            require_once 'links/07.php';
            // require_once 'links/08.php';
            // require_once 'links/09.php';
            // require_once 'links/10.php';W