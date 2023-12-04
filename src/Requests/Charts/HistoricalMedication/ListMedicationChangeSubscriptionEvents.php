<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\HistoricalMedication;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListMedicationChangeSubscriptionEvents
 *
 * Retrieves the list of events that can be input for the Historical Medications changed subscription
 */
class ListMedicationChangeSubscriptionEvents extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/chart/healthhistory/medication/changed/subscription/events";
	}


	public function __construct()
	{
	}
}
