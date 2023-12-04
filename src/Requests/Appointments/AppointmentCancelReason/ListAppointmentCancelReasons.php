<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\AppointmentCancelReason;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListAppointmentCancelReasons
 *
 * Retrieves the list of reasons for cancelling a scheduled appointment
 */
class ListAppointmentCancelReasons extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/appointmentcancelreasons";
	}


	/**
	 * @param null|bool $slotavailable Only return values with slotavailable matching this boolean.
	 */
	public function __construct(
		protected ?bool $slotavailable = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['slotavailable' => $this->slotavailable]);
	}
}
