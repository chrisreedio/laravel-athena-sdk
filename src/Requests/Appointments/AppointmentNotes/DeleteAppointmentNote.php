<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\AppointmentNotes;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeleteAppointmentNote
 *
 * Deletes a note for a specific appointment
 */
class DeleteAppointmentNote extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/appointments/{$this->appointmentid}/notes/{$this->noteid}";
    }

    /**
     * @param  int  $appointmentid  appointmentid
     * @param  int  $noteid  noteid
     */
    public function __construct(
        protected int $appointmentid,
        protected int $noteid,
    ) {
    }
}
