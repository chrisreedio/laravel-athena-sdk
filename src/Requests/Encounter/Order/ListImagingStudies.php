<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\Order;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListImagingStudies
 *
 * Retrieves a list of imaging studies for CPOT
 */
class ListImagingStudies extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/reference/clinicalproviderordertype/imaging";
	}


	/**
	 * @param string $searchvalue A term to search for. Must be at least 2 characters
	 * @param int $facilityid The athena ID of the facility. Get a localized list using /chart/configuration/facilities.
	 */
	public function __construct(
		protected string $searchvalue,
		protected int $facilityid,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['searchvalue' => $this->searchvalue, 'facilityid' => $this->facilityid]);
	}
}
