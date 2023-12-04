<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\Payment;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreatePatientPaymentRecord
 *
 * Records the data related to a cash, check, or non-CCP credit card patient payment
 */
class CreatePatientPaymentRecord extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/recordpayment";
    }

    /**
     * @param int $departmentid The ID of the department where the payment or contract is being collected.
     * @param int $patientid patientid
     * @param string $paymentmethod Valid values include CASH or CHECK or anything as a result of /configuration/validnonccpcreditcardmethods. Note that practices using Credit Card Plus (CCP) should typically NOT be using this call and should instead use the collectpayment endpoints to charge the card. In addition, all payments recorded via this method are subject to the same policies as any other money collected by athenahealth.
     * @param null|int $appointmentid The ID of the appointment where the copay should be applied.
     * @param null|string $cardnumberlast4 The last 4 digits of the credit card number.  This is required if the payment method is a credit card.
     * @param null|string $checknumber The check number.  This is required if the payment is made by check.
     * @param null|array $claimpayment A JSON representation of claim ID and payment combinations.  For example, '[ { "1":"1.00"}, { "2":"5.00"} ].'  This indicates a payment of $1 for claim ID #1 and a payment of $5 for claim ID #2.
     * @param null|string $copayamount The amount associated with a particular appointment for a copay.
     * @param null|string $otheramount The amount being collected that is not associated with individual appointment. This money goes into the "unapplied" bucket. In the future, these payments will be able to be broken down by individual claim level. Co-pay amounts should be in "copayamount".
     * @param null|string $postdate The date the payment was made.  Defaulted to today.
     * @param null|string $todayservice Apply the other amount value to today's service.
     */
    public function __construct(
        protected int     $departmentid,
        protected int     $patientid,
        protected string  $paymentmethod,
        protected ?int    $appointmentid = null,
        protected ?string $cardnumberlast4 = null,
        protected ?string $checknumber = null,
        protected ?array  $claimpayment = null,
        protected ?string $copayamount = null,
        protected ?string $otheramount = null,
        protected ?string $postdate = null,
        protected ?string $todayservice = null,
    )
    {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'paymentmethod' => $this->paymentmethod,
            'appointmentid' => $this->appointmentid,
            'cardnumberlast4' => $this->cardnumberlast4,
            'checknumber' => $this->checknumber,
            'claimpayment' => $this->claimpayment,
            'copayamount' => $this->copayamount,
            'otheramount' => $this->otheramount,
            'postdate' => $this->postdate,
            'todayservice' => $this->todayservice,
        ]);
    }
}
