<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\ClaimAttachment;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeleteClaimAttachment
 *
 * Removes the document record from the system for a specific claim
 */
class DeleteClaimAttachment extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/claims/{$this->claimid}/attachments";
    }

    /**
     * @param  int  $claimattachmentid  The claim attachment type class ID.
     * @param  int  $claimid  claimid
     */
    public function __construct(
        protected int $claimattachmentid,
        protected int $claimid,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['claimattachmentid' => $this->claimattachmentid]);
    }
}
