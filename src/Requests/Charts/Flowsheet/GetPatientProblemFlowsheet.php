<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\Flowsheet;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientProblemFlowsheet
 *
 * Retrieves data of the patient with a specific problem
 */
class GetPatientProblemFlowsheet extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/chart/{$this->patientid}/flowsheets/{$this->snomedcode}";
	}


	/**
	 * @param int $patientid patientid
	 * @param int $snomedcode snomedcode
	 * @param null|string $enddate Date you want flowsheet element's data to stop.
	 * @param int $departmentid The department ID of the patient chart.
	 * @param null|array $providerid The list of provider IDs to format the flowsheet as.
	 * @param null|bool $showglobalflowsheetelementsonly Show elements from the globally configured flowsheet rather than those specific to a provider.  This may restrict the information returned, but is generally faster.
	 * @param null|string $startdate Date you want flowsheet element's data to start.
	 */
	public function __construct(
		protected int $patientid,
		protected int $snomedcode,
		protected ?string $enddate = null,
		protected int $departmentid,
		protected ?array $providerid = null,
		protected ?bool $showglobalflowsheetelementsonly = null,
		protected ?string $startdate = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter([
			'enddate' => $this->enddate,
			'departmentid' => $this->departmentid,
			'providerid' => $this->providerid,
			'showglobalflowsheetelementsonly' => $this->showglobalflowsheetelementsonly,
			'startdate' => $this->startdate,
		]);
	}
}
