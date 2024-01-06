<?php

namespace ChrisReedIO\AthenaSDK\Requests\Provider\ProviderNumbers;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateProviderNumberChangeSubscription
 *
 * Subscribes for changed providernumbers events
 */
class CreateProviderNumberChangeSubscription extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/providernumbers/changed/subscription';
    }

    /**
     * @param  null|string  $eventname By default, you are subscribed to all possible events.  If you only wish to subscribe to an individual event, pass the event name with this argument.
     */
    public function __construct(
        protected ?string $eventname = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter(['eventname' => $this->eventname]);
    }
}
