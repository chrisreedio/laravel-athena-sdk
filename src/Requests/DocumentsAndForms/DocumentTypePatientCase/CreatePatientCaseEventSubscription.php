<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\DocumentTypePatientCase;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreatePatientCaseEventSubscription
 *
 * Subscribes for changed patient case document events
 */
class CreatePatientCaseEventSubscription extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/documents/patientcase/changed/subscription';
    }

    /**
     * @param null|string $eventname By default, you are subscribed to all possible events.  If you only wish to subscribe to an individual event, pass the event name with this argument.
     */
    public function __construct(
        protected ?string $eventname = null,
    )
    {
    }

    public function defaultBody(): array
    {
        return array_filter(['eventname' => $this->eventname]);
    }
}
