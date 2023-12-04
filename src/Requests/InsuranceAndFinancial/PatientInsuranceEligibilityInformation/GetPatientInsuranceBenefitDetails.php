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
	 * @param int $patientid patientid
	 * @param int $insuranceid insuranceid
	 * @param null|string $servicetypecode STC Code for which we are checking the eligibility
	 * @param null|string $dateofservice Fetches the eligibility on that specific date.
	 */
	public function __construct(
		protected int $patientid,
		protected int $insuranceid,
		protected ?string $servicetypecode = null,
		protected ?string $dateofservice = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['servicetypecode' => $this->servicetypecode, 'dateofservice' => $this->dateofservice]);
	}
}
