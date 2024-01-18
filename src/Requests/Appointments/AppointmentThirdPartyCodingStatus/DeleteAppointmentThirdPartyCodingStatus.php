<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\AppointmentThirdPartyCodingStatus;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeleteAppointmentThirdPartyCodingStatus
 *
 * Deletes the record for a specific appointment coding status
 */
class DeleteAppointmentThirdPartyCodingStatus extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/appointments/{$this->appointmentid}/thirdpartycodingstatus";
    }

    /**
     * @param  int  $appointmentid  appointmentid
     */
    public function __construct(
        protected int $appointmentid,
    ) {
    }
}
