<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\PaymentPlan;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreatePatientPaymentPlan
 *
 * Creates a payment plan for the patient. If payment is to be made via a credit card than provide the
 * appropriate credit card fields.
 */
class CreatePatientPaymentPlan extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/collectpayment/paymentplan";
    }

    /**
     * @param  array  $claimids  One or more claim IDs.
     * @param  string  $cycleamount  The amount the patient is to be billed per cycle.
     * @param  int  $departmentid  The ID of the department where the payment or contract is being collected.
     * @param  int  $patientid  patientid
     * @param  null|string  $accountnumber  The account number of the credit card.  (Required if trackdata is not supplied.)
     * @param  null|bool  $allowduplicatepayments  Allows duplicate payments.
     * @param  null|int  $appointmentid  The ID of the appointment where the copay should be applied.
     * @param  null|string  $billingaddress  The billing address for the credit card.  (Required if track data is not supplied.)  If more than 20 characters, please truncate. (Max length: 20)
     * @param  null|string  $billingmethod  Valid values are SENDSTATEMENTS or CREDITCARD.
     * @param  null|string  $billingzip  The billing zipcode for the credit card.  (Required if track data is not supplied.)
     * @param  null|int  $cardsecuritycode  The CVV2: the 3 (or 4 for Amex) digit value normally found on the back (or front for Amex) of the credit card.  When creating contracts, this is required if using accountnumber instead of track data.
     * @param  null|string  $downpaymentamount  Down payment to be billed.
     * @param  null|bool  $ecommercemode  Use ECommerce credit card mode (e.g. for telemedicine). trackdata may NOT be used if this mode is true.
     * @param  null|string  $email  The email address of the patient
     * @param  null|int  $expirationmonthmm  The month the credit card expires (MM).  (Required if trackdata is not supplied.)
     * @param  null|int  $expirationyearyyyy  The year the credit card expires (YYYY).  (Required if trackdata is not supplied.)
     * @param  null|string  $frequency  How often should the patient be billed (ONETIMEON - One-time charge, WEEKLY - Weekly, BIWEEKLY - Every two weeks, TWICEAMONTH - First and fifteenth of month, MONTHLY - Monthly, MONTHLYFIRSTBUSDAY - Monthly, first business day, MONTHLYLASTBUSDAY - Monthly, last business day).
     * @param  null|string  $nameoncard  The name on the credit card.  (Required if trackdata is not supplied; track 2 does NOT supply name.)  Please truncate at 30 characters. (Max length: 30)
     * @param  null|string  $paymentplanname  The name of the payment plan.
     * @param  null|string  $percentage  The percentage of the current outstanding balance that the patient should be billed each period.
     * @param  null|string  $startdate  The date the plan should start. Defaulted to tomorrow. If you set something to start today, it will NOT get billed today; it will be billed on the same day one month from today. Future payments of credit card plans will be billed on the same day of the month as the start date. For example, if the start date is 01/15, then the credit card will be billed for the second time on 02/15.
     * @param  null|bool  $todayservice  Apply the other amount value to today's service.
     * @param  null|string  $trackdata  The track data obtained from the credit card swipe. This can be track1 and/or track2 data. In either case, please including the start and end sentinels. ("%" and "?" for track1 and ";" and "?" for track2.)
     */
    public function __construct(
        protected array $claimids,
        protected string $cycleamount,
        protected int $departmentid,
        protected int $patientid,
        protected ?string $accountnumber = null,
        protected ?bool $allowduplicatepayments = null,
        protected ?int $appointmentid = null,
        protected ?string $billingaddress = null,
        protected ?string $billingmethod = null,
        protected ?string $billingzip = null,
        protected ?int $cardsecuritycode = null,
        protected ?string $downpaymentamount = null,
        protected ?bool $ecommercemode = null,
        protected ?string $email = null,
        protected ?int $expirationmonthmm = null,
        protected ?int $expirationyearyyyy = null,
        protected ?string $frequency = null,
        protected ?string $nameoncard = null,
        protected ?string $paymentplanname = null,
        protected ?string $percentage = null,
        protected ?string $startdate = null,
        protected ?bool $todayservice = null,
        protected ?string $trackdata = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter([
            'claimids' => $this->claimids,
            'cycleamount' => $this->cycleamount,
            'departmentid' => $this->departmentid,
            'accountnumber' => $this->accountnumber,
            'allowduplicatepayments' => $this->allowduplicatepayments,
            'appointmentid' => $this->appointmentid,
            'billingaddress' => $this->billingaddress,
            'billingmethod' => $this->billingmethod,
            'billingzip' => $this->billingzip,
            'cardsecuritycode' => $this->cardsecuritycode,
            'downpaymentamount' => $this->downpaymentamount,
            'ecommercemode' => $this->ecommercemode,
            'email' => $this->email,
            'expirationmonthmm' => $this->expirationmonthmm,
            'expirationyearyyyy' => $this->expirationyearyyyy,
            'frequency' => $this->frequency,
            'nameoncard' => $this->nameoncard,
            'paymentplanname' => $this->paymentplanname,
            'percentage' => $this->percentage,
            'startdate' => $this->startdate,
            'todayservice' => $this->todayservice,
            'trackdata' => $this->trackdata,
        ]);
    }
}
