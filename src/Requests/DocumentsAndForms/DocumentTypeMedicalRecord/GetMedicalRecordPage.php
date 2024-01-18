<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\DocumentTypeMedicalRecord;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetMedicalRecordPage
 *
 * Retrieves a specific page from the specific medical record document of the patient
 */
class GetMedicalRecordPage extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/documents/medicalrecord/{$this->medicalrecordid}/pages/{$this->pageid}";
    }

    /**
     * @param  int  $medicalrecordid  medicalrecordid
     * @param  int  $pageid  pageid
     * @param  int  $patientid  patientid
     * @param  null|string  $filesize  The file size of the document being requested.
     */
    public function __construct(
        protected int $medicalrecordid,
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
