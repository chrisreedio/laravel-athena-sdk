<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypeImagingResult;

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
	 * @param int $patientid patientid
	 * @param int $departmentid The athenaNet department ID associated with the uploaded document.
	 * @param null|string $entityid Identifier of entity creating the document. entitytype is required while passing entityid.
	 * @param null|string $priority Priority of this result.  1 is high; 2 is normal.
	 * @param null|bool $autoclose Documents will, normally, automatically appear in the clinical inbox for providers to review. In some cases, you might want to force the document to skip the clinical inbox, and go directly to the patient chart with a "closed" status. For that case, set this to true.
	 * @param null|string $ssotarget URL that you want to use as your target when doing SSO with an external link. Note that this requires special setup before this will work.
	 * @param null|string $entitytype Type of entity creating the document. entityid is required while passing entitytype.
	 * @param null|int $facilityid The ID of the facility or clinical provider who received the order.
	 * @param null|int $providerid The ID of the ordering provider.
	 * @param null|string $accessionid A unique identifier given to a document to track it over time.
	 * @param null|string $patientnote This is a note specifically for the patient to view or action on. Updating this will append to any previous notes.
	 * @param null|string $documentdata Text data stored with document
	 * @param null|string $internalnote An internal note for the provider or staff. Updating this will append to any previous notes.
	 * @param null|string $reportstatus The status of the report.
	 * @param null|string $resultstatus The status of the result.
	 * @param null|int $tietoorderid Tie the result document to this order.
	 * @param null|string $attachmenttype The file type of attachment.
	 * @param null|int $documenttypeid A specific document type identifier.
	 * @param null|string $interpretation The practice entered interpretation of this result. Updating this will append to any previous values.
	 * @param null|bool $includefilelink If true, attempt to attach a file link to the document.
	 * @param null|string $observationdate The date an observation was made (mm/dd/yyyy).
	 * @param null|string $observationtime The time an observation was made (hh24:mi).  24 hour time.
	 * @param null|string $originalfilename The original file name of this document without the file extension. Filename should not exceed 200 characters.
	 * @param null|string $attachmentcontents The file contents that will be attached to this document. File must be Base64 encoded.
	 * @param null|string $relevantclinicalinfo Any other clinically relevant data that you want to add.
	 * @param null|string $internalaccessionidentifier A unique identifier given to a document to track it over time.
	 */
	public function __construct(
		protected int $patientid,
		protected int $departmentid,
		protected ?string $entityid = null,
		protected ?string $priority = null,
		protected ?bool $autoclose = null,
		protected ?string $ssotarget = null,
		protected ?string $entitytype = null,
		protected ?int $facilityid = null,
		protected ?int $providerid = null,
		protected ?string $accessionid = null,
		protected ?string $patientnote = null,
		protected ?string $documentdata = null,
		protected ?string $internalnote = null,
		protected ?string $reportstatus = null,
		protected ?string $resultstatus = null,
		protected ?int $tietoorderid = null,
		protected ?string $attachmenttype = null,
		protected ?int $documenttypeid = null,
		protected ?string $interpretation = null,
		protected ?bool $includefilelink = null,
		protected ?string $observationdate = null,
		protected ?string $observationtime = null,
		protected ?string $originalfilename = null,
		protected ?string $attachmentcontents = null,
		protected ?string $relevantclinicalinfo = null,
		protected ?string $internalaccessionidentifier = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter([
			'departmentid' => $this->departmentid,
			'entityid' => $this->entityid,
			'priority' => $this->priority,
			'autoclose' => $this->autoclose,
			'ssotarget' => $this->ssotarget,
			'entitytype' => $this->entitytype,
			'facilityid' => $this->facilityid,
			'providerid' => $this->providerid,
			'accessionid' => $this->accessionid,
			'patientnote' => $this->patientnote,
			'documentdata' => $this->documentdata,
			'internalnote' => $this->internalnote,
			'reportstatus' => $this->reportstatus,
			'resultstatus' => $this->resultstatus,
			'tietoorderid' => $this->tietoorderid,
			'attachmenttype' => $this->attachmenttype,
			'documenttypeid' => $this->documenttypeid,
			'interpretation' => $this->interpretation,
			'includefilelink' => $this->includefilelink,
			'observationdate' => $this->observationdate,
			'observationtime' => $this->observationtime,
			'originalfilename' => $this->originalfilename,
			'attachmentcontents' => $this->attachmentcontents,
			'relevantclinicalinfo' => $this->relevantclinicalinfo,
			'internalaccessionidentifier' => $this->internalaccessionidentifier,
		]);
	}
}
