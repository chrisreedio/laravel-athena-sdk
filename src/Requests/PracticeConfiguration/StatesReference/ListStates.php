<?php

namespace ChrisReedIO\AthenaSDK\Requests\PracticeConfiguration\StatesReference;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListStates
 *
 * Retrieves a reference list of all states
 */
class ListStates extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/states';
    }

    public function __construct() {}
}
