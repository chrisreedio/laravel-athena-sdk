<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\ProcedureCodes;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListProceduresAndSurgeries
 *
 * Retrieve the list of surgeries and procedures
 */
class ListProceduresAndSurgeries extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/reference/order/procedure";
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
