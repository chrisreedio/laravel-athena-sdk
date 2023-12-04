<?php

namespace ChrisReedIO\AthenaSDK\Requests\Hospital\Stays;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetHospitalStayDetails
 *
 * BETA: Retrieves detail information of a specific patient stay in the hospital including a list of
 * department(s) that the patient was in.
 */
class GetHospitalStayDetails extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/stays/{$this->stayid}";
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
