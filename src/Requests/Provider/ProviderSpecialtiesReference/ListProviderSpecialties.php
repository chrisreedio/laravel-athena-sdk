<?php

namespace ChrisReedIO\AthenaSDK\Requests\Provider\ProviderSpecialtiesReference;

use ChrisReedIO\AthenaSDK\Data\Provider\SpecialtyData;
use ChrisReedIO\AthenaSDK\PaginatedRequest;
use Saloon\Enums\Method;
use Saloon\Http\Response;

/**
 * ListProviderSpecialties
 *
 * Retrieves the list of valid provider specialties in the system
 */
class ListProviderSpecialties extends PaginatedRequest
{
    protected Method $method = Method::GET;

    protected ?string $itemsKey = 'providerspecialties';

    public function resolveEndpoint(): string
    {
        return '/reference/providerspecialties';
    }

    public function __construct()
    {
    }

    public function defaultQuery(): array
    {
        return array_filter([]);
    }

    public function createDtoFromResponse(Response $response): array
    {
        return collect($response->json($this->itemsKey))
            ->map(fn (array $data) => SpecialtyData::fromArray($data))->all();
    }
}
