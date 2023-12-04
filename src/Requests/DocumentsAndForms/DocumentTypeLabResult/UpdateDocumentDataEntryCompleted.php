<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\DocumentTypeLabResult;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdateDocumentDataEntryCompleted
 *
 * Returns a success message pertaining to the update.
 */
class UpdateDocumentDataEntryCompleted extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/documents/labresult/{$this->documentid}/dataentrycompleted";
    }

    /**
     * @param  int  $documentid documentid
     * @param  null|string  $actionnote The note to be added to the document
     */
    public function __construct(
        protected int $documentid,
        protected ?string $actionnote = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter(['actionnote' => $this->actionnote]);
    }
}
