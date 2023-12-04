<?php

namespace ChrisReedIO\AthenaSDK\Requests\PracticeConfiguration\CommonInsurancePackagesReference;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListCommonInsurancePackages
 *
 * Retrieves a list of insurance packages used by the practice
 */
class ListCommonInsurancePackages extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/misc/commoninsurancepackages";
	}


	/**
	 * @param null|bool $showonlycasepolicies If true only show the case policies.
	 * @param int $departmentid The ID of the department to check for common insurances. This is used to determine which provider group that we are working with.
	 */
	public function __construct(
		protected ?bool $showonlycasepolicies = null,
		protected int $departmentid,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['showonlycasepolicies' => $this->showonlycasepolicies, 'departmentid' => $this->departmentid]);
	}
}
