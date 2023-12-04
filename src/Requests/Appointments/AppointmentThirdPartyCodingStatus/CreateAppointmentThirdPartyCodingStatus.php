<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\AppointmentThirdPartyCodingStatus;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateAppointmentThirdPartyCodingStatus
 *
 * Add the third party coding status for a specific appointment
 */
class CreateAppointmentThirdPartyCodingStatus extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/appointments/{$this->appointmentid}/thirdpartycodingstatus";
    }

    /**
     * @param int $appointmentid appointmentid
     * @param string $status The status to set this appointment's third party coding status to.
     */
    public function __construct(
        protected int    $appointmentid,
        protected string $status,
    )
    {
    }

    public function defaultBody(): array
    {
        return array_filter(['status' => $this->status]);
    }
}
