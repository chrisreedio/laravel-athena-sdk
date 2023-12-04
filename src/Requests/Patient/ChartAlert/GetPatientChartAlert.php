<?php

namespace ChrisReedIO\AthenaSDK\Requests\Patient\ChartAlert;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientChartAlert
 *
 * Retrieves the chart alert record for a patient in a specific department
 */
class GetPatientChartAlert extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/patients/{$this->patientid}/chartalert";
	}


	/**
	 * @param int $patientid patientid
	 * @param int $departmentid The department ID; needed because charts, and thus chart notes, may be department-specific
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
