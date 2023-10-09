<?php

    //region 05_liderazgo

        //Politica
            use ModelPolitica\Politica;    
            Politica::setDB($db_liderazgo);

        //Comite
            use ModelComite\Comite;    
            Comite::setDB($db_liderazgo);

    //endregion