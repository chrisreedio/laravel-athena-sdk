<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypeEncounterDocument;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetEncounterDocumentPage
 *
 * Retrieves a specific page from the specific encounter document of the patient
 */
class GetEncounterDocumentPage extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/documents/encounterdocument/{$this->encounterdocumentid}/pages/{$this->pageid}";
    }

    /**
     * @param  int  $encounterdocumentid  encounterdocumentid
     * @param  int  $pageid  pageid
     * @param  int  $patientid  patientid
     * @param  null|string  $filesize  The file size of the document being requested.
     */
    public function __construct(
        protected int $encounterdocumentid,
        protected int $pageid,
        protected int $patientid,
        protected ?string $filesize = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['filesize' => $this->filesize]);
    }
}
