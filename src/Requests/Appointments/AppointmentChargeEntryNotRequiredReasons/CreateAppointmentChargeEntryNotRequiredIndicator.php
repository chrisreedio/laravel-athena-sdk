<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\AppointmentChargeEntryNotRequiredReasons;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateAppointmentChargeEntryNotRequiredIndicator
 *
 * Update the appointment record to indicate charge entry is not required
 */
class CreateAppointmentChargeEntryNotRequiredIndicator extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/appointments/{$this->appointmentid}/chargeentrynotrequired";
    }

    /**
     * @param  int  $appointmentid  appointmentid
     * @param  string  $athenausername  athenaNet username of the person marking this appointment as not requiring charge entry.
     * @param  string  $chargeentrynotrequiredreason  Reason that this appointment is being marked as not requiring charge entry. This reason is specific to each practice and must be configured by that practice in athenaNet. The reasons, with descriptions, can be listed with the /configuration/appointments/chargeentrynotrequiredreasons endpoint.
     */
    public function __construct(
        protected int $appointmentid,
        protected string $athenausername,
        protected string $chargeentrynotrequiredreason,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'athenausername' => $this->athenausername,
            'chargeentrynotrequiredreason' => $this->chargeentrynotrequiredreason,
        ]);
    }
}
