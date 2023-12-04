<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\AppointmentWaitlist;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeleteWaitlistEntry
 *
 * Generic success/error response
 */
class DeleteWaitlistEntry extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/appointments/waitlist/{$this->waitlistid}";
	}


	/**
	 * @param int $waitlistid waitlistid
	 */
	public function __construct(
		protected int $waitlistid,
	) {
	}
}
