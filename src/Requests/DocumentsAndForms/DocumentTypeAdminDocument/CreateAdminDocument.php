<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\DocumentTypeAdminDocument;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasMultipartBody;

/**
 * CreateAdminDocument
 *
 * Create and record a admin document not specific to a patient
 */
class CreateAdminDocument extends Request implements HasBody
{
	use HasMultipartBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/documents/admin";
	}


	/**
	 * @param int $departmentid The athenaNet department ID associated with the uploaded document.
	 * @param string $documentsubclass Subclasses for ADMIN documents
	 * @param null|string $attachmentcontents The file contents that will be attached to this document. PDFs are recommended.
	 * @param null|string $attachmenttype The file type of the attachment.
	 * @param null|bool $autoclose Documents will, normally, automatically appear in the clinical inbox for providers to review. In some cases, you might want to force the document to skip the clinical inbox, and go directly to the patient chart with a "closed" status. For that case, set this to true.
	 * @param null|string $documentdata Text data stored with document
	 * @param null|string $documentdate The date an observation was made (mm/dd/yyyy).
	 * @param null|int $documenttypeid A specific document type identifier.
	 * @param null|string $internalnote An internal note for the provider or staff. Updating this will append to any previous notes.
	 * @param null|string $originalfilename The original file name of this document without the file extension. Filename should not exceed 200 characters.
	 * @param null|string $priority Priority of this result.  1 is high; 2 is normal.
	 * @param null|int $providerid The ID of the ordering provider.
	 */
	public function __construct(
		protected int $departmentid,
		protected string $documentsubclass,
		protected ?string $attachmentcontents = null,
		protected ?string $attachmenttype = null,
		protected ?bool $autoclose = null,
		protected ?string $documentdata = null,
		protected ?string $documentdate = null,
		protected ?int $documenttypeid = null,
		protected ?string $internalnote = null,
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
			'documentdata' => $this->documentdata,
			'documentdate' => $this->documentdate,
			'documenttypeid' => $this->documenttypeid,
			'internalnote' => $this->internalnote,
			'originalfilename' => $this->originalfilename,
			'priority' => $this->priority,
			'providerid' => $this->providerid,
		]);
	}
}
