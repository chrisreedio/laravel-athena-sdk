<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\EncounterServices;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListFacilities
 *
 * Retrieve a list of facilities based on the search criteria provided.
 */
class ListFacilities extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/chart/configuration/facilities";
	}


	/**
	 * @param int $departmentid Used to help determine both whether to include which practice-configured facilities as well as help sort the results.
	 * @param string $name The facility to search for. This can include the name or address of the facility, in space delimited form
	 * @param null|int $patientid Used to help determine which matches to return based on distance to patient and practice.
	 * @param string $ordertype The type of facility to search for.
	 */
	public function __construct(
		protected int $departmentid,
		protected string $name,
		protected ?int $patientid = null,
		protected string $ordertype,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter([
			'departmentid' => $this->departmentid,
			'name' => $this->name,
			'patientid' => $this->patientid,
			'ordertype' => $this->ordertype,
		]);
	}
}
