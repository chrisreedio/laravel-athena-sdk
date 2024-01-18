<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypeReturnOfficeRto;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientReturnToOfficeDocument
 *
 * Retrieves a specific RTO document of the patient
 */
class GetPatientReturnToOfficeDocument extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/documents/rto/{$this->rtoid}";
    }

    /**
     * @param  int  $patientid  patientid
     * @param  int  $rtoid  rtoid
     */
    public function __construct(
        protected int $patientid,
        protected int $rtoid,
    ) {
    }
}
