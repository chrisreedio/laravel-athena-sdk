<?php

namespace ChrisReedIO\AthenaSDK\Requests\ObstetricsEpisode\ObFlowsheet;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPrenatalFlowsheetConfiguration
 *
 * BETA: Retrieves the valid fields for a prenatal flowsheet in an OB Episode
 */
class GetPrenatalFlowsheetConfiguration extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/chart/{$this->patientid}/obepisodes/{$this->obepisodeid}/flowsheet/configuration";
	}


	/**
	 * @param int $patientid patientid
	 * @param int $obepisodeid obepisodeid
	 */
	public function __construct(
		protected int $patientid,
		protected int $obepisodeid,
	) {
	}
}
