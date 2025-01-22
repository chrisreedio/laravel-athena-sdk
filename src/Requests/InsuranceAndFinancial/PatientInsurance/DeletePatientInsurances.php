<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\PatientInsurance;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeletePatientInsurances
 *
 * Deletes the record of patient insurances for a specific patient
 */
class DeletePatientInsurances extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/insurances";
    }

    /**
     * @param  int  $patientid  patientid
     * @param  int  $sequencenumber  1 = primary, 2 = secondary.
     * @param  null|string  $cancellationnote  Optional note as to why this is being cancelled. Maximum 400 characters
     * @param  null|int  $departmentid  If set, we will use the department id in an attempt to cancel insurance for the local patient.
     */
    public function __construct(
        protected int $patientid,
        protected int $sequencenumber,
        protected ?string $cancellationnote = null,
        protected ?int $departmentid = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter([
            'sequencenumber' => $this->sequencenumber,
            'cancellationnote' => $this->cancellationnote,
            'departmentid' => $this->departmentid,
        ]);
    }
}
