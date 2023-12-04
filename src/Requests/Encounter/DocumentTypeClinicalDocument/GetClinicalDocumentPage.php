<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypeClinicalDocument;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetClinicalDocumentPage
 *
 * Retrieves a specific page from the specific clinical document of the patient
 */
class GetClinicalDocumentPage extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/documents/clinicaldocument/{$this->clinicaldocumentid}/pages/{$this->pageid}";
    }

    /**
     * @param  int  $pageid pageid
     * @param  int  $patientid patientid
     * @param  int  $clinicaldocumentid clinicaldocumentid
     * @param  null|string  $filesize The file size of the document being requested.
     */
    public function __construct(
        protected int $pageid,
        protected int $patientid,
        protected int $clinicaldocumentid,
        protected ?string $filesize = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['filesize' => $this->filesize]);
    }
}
