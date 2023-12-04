<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\DocumentTypeImagingResult;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetImagingResultDocumentPage
 *
 * Retrieves a specific page from the specific imaging document of the patient
 */
class GetImagingResultDocumentPage extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/patients/{$this->patientid}/documents/imagingresult/{$this->imagingresultid}/pages/{$this->pageid}";
	}


	/**
	 * @param int $pageid pageid
	 * @param int $patientid patientid
	 * @param int $imagingresultid imagingresultid
	 * @param null|string $filesize The file size of the document being requested.
	 */
	public function __construct(
		protected int $pageid,
		protected int $patientid,
		protected int $imagingresultid,
		protected ?string $filesize = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['filesize' => $this->filesize]);
	}
}
