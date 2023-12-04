<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\FamilyHistory;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientFamilyHistory
 *
 * Retrieves the family history for a specific patient
 */
class GetPatientFamilyHistory extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/chart/{$this->patientid}/familyhistory";
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
