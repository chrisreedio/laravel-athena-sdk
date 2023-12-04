<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\DocumentTypeImagingResult;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListImagingResultChangeEvents
 *
 * Retrieve list of all events that can be input for this subscription
 */
class ListImagingResultChangeEvents extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/imagingresults/changed/subscription/events';
    }

    public function __construct()
    {
    }
}
