<?php

namespace ChrisReedIO\AthenaSDK\Requests\Provider\ProviderReference;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPersonalPronouns
 *
 * Get the mapping of personal pronouns id to display name. Note: This endpoint may rely on specific
 * settings to be enabled in athenaNet Production to function properly that are not required in other
 * environments. Please see <a
 * href="/api/resources/best-practices-and-troubleshooting#Handling_Beta_APIs">Permissioned Rollout of
 * APIs</a> for more information if you are experiencing issues.
 */
class GetPersonalPronouns extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/personalpronouns';
    }

    public function __construct() {}
}
