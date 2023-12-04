<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\Receipt;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientReceiptDetails
 *
 * Retrieves the details of the patient payment receipt
 */
class GetPatientReceiptDetails extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/patients/{$this->patientid}/receipts/{$this->epaymentid}/details";
	}


	/**
	 * @param int $patientid patientid
	 * @param int $epaymentid epaymentid
	 * @param null|bool $termsasjson To include contract terms as JSON object.
	 */
	public function __construct(
		protected int $patientid,
		protected int $epaymentid,
		protected ?bool $termsasjson = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['termsasjson' => $this->termsasjson]);
	}
}
