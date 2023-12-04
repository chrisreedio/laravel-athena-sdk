<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DefaultSearchFacilities;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetDefaultSearchFacilityInformationForGivenEncounter
 *
 * Retrieves the default laboratory and imaging facility information configured in the patient's
 * profile
 */
class GetDefaultSearchFacilityInformationForGivenEncounter extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/chart/encounter/{$this->encounterid}/defaultsearchfacilities";
	}


	/**
	 * @param int $encounterid encounterid
	 */
	public function __construct(
		protected int $encounterid,
	) {
	}
}
