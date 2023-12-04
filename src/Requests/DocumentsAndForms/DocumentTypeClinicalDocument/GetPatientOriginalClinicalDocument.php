<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\DocumentTypeClinicalDocument;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientOriginalClinicalDocument
 *
 * Retrieves original clinical document of the patient. This is applicable when document source is FAX
 * or UPLOAD and originally faxed or uploaded file is not split into multiple documents. Please use
 * "Get page from patient's clinical document" endpoint to download documentpages when original
 * document is not available.
 */
class GetPatientOriginalClinicalDocument extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/patients/{$this->patientid}/documents/clinicaldocument/{$this->clinicaldocumentid}/originaldocument";
	}


	/**
	 * @param int $patientid patientid
	 * @param int $clinicaldocumentid clinicaldocumentid
	 */
	public function __construct(
		protected int $patientid,
		protected int $clinicaldocumentid,
	) {
	}
}
