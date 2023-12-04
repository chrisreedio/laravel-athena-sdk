<?php

namespace ChrisReedIO\AthenaSDK\Requests\Patient\Patient;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListPatientChanges
 *
 * Retrieve list of changes made to the patient record Note: This endpoint may rely on specific
 * settings to be enabled in athenaNet Production to function properly that are not required in other
 * environments. Please see <a
 * href="/api/resources/best-practices-and-troubleshooting#Handling_Beta_APIs">Permissioned Rollout of
 * APIs</a> for more information if you are experiencing issues.
 */
class ListPatientChanges extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/patients/changed";
	}


	/**
	 * @param null|bool $leaveunprocessed For testing purposes, do not mark records as processed.
	 * @param null|array $patientid Patient ID. Multiple Patient IDs are allowed, either comma separated or with multiple values.
	 * @param null|bool $showenterprisedetails If set, will show the local patient ID, Enterprise ID, provider group ID.
	 * @param null|bool $returnglobalid Fetch the Global ID of the patients.
	 * @param null|bool $ignorerestrictions Patient information for patients with record restrictions and blocked patients will not be shown.  Setting this flag to true will show that information for those patients. No effect if the CLTH_DP_NEW_BTG_MDP_RESTRICTIONS toggle is enabled.
	 * @param null|bool $showpreviouspatientids If set, will show the previous patient ID this patient was merged from.
	 * @param null|array $departmentid Department ID. Multiple departments are allowed, either comma separated or with multiple values.
	 * @param null|string $showprocessedenddatetime See showprocessestartdatetime.
	 * @param null|array $confidentialitycode A comma separated list of confidentiality codes to filter patients by. If not set defaults to include all confidentiality codes. Supported codes: 'N' and 'R'. Only functions if the CLTH_DP_NEW_BTG_MDP_RESTRICTIONS toggle is enabled.
	 * @param null|string $showprocessedstartdatetime Show already processed changes.  This will show changes that you previously retrieved at some point after this datetime mm/dd/yyyy hh24:mi:ss (Eastern). Can be used to refetch data if there was an error, such as a timeout, and records are marked as already retrieved. This is intended to be used with showprocessedenddatetime and for a short period of time only. Also note that processed messages will eventually be deleted.
	 */
	public function __construct(
		protected ?bool $leaveunprocessed = null,
		protected ?array $patientid = null,
		protected ?bool $showenterprisedetails = null,
		protected ?bool $returnglobalid = null,
		protected ?bool $ignorerestrictions = null,
		protected ?bool $showpreviouspatientids = null,
		protected ?array $departmentid = null,
		protected ?string $showprocessedenddatetime = null,
		protected ?array $confidentialitycode = null,
		protected ?string $showprocessedstartdatetime = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter([
			'leaveunprocessed' => $this->leaveunprocessed,
			'patientid' => $this->patientid,
			'showenterprisedetails' => $this->showenterprisedetails,
			'returnglobalid' => $this->returnglobalid,
			'ignorerestrictions' => $this->ignorerestrictions,
			'showpreviouspatientids' => $this->showpreviouspatientids,
			'departmentid' => $this->departmentid,
			'showprocessedenddatetime' => $this->showprocessedenddatetime,
			'confidentialitycode' => $this->confidentialitycode,
			'showprocessedstartdatetime' => $this->showprocessedstartdatetime,
		]);
	}
}
