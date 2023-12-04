<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\DocumentTypePrescription;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientPrescription
 *
 * Retrieves a specific prescription document information for a specific patient
 */
class GetPatientPrescription extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/patients/{$this->patientid}/documents/prescription/{$this->prescriptionid}";
	}


	/**
	 * @param int $prescriptionid prescriptionid
	 * @param int $patientid patientid
	 */
	public function __construct(
		protected int $prescriptionid,
		protected int $patientid,
	) {
	}
}
