<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\Vaccines;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreatePatientVaccine
 *
 * Records a vaccine in the patient's chart in Vaccine section
 */
class CreatePatientVaccine extends Request implements HasBody
{
	use HasFormBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/chart/{$this->patientid}/vaccines";
	}


	/**
	 * @param int $patientid patientid
	 * @param int $cvx Vaccine Administered Code
	 * @param int $departmentid The athenaNet department id.
	 * @param string $administerdate Date when this vaccine was administered (if administered). Can be in YYYY, MM/YYYY, or MM/DD/YYYY format.
	 * @param null|string $ndc The National Drug Code for the administered vaccine
	 * @param null|bool $patientfacingcall When 'true' is passed we will collect relevant data and store in our database.
	 * @param null|string $thirdpartyusername User name of the patient in the third party application.
	 */
	public function __construct(
		protected int $patientid,
		protected int $cvx,
		protected int $departmentid,
		protected string $administerdate,
		protected ?string $ndc = null,
		protected ?bool $patientfacingcall = null,
		protected ?string $thirdpartyusername = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter([
			'cvx' => $this->cvx,
			'departmentid' => $this->departmentid,
			'administerdate' => $this->administerdate,
			'ndc' => $this->ndc,
			'PATIENTFACINGCALL' => $this->patientfacingcall,
			'THIRDPARTYUSERNAME' => $this->thirdpartyusername,
		]);
	}
}
