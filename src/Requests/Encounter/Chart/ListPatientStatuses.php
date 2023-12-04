<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\Chart;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListPatientStatuses
 *
 * Retrieves a list of patient statuses during their visit to the provider
 */
class ListPatientStatuses extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/chart/configuration/patientstatuses";
	}


	public function __construct()
	{
	}


	public function defaultQuery(): array
	{
		return array_filter([]);
	}
}
