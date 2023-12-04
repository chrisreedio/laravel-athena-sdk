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
     * @param  string  $vaccineid vaccineid
     * @param  int  $patientid patientid
     * @param  null|string  $deleteddate Date when this vaccine record was deleted from athenaNet (defaults to today)
     * @param  int  $departmentid The athenaNet department id.
     */
    public function __construct(
        protected string $vaccineid,
        protected int $patientid,
        protected ?string $deleteddate,
        protected int $departmentid,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['deleteddate' => $this->deleteddate, 'departmentid' => $this->departmentid]);
    }
}
