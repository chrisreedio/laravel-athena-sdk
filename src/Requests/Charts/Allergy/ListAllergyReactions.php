<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\Allergy;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListAllergyReactions
 *
 * Retrieves a list of valid allergy reaction
 */
class ListAllergyReactions extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/reference/allergies/reactions';
    }

    public function __construct() {}
}
