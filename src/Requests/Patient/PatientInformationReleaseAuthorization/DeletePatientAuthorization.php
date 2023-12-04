<?php

namespace ChrisReedIO\AthenaSDK\Requests\Patient\PatientInformationReleaseAuthorization;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeletePatientAuthorization
 *
 * Delete a release authorizations for a specific patient
 */
class DeletePatientAuthorization extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/authorizations/{$this->releaseauthorizationid}";
    }

    /**
     * @param  int  $departmentid Department ID of the patient
     * @param  int  $patientid patientid
     * @param  int  $releaseauthorizationid releaseauthorizationid
     */
    public function __construct(
        protected int $departmentid,
        protected int $patientid,
        protected int $releaseauthorizationid,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['departmentid' => $this->departmentid]);
    }
}
