<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\DocumentTypePhysicianAuthorization;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientPhysicianAuth
 *
 * Retrieves a physician authorization document record for a specific patient
 */
class GetPatientPhysicianAuth extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/patients/{$this->patientid}/documents/physicianauth/{$this->physicianauthid}";
	}


	/**
	 * @param int $physicianauthid physicianauthid
	 * @param int $patientid patientid
	 */
	public function __construct(
		protected int $physicianauthid,
		protected int $patientid,
	) {
	}
}
