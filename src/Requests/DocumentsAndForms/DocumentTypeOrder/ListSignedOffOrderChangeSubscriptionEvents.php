<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\DocumentTypeOrder;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListSignedOffOrderChangeSubscriptionEvents
 *
 * Retrieve list of all events that can be input for this subscription.
 */
class ListSignedOffOrderChangeSubscriptionEvents extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/orders/signedoff/subscription/events';
    }

    public function __construct() {}
}
