<?php

namespace ChrisReedIO\AthenaSDK\Requests\Provider\ProviderTypesReference;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListProviderTypes
 *
 * Retrieves the list of valid provider types in the system
 */
class ListProviderTypes extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/reference/providertypes";
	}


	public function __construct()
	{
	}


	public function defaultQuery(): array
	{
		return array_filter([]);
	}
}
