<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\EncounterChart;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListPatientEncounters
 *
 * Retrieves a list of patient encounters
 */
class ListPatientEncounters extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/chart/{$this->patientid}/encounters";
    }

    /**
     * @param  int  $departmentid The athenaNet department id.
     * @param  int  $patientid patientid
     * @param  null|int  $appointmentid Find the encounter for this appointment.
     * @param  null|string  $enddate Omit any encounters later than this date
     * @param  null|int  $providerid The ID of the provider for this encounter
     * @param  null|bool  $showallstatuses By default only encounters in OPEN, CLOSED, or REVIEW status are retrieved, with this flag, encounters aren't filtered by status.
     * @param  null|bool  $showalltypes Retrieve all encounter types, by default only VISIT and ORDERSONLY are retrieved.
     * @param  null|bool  $showdiagnoses Query diagnosis information for every encounter
     * @param  null|string  $startdate Omit any encounters earlier than this date
     */
    public function __construct(
        protected int $departmentid,
        protected int $patientid,
        protected ?int $appointmentid = null,
        protected ?string $enddate = null,
        protected ?int $providerid = null,
        protected ?bool $showallstatuses = null,
        protected ?bool $showalltypes = null,
        protected ?bool $showdiagnoses = null,
        protected ?string $startdate = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'appointmentid' => $this->appointmentid,
            'enddate' => $this->enddate,
            'providerid' => $this->providerid,
            'showallstatuses' => $this->showallstatuses,
            'showalltypes' => $this->showalltypes,
            'showdiagnoses' => $this->showdiagnoses,
            'startdate' => $this->startdate,
        ]);
    }
}
