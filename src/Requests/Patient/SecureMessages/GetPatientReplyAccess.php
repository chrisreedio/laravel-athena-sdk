<?php

namespace ChrisReedIO\AthenaSDK\Requests\Patient\SecureMessages;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientReplyAccess
 *
 * Retrieves information on the access right for a patient to respond to the specific message
 */
class GetPatientReplyAccess extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/patients/{$this->patientid}/securemessage/{$this->messagethreadid}/CanPatientReplyToMessage";
	}


	/**
	 * @param int $patientid patientid
	 * @param int $messagethreadid messagethreadid
	 */
	public function __construct(
		protected int $patientid,
		protected int $messagethreadid,
	) {
	}
}
