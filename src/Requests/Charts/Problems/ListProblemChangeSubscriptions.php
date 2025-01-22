<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\Problems;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListProblemChangeSubscriptions
 *
 * Retrieves list of events for Problems
 */
class ListProblemChangeSubscriptions extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/chart/healthhistory/problems/changed/subscription';
    }

    public function __construct() {}
}
