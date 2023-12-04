<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\Chart;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListPatientLocations
 *
 * Retrieve a list of patient locations for a specific department
 */
class ListPatientLocations extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/chart/configuration/patientlocations';
    }

    /**
     * @param int $departmentid The athenaNet department id.
     */
    public function __construct(
        protected int $departmentid,
    )
    {
    }

    public function defaultQuery(): array
    {
        return array_filter(['departmentid' => $this->departmentid]);
    }
}
