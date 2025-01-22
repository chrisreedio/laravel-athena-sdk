<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\MedicareSecondaryPayerMsp;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdateAppointmentSpecificMspQualifier
 *
 * Modifies the Medicare Secondary Payer qualifier of a given appointment.
 */
class UpdateAppointmentSpecificMspQualifier extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/appointments/{$this->appointmentid}/mspq";
    }

    /**
     * @param  int  $appointmentid  appointmentid
     * @param  int  $mspinsurancetypeid  The MSP insurance type id
     * @param  null|int  $departmentid  The department ID.
     * @param  null|bool  $mspinsurancetypesetyn  Set the MSP Insurance Type
     * @param  null|int  $patientid  The athenaNet patient ID.
     */
    public function __construct(
        protected int $appointmentid,
        protected int $mspinsurancetypeid,
        protected ?int $departmentid = null,
        protected ?bool $mspinsurancetypesetyn = null,
        protected ?int $patientid = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter([
            'mspinsurancetypeid' => $this->mspinsurancetypeid,
            'departmentid' => $this->departmentid,
            'mspinsurancetypesetyn' => $this->mspinsurancetypesetyn,
            'patientid' => $this->patientid,
        ]);
    }
}
