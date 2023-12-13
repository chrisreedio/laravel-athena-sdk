<?php

namespace ChrisReedIO\AthenaSDK\Requests\Provider\Provider;

use ChrisReedIO\AthenaSDK\Data\SubscriptionEventData;
use Illuminate\Support\Collection;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use function collect;

/**
 * ListSubscribedProviderEvents
 *
 * Retrieves list of events applicable for providers changed
 */
class ListSubscribedProviderEvents extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/providers/changed/subscription';
    }

    public function __construct()
    {
    }

    public function createDtoFromResponse(Response $response): Collection
    {
        return collect($response->json('subscriptions'))
            ->map(fn($item) => SubscriptionEventData::fromArray($item));
    }
}
