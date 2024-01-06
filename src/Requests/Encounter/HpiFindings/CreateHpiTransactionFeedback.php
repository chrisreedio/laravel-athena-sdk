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
     * @param  string  $hpitransactionid Unique identifier to indicate the transaction for HPI across all systems.
     * @param  int  $transactionid transactionid
     * @param  string  $type Type of the response
     * @param  null|string  $accountbalance Account Balance
     * @param  null|string  $authorizationcharacteristics Code that is used to track participation status of this transaction in interchange rate programs
     * @param  null|string  $authorizationcode Code returned from the card issuer or authorizing institution indicating an approved authorization request
     * @param  null|string  $authorizationtransactiondate MMDDYY - the date to be used for this transaction
     * @param  null|string  $authorizationtransactiontime HHMMSS - Used to override system time as the time to be used for this transaction
     * @param  null|string  $businessdate Used to control business date in Gateway - MMDDYY Format
     * @param  null|string  $cardname Verbose card name defined in configuration
     * @param  null|string  $cardtype Two character card abbreviation defined in configuration
     * @param  null|string  $cashbackamount Amount of cashback the merchant provided back to the cardholder in the transaction.
     * @param  null|string  $cashierid Can contain any code or name up to 8 uppercase characters to identify the person running the POS.
     * @param  null|string  $customercode Merchant assigned code identifying this customer (i.e. customer Id or general ledger account number)
     * @param  null|string  $deviceid Unique HPI identifier for the paired device.
     * @param  null|array  $devicestate Object containing code and text
     * @param  null|string  $emvreceiptstring String of EMV receipt data to be inserted between header and normal receipt data and the signature and footer lines.
     * @param  null|string  $expirationdate MMYY - Represents the expiration date of the card. Required on CNP messages. Only on approved messages.
     * @param  null|array  $fundinginfo Object containing the funding location information for the merchant.
     * @param  null|string  $gatewayapiresponsestring The original string that is returned by Simplify (with no re-formatting performed by HPI)
     * @param  null|string  $hpimerchantid Unique HPI merchant identifier used to identify the funding location of the merchant.
     * @param  null|string  $issuertransactionid Unique tracking number assigned by the credit card issuing bank
     * @param  null|string  $merchantnumber Acquiring MID for merchant
     * @param  null|string  $posdatacode Delimited with ";" semi-colon between each POS DataCode value
     * @param  null|string  $posentrymode ISO POS Entry Mode values
     * @param  null|string  $posreferencenumber Uniquely generated number provided by the POS/integrator to identify the transaction with a batch/processing period.
     * @param  null|string  $retrievalreferencenumber Need to validate Fusebox returns. If not, then FB spec needs to be updated.
     * @param  null|string  $systemtraceauditnumber Fusebox will generate the STAN on the merchants. behalf
     * @param  null|string  $taxamount Total tax amount for the purchase.
     * @param  null|string  $tendertype Determines type of tender/account used
     * @param  null|string  $token Transaction Token. Required on CNP messages. Only on approved messages.
     * @param  null|string  $totalamount Total amount of the transaction including tax, gratuity, etc.
     * @param  null|string  $transactiontype The type of the transaction.
     * @param  null|string  $truncatedpan Masked Primary Account Number, XX.s replacing all digits except for the last 4. Only on approved messages.
     * @param  null|string  $validationcode Computed value assigned by the card association and used to verify data integrity between authorization and settlement
     */
    public function __construct(
        protected string $hpitransactionid,
        protected int $transactionid,
        protected string $type,
        protected ?string $accountbalance = null,
        protected ?string $authorizationcharacteristics = null,
        protected ?string $authorizationcode = null,
        protected ?string $authorizationtransactiondate = null,
        protected ?string $authorizationtransactiontime = null,
        protected ?string $businessdate = null,
        protected ?string $cardname = null,
        protected ?string $cardtype = null,
        protected ?string $cashbackamount = null,
        protected ?string $cashierid = null,
        protected ?string $customercode = null,
        protected ?string $deviceid = null,
        protected ?array $devicestate = null,
        protected ?string $emvreceiptstring = null,
        protected ?string $expirationdate = null,
        protected ?array $fundinginfo = null,
        protected ?string $gatewayapiresponsestring = null,
        protected ?string $hpimerchantid = null,
        protected ?string $invoicenumber = null,
        protected ?string $issuertransactionid = null,
        protected ?array $itemlist = null,
        protected ?string $merchantnumber = null,
        protected ?string $posdatacode = null,
        protected ?string $posentrymode = null,
        protected ?string $posreferencenumber = null,
        protected ?array $response = null,
        protected ?string $retrievalreferencenumber = null,
        protected ?string $systemtraceauditnumber = null,
        protected ?string $taxamount = null,
        protected ?string $tendertype = null,
        protected ?string $token = null,
        protected ?string $totalamount = null,
        protected ?string $transactiontype = null,
        protected ?string $truncatedpan = null,
        protected ?string $validationcode = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'hpitransactionid' => $this->hpitransactionid,
            'type' => $this->type,
            'accountbalance' => $this->accountbalance,
            'authorizationcharacteristics' => $this->authorizationcharacteristics,
            'authorizationcode' => $this->authorizationcode,
            'authorizationtransactiondate' => $this->authorizationtransactiondate,
            'authorizationtransactiontime' => $this->authorizationtransactiontime,
            'businessdate' => $this->businessdate,
            'cardname' => $this->cardname,
            'cardtype' => $this->cardtype,
            'cashbackamount' => $this->cashbackamount,
            'cashierid' => $this->cashierid,
            'customercode' => $this->customercode,
            'deviceid' => $this->deviceid,
            'devicestate' => $this->devicestate,
            'emvreceiptstring' => $this->emvreceiptstring,
            'expirationdate' => $this->expirationdate,
            'fundinginfo' => $this->fundinginfo,
            'gatewayapiresponsestring' => $this->gatewayapiresponsestring,
            'hpimerchantid' => $this->hpimerchantid,
            'invoicenumber' => $this->invoicenumber,
            'issuertransactionid' => $this->issuertransactionid,
            'itemlist' => $this->itemlist,
            'merchantnumber' => $this->merchantnumber,
            'posdatacode' => $this->posdatacode,
            'posentrymode' => $this->posentrymode,
            'posreferencenumber' => $this->posreferencenumber,
            'response' => $this->response,
            'retrievalreferencenumber' => $this->retrievalreferencenumber,
            'systemtraceauditnumber' => $this->systemtraceauditnumber,
            'taxamount' => $this->taxamount,
            'tendertype' => $this->tendertype,
            'token' => $this->token,
            'totalamount' => $this->totalamount,
            'transactiontype' => $this->transactiontype,
            'truncatedpan' => $this->truncatedpan,
            'validationcode' => $this->validationcode,
        ]);
    }
}
