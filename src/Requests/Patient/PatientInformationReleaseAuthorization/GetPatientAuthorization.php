<?php

namespace ChrisReedIO\AthenaSDK\Requests\Patient\PatientInformationReleaseAuthorization;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientAuthorization
 *
 * Retrieve information of a specific release authorizations for a patient
 */
class GetPatientAuthorization extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/authorizations/{$this->releaseauthorizationid}";
    }

    /**
     * @param int $departmentid Department ID of the patient
     * @param int $patientid patientid
     * @param int $releaseauthorizationid releaseauthorizationid
     * @param null|bool $showdeleted Show deleted authorizations
     * @param null|string $status Release authorization status (VALID, EXPIRED, REVOKED)
     */
    public function __construct(
        protected int     $departmentid,
        protected int     $patientid,
        protected int     $releaseauthorizationid,
        protected ?bool   $showdeleted = null,
        protected ?string $status = null,
    )
    {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'showdeleted' => $this->showdeleted,
            'status' => $this->status
        ]);
    }
}
