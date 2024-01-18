<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\DocumentTypeLabResult;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasMultipartBody;

/**
 * CreatePatientLabResultDocument
 *
 * Creates a lab result document record of a specific patient
 */
class CreatePatientLabResultDocument extends Request implements HasBody
{
    use HasMultipartBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/documents/labresult";
    }

    /**
     * @param  int  $departmentid  The athenaNet department ID associated with the uploaded document.
     * @param  int  $patientid  patientid
     * @param  null|string  $accessionid  A unique identifier given to a document to track it over time.
     * @param  null|array  $analytes  This is an array of hashes in JSON. Each entry contains information for a single analyte. See <a href="https://developer.athenahealth.com/docs/read/workflows/documents/Lab_Analytes">https://developer.athenahealth.com/docs/read/workflows/documents/Lab_Analytes</a> for an example.
     * @param  null|string  $attachmentcontents  The file contents that will be attached to this document. File must be Base64 encoded.
     * @param  null|string  $attachmenttype  The file type of attachment.
     * @param  null|bool  $autoclose  Documents will, normally, automatically appear in the clinical inbox for providers to review. In some cases, you might want to force the document to skip the clinical inbox, and go directly to the patient chart with a "closed" status. For that case, set this to true.
     * @param  null|int  $documenttypeid  A specific document type identifier.
     * @param  null|string  $entityid  Identifier of entity creating the document. entitytype is required while passing entityid.
     * @param  null|string  $entitytype  Type of entity creating the document. entityid is required while passing entitytype.
     * @param  null|int  $facilityid  The ID of the facility or clinical provider who received the order.
     * @param  null|string  $internalnote  An internal note for the provider or staff. Updating this will append to any previous notes.
     * @param  null|string  $interpretation  The practice entered interpretation of this result. Updating this will append to any previous values.
     * @param  null|string  $notetopatient  This is a note specifically for the patient to view or action on. Updating this will append to any previous notes.
     * @param  null|string  $observationdate  The date an observation was made (mm/dd/yyyy).
     * @param  null|string  $observationtime  The time an observation was made (hh24:mi).  24 hour time.
     * @param  null|string  $originalfilename  The original file name of this document without the file extension. Filename should not exceed 200 characters.
     * @param  null|string  $priority  Priority of this result.  1 is high; 2 is normal.
     * @param  null|int  $providerid  The ID of the ordering provider.
     * @param  null|string  $reportstatus  The status of the report.
     * @param  null|string  $resultnotes  Result notes of a document.
     * @param  null|string  $resultstatus  The status of the result.
     * @param  null|string  $specimenreceiveddatetime  Date-time indicating when the specimen was received in format (yyyy-mm-ddThh:mm:ss).
     * @param  null|string  $specimenreporteddatetime  Date-time indicating when the specimen was reported in format (yyyy-mm-ddThh:mm:ss).
     * @param  null|int  $tietoorderid  Tie the result document to this order.
     */
    public function __construct(
        protected int $departmentid,
        protected int $patientid,
        protected ?string $accessionid = null,
        protected ?array $analytes = null,
        protected ?string $attachmentcontents = null,
        protected ?string $attachmenttype = null,
        protected ?bool $autoclose = null,
        protected ?int $documenttypeid = null,
        protected ?string $entityid = null,
        protected ?string $entitytype = null,
        protected ?int $facilityid = null,
        protected ?string $internalnote = null,
        protected ?string $interpretation = null,
        protected ?string $notetopatient = null,
        protected ?string $observationdate = null,
        protected ?string $observationtime = null,
        protected ?string $originalfilename = null,
        protected ?string $priority = null,
        protected ?int $providerid = null,
        protected ?string $reportstatus = null,
        protected ?string $resultnotes = null,
        protected ?string $resultstatus = null,
        protected ?string $specimenreceiveddatetime = null,
        protected ?string $specimenreporteddatetime = null,
        protected ?int $tietoorderid = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'accessionid' => $this->accessionid,
            'analytes' => $this->analytes,
            'attachmentcontents' => $this->attachmentcontents,
            'attachmenttype' => $this->attachmenttype,
            'autoclose' => $this->autoclose,
            'documenttypeid' => $this->documenttypeid,
            'entityid' => $this->entityid,
            'entitytype' => $this->entitytype,
            'facilityid' => $this->facilityid,
            'internalnote' => $this->internalnote,
            'interpretation' => $this->interpretation,
            'notetopatient' => $this->notetopatient,
            'observationdate' => $this->observationdate,
            'observationtime' => $this->observationtime,
            'originalfilename' => $this->originalfilename,
            'priority' => $this->priority,
            'providerid' => $this->providerid,
            'reportstatus' => $this->reportstatus,
            'resultnotes' => $this->resultnotes,
            'resultstatus' => $this->resultstatus,
            'specimenreceiveddatetime' => $this->specimenreceiveddatetime,
            'specimenreporteddatetime' => $this->specimenreporteddatetime,
            'tietoorderid' => $this->tietoorderid,
        ]);
    }
}
