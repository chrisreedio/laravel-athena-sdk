<?php

namespace ChrisReedIO\AthenaSDK\Requests\Patient\DefaultLab;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientDefaultLabInfo
 *
 * Retrieve preferred laboratory information for a specific patient chart
 */
class GetPatientDefaultLabInfo extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/chart/{$this->patientid}/labs/default";
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
