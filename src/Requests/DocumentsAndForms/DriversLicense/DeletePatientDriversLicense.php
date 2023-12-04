<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\DriversLicense;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeletePatientDriversLicense
 *
 * Deletes the record of a patient's driving license
 */
class DeletePatientDriversLicense extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/patients/{$this->patientid}/driverslicense";
	}


	/**
	 * @param int $patientid patientid
	 */
	public function __construct(
		protected int $patientid,
	) {
	}
}
