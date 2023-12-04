<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\Medication;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * SearchAvailableMedications
 *
 * Retrieves a list of medications for a given search parameters
 */
class SearchAvailableMedications extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/reference/medications";
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
