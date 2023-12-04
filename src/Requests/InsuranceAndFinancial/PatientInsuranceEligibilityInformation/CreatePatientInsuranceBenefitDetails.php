<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\PatientInsuranceEligibilityInformation;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreatePatientInsuranceBenefitDetails
 *
 * Send eligibility check for a specific insurance
 */
class CreatePatientInsuranceBenefitDetails extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/insurances/{$this->insuranceid}/benefitdetails";
    }

    /**
     * @param int $insuranceid insuranceid
     * @param int $patientid patientid
     * @param null|string $dateofservice Checks the eligibility on that specific date.
     * @param null|string $servicetypecode STC Code for which we are checking the eligibility
     */
    public function __construct(
        protected int $insuranceid,
        protected int $patientid,
        protected ?string $dateofservice = null,
        protected ?string $servicetypecode = null,
    )
    {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'dateofservice' => $this->dateofservice,
            'servicetypecode' => $this->servicetypecode
        ]);
    }
}
