<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\AppointmentBooked;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdateBookedAppointment
 *
 * Modifies the department, provider or appointment type of a booked appointment
 */
class UpdateBookedAppointment extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/appointments/booked/{$this->appointmentid}";
    }

    /**
     * @param  int  $appointmentid  appointmentid
     * @param  null|int  $appointmenttypeid  New appointment type ID for this appointment.
     * @param  null|int  $departmentid  New department ID for this appointment.
     * @param  null|int  $providerid  New rendering provider for this appointment.
     * @param  null|int  $schedulingproviderid  New scheduling provider ID for this appointment.
     * @param  null|int  $supervisingproviderid  New supervisingprovider ID for this appointment.
     */
    public function __construct(
        protected int $appointmentid,
        protected ?int $appointmenttypeid = null,
        protected ?int $departmentid = null,
        protected ?int $providerid = null,
        protected ?int $schedulingproviderid = null,
        protected ?int $supervisingproviderid = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'appointmenttypeid' => $this->appointmenttypeid,
            'departmentid' => $this->departmentid,
            'providerid' => $this->providerid,
            'schedulingproviderid' => $this->schedulingproviderid,
            'supervisingproviderid' => $this->supervisingproviderid,
        ]);
    }
}
