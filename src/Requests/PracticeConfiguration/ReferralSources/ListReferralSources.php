<?php

namespace ChrisReedIO\AthenaSDK\Requests\PracticeConfiguration\ReferralSources;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListReferralSources
 *
 * Retrieves the list of referral sources configured in the system
 */
class ListReferralSources extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/referralsources';
    }

    public function __construct()
    {
    }

    public function defaultQuery(): array
    {
        return array_filter([]);
    }
}
