<?php

    //region 07_Apoyo

        //Comunicados
            use ModelComunicado\Comunicado;    
            Comunicado::setDB($db_comunicados); 

            use ModelComunicado\TipoComunicado;    
            TipoComunicado::setDB($db_comunicados); 

            use ModelComunicado\GestorComunicado;    
            GestorComunicado::setDB($db_comunicados); 

        //Información documentada
            use ModelInformacionDocumentada\Documento;    
            Documento::setDB($db_informaciondocumentada); 

            // use ModelInformacionDocumentada\TipoDocumento;    
            // TipoDocumento::setDB($db_informaciondocumentada); 

            // use ModelInformacionDocumentada\JuridicaDocumento;    
            // JuridicaDocumento::setDB($db_informaciondocumentada); 

            // use ModelInformacionDocumentada\EstadoDocumento;    
            // EstadoDocumento::setDB($db_informaciondocumentada); 

            use ModelInformacionDocumentada\EdicionDocumento;    
            EdicionDocumento::setDB($db_informaciondocumentada); 

            // use ModelInformacionDocumentada\RevisionDocumento;    
            // RevisionDocumento::setDB($db_informaciondocumentada); 

        //Externa
            use ModelDocumentacionExterna\DocumentoExterno;    
            DocumentoExterno::setDB($db_documentacionexterna); 

            use ModelDocumentacionExterna\ISO_9001_2015;    
            ISO_9001_2015::setDB($db_documentacionexterna); 

            use ModelDocumentacionExterna\PECAL_2110_4;    
            PECAL_2110_4::setDB($db_documentacionexterna); 

    //endregion  