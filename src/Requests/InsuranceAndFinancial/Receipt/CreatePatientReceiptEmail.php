<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\Receipt;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreatePatientReceiptEmail
 *
 * Emails a copy of the credit card receipt to an email recipient
 */
class CreatePatientReceiptEmail extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/receipts/{$this->epaymentid}/email";
    }

    /**
     * @param  int  $patientid patientid
     * @param  int  $epaymentid epaymentid
     * @param  string  $email The email address to send to.
     */
    public function __construct(
        protected int $patientid,
        protected int $epaymentid,
        protected string $email,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter(['email' => $this->email]);
    }
}
