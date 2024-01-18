<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypeInpatientDocument;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientInptAdminDocumentPage
 *
 * Retrieves a specific page from the specific inpatient admin document of the patient
 */
class GetPatientInptAdminDocumentPage extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/documents/inptadmin/{$this->inptadminid}/pages/{$this->pageid}";
    }

    /**
     * @param  int  $inptadminid  inptadminid
     * @param  int  $pageid  pageid
     * @param  int  $patientid  patientid
     * @param  null|string  $filesize  The file size of the document being requested.
     */
    public function __construct(
        protected int $inptadminid,
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
