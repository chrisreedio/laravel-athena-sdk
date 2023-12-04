<?php

namespace ChrisReedIO\AthenaSDK\Requests\Provider\ReferringProviderNumber;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListReferringProviderNumberChangeEvents
 *
 * Retrieve a list of all events that can be input for this subscription
 */
class ListReferringProviderNumberChangeEvents extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/referringprovidernumbers/changed/subscription/events';
    }

    public function __construct()
    {
    }
}
