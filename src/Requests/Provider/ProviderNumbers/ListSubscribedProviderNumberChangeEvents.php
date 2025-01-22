<?php

namespace ChrisReedIO\AthenaSDK\Requests\Provider\ProviderNumbers;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListSubscribedProviderNumberChangeEvents
 *
 * Retrieves list of events applicable for changed providernumbers
 */
class ListSubscribedProviderNumberChangeEvents extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/providernumbers/changed/subscription';
    }

    public function __construct() {}
}
