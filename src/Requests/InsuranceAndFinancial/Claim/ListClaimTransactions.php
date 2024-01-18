<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\Claim;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListClaimTransactions
 *
 * Retrieves a list of claims transactions for a specific claim
 */
class ListClaimTransactions extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/claims/{$this->claimid}/claimtransactions";
    }

    /**
     * @param  int  $claimid  claimid
     */
    public function __construct(
        protected int $claimid,
    ) {
    }
}
