<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\CcmEnrollment;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListCcmEnrollmentStatusSubscriptions
 *
 * Retrieves list of events applicable for CCM enrollment status changed
 */
class ListCcmEnrollmentStatusSubscriptions extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/ccmenrollmentstatus/changed/subscription";
	}


	public function __construct()
	{
	}
}
