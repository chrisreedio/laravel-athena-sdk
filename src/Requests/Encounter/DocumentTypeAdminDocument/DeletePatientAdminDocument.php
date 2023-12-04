<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypeAdminDocument;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeletePatientAdminDocument
 *
 * Deletes the specific admin document of a patient
 */
class DeletePatientAdminDocument extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/patients/{$this->patientid}/documents/admin/{$this->adminid}";
	}


	/**
	 * @param int $adminid adminid
	 * @param int $patientid patientid
	 */
	public function __construct(
		protected int $adminid,
		protected int $patientid,
	) {
	}
}
