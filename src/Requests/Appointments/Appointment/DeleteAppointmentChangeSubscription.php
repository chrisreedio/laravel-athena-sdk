<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\Appointment;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeleteAppointmentChangeSubscription
 *
 * Delete a specific event which is no longer required
 */
class DeleteAppointmentChangeSubscription extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return '/appointments/changed/subscription';
    }

    /**
     * @param  null|string  $eventname By default, you are unsubscribed from all possible events.  If you only wish to unsubscribe from an individual event, pass the event name with this argument.
     * @param  null|bool  $includesuggestedoverbooking If this is set, we will include the UpdateSuggestedOverbooking event as if it is one of the default events. Otherwise we will ignore that it exists.
     * @param  null|bool  $includeremindercall If this is set, we will include the UpdateRemiderCall event as if it is one of the default events. Otherwise we will ignore that it exists.
     */
    public function __construct(
        protected ?string $eventname = null,
        protected ?bool $includesuggestedoverbooking = null,
        protected ?bool $includeremindercall = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'eventname' => $this->eventname,
            'includesuggestedoverbooking' => $this->includesuggestedoverbooking,
            'includeremindercall' => $this->includeremindercall,
        ]);
    }
}
