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
     * @param  int  $releaseauthorizationid releaseauthorizationid
     * @param  int  $patientid patientid
     * @param  int  $departmentid Department ID of the patient
     */
    public function __construct(
        protected int $releaseauthorizationid,
        protected int $patientid,
        protected int $departmentid,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['departmentid' => $this->departmentid]);
    }
}
