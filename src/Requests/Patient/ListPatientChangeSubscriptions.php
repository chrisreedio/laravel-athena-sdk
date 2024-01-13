<?php

namespace ChrisReedIO\AthenaSDK\Requests\Patient;

use ChrisReedIO\AthenaSDK\Data\SubscriptionEventData;
use Illuminate\Support\Collection;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * ListPatientChangeSubscriptions
 *
 * Retrieves list of events applicable for patients changed
 */
class ListPatientChangeSubscriptions extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/patients/changed/subscription';
    }

    public function __construct()
    {
    }

    public function createDtoFromResponse(Response $response): Collection
    {
        return collect($response->json('subscriptions'))
            ->map(fn ($item) => SubscriptionEventData::fromArray($item));
    }
}
