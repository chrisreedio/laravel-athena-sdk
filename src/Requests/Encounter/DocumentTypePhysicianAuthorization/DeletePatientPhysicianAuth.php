<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypePhysicianAuthorization;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeletePatientPhysicianAuth
 *
 * Deletes the record of a specific physician authorization
 */
class DeletePatientPhysicianAuth extends Request
{
	protected Method $method = Method::DELETE;


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
