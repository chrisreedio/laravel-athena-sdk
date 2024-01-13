<?php

namespace ChrisReedIO\AthenaSDK\Requests\Patient;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

use function collect;

/**
 * ListPatientChangeSubscriptionEvents
 *
 * Retrieve a list of events for modified patient records
 */
class ListPatientChangeSubscriptionEvents extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/patients/changed/subscription/events';
    }

    public function __construct()
    {
    }

    public function createDtoFromResponse(Response $response): array
    {
        // dd($response->json('subscriptions'));
        return collect($response->json('subscriptions'))->flatten()->all();
    }
}
