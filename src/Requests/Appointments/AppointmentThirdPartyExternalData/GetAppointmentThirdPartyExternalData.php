<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\AppointmentThirdPartyExternalData;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetAppointmentThirdPartyExternalData
 *
 * Retrieves the third party external data for a specific appointment
 */
class GetAppointmentThirdPartyExternalData extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/appointments/{$this->appointmentid}/thirdpartyexternaldata";
    }

    /**
     * @param  int  $appointmentid  appointmentid
     */
    public function __construct(
        protected int $appointmentid,
    ) {}
}
