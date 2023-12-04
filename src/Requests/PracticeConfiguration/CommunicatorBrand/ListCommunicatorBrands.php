<?php

namespace ChrisReedIO\AthenaSDK\Requests\PracticeConfiguration\CommunicatorBrand;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListCommunicatorBrands
 *
 * Retrieves practice's list of communicator brands
 */
class ListCommunicatorBrands extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/communicatorbrands";
	}


	public function __construct()
	{
	}


	public function defaultQuery(): array
	{
		return array_filter([]);
	}
}
