<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\AppointmentCheckIn;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * CreateAppointmentCheckin
 *
 * Check in this appointment.
 */
class CreateAppointmentCheckin extends Request
{
    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/appointments/{$this->appointmentid}/checkin";
    }

    /**
     * @param int $appointmentid appointmentid
     */
    public function __construct(
        protected int $appointmentid,
    )
    {
    }
}
