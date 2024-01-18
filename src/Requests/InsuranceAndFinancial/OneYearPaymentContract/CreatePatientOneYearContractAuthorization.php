<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\OneYearPaymentContract;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreatePatientOneYearContractAuthorization
 *
 * Creates a record of authorization for 1 year payment contract for a specific appointment
 */
class CreatePatientOneYearContractAuthorization extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/collectpayment/oneyear/{$this->appointmentid}";
    }

    /**
     * @param  int  $appointmentid  appointmentid
     * @param  string  $billingaddress  The billing address for the credit card. (Max length: 20)
     * @param  string  $billingzip  The billing zipcode for the credit card.
     * @param  int  $departmentid  The ID of the department where the payment or contract is being collected.
     * @param  int  $patientid  patientid
     * @param  null|string  $accountnumber  The account number of the credit card.  (Required if trackdata is not supplied.)
     * @param  null|bool  $allowduplicatepayments  Allows duplicate payments.
     * @param  null|int  $cardsecuritycode  The CVV2: the 3 (or 4 for Amex) digit value normally found on the back (or front for Amex) of the credit card.  When creating contracts, this is required if using accountnumber instead of track data.
     * @param  null|array  $claimpayment  A JSON representation of claim ID and payment combinations.  For example, '[ { "1":"1.00"}, { "2":"5.00"} ].'  This indicates a payment of $1 for claim ID #1 and a payment of $5 for claim ID #2.
     * @param  null|bool  $ecommercemode  Use ECommerce credit card mode (e.g. for telemedicine). trackdata may NOT be used if this mode is true.
     * @param  null|string  $email  The email address of the patient. This is the email that the notification that the charge is about to happen and the receipt afterwards will be emailed to.
     * @param  null|int  $expirationmonthmm  The month the credit card expires (MM).  (Required if trackdata is not supplied.)
     * @param  null|int  $expirationyearyyyy  The year the credit card expires (YYYY).  (Required if trackdata is not supplied.)
     * @param  null|int  $maxamount  The maximum amount that will be charged when remittance information is received.
     * @param  null|string  $nameoncard  The name on the credit card.  (Required if trackdata is not supplied; track 2 does NOT supply name.)  Please truncate at 30 characters. (Max length: 30)
     * @param  null|bool  $todayservice  Apply the other amount value to today's service.
     * @param  null|string  $trackdata  The track data obtained from the credit card swipe. This can be track1 and/or track2 data. In either case, please including the start and end sentinels. ("%" and "?" for track1 and ";" and "?" for track2.)
     */
    public function __construct(
        protected int $appointmentid,
        protected string $billingaddress,
        protected string $billingzip,
        protected int $departmentid,
        protected int $patientid,
        protected ?string $accountnumber = null,
        protected ?bool $allowduplicatepayments = null,
        protected ?int $cardsecuritycode = null,
        protected ?array $claimpayment = null,
        protected ?bool $ecommercemode = null,
        protected ?string $email = null,
        protected ?int $expirationmonthmm = null,
        protected ?int $expirationyearyyyy = null,
        protected ?int $maxamount = null,
        protected ?string $nameoncard = null,
        protected ?bool $todayservice = null,
        protected ?string $trackdata = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'billingaddress' => $this->billingaddress,
            'billingzip' => $this->billingzip,
            'departmentid' => $this->departmentid,
            'accountnumber' => $this->accountnumber,
            'allowduplicatepayments' => $this->allowduplicatepayments,
            'cardsecuritycode' => $this->cardsecuritycode,
            'claimpayment' => $this->claimpayment,
            'ecommercemode' => $this->ecommercemode,
            'email' => $this->email,
            'expirationmonthmm' => $this->expirationmonthmm,
            'expirationyearyyyy' => $this->expirationyearyyyy,
            'maxamount' => $this->maxamount,
            'nameoncard' => $this->nameoncard,
            'todayservice' => $this->todayservice,
            'trackdata' => $this->trackdata,
        ]);
    }
}
