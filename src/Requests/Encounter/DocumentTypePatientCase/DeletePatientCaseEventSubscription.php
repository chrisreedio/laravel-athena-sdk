<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypePatientCase;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeletePatientCaseEventSubscription
 *
 * Delete an specific event which is no longer required
 */
class DeletePatientCaseEventSubscription extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return '/documents/patientcase/changed/subscription';
    }

    /**
     * @param  null|string  $eventname  By default, you are unsubscribed from all possible events.  If you only wish to unsubscribe from an individual event, pass the event name with this argument.
     */
    public function __construct(
        protected ?string $eventname = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['eventname' => $this->eventname]);
    }
}
