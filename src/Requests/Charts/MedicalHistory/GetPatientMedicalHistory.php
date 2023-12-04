<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\MedicalHistory;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientMedicalHistory
 *
 * Retrieves medical history of a specific patient
 */
class GetPatientMedicalHistory extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/chart/{$this->patientid}/medicalhistory";
    }

    /**
     * @param  int  $patientid patientid
     * @param  int  $departmentid The athenaNet department ID.
     */
    public function __construct(
        protected int $patientid,
        protected int $departmentid,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['departmentid' => $this->departmentid]);
    }
}