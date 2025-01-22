<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\PatientInsurance;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeletePatientSpecificInsurance
 *
 * Delete a patient's specific insurance package
 */
class DeletePatientSpecificInsurance extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/insurances/{$this->insuranceid}";
    }

    /**
     * @param  int  $insuranceid  insuranceid
     * @param  int  $patientid  patientid
     * @param  null|string  $cancellationnote  Optional note as to why this is being cancelled.
     */
    public function __construct(
        protected int $insuranceid,
        protected int $patientid,
        protected ?string $cancellationnote = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['cancellationnote' => $this->cancellationnote]);
    }
}
