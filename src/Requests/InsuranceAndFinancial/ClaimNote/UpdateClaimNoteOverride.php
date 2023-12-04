<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\ClaimNote;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdateClaimNoteOverride
 *
 * Modifies an existing note for a specific claim
 */
class UpdateClaimNoteOverride extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/claims/{$this->claimid}/claimnotes/override";
    }

    /**
     * @param  int  $claimid claimid
     * @param  string  $username The user overriding these claimnotes. Must have permission to override ADVICE and RULE claimnote types.
     * @param  null|bool  $overrideall Select ALL elligible claimnotes to override or to undo overrides. Cannot be selected when a specific list of claimnote IDs is specified.
     * @param  null|array  $claimnoteids A list of claimnotes to override. Claimnotes MUST be overridable
     * @param  null|bool  $undooverrides Undo overridden claimnotes.
     */
    public function __construct(
        protected int $claimid,
        protected string $username,
        protected ?bool $overrideall = null,
        protected ?array $claimnoteids = null,
        protected ?bool $undooverrides = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'username' => $this->username,
            'overrideall' => $this->overrideall,
            'claimnoteids' => $this->claimnoteids,
            'undooverrides' => $this->undooverrides,
        ]);
    }
}
