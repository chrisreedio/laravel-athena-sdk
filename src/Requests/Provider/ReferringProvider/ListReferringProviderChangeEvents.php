<?php

namespace ChrisReedIO\AthenaSDK\Requests\Provider\ReferringProvider;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListReferringProviderChangeEvents
 *
 * Retrieves a list of all events that can be input for this subscription
 */
class ListReferringProviderChangeEvents extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/referringproviders/changed/subscription/events';
    }

    public function __construct() {}
}
