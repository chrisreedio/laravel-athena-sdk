<?php

namespace ChrisReedIO\AthenaSDK\Requests\Patient\PatientInformationReleaseAuthorization;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListPatientAuthorizations
 *
 * Retrieve the list of release authorizations for a specific patient
 */
class ListPatientAuthorizations extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/authorizations";
    }

    /**
     * @param  int  $departmentid Department ID of the patient
     * @param  int  $patientid patientid
     * @param  null|bool  $showdeleted Show deleted authorizations
     * @param  null|string  $status Release authorization status (VALID, EXPIRED, REVOKED)
     */
    public function __construct(
        protected int $departmentid,
        protected int $patientid,
        protected ?bool $showdeleted = null,
        protected ?string $status = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'showdeleted' => $this->showdeleted,
            'status' => $this->status,
        ]);
    }
}
