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
     * @param string $email The email address to send to.
     * @param int $epaymentid epaymentid
     * @param int $patientid patientid
     */
    public function __construct(
        protected string $email,
        protected int    $epaymentid,
        protected int    $patientid,
    )
    {
    }

    public function defaultBody(): array
    {
        return array_filter(['email' => $this->email]);
    }
}
