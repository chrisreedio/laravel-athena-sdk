<?php

namespace ChrisReedIO\AthenaSDK\Requests\Patient\PreferredPharmacy;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientsPreferredPharmacy
 *
 * Retrieve preferred pharmacy for a specific patient chart
 */
class GetPatientsPreferredPharmacy extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/chart/{$this->patientid}/pharmacies/preferred";
	}


	/**
	 * @param int $patientid patientid
	 * @param int $departmentid The athenaNet department id.
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
