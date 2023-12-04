<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\OrderGroup;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreatePatientOrderGroups
 *
 * Creates an ordergroup for a specific patient chart outside an encounter flow
 */
class CreatePatientOrderGroups extends Request implements HasBody
{
	use HasFormBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/chart/{$this->patientid}/ordergroups";
	}


	/**
	 * @param int $patientid patientid
	 * @param int $departmentid The department to use for the order group.
	 * @param null|int $patientcaseid The ID of the patient case generating this new order group.
	 * @param null|int $orderingproviderid The ordering provider ID, if not given a random provider from that department will be used.
	 */
	public function __construct(
		protected int $patientid,
		protected int $departmentid,
		protected ?int $patientcaseid = null,
		protected ?int $orderingproviderid = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter([
			'departmentid' => $this->departmentid,
			'patientcaseid' => $this->patientcaseid,
			'orderingproviderid' => $this->orderingproviderid,
		]);
	}
}
