<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\OneYearPaymentContract;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetOneYearContractTerms
 *
 * Retrieves terms for one year payment contract
 */
class GetOneYearContractTerms extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/misc/oneyearcontractterms';
    }

    public function __construct() {}
}
