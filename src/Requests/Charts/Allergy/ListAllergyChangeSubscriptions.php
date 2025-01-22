<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\Allergy;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListAllergyChangeSubscriptions
 *
 * Retrieves list of events applicable for allergies
 */
class ListAllergyChangeSubscriptions extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/chart/healthhistory/allergies/changed/subscription';
    }

    public function __construct() {}
}
