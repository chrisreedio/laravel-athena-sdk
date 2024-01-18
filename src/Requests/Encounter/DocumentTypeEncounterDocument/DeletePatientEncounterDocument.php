<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypeEncounterDocument;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeletePatientEncounterDocument
 *
 * Deletes the record of a specified encounter document
 */
class DeletePatientEncounterDocument extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/documents/encounterdocument/{$this->encounterdocumentid}";
    }

    /**
     * @param  int  $encounterdocumentid  encounterdocumentid
     * @param  int  $patientid  patientid
     */
    public function __construct(
        protected int $encounterdocumentid,
        protected int $patientid,
    ) {
    }
}
