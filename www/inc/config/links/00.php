<?php

    //region 00_general

        //Login y Usuarios
            use ModelGeneral\Login;
            Login::setDB($db_general);

            use ModelGeneral\Personal;
            Personal::setDB($db_general);

            use ModelGeneral\Version;
            Version::setDB($db_general);

            use ModelGeneral\Cita;
            Cita::setDB($db_general);

            use ModelGeneral\Indice;
            Indice::setDB($db_general);

            use ModelGeneral\Buzon;    
            Buzon::setDB($db_general);

        //Adjuntos
            use ModelGeneral\Adjuntos;    
            Adjuntos::setDB($db_general);

        //Relaciones
            use ModelGeneral\Relacion;    
            Relacion::setDB($db_general);

        //Bitacora
            use ModelGeneral\Bitacora;    
            Bitacora::setDB($db_general);

        //Código
            use ModelGeneral\Codigo;    
            Codigo::setDB($db_general);

        //Cambio
            use ModelGeneral\Log;    
            Log::setDB($db_general);

        //Texto Cambios
            use ModelGeneral\TextoLog;    
            TextoLog::setDB($db_general);

        //Ayuda
            use ModelGeneral\Ayuda;    
            Ayuda::setDB($db_ayuda);

            use ModelGeneral\Trazabilidad_ISO;    
            Trazabilidad_ISO::setDB($db_ayuda);

    //endregion