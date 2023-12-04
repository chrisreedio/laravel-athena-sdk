<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\AppointmentThirdPartyExternalData;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeleteAppointmentThirdPartyExternalData
 *
 * Deletes the record for a specific appointment external data
 */
class DeleteAppointmentThirdPartyExternalData extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/appointments/{$this->appointmentid}/thirdpartyexternaldata";
	}


	/**
	 * @param int $appointmentid appointmentid
	 */
	public function __construct(
		protected int $appointmentid,
	) {
	}
}
