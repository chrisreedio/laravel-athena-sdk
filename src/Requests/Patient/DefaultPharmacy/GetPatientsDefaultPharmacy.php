<?php

namespace ChrisReedIO\AthenaSDK\Requests\Patient\DefaultPharmacy;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientsDefaultPharmacy
 *
 * Retrieves the patient's default pharmacy information
 */
class GetPatientsDefaultPharmacy extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/chart/{$this->patientid}/pharmacies/default";
    }

    /**
     * @param  int  $patientid patientid
     * @param  int  $departmentid The athenaNet department id.
     */
    public function __construct(
        protected int $patientid,
        protected int $departmentid,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['departmentid' => $this->departmentid]);
    }
}
