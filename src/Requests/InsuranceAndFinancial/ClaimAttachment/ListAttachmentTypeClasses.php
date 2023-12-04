<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\ClaimAttachment;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListAttachmentTypeClasses
 *
 * Retrieves a list of attachment categories the user can submit for the claim
 */
class ListAttachmentTypeClasses extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/claims/attachmenttypeclass";
	}


	public function __construct()
	{
	}
}
