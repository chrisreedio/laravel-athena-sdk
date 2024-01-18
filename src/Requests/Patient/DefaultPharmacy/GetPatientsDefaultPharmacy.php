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
     * @param  int  $departmentid  The athenaNet department id.
     * @param  int  $patientid  patientid
     */
    public function __construct(
        protected int $departmentid,
        protected int $patientid,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['departmentid' => $this->departmentid]);
    }
}
