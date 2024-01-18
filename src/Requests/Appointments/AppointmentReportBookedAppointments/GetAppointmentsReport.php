<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\AppointmentReportBookedAppointments;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetAppointmentsReport
 *
 * Retrieves calling users appointment details of all booked, rescheduled and cancelled appointments
 */
class GetAppointmentsReport extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/appointments/report';
    }

    /**
     * @param  string  $enddate  The ending date range of when an appointment was scheduled (inclusive).
     * @param  string  $startdate  The starting date range of when an appointment was scheduled (inclusive).
     * @param  null|bool  $showexpectedprocedurecodes  Set this field to true to retrieve expected procedure codes.
     */
    public function __construct(
        protected string $enddate,
        protected string $startdate,
        protected ?bool $showexpectedprocedurecodes = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'enddate' => $this->enddate,
            'startdate' => $this->startdate,
            'showexpectedprocedurecodes' => $this->showexpectedprocedurecodes,
        ]);
    }
}
