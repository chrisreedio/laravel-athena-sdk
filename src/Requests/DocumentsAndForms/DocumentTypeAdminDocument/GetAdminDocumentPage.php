<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\DocumentTypeAdminDocument;

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
     * @param  int  $adminid  adminid
     * @param  int  $pageid  pageid
     * @param  null|string  $filesize  The file size of the document being requested.
     */
    public function __construct(
        protected int $adminid,
        protected int $pageid,
        protected ?string $filesize = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['filesize' => $this->filesize]);
    }
}
