<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\PaymentPlan;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListValidNonCcpCreditCardMethods
 *
 * Retrieves a list of valid credit card methods for practices not using CCP for use with
 * /patients/{patientid}/recordpayment
 */
class ListValidNonCcpCreditCardMethods extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/configuration/validnonccpcreditcardmethods';
    }

    public function __construct()
    {
    }

    public function defaultQuery(): array
    {
        return array_filter([]);
    }
}
