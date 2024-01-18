<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\DocumentTypeMedicalRecord;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasMultipartBody;

/**
 * CreatePatientMedicalRecord
 *
 * Creates a medical record document record of a specific patient
 */
class CreatePatientMedicalRecord extends Request implements HasBody
{
    use HasMultipartBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/documents/medicalrecord";
    }

    /**
     * @param  int  $departmentid  The athenaNet department ID associated with the uploaded document.
     * @param  string  $documentsubclass  Subclasses for MEDICALRECORD documents
     * @param  int  $patientid  patientid
     * @param  null|string  $attachmentcontents  The file contents that will be attached to this document. PDFs are recommended.
     * @param  null|string  $documentdata  Text data stored with document
     * @param  null|string  $entityid  Identifier of entity creating the document. entitytype is required while passing entityid.
     * @param  null|string  $entitytype  Type of entity creating the document. entityid is required while passing entitytype.
     * @param  null|string  $internalnote  An internal note for the provider or staff. Updating this will append to any previous notes.
     * @param  null|string  $priority  Priority of this result.  1 is high; 2 is normal.
     * @param  null|int  $providerid  The ID of the ordering provider.
     */
    public function __construct(
        protected int $departmentid,
        protected string $documentsubclass,
        protected int $patientid,
        protected ?string $attachmentcontents = null,
        protected ?string $documentdata = null,
        protected ?string $entityid = null,
        protected ?string $entitytype = null,
        protected ?string $internalnote = null,
        protected ?string $priority = null,
        protected ?int $providerid = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'documentsubclass' => $this->documentsubclass,
            'attachmentcontents' => $this->attachmentcontents,
            'documentdata' => $this->documentdata,
            'entityid' => $this->entityid,
            'entitytype' => $this->entitytype,
            'internalnote' => $this->internalnote,
            'priority' => $this->priority,
            'providerid' => $this->providerid,
        ]);
    }
}
