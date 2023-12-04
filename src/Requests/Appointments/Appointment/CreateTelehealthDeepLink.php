<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\Appointment;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateTelehealthDeepLink
 *
 * Retrieve athenaone telehealth deep link join url.
 */
class CreateTelehealthDeepLink extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/appointments/telehealth/deeplink';
    }

    /**
     * @param  int  $patientid The athenaNet Patient ID.
     * @param  int  $appointmentid The athenaNet appointment ID.
     */
    public function __construct(
        protected int $patientid,
        protected int $appointmentid,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter(['patientid' => $this->patientid, 'appointmentid' => $this->appointmentid]);
    }
}
