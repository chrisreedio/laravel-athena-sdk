<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypeImagingResult;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListImagingResultChangeSubscriptions
 *
 * Retrieves list of events applicable for imaging results
 */
class ListImagingResultChangeSubscriptions extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/imagingresults/changed/subscription';
    }

    public function __construct()
    {
    }
}
