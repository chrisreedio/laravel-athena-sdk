<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\Claim;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetClaimDetails
 *
 * Retrieves information for a specific claim
 */
class GetClaimDetails extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/claims/{$this->claimid}";
    }

    /**
     * @param  int  $claimid claimid
     * @param  null|bool  $showservicetypeaddons Include service type add-ons for the claim.
     * @param  null|bool  $showcustomfields Include custom fields for the claim.
     */
    public function __construct(
        protected int $claimid,
        protected ?bool $showservicetypeaddons = null,
        protected ?bool $showcustomfields = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['showservicetypeaddons' => $this->showservicetypeaddons, 'showcustomfields' => $this->showcustomfields]);
    }
}
