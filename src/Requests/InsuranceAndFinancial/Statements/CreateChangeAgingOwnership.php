<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\Statements;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateChangeAgingOwnership
 *
 * This API informs athena on who manages dunning levels for a given claim. The default result of
 * enrolling a patient is that athena will manage the claims dunning levels.
 */
class CreateChangeAgingOwnership extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/patientpayvendors/{$this->vendorcode}/changeageingownership";
    }

    /**
     * @param  string  $action Represents who should own the Ageing of claims.Valid values are "AGEINGBYATHENA" , "AGEINGBYVENDOR"
     * @param  array  $claims List of Claim IDs Example: ["123","124"]
     * @param  string  $patientid Patientid of claims given in the input
     * @param  string  $vendorcode vendorcode
     */
    public function __construct(
        protected string $action,
        protected array $claims,
        protected string $patientid,
        protected string $vendorcode,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'action' => $this->action,
            'claims' => $this->claims,
            'patientid' => $this->patientid,
        ]);
    }
}
