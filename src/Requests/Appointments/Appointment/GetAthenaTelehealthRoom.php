<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\Appointment;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetAthenaTelehealthRoom
 *
 * Retrieve athenaone telehealth invite url.
 */
class GetAthenaTelehealthRoom extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/appointments/{$this->appointmentid}/nativeathenatelehealthroom";
    }

    /**
     * @param  int  $appointmentid  appointmentid
     */
    public function __construct(
        protected int $appointmentid,
    ) {}
}
