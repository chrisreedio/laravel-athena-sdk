<?php

namespace ChrisReedIO\AthenaSDK\Requests\ObstetricsEpisode\GeneticScreeningAndInfectionHistory;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdateGeneticScreeningAndInfectionHistory
 *
 * BETA: Modifies the genetics screening and infection history information for a specific OB episodes.
 */
class UpdateGeneticScreeningAndInfectionHistory extends Request implements HasBody
{
	use HasFormBody;

	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/chart/{$this->patientid}/obepisodes/{$this->obepisodeid}/geneticscreeningandinfectionhistory";
	}


	/**
	 * @param int $patientid patientid
	 * @param int $obepisodeid obepisodeid
	 * @param array $answers This is a JSON array of objects that is used to update the question specific information.
	 */
	public function __construct(
		protected int $patientid,
		protected int $obepisodeid,
		protected array $answers,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter(['answers' => $this->answers]);
	}
}
