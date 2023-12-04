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
     * @param  null|string  $lastmodified Only return appointments that were last modified on the date provided.
     * @param  string  $enddate The last date in a range that you want to search for patients based on when they had an appointment.
     * @param  int  $departmentid departmentid
     * @param  null|int  $providerid providerid
     * @param  string  $startdate The first date in a range that you want to search for patients based on when they had an appointment.
     */
    public function __construct(
        protected ?string $lastmodified,
        protected string $enddate,
        protected int $departmentid,
        protected ?int $providerid,
        protected string $startdate,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'lastmodified' => $this->lastmodified,
            'enddate' => $this->enddate,
            'departmentid' => $this->departmentid,
            'providerid' => $this->providerid,
            'startdate' => $this->startdate,
        ]);
    }
}
