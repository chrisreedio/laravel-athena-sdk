<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\AppointmentReminders;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListAppointmentReminders
 *
 * Retrieves a list appointment reminders for a specific department
 */
class ListAppointmentReminders extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/appointments/appointmentreminders';
    }

    /**
     * @param  int  $departmentid  An athenaNet department ID.
     * @param  string  $enddate  Find reminders for appointments whose approximate date is on or before this date.
     * @param  string  $startdate  Find reminders for appointments whose approximate date is on or after this date.
     * @param  null|int  $appointmenttypeid  An athenaNet appointment type ID.
     * @param  null|int  $patientid  An athenaNet patient ID.
     * @param  null|int  $providerid  An athenaNet provider ID.
     * @param  null|bool  $showdeleted  By default, we do not return reminders that have been deleted. Setting this to true will show all reminders regardless of status.
     */
    public function __construct(
        protected int $departmentid,
        protected string $enddate,
        protected string $startdate,
        protected ?int $appointmenttypeid = null,
        protected ?int $patientid = null,
        protected ?int $providerid = null,
        protected ?bool $showdeleted = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'enddate' => $this->enddate,
            'startdate' => $this->startdate,
            'appointmenttypeid' => $this->appointmenttypeid,
            'patientid' => $this->patientid,
            'providerid' => $this->providerid,
            'showdeleted' => $this->showdeleted,
        ]);
    }
}
