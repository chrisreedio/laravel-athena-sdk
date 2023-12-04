<?php

namespace ChrisReedIO\AthenaSDK\Requests\ObstetricsEpisode\ObDeliveryInformation;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListObDeliveryOutcomes
 *
 * BETA: Retrieve a list of outcomes for an OB Delivery
 */
class ListObDeliveryOutcomes extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/chart/reference/obdeliveryoutcomes";
	}


	public function __construct()
	{
	}
}
