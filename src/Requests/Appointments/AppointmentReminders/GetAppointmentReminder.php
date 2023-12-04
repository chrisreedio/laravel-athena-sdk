<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\AppointmentReminders;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetAppointmentReminder
 *
 * Retrieves a list appointment reminders for a specific department
 */
class GetAppointmentReminder extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/appointments/appointmentreminders/{$this->appointmentreminderid}";
    }

    /**
     * @param int $appointmentreminderid appointmentreminderid
     */
    public function __construct(
        protected int $appointmentreminderid,
    )
    {
    }
}
