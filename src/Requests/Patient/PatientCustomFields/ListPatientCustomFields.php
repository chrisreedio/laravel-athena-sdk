<?php

namespace ChrisReedIO\AthenaSDK\Requests\Patient\PatientCustomFields;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListPatientCustomFields
 *
 * Retrieves custom fields information for a specific patient
 */
class ListPatientCustomFields extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/patients/{$this->patientid}/customfields";
	}


	/**
	 * @param int $patientid patientid
	 * @param string $departmentid
	 */
	public function __construct(
		protected int $patientid,
		protected string $departmentid,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['departmentid' => $this->departmentid]);
	}
}
