<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\SingleAppointmentPaymentContract;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetSingleAppointmentContractTerms
 *
 * Retrieves terms for a one year payment contract
 */
class GetSingleAppointmentContractTerms extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/misc/singleappointmentcontractterms';
    }

    public function __construct() {}
}
