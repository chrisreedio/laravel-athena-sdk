<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\Claim;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListClaimChangeSubscriptions
 *
 * Retrieves list of events applicable for claims
 */
class ListClaimChangeSubscriptions extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/claims/changed/subscription';
    }

    /**
     * @param null|bool $showadditionalevents If this is set, we will include additional events that aren't normally included in the default list of events.
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
