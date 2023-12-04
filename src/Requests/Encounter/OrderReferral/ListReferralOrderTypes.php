<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\OrderReferral;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListReferralOrderTypes
 *
 * Retrieves a list of referrals types configured in the system
 */
class ListReferralOrderTypes extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/reference/order/referral';
    }

    /**
     * @param string $searchvalue A term to search for. Must be at least 2 characters
     */
    public function __construct(
        protected string $searchvalue,
    )
    {
    }

    public function defaultQuery(): array
    {
        return array_filter(['searchvalue' => $this->searchvalue]);
    }
}
