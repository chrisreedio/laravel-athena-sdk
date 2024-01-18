<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\DocumentTypeLabResult;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetLabResultDocumentPage
 *
 * Retrieves a specific page from the specific lab result document of the patient
 */
class GetLabResultDocumentPage extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/documents/labresult/{$this->labresultid}/pages/{$this->pageid}";
    }

    /**
     * @param  int  $labresultid  labresultid
     * @param  int  $pageid  pageid
     * @param  int  $patientid  patientid
     * @param  null|string  $filesize  The file size of the document being requested.
     */
    public function __construct(
        protected int $labresultid,
        protected int $pageid,
        protected int $patientid,
        protected ?string $filesize = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['filesize' => $this->filesize]);
    }
}
