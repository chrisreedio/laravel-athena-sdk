<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\PhysicalTherapyEpisode;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListPatientPtEpisodes
 *
 * Retrieves a list of PT Episodes for a specific patient.
 */
class ListPatientPtEpisodes extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/chart/{$this->patientid}/ptepisodes";
	}


	/**
	 * @param int $patientid patientid
	 * @param int $departmentid Department ID.
	 * @param null|bool $showclosed Designates whether we will also show closed PT episodes. The default value is false.
	 */
	public function __construct(
		protected int $patientid,
		protected int $departmentid,
		protected ?bool $showclosed = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['departmentid' => $this->departmentid, 'showclosed' => $this->showclosed]);
	}
}
