<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\DocumentTypeAdminDocument;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientAdminDocumentPage
 *
 * Retrieves a single page from a specific admin document of a patient
 */
class GetPatientAdminDocumentPage extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/documents/admin/{$this->adminid}/pages/{$this->pageid}";
    }

    /**
     * @param  int  $adminid  adminid
     * @param  int  $pageid  pageid
     * @param  int  $patientid  patientid
     * @param  null|string  $filesize  The file size of the document being requested.
     */
    public function __construct(
        protected int $adminid,
        protected int $pageid,
        protected int $patientid,
        protected ?string $filesize = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['filesize' => $this->filesize]);
    }
}
