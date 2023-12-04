<?php

namespace ChrisReedIO\AthenaSDK\Requests\Patient\PatientCustomFields;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListPatientCustomFields
 *
 * Retrieves custom fields information for a specific patient
 */
class ListPatientCustomFields extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/customfields";
    }

    /**
     * @param string $departmentid
     * @param int $patientid patientid
     */
    public function __construct(
        protected string $departmentid,
        protected int    $patientid,
    )
    {
    }

    public function defaultQuery(): array
    {
        return array_filter(['departmentid' => $this->departmentid]);
    }
}
