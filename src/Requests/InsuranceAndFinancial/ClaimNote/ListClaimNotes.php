<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\ClaimNote;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListClaimNotes
 *
 * Retrieves the list of notes for a specific clinical document
 */
class ListClaimNotes extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/claims/{$this->claimid}/claimnotes";
    }

    /**
     * @param  int  $claimid claimid
     * @param  null|string  $pendingflags Select claimnotes based on pendingflag values. 'All' selects claimnotes with any pendingflag ('Y', 'O', 'N', or null); pending claimnotes have a pendingflag of 'Y'; overridden claimntoes have a pendingflag of 'O'. Default is 'All'.
     * @param  null|bool  $showholdonly Return only claimnotes that currently have a HOLD or HOLD-like status. Defaults to 'false'.
     */
    public function __construct(
        protected int $claimid,
        protected ?string $pendingflags = null,
        protected ?bool $showholdonly = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'pendingflags' => $this->pendingflags,
            'showholdonly' => $this->showholdonly,
        ]);
    }
}
