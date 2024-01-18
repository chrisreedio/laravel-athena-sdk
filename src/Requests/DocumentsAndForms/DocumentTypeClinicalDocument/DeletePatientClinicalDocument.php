<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\DocumentTypeClinicalDocument;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeletePatientClinicalDocument
 *
 * Deletes the record of a specified clinical document
 */
class DeletePatientClinicalDocument extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/documents/clinicaldocument/{$this->clinicaldocumentid}";
    }

    /**
     * @param  int  $clinicaldocumentid  clinicaldocumentid
     * @param  int  $patientid  patientid
     */
    public function __construct(
        protected int $clinicaldocumentid,
        protected int $patientid,
    ) {
    }
}
