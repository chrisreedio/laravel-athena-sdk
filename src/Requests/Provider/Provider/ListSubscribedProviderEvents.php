<?php

namespace ChrisReedIO\AthenaSDK\Requests\Provider\Provider;

use Saloon\Enums\Method;
use Saloon\Http\Request;

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
}
