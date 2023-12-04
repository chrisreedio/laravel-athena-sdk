<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\Payment;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * CreateVoidPatientPayment
 *
 * This only works from the time of the payment to the time it is settled, generally around 8 p.m.
 * Eastern time nightly.
 */
class CreateVoidPatientPayment extends Request
{
	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/patients/{$this->patientid}/voidpayment/{$this->epaymentid}";
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
