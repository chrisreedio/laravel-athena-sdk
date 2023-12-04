<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypeLabResult;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListLabResultChangeSubscriptions
 *
 * Retrieves list of events applicable for lab results changes
 */
class ListLabResultChangeSubscriptions extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/labresults/changed/subscription";
	}


	public function __construct()
	{
	}
}
