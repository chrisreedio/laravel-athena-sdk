<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\ClaimAttachment;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdateClaimAttachment
 *
 * Modifies an existing claim document for a specific claim
 */
class UpdateClaimAttachment extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/claims/{$this->claimid}/attachments";
    }

    /**
     * @param  int  $claimattachmentid  The athena claim attachment ID.
     * @param  int  $claimid  claimid
     * @param  null|string  $attachmenttype  The claim attachment type class ID. Either attachmentype or notes is required.
     * @param  null|string  $note  The claim attachment notes, Either attachmentype or notes is required.
     */
    public function __construct(
        protected int $claimattachmentid,
        protected int $claimid,
        protected ?string $attachmenttype = null,
        protected ?string $note = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter([
            'claimattachmentid' => $this->claimattachmentid,
            'attachmenttype' => $this->attachmenttype,
            'note' => $this->note,
        ]);
    }
}
