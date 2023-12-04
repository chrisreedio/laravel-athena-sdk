<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\StoredCard;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreatePatientSpecificStoredCard
 *
 * Add a new credit card information to the patient file
 */
class CreatePatientSpecificStoredCard extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/collectpayment/storedcard/{$this->storedcardid}";
    }

    /**
     * @param  int  $storedcardid storedcardid
     * @param  int  $patientid patientid
     * @param  int  $departmentid The ID of the department where the payment or contract is being collected.
     * @param  null|string  $amount DEPRECATED: Please use "otheramount".
     * @param  null|string  $trackdata The track data obtained from the credit card swipe. This can be track1 and/or track2 data. In either case, please including the start and end sentinels. ("%" and "?" for track1 and ";" and "?" for track2.)
     * @param  null|string  $billingzip The billing zipcode for the credit card.  (Required if track data is not supplied.)
     * @param  null|string  $nameoncard The name on the credit card.  (Required if trackdata is not supplied; track 2 does NOT supply name.)  Please truncate at 30 characters. (Max length: 30)
     * @param  null|string  $copayamount The amount associated with a particular appointment for a copay.
     * @param  null|string  $otheramount The amount being collected that is not associated with individual appointment. This money goes into the "unapplied" bucket. In the future, these payments will be able to be broken down by individual claim level. Co-pay amounts should be in "copayamount".
     * @param  null|array  $claimpayment A JSON representation of claim ID and payment combinations.  For example, '[ { "1":"1.00"}, { "2":"5.00"} ].'  This indicates a payment of $1 for claim ID #1 and a payment of $5 for claim ID #2.
     * @param  null|bool  $todayservice Apply the other amount value to today's service.
     * @param  null|string  $accountnumber The account number of the credit card.  (Required if trackdata is not supplied.)
     * @param  null|int  $appointmentid The ID of the appointment where the copay should be applied.
     * @param  null|bool  $ecommercemode Use ECommerce credit card mode (e.g. for telemedicine). trackdata may NOT be used if this mode is true.
     * @param  null|string  $billingaddress The billing address for the credit card.  (Required if track data is not supplied.)  If more than 20 characters, please truncate. (Max length: 20)
     * @param  null|int  $cardsecuritycode The CVV2: the 3 (or 4 for Amex) digit value normally found on the back (or front for Amex) of the credit card. This is required for ecommerce mode payments.
     * @param  null|int  $expirationmonthmm The month the credit card expires (MM).  (Required if trackdata is not supplied.)
     * @param  null|int  $expirationyearyyyy The year the credit card expires (YYYY).  (Required if trackdata is not supplied.)
     * @param  null|bool  $allowduplicatepayments Allows duplicate payments.
     */
    public function __construct(
        protected int $storedcardid,
        protected int $patientid,
        protected int $departmentid,
        protected ?string $amount = null,
        protected ?string $trackdata = null,
        protected ?string $billingzip = null,
        protected ?string $nameoncard = null,
        protected ?string $copayamount = null,
        protected ?string $otheramount = null,
        protected ?array $claimpayment = null,
        protected ?bool $todayservice = null,
        protected ?string $accountnumber = null,
        protected ?int $appointmentid = null,
        protected ?bool $ecommercemode = null,
        protected ?string $billingaddress = null,
        protected ?int $cardsecuritycode = null,
        protected ?int $expirationmonthmm = null,
        protected ?int $expirationyearyyyy = null,
        protected ?bool $allowduplicatepayments = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'amount' => $this->amount,
            'trackdata' => $this->trackdata,
            'billingzip' => $this->billingzip,
            'nameoncard' => $this->nameoncard,
            'copayamount' => $this->copayamount,
            'otheramount' => $this->otheramount,
            'claimpayment' => $this->claimpayment,
            'todayservice' => $this->todayservice,
            'accountnumber' => $this->accountnumber,
            'appointmentid' => $this->appointmentid,
            'ecommercemode' => $this->ecommercemode,
            'billingaddress' => $this->billingaddress,
            'cardsecuritycode' => $this->cardsecuritycode,
            'expirationmonthmm' => $this->expirationmonthmm,
            'expirationyearyyyy' => $this->expirationyearyyyy,
            'allowduplicatepayments' => $this->allowduplicatepayments,
        ]);
    }
}