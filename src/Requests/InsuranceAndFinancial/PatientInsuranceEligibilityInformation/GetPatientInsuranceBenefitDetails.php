<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\PatientInsuranceEligibilityInformation;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientInsuranceBenefitDetails
 *
 * Retrieves eligibility information for a specific insurance
 */
class GetPatientInsuranceBenefitDetails extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/insurances/{$this->insuranceid}/benefitdetails";
    }

    /**
     * @param  int  $insuranceid insuranceid
     * @param  int  $patientid patientid
     * @param  null|string  $dateofservice Fetches the eligibility on that specific date.
     * @param  null|string  $servicetypecode STC Code for which we are checking the eligibility
     */
    public function __construct(
        protected int $insuranceid,
        protected int $patientid,
        protected ?string $dateofservice = null,
        protected ?string $servicetypecode = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'dateofservice' => $this->dateofservice,
            'servicetypecode' => $this->servicetypecode,
        ]);
    }
}
