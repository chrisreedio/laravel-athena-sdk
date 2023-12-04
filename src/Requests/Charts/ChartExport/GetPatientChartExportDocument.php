<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\ChartExport;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientChartExportDocument
 *
 * Retrieves the chart export document of the patient
 */
class GetPatientChartExportDocument extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/chart/{$this->patientid}/documentexport/{$this->documentid}";
	}


	/**
	 * @param int $documentid documentid
	 * @param int $patientid patientid
	 * @param null|int $departmentid Department ID for the patient.
	 */
	public function __construct(
		protected int $documentid,
		protected int $patientid,
		protected ?int $departmentid = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['departmentid' => $this->departmentid]);
	}
}
