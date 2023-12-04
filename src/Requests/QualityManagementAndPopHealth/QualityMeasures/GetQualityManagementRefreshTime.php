<?php

namespace ChrisReedIO\AthenaSDK\Requests\QualityManagementAndPopHealth\QualityMeasures;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetQualityManagementRefreshTime
 *
 * Retrieves the data and time of the last refresh of patient's quality measures
 */
class GetQualityManagementRefreshTime extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/chart/{$this->patientid}/qualitymanagement/refresh";
	}


	/**
	 * @param int $patientid patientid
	 * @param int $departmentid The athenaNet department id.
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
