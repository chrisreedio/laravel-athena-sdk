<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\Claim;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientOutstandingClaimsDetailed
 *
 * Get patient-facing open claims with additional detail
 */
class GetPatientOutstandingClaimsDetailed extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/claims/patientoutstandingdetailed";
    }

    /**
     * @param  int  $patientid patientid
     * @param  null|array  $claimids Filters the open claims to those with these IDs.
     * @param  null|bool  $showfamily When true also get open claims associated through family.
     * @param  null|int  $communicatorbrandid Filters the open claims within the brand. For a branded practice, it is expected to be passed.
     */
    public function __construct(
        protected int $patientid,
        protected ?array $claimids = null,
        protected ?bool $showfamily = null,
        protected ?int $communicatorbrandid = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['claimids' => $this->claimids, 'showfamily' => $this->showfamily, 'communicatorbrandid' => $this->communicatorbrandid]);
    }
}
