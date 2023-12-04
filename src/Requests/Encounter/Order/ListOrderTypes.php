<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\Order;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListOrderTypes
 *
 * Retrieves a list of all orderable COTs and CPOTs
 */
class ListOrderTypes extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/configuration/ordertype";
	}


	/**
	 * @param null|int $labfacilityid The athena ID of the lab facility that would be responsible for filling any lab orders. Get a localized list using /chart/configuration/facilities
	 * @param null|int $imagingfacilityid The athena ID of the imaging facility that would be responsible for filling any imaging orders. Get a localized list using /chart/configuration/facilities
	 * @param null|int $providerid The athena ID of the provider making the search.
	 * @param null|string $searchterm The term to search for.
	 * @param null|string $snomedcode The SNOMED code for a diagnosis. If this is passed in, the API will take the SNOMED code into account while determining which order types are more relevant. If this field is passed in, both the encounter id and the provider id must also be passed in, or the search query must be at least 2 characters long.
	 * @param null|int $encounterid The athena ID of the encounter in which the order will be placed.
	 */
	public function __construct(
		protected ?int $labfacilityid = null,
		protected ?int $imagingfacilityid = null,
		protected ?int $providerid = null,
		protected ?string $searchterm = null,
		protected ?string $snomedcode = null,
		protected ?int $encounterid = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter([
			'labfacilityid' => $this->labfacilityid,
			'imagingfacilityid' => $this->imagingfacilityid,
			'providerid' => $this->providerid,
			'searchterm' => $this->searchterm,
			'snomedcode' => $this->snomedcode,
			'encounterid' => $this->encounterid,
		]);
	}
}
