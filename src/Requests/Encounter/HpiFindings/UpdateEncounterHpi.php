<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\HpiFindings;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdateEncounterHpi
 *
 * Modifies the HPI Summary for an encounter.
 */
class UpdateEncounterHpi extends Request implements HasBody
{
	use HasFormBody;

	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/chart/encounter/{$this->encounterid}/hpi";
	}


	/**
	 * @param int $encounterid encounterid
	 * @param null|array $hpi This is a JSON structure containing everything you want the HPI to now contain.  If you call the GET version of this call you can see some sample output.  It is extremely important to note that anything you pass in will become the new HPI. Even if you only wish to make an addition, you will need to pass in the whole output of the GET plus your addition, otherwise anything you don't pass in will be removed.
	 * @param null|bool $hpitoros Whether ROS is as noted in HPI.
	 * @param null|string $sectionnote The text to be updated to the history of present illness section note for this encounter.
	 * @param null|array $templatedata An array of objects, each containing the id and note for a template.
	 * @param null|bool $replacesectionnote If true, will replace the existing section note with the new one. If false, will append to the existing note.
	 */
	public function __construct(
		protected int $encounterid,
		protected ?array $hpi = null,
		protected ?bool $hpitoros = null,
		protected ?string $sectionnote = null,
		protected ?array $templatedata = null,
		protected ?bool $replacesectionnote = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter([
			'hpi' => $this->hpi,
			'hpitoros' => $this->hpitoros,
			'sectionnote' => $this->sectionnote,
			'templatedata' => $this->templatedata,
			'replacesectionnote' => $this->replacesectionnote,
		]);
	}
}
