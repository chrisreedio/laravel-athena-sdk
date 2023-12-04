<?php

namespace ChrisReedIO\AthenaSDK\Requests\Provider\ProviderSpecialtiesReference;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListProviderSpecialties
 *
 * Retrieves the list of valid provider specialties in the system
 */
class ListProviderSpecialties extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/reference/providerspecialties";
	}


	public function __construct()
	{
	}


	public function defaultQuery(): array
	{
		return array_filter([]);
	}
}
