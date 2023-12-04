<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\Receipt;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListPatientSignedReceipts
 *
 * Retrieves a PDF of the signed receipt image
 */
class ListPatientSignedReceipts extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/patients/{$this->patientid}/receipts/{$this->epaymentid}/signed";
	}


	/**
	 * @param int $patientid patientid
	 * @param int $epaymentid epaymentid
	 */
	public function __construct(
		protected int $patientid,
		protected int $epaymentid,
	) {
	}
}
