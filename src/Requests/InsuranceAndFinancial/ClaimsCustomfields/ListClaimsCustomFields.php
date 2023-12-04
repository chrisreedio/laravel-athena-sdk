<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\ClaimsCustomfields;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListClaimsCustomFields
 *
 * Retrieves a list of custom fields specific to a practice
 */
class ListClaimsCustomFields extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/claims/customfields";
	}


	public function __construct()
	{
	}
}
