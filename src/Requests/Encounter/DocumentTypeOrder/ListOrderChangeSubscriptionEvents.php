<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypeOrder;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListOrderChangeSubscriptionEvents
 *
 * Retrieve list of all events that can be input for this subscription.
 */
class ListOrderChangeSubscriptionEvents extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/orders/changed/subscription/events';
    }

    public function __construct()
    {
    }
}
