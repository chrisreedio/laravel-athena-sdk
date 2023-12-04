<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\Allergy;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListAllergyChangeSubscriptionEvents
 *
 * Retrieve list of all events that can be input for this subscription.
 */
class ListAllergyChangeSubscriptionEvents extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/chart/healthhistory/allergies/changed/subscription/events';
    }

    public function __construct()
    {
    }
}
