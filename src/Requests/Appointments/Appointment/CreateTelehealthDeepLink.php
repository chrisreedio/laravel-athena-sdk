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
     * @param  int  $appointmentid The athenaNet appointment ID.
     * @param  int  $patientid The athenaNet Patient ID.
     */
    public function __construct(
        protected int $appointmentid,
        protected int $patientid,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'appointmentid' => $this->appointmentid,
            'patientid' => $this->patientid,
        ]);
    }
}
