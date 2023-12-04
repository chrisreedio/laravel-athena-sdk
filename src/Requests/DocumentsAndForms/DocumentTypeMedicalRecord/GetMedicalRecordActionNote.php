<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\DocumentTypeMedicalRecord;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetMedicalRecordActionNote
 *
 * Retrieves action note information of a specific medical record document
 */
class GetMedicalRecordActionNote extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/documents/medicalrecord/{$this->medicalrecordid}/actions";
	}


	/**
	 * @param int $medicalrecordid medicalrecordid
	 */
	public function __construct(
		protected int $medicalrecordid,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter([]);
	}
}
