<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\Problems;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListProblemChangeEvents
 *
 * Retrieves the list of events that can be input for the Problems Changed subscription
 */
class ListProblemChangeEvents extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/chart/healthhistory/problems/changed/subscription/events";
	}


	public function __construct()
	{
	}
}
