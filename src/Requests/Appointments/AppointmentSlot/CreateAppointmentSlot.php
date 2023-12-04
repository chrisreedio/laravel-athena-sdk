<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\AppointmentSlot;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateAppointmentSlot
 *
 * Provides the ability to add new open appointment slots
 */
class CreateAppointmentSlot extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/appointments/open';
    }

    /**
     * @param string $appointmentdate The appointment date for the new open appointment slot (mm/dd/yyyy).
     * @param array $appointmenttime The time (hh24:mi) for the new appointment slot.  Multiple times (either as a comma delimited list or multiple POSTed values) are allowed.  24 hour time.
     * @param int $departmentid The athenaNet department ID.
     * @param int $providerid The athenaNet provider ID.
     * @param null|int $appointmenttypeid The appointment type ID to be created.  Either this or a reason must be provided.
     * @param null|int $reasonid The appointment reason (/patientappointmentreasons) to be created. Either this or a raw appointment type ID must be provided.
     */
    public function __construct(
        protected string $appointmentdate,
        protected array  $appointmenttime,
        protected int    $departmentid,
        protected int    $providerid,
        protected ?int   $appointmenttypeid = null,
        protected ?int   $reasonid = null,
    )
    {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'appointmentdate' => $this->appointmentdate,
            'appointmenttime' => $this->appointmenttime,
            'departmentid' => $this->departmentid,
            'providerid' => $this->providerid,
            'appointmenttypeid' => $this->appointmenttypeid,
            'reasonid' => $this->reasonid,
        ]);
    }
}
