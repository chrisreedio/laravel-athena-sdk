<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\Assessment;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdateEncounterAssessment
 *
 * Modifies the Assessment /Plan note for a specific encounter
 */
class UpdateEncounterAssessment extends Request implements HasBody
{
	use HasFormBody;

	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/chart/encounter/{$this->encounterid}/assessment";
	}


	/**
	 * @param int $encounterid encounterid
	 * @param string $assessmenttext The text to be updated to the assessment note.
	 * @param null|bool $replacetext If true, will replace the existing assessment text with the new one. If false, will append to the existing text.
	 */
	public function __construct(
		protected int $encounterid,
		protected string $assessmenttext,
		protected ?bool $replacetext = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter(['assessmenttext' => $this->assessmenttext, 'replacetext' => $this->replacetext]);
	}
}
