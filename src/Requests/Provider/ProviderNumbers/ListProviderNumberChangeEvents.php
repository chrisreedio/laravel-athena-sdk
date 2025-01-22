<?php

namespace ChrisReedIO\AthenaSDK\Requests\Provider\ProviderNumbers;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListProviderNumberChangeEvents
 *
 * Retrieves a list of events for changed providers
 */
class ListProviderNumberChangeEvents extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/providernumbers/changed/subscription/events';
    }

    public function __construct() {}
}
