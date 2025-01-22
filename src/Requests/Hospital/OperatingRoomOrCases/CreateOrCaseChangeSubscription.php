<?php

namespace ChrisReedIO\AthenaSDK\Requests\Hospital\OperatingRoomOrCases;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateOrCaseChangeSubscription
 *
 * Subscribes for change events for hospital OR-cases
 */
class CreateOrCaseChangeSubscription extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/orcase/changed/subscription';
    }

    /**
     * @param  null|string  $eventname  By default, you are subscribed to all possible events.  If you only wish to subscribe to an individual event, pass the event name with this argument.
     */
    public function __construct(
        protected ?string $eventname = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter(['eventname' => $this->eventname]);
    }
}
