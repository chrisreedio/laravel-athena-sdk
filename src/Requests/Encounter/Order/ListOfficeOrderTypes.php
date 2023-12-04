<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\Order;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListOfficeOrderTypes
 *
 * Retrieves a list of ordertypes configured for a Practice
 */
class ListOfficeOrderTypes extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/chart/configuration/officeordertypes";
	}


	public function __construct()
	{
	}
}
