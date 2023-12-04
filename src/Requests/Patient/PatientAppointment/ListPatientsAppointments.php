<?php

namespace ChrisReedIO\AthenaSDK\Requests\Patient\PatientAppointment;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListPatientsAppointments
 *
 * Retrieves a list of patient's appointments
 */
class ListPatientsAppointments extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/appointments";
    }

    /**
     * @param  int  $patientid patientid
     * @param  null|string  $showcancelled Show cancelled appointments
     * @param  null|string  $showpast Show appointments that were before today
     * @param  null|string  $enddate End of the appointment search date range (mm/dd/yyyy).  Inclusive.
     * @param  null|bool  $showcopay By default, the expected co-pay is returned. For performance purposes, you can set this to false and copay will not be populated.
     * @param  null|string  $startdate Start of the appointment search date range (mm/dd/yyyy).  Inclusive.
     * @param  null|string  $sortorder Sort order by appointment date
     * @param  null|string  $showexpectedprocedurecodes Show expected procedure codes.
     * @param  null|bool  $showtelehealth Show indicator for if this is a native athenatelehealth appointment
     */
    public function __construct(
        protected int $patientid,
        protected ?string $showcancelled = null,
        protected ?string $showpast = null,
        protected ?string $enddate = null,
        protected ?bool $showcopay = null,
        protected ?string $startdate = null,
        protected ?string $sortorder = null,
        protected ?string $showexpectedprocedurecodes = null,
        protected ?bool $showtelehealth = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'showcancelled' => $this->showcancelled,
            'showpast' => $this->showpast,
            'enddate' => $this->enddate,
            'showcopay' => $this->showcopay,
            'startdate' => $this->startdate,
            'sortorder' => $this->sortorder,
            'showexpectedprocedurecodes' => $this->showexpectedprocedurecodes,
            'showtelehealth' => $this->showtelehealth,
        ]);
    }
}
