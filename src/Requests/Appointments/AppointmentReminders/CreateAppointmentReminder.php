<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\AppointmentReminders;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateAppointmentReminder
 *
 * Creates an appointment reminder to indicate to the practice when a patient should be scheduled for a
 * future appointment.
 */
class CreateAppointmentReminder extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/appointments/appointmentreminders';
    }

    /**
     * @param  int  $patientid An athenaNet patient ID.
     * @param  int  $departmentid An athenaNet department ID.
     * @param  string  $approximatedate The approximate date on which an appointment for this reminder should be scheduled.
     * @param  null|string  $note Miscellaneous notes for this reminder.
     * @param  null|int  $providerid An athenaNet provider ID.
     * @param  null|int  $appointmenttypeid An athenaNet appointment type ID.
     * @param  null|string  $patientinstructions Patient instructions regarding this reminder.
     */
    public function __construct(
        protected int $patientid,
        protected int $departmentid,
        protected string $approximatedate,
        protected ?string $note = null,
        protected ?int $providerid = null,
        protected ?int $appointmenttypeid = null,
        protected ?string $patientinstructions = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'patientid' => $this->patientid,
            'departmentid' => $this->departmentid,
            'approximatedate' => $this->approximatedate,
            'note' => $this->note,
            'providerid' => $this->providerid,
            'appointmenttypeid' => $this->appointmenttypeid,
            'patientinstructions' => $this->patientinstructions,
        ]);
    }
}
