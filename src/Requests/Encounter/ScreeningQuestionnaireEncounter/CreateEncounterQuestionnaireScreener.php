<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\ScreeningQuestionnaireEncounter;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateEncounterQuestionnaireScreener
 *
 * Creates a new questionnaire screener record for the encounter
 */
class CreateEncounterQuestionnaireScreener extends Request implements HasBody
{
	use HasFormBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/chart/encounter/{$this->encounterid}/questionnairescreeners";
	}


	/**
	 * @param int $encounterid encounterid
	 * @param int $templateid The template ID for the screener that will be activated.
	 */
	public function __construct(
		protected int $encounterid,
		protected int $templateid,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter(['templateid' => $this->templateid]);
	}
}
