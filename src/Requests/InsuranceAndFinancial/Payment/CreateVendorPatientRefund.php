<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\Payment;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateVendorPatientRefund
 *
 * This API will record when a patient has been refunded via a third party vendor. It is important to
 * note that the third party vendor will actually move the money back to the patient. This API is
 * simply for recording the transaction after the fact. Additionally, this endpoint only accepts full
 * refunds. If a partial adjustment is needed, please use the Adjustments API.
 */
class CreateVendorPatientRefund extends Request implements HasBody
{
	use HasFormBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/patientpayvendors/{$this->vendorcode}/payments/{$this->patientpaymentid}/refund";
	}


	/**
	 * @param string $vendorcode vendorcode
	 * @param string $patientpaymentid patientpaymentid
	 * @param number $departmentid The ID of the department where the refund is issued.
	 * @param string $externalrefid The Vendor side reference for this refund. This is expected to be unique for a vendor as it is the one used for checking if a particular refund is duplicate of another. Also, in case of any issues, this field will help us with debugging. Maxlength = 32
	 * @param number $patientid The ID of the patient for whom the payment is made
	 * @param string $paymentmethod The payment method obtained from the api /patientpayvendors/{VENDORCODE}/validvendorpaymentmethods
	 * @param null|string $bankdepositdate The date when the payment gets deposited to US Bank.
	 * @param null|bool $fullrefund Currently the only supported value is true. Passing this as false would return an error
	 * @param null|bool $ispaymentsettled This input will be used to decide whether the refund needs to be voided or refunded. So based on the Vendor credit card processor settlement time, vendor will decide to use ISPAYMENTSETTLED = true if the actual refund happened after the settlement time
	 * @param null|string $postdate The date the payment was made.  Defaulted to today.
	 * @param null|string $vendorterminalid The TID is used to make the CC payment with payment gateway.  This is required if the payment method is a credit card.
	 */
	public function __construct(
		protected string $vendorcode,
		protected string $patientpaymentid,
		protected \number $departmentid,
		protected string $externalrefid,
		protected \number $patientid,
		protected string $paymentmethod,
		protected ?string $bankdepositdate = null,
		protected ?bool $fullrefund = null,
		protected ?bool $ispaymentsettled = null,
		protected ?string $postdate = null,
		protected ?string $vendorterminalid = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter([
			'departmentid' => $this->departmentid,
			'externalrefid' => $this->externalrefid,
			'patientid' => $this->patientid,
			'paymentmethod' => $this->paymentmethod,
			'bankdepositdate' => $this->bankdepositdate,
			'fullrefund' => $this->fullrefund,
			'ispaymentsettled' => $this->ispaymentsettled,
			'postdate' => $this->postdate,
			'vendorterminalid' => $this->vendorterminalid,
		]);
	}
}
