<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\HpiFindings;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateHpiTransactionFeedback
 *
 * Returns SUCCESS/ERRORTEXT.
 */
class CreateHpiTransactionFeedback extends Request implements HasBody
{
	use HasFormBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/hpi/transactionid/{$this->transactionid}";
	}


	/**
	 * @param int $transactionid transactionid
	 * @param string $type Type of the response
	 * @param string $hpitransactionid Unique identifier to indicate the transaction for HPI across all systems.
	 * @param null|string $token Transaction Token. Required on CNP messages. Only on approved messages.
	 * @param null|string $cardname Verbose card name defined in configuration
	 * @param null|string $cardtype Two character card abbreviation defined in configuration
	 * @param null|string $deviceid Unique HPI identifier for the paired device.
	 * @param null|array $itemlist
	 * @param null|array $response
	 * @param null|string $cashierid Can contain any code or name up to 8 uppercase characters to identify the person running the POS.
	 * @param null|string $taxamount Total tax amount for the purchase.
	 * @param null|string $tendertype Determines type of tender/account used
	 * @param null|array $devicestate Object containing code and text
	 * @param null|array $fundinginfo Object containing the funding location information for the merchant.
	 * @param null|string $posdatacode Delimited with ";" semi-colon between each POS DataCode value
	 * @param null|string $totalamount Total amount of the transaction including tax, gratuity, etc.
	 * @param null|string $businessdate Used to control business date in Gateway - MMDDYY Format
	 * @param null|string $customercode Merchant assigned code identifying this customer (i.e. customer Id or general ledger account number)
	 * @param null|string $posentrymode ISO POS Entry Mode values
	 * @param null|string $truncatedpan Masked Primary Account Number, XX.s replacing all digits except for the last 4. Only on approved messages.
	 * @param null|string $hpimerchantid Unique HPI merchant identifier used to identify the funding location of the merchant.
	 * @param null|string $invoicenumber
	 * @param null|string $accountbalance Account Balance
	 * @param null|string $cashbackamount Amount of cashback the merchant provided back to the cardholder in the transaction.
	 * @param null|string $expirationdate MMYY - Represents the expiration date of the card. Required on CNP messages. Only on approved messages.
	 * @param null|string $merchantnumber Acquiring MID for merchant
	 * @param null|string $validationcode Computed value assigned by the card association and used to verify data integrity between authorization and settlement
	 * @param null|string $transactiontype The type of the transaction.
	 * @param null|string $emvreceiptstring String of EMV receipt data to be inserted between header and normal receipt data and the signature and footer lines.
	 * @param null|string $authorizationcode Code returned from the card issuer or authorizing institution indicating an approved authorization request
	 * @param null|string $posreferencenumber Uniquely generated number provided by the POS/integrator to identify the transaction with a batch/processing period.
	 * @param null|string $issuertransactionid Unique tracking number assigned by the credit card issuing bank
	 * @param null|string $systemtraceauditnumber Fusebox will generate the STAN on the merchants. behalf
	 * @param null|string $gatewayapiresponsestring The original string that is returned by Simplify (with no re-formatting performed by HPI)
	 * @param null|string $retrievalreferencenumber Need to validate Fusebox returns. If not, then FB spec needs to be updated.
	 * @param null|string $authorizationcharacteristics Code that is used to track participation status of this transaction in interchange rate programs
	 * @param null|string $authorizationtransactiondate MMDDYY - the date to be used for this transaction
	 * @param null|string $authorizationtransactiontime HHMMSS - Used to override system time as the time to be used for this transaction
	 */
	public function __construct(
		protected int $transactionid,
		protected string $type,
		protected string $hpitransactionid,
		protected ?string $token = null,
		protected ?string $cardname = null,
		protected ?string $cardtype = null,
		protected ?string $deviceid = null,
		protected ?array $itemlist = null,
		protected ?array $response = null,
		protected ?string $cashierid = null,
		protected ?string $taxamount = null,
		protected ?string $tendertype = null,
		protected ?array $devicestate = null,
		protected ?array $fundinginfo = null,
		protected ?string $posdatacode = null,
		protected ?string $totalamount = null,
		protected ?string $businessdate = null,
		protected ?string $customercode = null,
		protected ?string $posentrymode = null,
		protected ?string $truncatedpan = null,
		protected ?string $hpimerchantid = null,
		protected ?string $invoicenumber = null,
		protected ?string $accountbalance = null,
		protected ?string $cashbackamount = null,
		protected ?string $expirationdate = null,
		protected ?string $merchantnumber = null,
		protected ?string $validationcode = null,
		protected ?string $transactiontype = null,
		protected ?string $emvreceiptstring = null,
		protected ?string $authorizationcode = null,
		protected ?string $posreferencenumber = null,
		protected ?string $issuertransactionid = null,
		protected ?string $systemtraceauditnumber = null,
		protected ?string $gatewayapiresponsestring = null,
		protected ?string $retrievalreferencenumber = null,
		protected ?string $authorizationcharacteristics = null,
		protected ?string $authorizationtransactiondate = null,
		protected ?string $authorizationtransactiontime = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter([
			'type' => $this->type,
			'hpitransactionid' => $this->hpitransactionid,
			'token' => $this->token,
			'cardname' => $this->cardname,
			'cardtype' => $this->cardtype,
			'deviceid' => $this->deviceid,
			'itemlist' => $this->itemlist,
			'response' => $this->response,
			'cashierid' => $this->cashierid,
			'taxamount' => $this->taxamount,
			'tendertype' => $this->tendertype,
			'devicestate' => $this->devicestate,
			'fundinginfo' => $this->fundinginfo,
			'posdatacode' => $this->posdatacode,
			'totalamount' => $this->totalamount,
			'businessdate' => $this->businessdate,
			'customercode' => $this->customercode,
			'posentrymode' => $this->posentrymode,
			'truncatedpan' => $this->truncatedpan,
			'hpimerchantid' => $this->hpimerchantid,
			'invoicenumber' => $this->invoicenumber,
			'accountbalance' => $this->accountbalance,
			'cashbackamount' => $this->cashbackamount,
			'expirationdate' => $this->expirationdate,
			'merchantnumber' => $this->merchantnumber,
			'validationcode' => $this->validationcode,
			'transactiontype' => $this->transactiontype,
			'emvreceiptstring' => $this->emvreceiptstring,
			'authorizationcode' => $this->authorizationcode,
			'posreferencenumber' => $this->posreferencenumber,
			'issuertransactionid' => $this->issuertransactionid,
			'systemtraceauditnumber' => $this->systemtraceauditnumber,
			'gatewayapiresponsestring' => $this->gatewayapiresponsestring,
			'retrievalreferencenumber' => $this->retrievalreferencenumber,
			'authorizationcharacteristics' => $this->authorizationcharacteristics,
			'authorizationtransactiondate' => $this->authorizationtransactiondate,
			'authorizationtransactiontime' => $this->authorizationtransactiontime,
		]);
	}
}
