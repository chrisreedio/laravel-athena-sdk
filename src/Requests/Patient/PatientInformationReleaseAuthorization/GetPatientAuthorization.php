<?php

namespace ChrisReedIO\AthenaSDK\Requests\Patient\PatientInformationReleaseAuthorization;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientAuthorization
 *
 * Retrieve information of a specific release authorizations for a patient
 */
class GetPatientAuthorization extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/patients/{$this->patientid}/authorizations/{$this->releaseauthorizationid}";
	}


	/**
	 * @param int $releaseauthorizationid releaseauthorizationid
	 * @param int $patientid patientid
	 * @param null|bool $showdeleted Show deleted authorizations
	 * @param null|string $status Release authorization status (VALID, EXPIRED, REVOKED)
	 * @param int $departmentid Department ID of the patient
	 */
	public function __construct(
		protected int $releaseauthorizationid,
		protected int $patientid,
		protected ?bool $showdeleted = null,
		protected ?string $status = null,
		protected int $departmentid,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['showdeleted' => $this->showdeleted, 'status' => $this->status, 'departmentid' => $this->departmentid]);
	}
}
