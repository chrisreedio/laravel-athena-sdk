<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\Claim;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListClaimChangeEvents
 *
 * Retrieve list of all events that can be input for this subscription
 */
class ListClaimChangeEvents extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/claims/changed/subscription/events';
    }

    /**
     * @param null|bool $showadditionalevents Include non-default events
     */
    public function __construct(
        protected ?bool $showadditionalevents = null,
    )
    {
    }

    public function defaultQuery(): array
    {
        return array_filter(['showadditionalevents' => $this->showadditionalevents]);
    }
}
