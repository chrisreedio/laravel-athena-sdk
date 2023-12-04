<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\DocumentTypeImagingResult;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasMultipartBody;

/**
 * CreatePatientImagingResultDocument
 *
 * Creates a imaging results document record for a specific patient
 */
class CreatePatientImagingResultDocument extends Request implements HasBody
{
    use HasMultipartBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/documents/imagingresult";
    }

    /**
     * @param int $departmentid The athenaNet department ID associated with the uploaded document.
     * @param int $patientid patientid
     * @param null|string $accessionid A unique identifier given to a document to track it over time.
     * @param null|string $attachmentcontents The file contents that will be attached to this document. File must be Base64 encoded.
     * @param null|string $attachmenttype The file type of attachment.
     * @param null|bool $autoclose Documents will, normally, automatically appear in the clinical inbox for providers to review. In some cases, you might want to force the document to skip the clinical inbox, and go directly to the patient chart with a "closed" status. For that case, set this to true.
     * @param null|string $documentdata Text data stored with document
     * @param null|int $documenttypeid A specific document type identifier.
     * @param null|string $entityid Identifier of entity creating the document. entitytype is required while passing entityid.
     * @param null|string $entitytype Type of entity creating the document. entityid is required while passing entitytype.
     * @param null|int $facilityid The ID of the facility or clinical provider who received the order.
     * @param null|bool $includefilelink If true, attempt to attach a file link to the document.
     * @param null|string $internalaccessionidentifier A unique identifier given to a document to track it over time.
     * @param null|string $internalnote An internal note for the provider or staff. Updating this will append to any previous notes.
     * @param null|string $interpretation The practice entered interpretation of this result. Updating this will append to any previous values.
     * @param null|string $observationdate The date an observation was made (mm/dd/yyyy).
     * @param null|string $observationtime The time an observation was made (hh24:mi).  24 hour time.
     * @param null|string $originalfilename The original file name of this document without the file extension. Filename should not exceed 200 characters.
     * @param null|string $patientnote This is a note specifically for the patient to view or action on. Updating this will append to any previous notes.
     * @param null|string $priority Priority of this result.  1 is high; 2 is normal.
     * @param null|int $providerid The ID of the ordering provider.
     * @param null|string $relevantclinicalinfo Any other clinically relevant data that you want to add.
     * @param null|string $reportstatus The status of the report.
     * @param null|string $resultstatus The status of the result.
     * @param null|string $ssotarget URL that you want to use as your target when doing SSO with an external link. Note that this requires special setup before this will work.
     * @param null|int $tietoorderid Tie the result document to this order.
     */
    public function __construct(
        protected int     $departmentid,
        protected int     $patientid,
        protected ?string $accessionid = null,
        protected ?string $attachmentcontents = null,
        protected ?string $attachmenttype = null,
        protected ?bool   $autoclose = null,
        protected ?string $documentdata = null,
        protected ?int    $documenttypeid = null,
        protected ?string $entityid = null,
        protected ?string $entitytype = null,
        protected ?int    $facilityid = null,
        protected ?bool   $includefilelink = null,
        protected ?string $internalaccessionidentifier = null,
        protected ?string $internalnote = null,
        protected ?string $interpretation = null,
        protected ?string $observationdate = null,
        protected ?string $observationtime = null,
        protected ?string $originalfilename = null,
        protected ?string $patientnote = null,
        protected ?string $priority = null,
        protected ?int    $providerid = null,
        protected ?string $relevantclinicalinfo = null,
        protected ?string $reportstatus = null,
        protected ?string $resultstatus = null,
        protected ?string $ssotarget = null,
        protected ?int    $tietoorderid = null,
    )
    {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'accessionid' => $this->accessionid,
            'attachmentcontents' => $this->attachmentcontents,
            'attachmenttype' => $this->attachmenttype,
            'autoclose' => $this->autoclose,
            'documentdata' => $this->documentdata,
            'documenttypeid' => $this->documenttypeid,
            'entityid' => $this->entityid,
            'entitytype' => $this->entitytype,
            'facilityid' => $this->facilityid,
            'includefilelink' => $this->includefilelink,
            'internalaccessionidentifier' => $this->internalaccessionidentifier,
            'internalnote' => $this->internalnote,
            'interpretation' => $this->interpretation,
            'observationdate' => $this->observationdate,
            'observationtime' => $this->observationtime,
            'originalfilename' => $this->originalfilename,
            'patientnote' => $this->patientnote,
            'priority' => $this->priority,
            'providerid' => $this->providerid,
            'relevantclinicalinfo' => $this->relevantclinicalinfo,
            'reportstatus' => $this->reportstatus,
            'resultstatus' => $this->resultstatus,
            'ssotarget' => $this->ssotarget,
            'tietoorderid' => $this->tietoorderid,
        ]);
    }
}
