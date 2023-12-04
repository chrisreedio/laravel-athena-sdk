<?php

namespace ChrisReedIO\AthenaSDK\Requests\ObstetricsEpisode\ObDeliveryInformation;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListObDeliveryTypes
 *
 * BETA: Retrieves a list of valid delivery types for an OB Delivery
 */
class ListObDeliveryTypes extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/chart/configuration/obdeliverytypes";
	}


	public function __construct()
	{
	}


	public function defaultQuery(): array
	{
		return array_filter([]);
	}
}
