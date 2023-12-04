<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\PaymentPlan;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientPaymentPlan
 *
 * Retrieves payment plans for the patient
 */
class GetPatientPaymentPlan extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/patients/{$this->patientid}/collectpayment/paymentplan";
	}


	/**
	 * @param int $patientid patientid
	 * @param null|bool $linkedclaiminfo Get claims covered by the payment plan
	 * @param int $departmentid The department ID.
	 * @param null|array $paymentplanids One or more payment plan IDs.
	 */
	public function __construct(
		protected int $patientid,
		protected ?bool $linkedclaiminfo = null,
		protected int $departmentid,
		protected ?array $paymentplanids = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter([
			'linkedclaiminfo' => $this->linkedclaiminfo,
			'departmentid' => $this->departmentid,
			'paymentplanids' => $this->paymentplanids,
		]);
	}
}
