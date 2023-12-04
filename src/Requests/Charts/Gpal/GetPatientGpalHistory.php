<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\Gpal;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientGpalHistory
 *
 * BETA: Retrieves the GAPL score and values for a patient
 */
class GetPatientGpalHistory extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/chart/{$this->patientid}/gpal";
    }

    /**
     * @param  int  $patientid patientid
     * @param  int  $departmentid Department ID
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
