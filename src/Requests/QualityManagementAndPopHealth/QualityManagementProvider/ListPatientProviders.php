<?php

namespace ChrisReedIO\AthenaSDK\Requests\QualityManagementAndPopHealth\QualityManagementProvider;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListPatientProviders
 *
 * Retrieves the list of patient's primary provider and associated providers
 */
class ListPatientProviders extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/chart/{$this->patientid}/qualitymanagement/providers";
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
