<?php

namespace ChrisReedIO\AthenaSDK\Requests\Patient\PatientCustomFields;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdatePatientCustomFields
 *
 * Modifies custom fields data for a specific patient
 */
class UpdatePatientCustomFields extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/customfields";
    }

    /**
     * @param  array  $customfields  A JSON representation of any updates to custom fields. The contents of this should match the custom fields output (either with /patients/{patientid}/customfields or within a /patients/{patientid} call) with, of course, any updates. Validation should happen based on the structure given in the /customfields/ call; this means that the values submitted in a select list should be a proper option ID, that number fields are restricted to numbers, and date fields restricted to dates (mm/dd/yyyy).
     * @param  string  $departmentid  The department ID; needed because custom fields may be department-specific
     * @param  string  $patientid  patientid
     */
    public function __construct(
        protected array $customfields,
        protected string $departmentid,
        protected string $patientid,
    ) {
    }

    public function defaultBody(): array
    {
        return [
            'customfields' => json_encode($this->customfields),
            'departmentid' => $this->departmentid,
        ];
    }
}
