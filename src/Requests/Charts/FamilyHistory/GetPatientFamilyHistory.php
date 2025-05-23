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
     * @param  int  $departmentid  The athenaNet department id.
     * @param  int  $patientid  patientid
     */
    public function __construct(
        protected int $departmentid,
        protected int $patientid,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['departmentid' => $this->departmentid]);
    }
}
