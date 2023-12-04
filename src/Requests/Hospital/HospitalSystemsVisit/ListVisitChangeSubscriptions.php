<?php

namespace ChrisReedIO\AthenaSDK\Requests\Hospital\HospitalSystemsVisit;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListVisitChangeSubscriptions
 *
 * Retrieves list of events applicable for hospital visit changes
 */
class ListVisitChangeSubscriptions extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/visits/changed/subscription";
	}


	public function __construct()
	{
	}
}
