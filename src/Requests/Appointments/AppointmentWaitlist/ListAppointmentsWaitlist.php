<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\AppointmentWaitlist;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListAppointmentsWaitlist
 *
 * Retrieves the list all waiting list request appointments for all patients
 */
class ListAppointmentsWaitlist extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/appointments/waitlist';
    }

    /**
     * @param  null|int  $appointmentid  The booked appointment ID of the appointment that this wait list entry would replace.
     * @param  null|int  $appointmenttypeid  The appointment type ID of the desired appointment.
     * @param  null|array  $dayofweekids  A list (JSON array) of day of week IDs that are desired by the patient, with 1 being Sunday, and 7 being Saturday.
     * @param  null|int  $departmentid  The department ID of the desired department.  This can be blank if any department is acceptable.
     * @param  null|int  $hourfrom  The hour (24 hour clock) after which an appointment is desired by a patient.  Inclusive.
     * @param  null|int  $hourto  The hour (24 hour clock) before which an appointment is desired by a patient.  Inclusive.
     * @param  null|int  $patientid  The patient ID of the patient who is on the wait list.
     * @param  null|string  $priority  One of "LOW", "NORMAL", or "HIGH", indicating the priorty of this wait list entry.
     * @param  null|int  $providerid  The provider ID of the desired provider.  This can be blank if any provider is acceptable.
     */
    public function __construct(
        protected ?int $appointmentid = null,
        protected ?int $appointmenttypeid = null,
        protected ?array $dayofweekids = null,
        protected ?int $departmentid = null,
        protected ?int $hourfrom = null,
        protected ?int $hourto = null,
        protected ?int $patientid = null,
        protected ?string $priority = null,
        protected ?int $providerid = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'appointmentid' => $this->appointmentid,
            'appointmenttypeid' => $this->appointmenttypeid,
            'dayofweekids' => $this->dayofweekids,
            'departmentid' => $this->departmentid,
            'hourfrom' => $this->hourfrom,
            'hourto' => $this->hourto,
            'patientid' => $this->patientid,
            'priority' => $this->priority,
            'providerid' => $this->providerid,
        ]);
    }
}
