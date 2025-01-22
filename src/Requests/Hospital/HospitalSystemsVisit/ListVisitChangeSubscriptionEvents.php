<?php

namespace ChrisReedIO\AthenaSDK\Requests\Hospital\HospitalSystemsVisit;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListVisitChangeSubscriptionEvents
 *
 * Retrieves a list of events you can subscribe to for when visits are updated or checked in.
 */
class ListVisitChangeSubscriptionEvents extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/visits/changed/subscription/events';
    }

    public function __construct() {}
}
