<?php

namespace ChrisReedIO\AthenaSDK\Requests\Patient\InterfaceConsent;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListPatientInterfaceConsents
 *
 * Retrieves patient's consent to share health data
 */
class ListPatientInterfaceConsents extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/patients/{$this->patientid}/interfaceconsents";
	}


	/**
	 * @param int $patientid patientid
	 * @param int $departmentid Department ID
	 */
	public function __construct(
		protected int $patientid,
		protected int $departmentid,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['departmentid' => $this->departmentid]);
	}
}
