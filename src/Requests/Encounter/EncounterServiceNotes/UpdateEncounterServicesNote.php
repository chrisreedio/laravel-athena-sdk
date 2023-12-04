<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\EncounterServiceNotes;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdateEncounterServicesNote
 *
 * BETA: Modifies the notes of the encounter's service in the billing section
 */
class UpdateEncounterServicesNote extends Request implements HasBody
{
	use HasFormBody;

	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/encounter/{$this->encounterid}/services/note";
	}


	/**
	 * @param int $encounterid encounterid
	 * @param string $note Text of the note that you want attached to the billing slip of an encounter.
	 */
	public function __construct(
		protected int $encounterid,
		protected string $note,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter(['note' => $this->note]);
	}
}
