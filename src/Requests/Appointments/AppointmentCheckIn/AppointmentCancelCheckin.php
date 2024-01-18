<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\AppointmentCheckIn;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * CreateAppointmentCancelCheckin
 *
 * Cancel appointment check-in process. It cannot be called if the check-in process has been completed.
 */
class AppointmentCancelCheckin extends Request
{
    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/appointments/{$this->appointmentid}/cancelcheckin";
    }

    /**
     * @param  int  $appointmentid  appointmentid
     */
    public function __construct(
        protected int $appointmentid,
    ) {
    }
}
