<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\PatientPhoto;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeletePatientPhoto
 *
 * Deletes the patient's image record
 */
class DeletePatientPhoto extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/photo";
    }

    /**
     * @param  int  $patientid  patientid
     */
    public function __construct(
        protected int $patientid,
    ) {}
}
