<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\DocumentTypeImagingResult;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeletePatientImagingResultDocument
 *
 * Deletes the record of a specified imaging results document
 */
class DeletePatientImagingResultDocument extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/patients/{$this->patientid}/documents/imagingresult/{$this->imagingresultid}";
	}


	/**
	 * @param int $patientid patientid
	 * @param int $imagingresultid imagingresultid
	 */
	public function __construct(
		protected int $patientid,
		protected int $imagingresultid,
	) {
	}
}
