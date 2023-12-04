<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\AppointmentWaitlist;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdateWaitlistEntry
 *
 * Generic success/error response
 */
class UpdateWaitlistEntry extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/appointments/waitlist/{$this->waitlistid}";
    }

    /**
     * @param  int  $waitlistid waitlistid
     * @param  null|string  $note Practice-facing note about why the wait list entry exists.
     * @param  null|int  $hourto The hour (24 hour clock) before which an appointment is desired by a patient.  Inclusive.
     * @param  null|int  $hourfrom The hour (24 hour clock) after which an appointment is desired by a patient.  Inclusive.
     * @param  null|string  $priority One of "LOW", "NORMAL", or "HIGH", indicating the priorty of this wait list entry.
     * @param  null|int  $providerid The provider ID of the desired provider.  This can be blank if any provider is acceptable.
     * @param  null|array  $dayofweekids A list (JSON array) of day of week IDs that are desired by the patient, with 1 being Sunday, and 7 being Saturday.
     * @param  null|int  $departmentid The department ID of the desired department.  This can be blank if any department is acceptable.
     * @param  null|int  $appointmentid The booked appointment ID of the appointment that this wait list entry would replace.
     * @param  null|int  $appointmenttypeid The appointment type ID of the desired appointment.
     * @param  null|bool  $allowanydepartment While a department is required when creating a wait list entry, this flag indicates that any department is accpetable for an appointment.
     */
    public function __construct(
        protected int $waitlistid,
        protected ?string $note = null,
        protected ?int $hourto = null,
        protected ?int $hourfrom = null,
        protected ?string $priority = null,
        protected ?int $providerid = null,
        protected ?array $dayofweekids = null,
        protected ?int $departmentid = null,
        protected ?int $appointmentid = null,
        protected ?int $appointmenttypeid = null,
        protected ?bool $allowanydepartment = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'note' => $this->note,
            'hourto' => $this->hourto,
            'hourfrom' => $this->hourfrom,
            'priority' => $this->priority,
            'providerid' => $this->providerid,
            'dayofweekids' => $this->dayofweekids,
            'departmentid' => $this->departmentid,
            'appointmentid' => $this->appointmentid,
            'appointmenttypeid' => $this->appointmenttypeid,
            'allowanydepartment' => $this->allowanydepartment,
        ]);
    }
}