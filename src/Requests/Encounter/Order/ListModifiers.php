<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\Order;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListModifiers
 *
 * Gets a list of non-fee-affecting modifiers that can be attached to a service.
 */
class ListModifiers extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/encounter/configuration/modifiers';
    }

    public function __construct()
    {
    }
}
