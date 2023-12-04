<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\Claim;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateClaimChangeSubscription
 *
 * Subscribes for changed claims events
 */
class CreateClaimChangeSubscription extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/claims/changed/subscription';
    }

    /**
     * @param  null|string  $eventname By default, you are subscribed to all possible events.  If you only wish to subscribe to an individual event, pass the event name with this argument.
     * @param  null|bool  $showadditionalevents If this is set, we will include additional events that aren't normally included in the default list of events.
     */
    public function __construct(
        protected ?string $eventname = null,
        protected ?bool $showadditionalevents = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'eventname' => $this->eventname,
            'showadditionalevents' => $this->showadditionalevents,
        ]);
    }
}
