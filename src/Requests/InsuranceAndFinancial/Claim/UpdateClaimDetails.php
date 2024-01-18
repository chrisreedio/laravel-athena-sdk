<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\Claim;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdateClaimDetails
 *
 * Modifies information for a specific claim
 */
class UpdateClaimDetails extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/claims/{$this->claimid}";
    }

    /**
     * @param  int  $claimid  claimid
     * @param  null|array  $claimcharges  List of charges for this claim whose allowable values should be updated. This should be a JSON string representing an array of charge objects.
     * @param  null|array  $customfields  A list of custom field JSON objects to populate on creation of a claim.
     * @param  null|int  $orderingproviderid  The ordering provider ID. 'Ordering Provider' service type add-on must be enabled. Default is no ordering provider ID. Any entry in this field will override any ordering provider ID in the service type add-ons field.
     * @param  null|int  $referralauthid  The referral authorization ID to associate with this claim.
     * @param  null|int  $referringproviderid  The referring provider ID (not the same from /providers) associated with this claim.
     * @param  null|array  $servicetypeaddons  Array of service type add-ons (STAOs) for the claim. Some claim level STAO fields do not support multiple values. These fields will save only the first value if more than one is passed in.
     */
    public function __construct(
        protected int $claimid,
        protected ?array $claimcharges = null,
        protected ?array $customfields = null,
        protected ?int $orderingproviderid = null,
        protected ?int $referralauthid = null,
        protected ?int $referringproviderid = null,
        protected ?array $servicetypeaddons = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'claimcharges' => $this->claimcharges,
            'customfields' => $this->customfields,
            'orderingproviderid' => $this->orderingproviderid,
            'referralauthid' => $this->referralauthid,
            'referringproviderid' => $this->referringproviderid,
            'servicetypeaddons' => $this->servicetypeaddons,
        ]);
    }
}
