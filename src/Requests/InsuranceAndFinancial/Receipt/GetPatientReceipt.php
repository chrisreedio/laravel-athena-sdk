<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\Receipt;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientReceipt
 *
 * Retrieves a copy of a patient receipt for a specific epayment
 */
class GetPatientReceipt extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/patients/{$this->patientid}/receipts/{$this->epaymentid}";
	}


	/**
	 * @param int $patientid patientid
	 * @param int $epaymentid epaymentid
	 * @param null|bool $customerversion If true, returns the customer (patient) version of the receipt.
	 * @param null|bool $merchantversion If true, returns the merchant version of the receipt.
	 */
	public function __construct(
		protected int $patientid,
		protected int $epaymentid,
		protected ?bool $customerversion = null,
		protected ?bool $merchantversion = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['customerversion' => $this->customerversion, 'merchantversion' => $this->merchantversion]);
	}
}
