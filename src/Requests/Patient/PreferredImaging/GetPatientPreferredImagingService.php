<?php

namespace ChrisReedIO\AthenaSDK\Requests\Patient\PreferredImaging;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientPreferredImagingService
 *
 * Retrieve preferred imaging facility for a specific patient chart
 */
class GetPatientPreferredImagingService extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/chart/{$this->patientid}/imaging/preferred";
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
