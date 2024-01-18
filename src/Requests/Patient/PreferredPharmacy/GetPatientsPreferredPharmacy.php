<?php

namespace ChrisReedIO\AthenaSDK\Requests\Patient\PreferredPharmacy;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientsPreferredPharmacy
 *
 * Retrieve preferred pharmacy for a specific patient chart
 */
class GetPatientsPreferredPharmacy extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/chart/{$this->patientid}/pharmacies/preferred";
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
