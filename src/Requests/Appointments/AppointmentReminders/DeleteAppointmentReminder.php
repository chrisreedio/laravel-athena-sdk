<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\AppointmentReminders;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeleteAppointmentReminder
 *
 * Results for deleting an appointment reminder for this practice.
 */
class DeleteAppointmentReminder extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/appointments/appointmentreminders/{$this->appointmentreminderid}";
    }

    /**
     * @param  int  $appointmentreminderid appointmentreminderid
     */
    public function __construct(
        protected int $appointmentreminderid,
    ) {
    }
}
