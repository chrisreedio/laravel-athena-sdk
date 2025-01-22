<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\Vaccines;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListVaccineChangeSubscriptionEvents
 *
 * Retrieves the list of events that can be input for the vaccines changed subscription
 */
class ListVaccineChangeSubscriptionEvents extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/chart/healthhistory/vaccine/changed/subscription/events';
    }

    public function __construct() {}
}
