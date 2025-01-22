<?php

namespace ChrisReedIO\AthenaSDK\Requests\Provider\ReferringProvider;

use ChrisReedIO\AthenaSDK\Data\Provider\ReferringProviderData;
use ChrisReedIO\AthenaSDK\PaginatedRequest;
use Illuminate\Support\Collection;
use Saloon\Enums\Method;
use Saloon\Http\Response;

/**
 * ListReferringProviders
 *
 * Retrieves a list of referring providers
 */
class ListReferringProviders extends PaginatedRequest
{
    protected Method $method = Method::GET;

    protected ?string $itemsKey = 'referringproviders';

    public function resolveEndpoint(): string
    {
        return '/referringproviders';
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
            ->map(fn (array $item) => ReferringProviderData::fromArray($item))
            ->all();
    }
}
