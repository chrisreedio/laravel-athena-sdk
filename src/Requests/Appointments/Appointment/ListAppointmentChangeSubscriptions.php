<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\Appointment;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListAppointmentChangeSubscriptions
 *
 * Retrieves  the list of events appointment slots which are modified
 */
class ListAppointmentChangeSubscriptions extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/appointments/changed/subscription";
	}


	/**
	 * @param null|bool $includesuggestedoverbooking If this is set, we will include the UpdateSuggestedOverbooking event as if it is one of the default events. Otherwise we will ignore that it exists.
	 * @param null|bool $includeremindercall If this is set, we will include the UpdateRemiderCall event as if it is one of the default events. Otherwise we will ignore that it exists.
	 */
	public function __construct(
		protected ?bool $includesuggestedoverbooking = null,
		protected ?bool $includeremindercall = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter([
			'includesuggestedoverbooking' => $this->includesuggestedoverbooking,
			'includeremindercall' => $this->includeremindercall,
		]);
	}
}
