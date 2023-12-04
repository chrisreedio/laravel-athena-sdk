<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypePrescription;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListPrescriptionChangeEvents
 *
 * Retrieves a list of all events that can be input for this subscription. Note: This endpoint may rely
 * on specific settings to be enabled in athenaNet Production to function properly that are not
 * required in other environments. Please see <a
 * href="/api/resources/best-practices-and-troubleshooting#Handling_Beta_APIs">Permissioned Rollout of
 * APIs</a> for more information if you are experiencing issues.
 */
class ListPrescriptionChangeEvents extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/prescriptions/changed/subscription/events";
	}


	public function __construct()
	{
	}
}
