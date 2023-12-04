<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\InsurancePackage;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateLocalInsurancePackage
 *
 * Create a new record of locally administered insurance package
 */
class CreateLocalInsurancePackage extends Request implements HasBody
{
	use HasFormBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/insurancepackages/configuration/locallyadministered";
	}


	/**
	 * @param string $address The address (line 1) of the locally administered insurance package.
	 * @param string $city The city of the locally administered insurance package.
	 * @param string $claimformat The claim format to use for billing.  Acceptable values are CMS1500 or CorporateBilling (for invoices).
	 * @param string $name The name of the locally administered insurance package.
	 * @param string $phone The phone number of the locally administered insurance package.
	 * @param null|string $address2 The address (line 2) of the locally administered insurance package.
	 * @param null|string $contactname The contact name of the locally administered insurance package.
	 * @param null|int $countryid The athena country ID of the locally administered insurance package.
	 * @param null|string $effectivedate The effective date of the locally administered insurance package.
	 * @param null|string $expirationdate The expiration date of the locally administered insurance package.
	 * @param null|string $fax The fax number of the locally administered insurance package.
	 * @param null|string $frequency The frequency of invoice billing.  Acceptable values are M (monthly), W (weekly) and D (daily). This is required when claimformat=CorporateBilling and invalid when claimformat=CMS1500.
	 * @param null|bool $invoicecoversheet Indicates whether or not invoices should include a cover sheet.
	 * @param null|string $invoiceemailaddress The email address to which claims/invoices should be submitted. This is required when invoicesendviaemail=true and invalid when invoicesendviaemail=false.
	 * @param null|int $invoiceoverduedays The number of days after which an overdue invoice should be submitted.  This is only valid when invoicesubmitoverdue=true. The value must be an integer between 60 and 200.  The default value is 60.
	 * @param null|string $invoicepurchaseordernumber The purchase order number to include on invoices for this locally administered insurance package.
	 * @param null|bool $invoicesendviaemail Indicates whether or not claims/invoices should be submitted via email.
	 * @param null|bool $invoiceshowadjustments Indicates whether or not invoices should show allowable adjustments.
	 * @param null|bool $invoicesubmitcorrected Indicates whether or not corrected invoices should be submitted for this locally administered insurance package.
	 * @param null|bool $invoicesubmitoverdue Indicates whether or not overdue invoices should be submitted for this locally administered insurance package. This can only be true when invoicesubmitcorrected=true.
	 * @param null|string $note Notes about the locally administered insurance package.
	 * @param null|string $state The state of the locally administered insurance package.
	 * @param null|string $switchoverdate The ICD-10 switchover date of the locally administered insurance package (defaults to 10/01/2015).
	 * @param null|string $zip The zip code of the locally administered insurance package.
	 */
	public function __construct(
		protected string $address,
		protected string $city,
		protected string $claimformat,
		protected string $name,
		protected string $phone,
		protected ?string $address2 = null,
		protected ?string $contactname = null,
		protected ?int $countryid = null,
		protected ?string $effectivedate = null,
		protected ?string $expirationdate = null,
		protected ?string $fax = null,
		protected ?string $frequency = null,
		protected ?bool $invoicecoversheet = null,
		protected ?string $invoiceemailaddress = null,
		protected ?int $invoiceoverduedays = null,
		protected ?string $invoicepurchaseordernumber = null,
		protected ?bool $invoicesendviaemail = null,
		protected ?bool $invoiceshowadjustments = null,
		protected ?bool $invoicesubmitcorrected = null,
		protected ?bool $invoicesubmitoverdue = null,
		protected ?string $note = null,
		protected ?string $state = null,
		protected ?string $switchoverdate = null,
		protected ?string $zip = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter([
			'address' => $this->address,
			'city' => $this->city,
			'claimformat' => $this->claimformat,
			'name' => $this->name,
			'phone' => $this->phone,
			'address2' => $this->address2,
			'contactname' => $this->contactname,
			'countryid' => $this->countryid,
			'effectivedate' => $this->effectivedate,
			'expirationdate' => $this->expirationdate,
			'fax' => $this->fax,
			'frequency' => $this->frequency,
			'invoicecoversheet' => $this->invoicecoversheet,
			'invoiceemailaddress' => $this->invoiceemailaddress,
			'invoiceoverduedays' => $this->invoiceoverduedays,
			'invoicepurchaseordernumber' => $this->invoicepurchaseordernumber,
			'invoicesendviaemail' => $this->invoicesendviaemail,
			'invoiceshowadjustments' => $this->invoiceshowadjustments,
			'invoicesubmitcorrected' => $this->invoicesubmitcorrected,
			'invoicesubmitoverdue' => $this->invoicesubmitoverdue,
			'note' => $this->note,
			'state' => $this->state,
			'switchoverdate' => $this->switchoverdate,
			'zip' => $this->zip,
		]);
	}
}
