<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\AppointmentThirdPartyCodingStatus;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetAppointmentThirdPartyCodingStatus
 *
 * Retrieves the third party coding status for a specific appointment
 */
class GetAppointmentThirdPartyCodingStatus extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/appointments/{$this->appointmentid}/thirdpartycodingstatus";
    }

    /**
     * @param  int  $appointmentid appointmentid
     */
    public function __construct(
        protected int $appointmentid,
    ) {
    }
}
