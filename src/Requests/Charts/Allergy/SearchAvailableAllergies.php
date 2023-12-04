<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\Allergy;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * SearchAvailableAllergies
 *
 * Retrieves a list of allergies matching the search criteria
 */
class SearchAvailableAllergies extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/reference/allergies";
	}


	/**
	 * @param string $searchvalue A term to search for. Must be at least 2 characters
	 */
	public function __construct(
		protected string $searchvalue,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['searchvalue' => $this->searchvalue]);
	}
}
