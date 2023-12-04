<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\AppointmentInsurance;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdateAppointmentInsurances
 *
 * Modifies the insurance package of the patient for a specific appointment
 */
class UpdateAppointmentInsurances extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/appointments/{$this->appointmentid}/insurances";
    }

    /**
     * @param int $appointmentid appointmentid
     * @param null|int $primaryinsuranceid The athenaNet patient insurance ID for the policy you want to use as primary for this appointment.
     * @param null|int $secondaryinsuranceid The athenaNet patient insurance ID for the policy you want to use as secondary for this appointment.
     */
    public function __construct(
        protected int $appointmentid,
        protected ?int $primaryinsuranceid = null,
        protected ?int $secondaryinsuranceid = null,
    )
    {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'primaryinsuranceid' => $this->primaryinsuranceid,
            'secondaryinsuranceid' => $this->secondaryinsuranceid
        ]);
    }
}
