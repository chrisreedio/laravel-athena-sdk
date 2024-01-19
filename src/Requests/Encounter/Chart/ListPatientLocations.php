<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\Chart;

use ChrisReedIO\AthenaSDK\Data\Practice\PatientLocationData;
use Illuminate\Support\Collection;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

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
     * @param  int  $departmentid  The athenaNet department id.
     */
    public function __construct(
        protected int $departmentid,
    ) {
        // dump('ListPatientLocations', $this->departmentid);
    }

    public function defaultQuery(): array
    {
        return array_filter(['departmentid' => $this->departmentid]);
    }

    public function createDtoFromResponse(Response $response): Collection
    {
        // dd('returned data:', $response->json());
        return collect($response->json())
            ->map(fn (array $location) => PatientLocationData::fromArray($location));
    }
}
