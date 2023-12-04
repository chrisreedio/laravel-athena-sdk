<?php

namespace ChrisReedIO\AthenaSDK\Requests\Hospital\Stays;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListHospitalStayChangeEvents
 *
 * BETA: Retrieves the list of events you can subscribe to for when stays requests are worked.
 */
class ListHospitalStayChangeEvents extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/stays/changed/subscription/events";
	}


	public function __construct()
	{
	}
}
