<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\AppointmentSlot;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListOpenAppointments
 *
 * Retrieves access to open appointment slots
 */
class ListOpenAppointments extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/appointments/open';
    }

    /**
     * @param  array  $departmentid  The athenaNet department ID.
     * @param  null|int  $appointmenttypeid  Normally, an appointment reason ID should be used which will map to the correct underlying appointment type in athenaNet. This field will ignore the practice's existing setup for what should be scheduled. Please consult with athenahealth before using. Either an appointmenttypeid or a reasonid must be specified or no results will be returned.
     * @param  null|bool  $bypassscheduletimechecks  Bypass checks that usually require returned appointments to be some amount of hours in the future (as configured by the practice, defaulting to 24 hours), and also ignores the setting that only shows appointments for a certain number of days in the future (also configurable by the practice, defaulting to 90 days).
     * @param  null|string  $enddate  End of the appointment search date range (mm/dd/yyyy).  Inclusive. Defaults to seven days from startdate.
     * @param  null|bool  $ignoreschedulablepermission  By default, we show only appointments that are are available to scheduled via the API.   This flag allows you to bypass that restriction for viewing available appointments (but you still may not be able to schedule based on this permission!).  This flag does not, however, show the full schedule (that is, appointments that are already booked).
     * @param  null|array  $providerid  The athenaNet provider ID. Required if a reasonid other than -1 is specified.
     * @param  null|array  $reasonid  The athenaNet patient appointment reason ID, from GET /patientappointmentreasons. While this is not technically required due to some unusual use cases, it is highly recommended for most calls. We do allow a special value of -1 for the reasonid. This reasonid will return open, web-schedulable slots regardless of reason.  However, slots returned using a search of -1 may return slots that are not bookable by any reason ID (they may be bookable by specific appointment type IDs instead).  This argument allows multiple valid reason IDs to be specified (e.g. reasonid=1,2,3), so if you are looking for slots that match "any" reason, it is recommended that you enumerate the set of reasons you are looking for.  Either a reasonid or an appointmenttypeid must be specified or no results will be returned. If a reasonid other than -1 is specified then a providerid must also be specified.
     * @param  null|bool  $showfrozenslots  By default, we hide appointments that are frozen from being returned via the API.   This flag allows you to show frozen slots in the set of results returned.
     * @param  null|string  $startdate  Start of the appointment search date range (mm/dd/yyyy).  Inclusive.  Defaults to today.
     */
    public function __construct(
        protected array $departmentid,
        protected ?int $appointmenttypeid = null,
        protected ?bool $bypassscheduletimechecks = null,
        protected ?string $enddate = null,
        protected ?bool $ignoreschedulablepermission = null,
        protected ?array $providerid = null,
        protected ?array $reasonid = null,
        protected ?bool $showfrozenslots = null,
        protected ?string $startdate = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'appointmenttypeid' => $this->appointmenttypeid,
            'bypassscheduletimechecks' => $this->bypassscheduletimechecks,
            'enddate' => $this->enddate,
            'ignoreschedulablepermission' => $this->ignoreschedulablepermission,
            'providerid' => $this->providerid,
            'reasonid' => $this->reasonid,
            'showfrozenslots' => $this->showfrozenslots,
            'startdate' => $this->startdate,
        ]);
    }
}
