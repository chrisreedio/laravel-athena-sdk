<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\AppointmentConfirmationStatus;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdateAppointmentConfirmationStatus
 *
 * Update the confirmation status of a specific appointment
 */
class UpdateAppointmentConfirmationStatus extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/appointments/{$this->appointmentid}/confirmationstatus";
    }

    /**
     * @param  int  $appointmentid appointmentid
     * @param  int  $appointmentconfirmationid The appointment's confirmation status.
     */
    public function __construct(
        protected int $appointmentid,
        protected int $appointmentconfirmationid,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter(['appointmentconfirmationid' => $this->appointmentconfirmationid]);
    }
}
