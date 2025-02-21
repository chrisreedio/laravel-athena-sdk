<?php

namespace ChrisReedIO\AthenaSDK\Requests\Provider\Provider;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

use function collect;

/**
 * ListProviderChangeEvents
 *
 * Retrieve list of events for changed providers
 */
class ListProviderChangeEvents extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/providers/changed/subscription/events';
    }

    public function __construct()
    {
        //
    }

    public function createDtoFromResponse(Response $response): array
    {
        // dd($response->json('subscriptions'));
        return collect($response->json('subscriptions'))->flatten()->all();
    }
}
