<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypeImagingResult;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetImagingResultDocumentPage
 *
 * Retrieves a specific page from the specific imaging document of the patient
 */
class GetImagingResultDocumentPage extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/documents/imagingresult/{$this->imagingresultid}/pages/{$this->pageid}";
    }

    /**
     * @param  int  $imagingresultid imagingresultid
     * @param  int  $pageid pageid
     * @param  int  $patientid patientid
     * @param  null|string  $filesize The file size of the document being requested.
     */
    public function __construct(
        protected int $imagingresultid,
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
