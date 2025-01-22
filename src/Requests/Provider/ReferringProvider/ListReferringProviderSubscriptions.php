<?php

namespace ChrisReedIO\AthenaSDK\Requests\Provider\ReferringProvider;

use Saloon\Enums\Method;
use Saloon\Http\Request;

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

    public function __construct() {}
}
