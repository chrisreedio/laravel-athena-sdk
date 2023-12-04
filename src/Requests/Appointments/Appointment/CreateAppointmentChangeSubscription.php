<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\Appointment;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateAppointmentChangeSubscription
 *
 * Subscribes for changed appointment slots events
 */
class CreateAppointmentChangeSubscription extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/appointments/changed/subscription';
    }

    /**
     * @param  null|string  $eventname By default, you are subscribed to all possible events.  If you only wish to subscribe to an individual event, pass the event name with this argument.
     * @param  null|array  $departmentids For every New/Update Subscriptions complete list of departmentids should be passed. NOTE: Without DepartmentIDs entire Context/Practice will be subscribed.
     * @param  null|bool  $includeremindercall If this is set, we will include the UpdateRemiderCall event as if it is one of the default events. Otherwise we will ignore that it exists.
     * @param  null|bool  $includesuggestedoverbooking If this is set, we will include the UpdateSuggestedOverbooking event as if it is one of the default events. Otherwise we will ignore that it exists.
     */
    public function __construct(
        protected ?string $eventname = null,
        protected ?array $departmentids = null,
        protected ?bool $includeremindercall = null,
        protected ?bool $includesuggestedoverbooking = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'eventname' => $this->eventname,
            'departmentids' => $this->departmentids,
            'includeremindercall' => $this->includeremindercall,
            'includesuggestedoverbooking' => $this->includesuggestedoverbooking,
        ]);
    }
}
