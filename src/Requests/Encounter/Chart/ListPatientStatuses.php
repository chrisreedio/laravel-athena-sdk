<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\Chart;

use ChrisReedIO\AthenaSDK\Data\Practice\PatientStatusData;
use Illuminate\Support\Collection;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * ListPatientStatuses
 *
 * Retrieves a list of patient statuses during their visit to the provider
 */
class ListPatientStatuses extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/chart/configuration/patientstatuses';
    }

    public function __construct() {}

    public function defaultQuery(): array
    {
        return array_filter([]);
    }

    public function createDtoFromResponse(Response $response): Collection
    {
        return collect($response->json('patientstatuses'))
            ->map(fn (array $status) => PatientStatusData::fromArray($status));
    }
}
