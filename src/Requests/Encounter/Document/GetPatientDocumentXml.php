<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\Document;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientDocumentXml
 *
 * Retrieves certain types of clinical documents which contain XML ( e.g. CCDA)
 */
class GetPatientDocumentXml extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/documents/clinicaldocument/{$this->documentid}/xml";
    }

    /**
     * @param  int  $documentid  documentid
     * @param  int  $patientid  patientid
     */
    public function __construct(
        protected int $documentid,
        protected int $patientid,
    ) {
    }
}
