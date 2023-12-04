<?php

namespace ChrisReedIO\AthenaSDK\Requests\Provider\Provider;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListProviderChangeEvents
 *
 * Retrieve list of events for changed providers
 */
class ListProviderChangeEvents extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/providers/changed/subscription/events";
	}


	public function __construct()
	{
	}
}
