<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\UpdateReferralOrder;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * UpdatePatientReferralOrderReopen
 *
 * Reopens a closed referral order
 */
class UpdatePatientReferralOrderReopen extends Request
{
	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/patients/{$this->patientid}/documents/orders/referral/{$this->referraldocumentid}/reopen";
	}


	/**
	 * @param int $referraldocumentid referraldocumentid
	 * @param int $patientid patientid
	 */
	public function __construct(
		protected int $referraldocumentid,
		protected int $patientid,
	) {
	}
}
