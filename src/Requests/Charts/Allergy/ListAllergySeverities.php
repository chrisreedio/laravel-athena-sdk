<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\Allergy;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListAllergySeverities
 *
 * Retrieves a list of valid allergy severities
 */
class ListAllergySeverities extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/reference/allergies/severities';
    }

    public function __construct()
    {
    }
}
