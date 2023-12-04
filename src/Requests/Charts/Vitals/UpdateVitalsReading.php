<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\Vitals;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdateVitalsReading
 *
 * Modifies the specific vital information of the patient
 */
class UpdateVitalsReading extends Request implements HasBody
{
	use HasFormBody;

	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/chart/{$this->patientid}/vitals/{$this->vitalid}";
	}


	/**
	 * @param int $patientid patientid
	 * @param int $vitalid vitalid
	 * @param int $departmentid The department ID.
	 * @param string $value The reading value. See the configuration for the proper units.
	 */
	public function __construct(
		protected int $patientid,
		protected int $vitalid,
		protected int $departmentid,
		protected string $value,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter(['departmentid' => $this->departmentid, 'value' => $this->value]);
	}
}
