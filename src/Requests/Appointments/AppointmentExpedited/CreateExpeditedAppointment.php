<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\AppointmentExpedited;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateExpeditedAppointment
 *
 * Information about a single patient's appointments
 */
class CreateExpeditedAppointment extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/appointments/expedited';
    }

    /**
     * @param  int  $patientid The patient for the appointment.
     * @param  int  $providerid The provider to associate with the appointment.
     * @param  int  $departmentid The department in which the appointment will take place.
     * @param  int  $appointmenttypeid The ID of the appointment type that will be used for the new appointment.
     * @param  null|bool  $deferinsurance If set to true, a patient does not have to have insurance on file to complete check-in. Note, if the practice setting "Expedited Encounters and Deferred Insurance" is set to "ENCOUNTERSONLY" then you cannot defer insurance.
     */
    public function __construct(
        protected int $patientid,
        protected int $providerid,
        protected int $departmentid,
        protected int $appointmenttypeid,
        protected ?bool $deferinsurance = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'patientid' => $this->patientid,
            'providerid' => $this->providerid,
            'departmentid' => $this->departmentid,
            'appointmenttypeid' => $this->appointmenttypeid,
            'deferinsurance' => $this->deferinsurance,
        ]);
    }
}
