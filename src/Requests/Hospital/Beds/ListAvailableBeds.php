<?php

namespace ChrisReedIO\AthenaSDK\Requests\Hospital\Beds;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListAvailableBeds
 *
 * Retrives a list of avaiable beds in the hospital
 */
class ListAvailableBeds extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/beds";
	}


	/**
	 * @param null|int $hospitalroomid The hospital room id.
	 * @param null|int $departmentid The department ID.
	 * @param null|int $bedid The bed ID.
	 * @param null|int $unitid The unit id.
	 */
	public function __construct(
		protected ?int $hospitalroomid = null,
		protected ?int $departmentid = null,
		protected ?int $bedid = null,
		protected ?int $unitid = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter([
			'hospitalroomid' => $this->hospitalroomid,
			'departmentid' => $this->departmentid,
			'bedid' => $this->bedid,
			'unitid' => $this->unitid,
		]);
	}
}
