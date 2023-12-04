<?php

namespace ChrisReedIO\AthenaSDK\Requests\Hospital\Medications;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListStayDischargeMedications
 *
 * BETA: Retrieves pre-admission and post-discharge (as what has changed) medication details for a
 * stay.
 * Note: This API retrieves home medications and changes to home medications as relates to an
 * inpatient stay. They are divided into the groups PREADMISSION, STOP, START, and CONTINUE.
 */
class ListStayDischargeMedications extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/stays/{$this->stayid}/dischargemedications";
	}


	/**
	 * @param int $stayid stayid
	 * @param null|string $thirdpartyusername User name of the patient in the third party application.
	 * @param null|bool $patientfacingcall When 'true' is passed we will collect relevant data and store in our database.
	 */
	public function __construct(
		protected int $stayid,
		protected ?string $thirdpartyusername = null,
		protected ?bool $patientfacingcall = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['THIRDPARTYUSERNAME' => $this->thirdpartyusername, 'PATIENTFACINGCALL' => $this->patientfacingcall]);
	}
}
