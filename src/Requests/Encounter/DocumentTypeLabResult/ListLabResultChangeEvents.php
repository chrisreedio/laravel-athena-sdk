<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypeLabResult;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListLabResultChangeEvents
 *
 * Retrieve list of all events that can be input for this subscription.
 */
class ListLabResultChangeEvents extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/labresults/changed/subscription/events';
    }

    public function __construct() {}
}
