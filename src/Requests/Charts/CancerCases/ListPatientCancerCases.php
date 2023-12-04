<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\CancerCases;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListPatientCancerCases
 *
 * The open cancer cases for a specified patient and department.
 */
class ListPatientCancerCases extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/chart/{$this->patientid}/cancercases";
	}


	/**
	 * @param int $patientid patientid
	 * @param int $departmentid The ID of the department to retrieve cancer cases for.
	 */
	public function __construct(
		protected int $patientid,
		protected int $departmentid,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['departmentid' => $this->departmentid]);
	}
}
