<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\AppointmentHealthHistoryFormDocuments;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListHealthHistoryForms
 *
 * Retrieves a list of health history forms
 */
class ListHealthHistoryForms extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/healthhistoryforms";
	}


	public function __construct()
	{
	}


	public function defaultQuery(): array
	{
		return array_filter([]);
	}
}
