<?php

namespace ChrisReedIO\AthenaSDK\Requests\Patient\PatientSatisfaction;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListPatientSatisfactionScores
 *
 * Retrieves the patient-satisfaction score for a specific provider in a past appointment
 */
class ListPatientSatisfactionScores extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/patientsatisfaction';
    }

    /**
     * @param  int  $departmentid  departmentid
     * @param  string  $enddate  The last date in a range that you want to search for patients based on when they had an appointment.
     * @param  string  $startdate  The first date in a range that you want to search for patients based on when they had an appointment.
     * @param  null|string  $lastmodified  Only return appointments that were last modified on the date provided.
     * @param  null|int  $providerid  providerid
     */
    public function __construct(
        protected int $departmentid,
        protected string $startdate,
        protected string $enddate,
        protected ?string $lastmodified = null,
        protected ?int $providerid = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'enddate' => $this->enddate,
            'startdate' => $this->startdate,
            'lastmodified' => $this->lastmodified,
            'providerid' => $this->providerid,
        ]);
    }
}
