<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\PatientChartList;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListPatientCharts
 *
 * Retrieve a list of chart sharing group id for a specific patient
 */
class ListPatientCharts extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/chart/{$this->patientid}/patientchartlist";
    }

    /**
     * @param int $patientid patientid
     */
    public function __construct(
        protected int $patientid,
    )
    {
    }

    public function defaultQuery(): array
    {
        return array_filter([]);
    }
}
