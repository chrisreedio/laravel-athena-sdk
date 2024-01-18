<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\Vaccines;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeletePatientVaccine
 *
 * Delete's a specific vaccine data from patient's chart
 */
class DeletePatientVaccine extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/chart/{$this->patientid}/vaccines/{$this->vaccineid}";
    }

    /**
     * @param  int  $departmentid  The athenaNet department id.
     * @param  int  $patientid  patientid
     * @param  string  $vaccineid  vaccineid
     * @param  null|string  $deleteddate  Date when this vaccine record was deleted from athenaNet (defaults to today)
     */
    public function __construct(
        protected int $departmentid,
        protected int $patientid,
        protected string $vaccineid,
        protected ?string $deleteddate = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'deleteddate' => $this->deleteddate,
        ]);
    }
}
