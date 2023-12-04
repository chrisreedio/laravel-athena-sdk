<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\ClaimNote;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateClaimNote
 *
 * Creates a new note for a specific claim
 */
class CreateClaimNote extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/claims/{$this->claimid}/note";
    }

    /**
     * @param  int  $claimid claimid
     * @param  string  $claimnote The text of the note.
     */
    public function __construct(
        protected int $claimid,
        protected string $claimnote,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter(['claimnote' => $this->claimnote]);
    }
}
