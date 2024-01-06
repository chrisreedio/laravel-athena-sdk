<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\AppointmentTypeDropDowns;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListSchedulableAppointmentMetadata
 *
 * Retrieve the types of appointments configured in the system
 */
class ListSchedulableAppointmentMetadata extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/appointments/appointmenttypedropdown/mapping';
    }

    /**
     * @param  null|int  $appointmenttypeid ID of the Appointment.
     * @param  null|int  $departmentid Id of the Department.
     * @param  null|int  $providerid ID of the Provider.
     * @param  null|bool  $showenabledonly By default we show all appointmenttypes available to provider/department combination Setting this flag to true and giving either provider, appointmenttypeid, departmentid, or any combination will show whats actually configured in the appointmenttypes drop down table for the given parameters.
     */
    public function __construct(
        protected ?int $appointmenttypeid = null,
        protected ?int $departmentid = null,
        protected ?int $providerid = null,
        protected ?bool $showenabledonly = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'appointmenttypeid' => $this->appointmenttypeid,
            'departmentid' => $this->departmentid,
            'providerid' => $this->providerid,
            'showenabledonly' => $this->showenabledonly,
        ]);
    }
}
