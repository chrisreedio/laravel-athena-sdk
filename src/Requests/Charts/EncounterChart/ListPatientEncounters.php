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
     * @param  int  $patientid patientid
     * @param  null|string  $startdate Omit any encounters earlier than this date
     * @param  null|bool  $showallstatuses By default only encounters in OPEN, CLOSED, or REVIEW status are retrieved, with this flag, encounters aren't filtered by status.
     * @param  null|bool  $showalltypes Retrieve all encounter types, by default only VISIT and ORDERSONLY are retrieved.
     * @param  null|int  $appointmentid Find the encounter for this appointment.
     * @param  null|string  $enddate Omit any encounters later than this date
     * @param  null|bool  $showdiagnoses Query diagnosis information for every encounter
     * @param  null|int  $providerid The ID of the provider for this encounter
     * @param  int  $departmentid The athenaNet department id.
     */
    public function __construct(
        protected int $patientid,
        protected ?string $startdate,
        protected ?bool $showallstatuses,
        protected ?bool $showalltypes,
        protected ?int $appointmentid,
        protected ?string $enddate,
        protected ?bool $showdiagnoses,
        protected ?int $providerid,
        protected int $departmentid,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'startdate' => $this->startdate,
            'showallstatuses' => $this->showallstatuses,
            'showalltypes' => $this->showalltypes,
            'appointmentid' => $this->appointmentid,
            'enddate' => $this->enddate,
            'showdiagnoses' => $this->showdiagnoses,
            'providerid' => $this->providerid,
            'departmentid' => $this->departmentid,
        ]);
    }
}
