<?php

namespace ChrisReedIO\AthenaSDK\Requests\Patient\PreferredImaging;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientPreferredImagingService
 *
 * Retrieve preferred imaging facility for a specific patient chart
 */
class GetPatientPreferredImagingService extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/chart/{$this->patientid}/imaging/preferred";
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
