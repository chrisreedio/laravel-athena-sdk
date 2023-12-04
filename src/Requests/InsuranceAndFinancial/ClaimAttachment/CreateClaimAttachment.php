<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\ClaimAttachment;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateClaimAttachment
 *
 * Upload new document for a specific claim
 */
class CreateClaimAttachment extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/claims/{$this->claimid}/attachments";
    }

    /**
     * @param  string  $attachmentcontents The claim attachment content. Currently only PDF files are supported.
     * @param  string  $attachmenttype The claim attachment type class ID.
     * @param  int  $claimid claimid
     * @param  string  $filename The attachment file name.
     * @param  null|string  $note The claim attachment notes.
     */
    public function __construct(
        protected string $attachmentcontents,
        protected string $attachmenttype,
        protected int $claimid,
        protected string $filename,
        protected ?string $note = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'attachmentcontents' => $this->attachmentcontents,
            'attachmenttype' => $this->attachmenttype,
            'filename' => $this->filename,
            'note' => $this->note,
        ]);
    }
}
