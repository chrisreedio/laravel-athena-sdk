<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\DocumentTypePatientCase;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientCaseDocumentAttachment
 *
 * Get file in stream format for patient case document
 */
class GetPatientCaseDocumentAttachment extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/patients/{$this->patientid}/documents/patientcase/attachment/{$this->patientcasefileid}";
	}


	/**
	 * @param int $patientid patientid
	 * @param int $patientcasefileid patientcasefileid
	 */
	public function __construct(
		protected int $patientid,
		protected int $patientcasefileid,
	) {
	}
}
