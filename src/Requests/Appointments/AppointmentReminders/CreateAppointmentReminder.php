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
     * @param  string  $approximatedate  The approximate date on which an appointment for this reminder should be scheduled.
     * @param  int  $departmentid  An athenaNet department ID.
     * @param  int  $patientid  An athenaNet patient ID.
     * @param  null|int  $appointmenttypeid  An athenaNet appointment type ID.
     * @param  null|string  $note  Miscellaneous notes for this reminder.
     * @param  null|string  $patientinstructions  Patient instructions regarding this reminder.
     * @param  null|int  $providerid  An athenaNet provider ID.
     */
    public function __construct(
        protected string $approximatedate,
        protected int $departmentid,
        protected int $patientid,
        protected ?int $appointmenttypeid = null,
        protected ?string $note = null,
        protected ?string $patientinstructions = null,
        protected ?int $providerid = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter([
            'approximatedate' => $this->approximatedate,
            'departmentid' => $this->departmentid,
            'patientid' => $this->patientid,
            'appointmenttypeid' => $this->appointmenttypeid,
            'note' => $this->note,
            'patientinstructions' => $this->patientinstructions,
            'providerid' => $this->providerid,
        ]);
    }
}
