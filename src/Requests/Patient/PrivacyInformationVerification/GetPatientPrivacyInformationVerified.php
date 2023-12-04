<?php

namespace ChrisReedIO\AthenaSDK\Requests\Patient\PrivacyInformationVerification;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientPrivacyInformationVerified
 *
 * Retrieves a patient's verified privacy information
 */
class GetPatientPrivacyInformationVerified extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/privacyinformationverified";
    }

    /**
     * @param int $departmentid The ID of the department where the privacy information was verified.
     * @param int $patientid patientid
     */
    public function __construct(
        protected int $departmentid,
        protected int $patientid,
    )
    {
    }

    public function defaultQuery(): array
    {
        return array_filter(['departmentid' => $this->departmentid]);
    }
}
