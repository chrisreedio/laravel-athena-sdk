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
     * @param  int  $claimid claimid
     * @param  int  $claimattachmentid The athena claim attachment ID.
     * @param  null|string  $note The claim attachment notes, Either attachmentype or notes is required.
     * @param  null|string  $attachmenttype The claim attachment type class ID. Either attachmentype or notes is required.
     */
    public function __construct(
        protected int $claimid,
        protected int $claimattachmentid,
        protected ?string $note = null,
        protected ?string $attachmenttype = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter(['claimattachmentid' => $this->claimattachmentid, 'note' => $this->note, 'attachmenttype' => $this->attachmenttype]);
    }
}
