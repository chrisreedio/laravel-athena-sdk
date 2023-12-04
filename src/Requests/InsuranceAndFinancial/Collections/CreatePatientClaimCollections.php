<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\Collections;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreatePatientClaimCollections
 *
 * This API will allow third party vendors to indicate when a claim should be moved to Collections.
 * This implies that the customer already has setup their collection agency and collection policy
 * procedures within athena. This API essentially tags the claim in way that athena's internal scripts
 * know that the claim is ready to be sent to Collections.
 */
class CreatePatientClaimCollections extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/patientpayvendors/{$this->vendorcode}/claimcollections";
    }

    /**
     * @param  string  $vendorcode vendorcode
     * @param  array  $claimids List of Claim IDs.Example: [123,124]
     */
    public function __construct(
        protected string $vendorcode,
        protected array $claimids,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter(['claimids' => $this->claimids]);
    }
}
