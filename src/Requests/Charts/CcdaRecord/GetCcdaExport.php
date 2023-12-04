<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\CcdaRecord;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetCcdaExport
 *
 * Retrieve CCDA document for specific patient and chart
 */
class GetCcdaExport extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/ccda/{$this->patientid}/ccdaexport";
	}


	/**
	 * @param int $patientid patientid
	 * @param null|string $version version USCDI/MU3
	 * @param null|int $chartsharinggroupid CHARTSHARING GROUP ID.
	 * @param null|string $startdate Start date for filtering results within a specific time period. Only for DataPortability document. Example: startdate=2013-01-01T00:00:00
	 * @param null|int $encounterid Encounter ID.
	 * @param null|int $enterpriseid ENTERPRISE ID.
	 * @param null|int $documentid Document ID.
	 * @param null|string $enddate End date for filtering results within a specific time period. Only for DataPortability document. Example: enddate=2014-01-01T00:00:00
	 * @param null|int $departmentid Department ID.
	 * @param string $documenttype Valid types are DataPortability, ReferralNote, CarePlan, DischargeSummary, and CCD.
	 * @param bool $inpatient Inpatient or ambulatory
	 * @param null|string $thirdpartyusername User name of the patient in the third party application.
	 * @param null|bool $patientfacingcall When 'true' is passed we will collect relevant data and store in our database.
	 */
	public function __construct(
		protected int $patientid,
		protected ?string $version = null,
		protected ?int $chartsharinggroupid = null,
		protected ?string $startdate = null,
		protected ?int $encounterid = null,
		protected ?int $enterpriseid = null,
		protected ?int $documentid = null,
		protected ?string $enddate = null,
		protected ?int $departmentid = null,
		protected string $documenttype,
		protected bool $inpatient,
		protected ?string $thirdpartyusername = null,
		protected ?bool $patientfacingcall = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter([
			'version' => $this->version,
			'chartsharinggroupid' => $this->chartsharinggroupid,
			'startdate' => $this->startdate,
			'encounterid' => $this->encounterid,
			'enterpriseid' => $this->enterpriseid,
			'documentid' => $this->documentid,
			'enddate' => $this->enddate,
			'departmentid' => $this->departmentid,
			'documenttype' => $this->documenttype,
			'inpatient' => $this->inpatient,
			'THIRDPARTYUSERNAME' => $this->thirdpartyusername,
			'PATIENTFACINGCALL' => $this->patientfacingcall,
		]);
	}
}
