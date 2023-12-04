<?php

namespace ChrisReedIO\AthenaSDK\Requests\Hospital\OperatingRoomOrCases;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListOrCaseChangeSubscriptions
 *
 * Retrieves list of events applicable for hospital OR-cases changes
 */
class ListOrCaseChangeSubscriptions extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/orcase/changed/subscription';
    }

    public function __construct()
    {
    }
}
