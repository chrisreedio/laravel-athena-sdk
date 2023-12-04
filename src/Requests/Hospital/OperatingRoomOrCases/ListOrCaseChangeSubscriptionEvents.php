<?php

namespace ChrisReedIO\AthenaSDK\Requests\Hospital\OperatingRoomOrCases;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListOrCaseChangeSubscriptionEvents
 *
 * Retrieves a list of events you can subscribe to when OR-cases are added or updated.
 */
class ListOrCaseChangeSubscriptionEvents extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/orcase/changed/subscription/events";
	}


	public function __construct()
	{
	}
}
