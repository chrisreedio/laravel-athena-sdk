<?php

namespace ChrisReedIO\AthenaSDK\Requests\Patient\PatientPortalAccess;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientPortalStatus
 *
 * Retrieves the status of portal registration of a specific patient
 */
class GetPatientPortalStatus extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/portalstatus";
    }

    /**
     * @param  int  $patientid  patientid
     */
    public function __construct(
        protected int $patientid,
    ) {}
}
