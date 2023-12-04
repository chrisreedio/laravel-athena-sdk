<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\AppointmentAccidentData;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetAppointmentAccidentData
 *
 * Retrieves the data for a specific appointment caused due to an accident
 */
class GetAppointmentAccidentData extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/appointments/{$this->appointmentid}/accidentdata";
    }

    /**
     * @param int $appointmentid appointmentid
     */
    public function __construct(
        protected int $appointmentid,
    )
    {
    }
}
