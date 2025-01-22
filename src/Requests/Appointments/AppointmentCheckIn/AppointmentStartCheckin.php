<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\AppointmentCheckIn;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * CreateAppointmentStartCheckin
 *
 * Notifies that the appointment check-in process has started
 */
class AppointmentStartCheckin extends Request
{
    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/appointments/{$this->appointmentid}/startcheckin";
    }

    /**
     * @param  int  $appointmentid  appointmentid
     */
    public function __construct(
        protected int $appointmentid,
    ) {}
}
