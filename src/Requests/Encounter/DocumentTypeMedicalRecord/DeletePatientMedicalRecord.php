<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypeMedicalRecord;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeletePatientMedicalRecord
 *
 * Deletes the record of a specified medical record document
 */
class DeletePatientMedicalRecord extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/patients/{$this->patientid}/documents/medicalrecord/{$this->medicalrecordid}";
	}


	/**
	 * @param int $patientid patientid
	 * @param int $medicalrecordid medicalrecordid
	 */
	public function __construct(
		protected int $patientid,
		protected int $medicalrecordid,
	) {
	}
}
