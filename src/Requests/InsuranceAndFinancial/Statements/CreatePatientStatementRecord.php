<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\Statements;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreatePatientStatementRecord
 *
 * This API records when patient statements are sent out by a third party vendor. It is used when
 * patient statements have been turned off by athena in order to allow those communications be handled
 * by a third party vendor, which generally instructs the patient on how to complete the payment using
 * the third party vendor's patient pay platform.
 */
class CreatePatientStatementRecord extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/patientpayvendors/{$this->vendorcode}/statements";
    }

    /**
     * @param  array  $data  Patient charge and statement sent details
     * @param  string  $vendorcode  vendorcode
     */
    public function __construct(
        protected array $data,
        protected string $vendorcode,
    ) {}

    public function defaultBody(): array
    {
        return array_filter(['data' => $this->data]);
    }
}
