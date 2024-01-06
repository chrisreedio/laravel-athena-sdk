<?php

namespace ChrisReedIO\AthenaSDK\Requests\PracticeConfiguration\RacesReference;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListRaces
 *
 * Retrieves the list of types of races configured in the system
 */
class ListRaces extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/races';
    }

    public function __construct()
    {
    }
}
