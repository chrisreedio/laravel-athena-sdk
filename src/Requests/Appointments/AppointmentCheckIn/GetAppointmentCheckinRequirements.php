<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\AppointmentCheckIn;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetAppointmentCheckinRequirements
 *
 * Shows what is required before an appointment can be checked in.
 */
class GetAppointmentCheckinRequirements extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/appointments/{$this->appointmentid}/checkin";
    }

    /**
     * @param  int  $appointmentid appointmentid
     */
    public function __construct(
        protected int $appointmentid,
    ) {
    }
}
