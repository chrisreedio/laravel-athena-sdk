<?php

namespace ChrisReedIO\AthenaSDK\Requests\Hospital\SurgeryCases;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListSurgeryCaseChangeEvents
 *
 * BETA: Returns list of events you can subscribe to when surgical cases are added or updated.
 */
class ListSurgeryCaseChangeEvents extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/surgerycases/changed/subscription/events";
	}


	public function __construct()
	{
	}
}
