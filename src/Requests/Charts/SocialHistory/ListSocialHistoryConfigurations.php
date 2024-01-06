<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\SocialHistory;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListSocialHistoryConfigurations
 *
 * Retrieves a list of configured social history templates and questions for this practice.
 */
class ListSocialHistoryConfigurations extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/chart/configuration/socialhistory';
    }

    public function __construct()
    {
    }
}
