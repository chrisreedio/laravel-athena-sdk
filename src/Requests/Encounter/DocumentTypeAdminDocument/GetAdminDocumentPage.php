<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypeAdminDocument;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetAdminDocumentPage
 *
 * Retrieves a single page from a admin document that does not have a patientid
 */
class GetAdminDocumentPage extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/documents/admin/{$this->adminid}/pages/{$this->pageid}";
    }

    /**
     * @param  int  $pageid pageid
     * @param  int  $adminid adminid
     * @param  null|string  $filesize The file size of the document being requested.
     */
    public function __construct(
        protected int $pageid,
        protected int $adminid,
        protected ?string $filesize = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['filesize' => $this->filesize]);
    }
}
