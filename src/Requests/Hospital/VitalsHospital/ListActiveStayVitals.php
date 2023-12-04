<?php

namespace ChrisReedIO\AthenaSDK\Requests\Hospital\VitalsHospital;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListActiveStayVitals
 *
 * BETA: Retrieves vitals across all the active stays in the hospital.
 * Note: API lists vital readings,
 * grouped by vital type (height, weight, blood pressure, etc).
 */
class ListActiveStayVitals extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/stays/active/vitals";
	}


	/**
	 * @param null|string $startdatetime Only retrieve vitals that were taking on or after this date and time.
	 * @param null|string $enddatetime Only retrieve vitals that were taking on or before this date and time.
	 * @param null|bool $showemptyvitals Show configured vitals that have no readings for this patient.
	 * @param string $key Key for the vital group, E.g., HEIGHT. Get the keys using /chart/configuration/vitals
	 * @param null|string $thirdpartyusername User name of the patient in the third party application.
	 * @param null|bool $patientfacingcall When 'true' is passed we will collect relevant data and store in our database.
	 */
	public function __construct(
		protected ?string $startdatetime = null,
		protected ?string $enddatetime = null,
		protected ?bool $showemptyvitals = null,
		protected string $key,
		protected ?string $thirdpartyusername = null,
		protected ?bool $patientfacingcall = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter([
			'startdatetime' => $this->startdatetime,
			'enddatetime' => $this->enddatetime,
			'showemptyvitals' => $this->showemptyvitals,
			'key' => $this->key,
			'THIRDPARTYUSERNAME' => $this->thirdpartyusername,
			'PATIENTFACINGCALL' => $this->patientfacingcall,
		]);
	}
}
