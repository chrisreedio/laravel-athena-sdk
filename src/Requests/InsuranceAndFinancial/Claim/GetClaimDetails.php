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
     * @param int $claimid claimid
     * @param null|bool $showcustomfields Include custom fields for the claim.
     * @param null|bool $showservicetypeaddons Include service type add-ons for the claim.
     */
    public function __construct(
        protected int $claimid,
        protected ?bool $showcustomfields = null,
        protected ?bool $showservicetypeaddons = null,
    )
    {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'showcustomfields' => $this->showcustomfields,
            'showservicetypeaddons' => $this->showservicetypeaddons
        ]);
    }
}
