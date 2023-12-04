<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\Allergy;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListPatientAllergies
 *
 * Retrieves list of allergens, allergy reactions, severity documented in the patient chart
 */
class ListPatientAllergies extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/chart/{$this->patientid}/allergies";
	}


	/**
	 * @param int $patientid patientid
	 * @param null|bool $showinactive Include deactivated allergies
	 * @param int $departmentid The athenaNet department id.
	 * @param null|string $thirdpartyusername User name of the patient in the third party application.
	 * @param null|bool $patientfacingcall When 'true' is passed we will collect relevant data and store in our database.
	 */
	public function __construct(
		protected int $patientid,
		protected ?bool $showinactive = null,
		protected int $departmentid,
		protected ?string $thirdpartyusername = null,
		protected ?bool $patientfacingcall = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter([
			'showinactive' => $this->showinactive,
			'departmentid' => $this->departmentid,
			'THIRDPARTYUSERNAME' => $this->thirdpartyusername,
			'PATIENTFACINGCALL' => $this->patientfacingcall,
		]);
	}
}
