<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\HistoricalMedication;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListMedicationChangeSubscriptions
 *
 * Retrieves list of events for Historical Medications
 */
class ListMedicationChangeSubscriptions extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/chart/healthhistory/medication/changed/subscription";
	}


	public function __construct()
	{
	}
}
