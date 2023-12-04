<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\AppointmentWaitlist;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetAppointmentWaitlist
 *
 * Retrieves the list all waiting list request appointments for all patients
 */
class GetAppointmentWaitlist extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/appointments/waitlist/{$this->waitlistid}";
    }

    /**
     * @param int $waitlistid waitlistid
     */
    public function __construct(
        protected int $waitlistid,
    )
    {
    }
}
