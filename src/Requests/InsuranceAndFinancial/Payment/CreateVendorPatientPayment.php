<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\Payment;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateVendorPatientPayment
 *
 * This API will record when a patient has made a payment via a third party vendor. It is important to
 * note that the third party vendor will actually conduct the transaction. This API is simply for
 * recording that transaction after the fact. Additionally, the third party vendor can use this API to
 * tell athena to tie a given payment to the Copay portion of a patient's balance. Lastly, if the third
 * party vendor is using athena's current Credit Card Processor (CCP), which is Elavon, then they can
 * also provide additional details (i.e. VENDORTERMINALID and BANKDEPOSITDATE) in order to drive
 * automated reconciliation between the movement of the money and the indicated payment transaction.
 */
class CreateVendorPatientPayment extends Request implements HasBody
{
	use HasFormBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/patientpayvendors/{$this->vendorcode}/payments";
	}


	/**
	 * @param string $vendorcode vendorcode
	 * @param int $departmentid The ID of the department where the payment or contract is being collected.
	 * @param string $externalrefid The Vendor side reference for this payment. This is expected to be unique for a vendor as it is the one used for checking if a particular  payment is duplicate of another. Also, in case of any issues, this field will help us with debugging. Maxlength = 32
	 * @param int $patientid The ID of the patient for whom the payment is being made
	 * @param string $paymentmethod The payment method obtained from the api /patientpayvendors/{VENDORCODE}/validvendorpaymentmethods
	 * @param null|int $appointmentid The ID of the appointment where the copay should be applied.
	 * @param null|string $bankdepositdate The date when payment gets deposited to US Bank.
	 * @param null|string $cardnumberlast4 The last 4 digits of the credit card number.  This is required if the payment method is a credit card.
	 * @param null|string $checknumber The check number.  This is required if the payment is made by check.
	 * @param null|array $claimpayment A JSON representation of claim ID and payment combinations.  For example, '[ { "1":"1.00"}, { "2":"5.00"} ].'  This indicates a payment of $1 for claim ID #1 and a payment of $5 for claim ID #2.
	 * @param null|string $copayamount The amount associated with a particular appointment for a copay.
	 * @param null|bool $movetounappliedifoverpay In case of overpay in a particular claim, automatically move the balance amount for that particular claim to unapplied
	 * @param null|string $otheramount The amount being collected that is not associated with individual appointment. This money goes into the "unapplied" bucket. In the future, these payments will be able to be broken down by individual claim level.
	 * @param null|string $postdate The date the payment was made based on Eastern time zone.  Defaulted to today.
	 * @param null|string $todayservice Apply the other amount value to today's service.
	 * @param null|string $vendorterminalid The TID is used to make the CC payment with payment gateway.  This is required if the payment method is a credit card.
	 */
	public function __construct(
		protected string $vendorcode,
		protected int $departmentid,
		protected string $externalrefid,
		protected int $patientid,
		protected string $paymentmethod,
		protected ?int $appointmentid = null,
		protected ?string $bankdepositdate = null,
		protected ?string $cardnumberlast4 = null,
		protected ?string $checknumber = null,
		protected ?array $claimpayment = null,
		protected ?string $copayamount = null,
		protected ?bool $movetounappliedifoverpay = null,
		protected ?string $otheramount = null,
		protected ?string $postdate = null,
		protected ?string $todayservice = null,
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
			'appointmentid' => $this->appointmentid,
			'bankdepositdate' => $this->bankdepositdate,
			'cardnumberlast4' => $this->cardnumberlast4,
			'checknumber' => $this->checknumber,
			'claimpayment' => $this->claimpayment,
			'copayamount' => $this->copayamount,
			'movetounappliedifoverpay' => $this->movetounappliedifoverpay,
			'otheramount' => $this->otheramount,
			'postdate' => $this->postdate,
			'todayservice' => $this->todayservice,
			'vendorterminalid' => $this->vendorterminalid,
		]);
	}
}
