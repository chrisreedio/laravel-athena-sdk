<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\GynHistory;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientGynHistory
 *
 * Retrieves the list of questions and their responses captured in the GYN History
 */
class GetPatientGynHistory extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/chart/{$this->patientid}/gynhistory";
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
