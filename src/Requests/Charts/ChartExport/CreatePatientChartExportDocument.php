<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\ChartExport;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreatePatientChartExportDocument
 *
 * Create patient chart export document record
 */
class CreatePatientChartExportDocument extends Request implements HasBody
{
	use HasFormBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/chart/{$this->patientid}/documentexport";
	}


	/**
	 * @param int $patientid patientid
	 * @param string $createfromdaterangestart The start date, inclusive, of the chart export.
	 * @param null|int $departmentid The department ID associated with the document export.
	 * @param null|string $createfromdaterangeend The end date, inclusive, of the chart export.  Defaults to today.
	 * @param null|array $createfromdatedocumentclass One or more document classes to include in the export.  Defaults to LABRESULT, IMAGINGRESULT, and CLINICALDOCUMENT.
	 */
	public function __construct(
		protected int $patientid,
		protected string $createfromdaterangestart,
		protected ?int $departmentid = null,
		protected ?string $createfromdaterangeend = null,
		protected ?array $createfromdatedocumentclass = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter([
			'createfromdaterangestart' => $this->createfromdaterangestart,
			'departmentid' => $this->departmentid,
			'createfromdaterangeend' => $this->createfromdaterangeend,
			'createfromdatedocumentclass' => $this->createfromdatedocumentclass,
		]);
	}
}
