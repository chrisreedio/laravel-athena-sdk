<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\AppointmentSlot;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeleteAppointment
 *
 * Deletes an open appointment slot, which will no longer allow appointments to be scheduled in that
 * timeslot.
 */
class DeleteAppointment extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/appointments/{$this->appointmentid}";
    }

    /**
     * @param  int  $appointmentid  appointmentid
     */
    public function __construct(
        protected int $appointmentid,
    ) {
    }
}
