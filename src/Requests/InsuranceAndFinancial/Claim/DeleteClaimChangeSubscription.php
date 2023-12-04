<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\Claim;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeleteClaimChangeSubscription
 *
 * Deletes a specific event which is no longer required
 */
class DeleteClaimChangeSubscription extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return '/claims/changed/subscription';
    }

    /**
     * @param null|string $eventname By default, you are unsubscribed from all possible events.  If you only wish to unsubscribe from an individual event, pass the event name with this argument.
     * @param null|bool $showadditionalevents If this is set, we will include additional events that aren't normally included in the default list of events.
     */
    public function __construct(
        protected ?string $eventname = null,
        protected ?bool   $showadditionalevents = null,
    )
    {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'eventname' => $this->eventname,
            'showadditionalevents' => $this->showadditionalevents
        ]);
    }
}
