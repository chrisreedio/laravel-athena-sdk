<?php

namespace ChrisReedIO\AthenaSDK\Requests\QualityManagementAndPopHealth\QualityMeasures;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientQualityManagement
 *
 * Retrieves the list of quality measures for a given provider
 */
class GetPatientQualityManagement extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/chart/{$this->patientid}/qualitymanagement";
	}


	/**
	 * @param int $patientid patientid
	 * @param null|string $status Optional filter to only get results with this status
	 * @param int $departmentid The athenaNet department id.
	 * @param null|int $providerid The ID of the provider. If not specified, the default provider is used -- usually the provider that has seen the patient most often / recently.
	 * @param null|string $measuretype Optional filter to only get clinical guidelines or pay for performance results.
	 */
	public function __construct(
		protected int $patientid,
		protected ?string $status = null,
		protected int $departmentid,
		protected ?int $providerid = null,
		protected ?string $measuretype = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter([
			'status' => $this->status,
			'departmentid' => $this->departmentid,
			'providerid' => $this->providerid,
			'measuretype' => $this->measuretype,
		]);
	}
}
