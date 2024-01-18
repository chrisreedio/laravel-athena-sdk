<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\AppointmentConfirmationStatus;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetAppointmentConfirmationStatus
 *
 * Retrieve the confirmation status of a specific appointment
 */
class GetAppointmentConfirmationStatus extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/appointments/{$this->appointmentid}/confirmationstatus";
    }

    /**
     * @param  int  $appointmentid  appointmentid
     */
    public function __construct(
        protected int $appointmentid,
    ) {
    }
}
