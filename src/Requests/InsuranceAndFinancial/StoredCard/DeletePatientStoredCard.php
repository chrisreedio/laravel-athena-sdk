<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\StoredCard;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeletePatientStoredCard
 *
 * Delete the record of a specific credit card of the patient
 */
class DeletePatientStoredCard extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/patients/{$this->patientid}/collectpayment/storedcard/{$this->storedcardid}";
	}


	/**
	 * @param int $storedcardid storedcardid
	 * @param int $patientid patientid
	 * @param int $departmentid The ID of the department where the payment or contract is being collected.
	 */
	public function __construct(
		protected int $storedcardid,
		protected int $patientid,
		protected int $departmentid,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['departmentid' => $this->departmentid]);
	}
}
