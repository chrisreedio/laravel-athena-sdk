<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\DocumentTypeClinicalDocument;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasMultipartBody;

/**
 * CreatePatientClinicalDocument
 *
 * Creates a clinical document record of a specific patient
 */
class CreatePatientClinicalDocument extends Request implements HasBody
{
    use HasMultipartBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/documents/clinicaldocument";
    }

    /**
     * @param  int  $departmentid  The athenaNet department ID associated with the uploaded document.
     * @param  string  $documentsubclass  Subclasses for CLINICALDOCUMENT documents
     * @param  int  $patientid  patientid
     * @param  null|string  $attachmentcontents  The file contents that will be attached to this document. File must be Base64 encoded.
     * @param  null|string  $attachmenttype  The file type of attachment.
     * @param  null|bool  $autoclose  Documents will, normally, automatically appear in the clinical inbox for providers to review. In some cases, you might want to force the document to skip the clinical inbox, and go directly to the patient chart with a "closed" status. For that case, set this to true.
     * @param  null|int  $clinicalproviderid  The ID of the external provider/lab/pharmacy associated the document.
     * @param  null|string  $documentdata  Text data stored with document
     * @param  null|int  $documenttypeid  A specific document type identifier.
     * @param  null|string  $entityid  Identifier of entity creating the document. entitytype is required while passing entityid.
     * @param  null|string  $entitytype  Type of entity creating the document. entityid is required while passing entitytype.
     * @param  null|string  $internalnote  An internal note for the provider or staff. Updating this will append to any previous notes.
     * @param  null|string  $observationdate  The date an observation was made (mm/dd/yyyy).
     * @param  null|string  $observationtime  The time an observation was made (hh24:mi).  24 hour time.
     * @param  null|string  $originalfilename  The original file name of this document without the file extension. Filename should not exceed 200 characters.
     * @param  null|string  $priority  Priority of this result.  1 is high; 2 is normal.
     * @param  null|int  $providerid  The ID of the ordering provider.
     */
    public function __construct(
        protected int $departmentid,
        protected string $documentsubclass,
        protected int $patientid,
        protected ?string $attachmentcontents = null,
        protected ?string $attachmenttype = null,
        protected ?bool $autoclose = null,
        protected ?int $clinicalproviderid = null,
        protected ?string $documentdata = null,
        protected ?int $documenttypeid = null,
        protected ?string $entityid = null,
        protected ?string $entitytype = null,
        protected ?string $internalnote = null,
        protected ?string $observationdate = null,
        protected ?string $observationtime = null,
        protected ?string $originalfilename = null,
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
            'attachmenttype' => $this->attachmenttype,
            'autoclose' => $this->autoclose,
            'clinicalproviderid' => $this->clinicalproviderid,
            'documentdata' => $this->documentdata,
            'documenttypeid' => $this->documenttypeid,
            'entityid' => $this->entityid,
            'entitytype' => $this->entitytype,
            'internalnote' => $this->internalnote,
            'observationdate' => $this->observationdate,
            'observationtime' => $this->observationtime,
            'originalfilename' => $this->originalfilename,
            'priority' => $this->priority,
            'providerid' => $this->providerid,
        ]);
    }
}
