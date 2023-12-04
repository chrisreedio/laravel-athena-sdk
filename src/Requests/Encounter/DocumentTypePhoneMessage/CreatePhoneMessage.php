<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypePhoneMessage;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasMultipartBody;

/**
 * CreatePhoneMessage
 *
 * Create a record of a new phone message for a department in the system
 */
class CreatePhoneMessage extends Request implements HasBody
{
    use HasMultipartBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/documents/phonemessage';
    }

    /**
     * @param  int  $departmentid The athenaNet department ID associated with the uploaded document.
     * @param  null|string  $priority Priority of this result.  1 is high; 2 is normal.
     * @param  null|bool  $autoclose Documents will, normally, automatically appear in the clinical inbox for providers to review. In some cases, you might want to force the document to skip the clinical inbox, and go directly to the patient chart with a "closed" status. For that case, set this to true.
     * @param  null|int  $providerid The ID of the ordering provider.
     * @param  null|string  $documentdata Text data stored with document
     * @param  null|string  $internalnote An internal note for the provider or staff. Updating this will append to any previous notes.
     * @param  null|int  $documenttypeid A specific document type identifier.
     * @param  null|string  $attachmentcontents The file contents that will be attached to this document. PDFs are recommended.
     */
    public function __construct(
        protected int $departmentid,
        protected ?string $priority = null,
        protected ?bool $autoclose = null,
        protected ?int $providerid = null,
        protected ?string $documentdata = null,
        protected ?string $internalnote = null,
        protected ?int $documenttypeid = null,
        protected ?string $attachmentcontents = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'priority' => $this->priority,
            'autoclose' => $this->autoclose,
            'providerid' => $this->providerid,
            'documentdata' => $this->documentdata,
            'internalnote' => $this->internalnote,
            'documenttypeid' => $this->documenttypeid,
            'attachmentcontents' => $this->attachmentcontents,
        ]);
    }
}
