<?php

namespace ChrisReedIO\AthenaSDK\Requests\Provider\ReferringProviderNumber;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListSubscribedReferringProviderNumberEvents
 *
 * Retrieves a list of events applicable for the changed referring providers contact numbers
 */
class ListSubscribedReferringProviderNumberEvents extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/referringprovidernumbers/changed/subscription";
	}


	public function __construct()
	{
	}
}
