<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\Medication;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeletePatientMedicationEntry
 *
 * BETA: Deletes the record of the medication
 */
class DeletePatientMedicationEntry extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/chart/{$this->patientid}/medications/{$this->medicationentryid}";
	}


	/**
	 * @param string $medicationentryid medicationentryid
	 * @param int $patientid patientid
	 * @param int $departmentid The athenanet department ID
	 */
	public function __construct(
		protected string $medicationentryid,
		protected int $patientid,
		protected int $departmentid,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['departmentid' => $this->departmentid]);
	}
}
