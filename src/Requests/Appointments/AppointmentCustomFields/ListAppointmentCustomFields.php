<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\AppointmentCustomFields;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListAppointmentCustomFields
 *
 * Retrieve the list of customfields configured in the system
 */
class ListAppointmentCustomFields extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/appointments/customfields";
	}


	public function __construct()
	{
	}


	public function defaultQuery(): array
	{
		return array_filter([]);
	}
}
