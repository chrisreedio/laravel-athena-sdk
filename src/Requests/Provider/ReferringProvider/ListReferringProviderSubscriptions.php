<?php

namespace ChrisReedIO\AthenaSDK\Requests\Provider\ReferringProvider;

use ChrisReedIO\AthenaSDK\Data\SubscriptionEventData;
use Illuminate\Support\Collection;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

use function collect;

/**
 * ListReferringProviderSubscriptions
 *
 * Retrieves list of events applicable for the changed referring providers
 */
class ListReferringProviderSubscriptions extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/referringproviders/changed/subscription';
    }

    public function __construct()
    {
        //
    }

    public function createDtoFromResponse(Response $response): Collection
    {
        return collect($response->json('subscriptions'))
            ->map(fn ($item) => SubscriptionEventData::fromArray($item));
    }
}
