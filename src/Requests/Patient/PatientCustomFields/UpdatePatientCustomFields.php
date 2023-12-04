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
     * @param  int  $patientid patientid
     * @param  array  $customfields A JSON representation of any updates to custom fields. The contents of this should match the custom fields output (either with /patients/{patientid}/customfields or within a /patients/{patientid} call) with, of course, any updates. Validation should happen based on the structure given in the /customfields/ call; this means that the values submitted in a select list should be a proper option ID, that number fields are restricted to numbers, and date fields restricted to dates (mm/dd/yyyy).
     */
    public function __construct(
        protected int $patientid,
        protected array $customfields,
        protected string $departmentid,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter(['customfields' => $this->customfields, 'departmentid' => $this->departmentid]);
    }
}
