<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\EncounterReasons;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeleteEncounterReason
 *
 * Deletes an encounter reason from the encounter instance
 */
class DeleteEncounterReason extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/chart/encounter/{$this->encounterid}/encounterreasons";
	}


	/**
	 * @param int $encounterid encounterid
	 * @param int $encounterreasonid Encounter reason ID. Must be from the list returned by /configuration/encounterreason
	 */
	public function __construct(
		protected int $encounterid,
		protected int $encounterreasonid,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['encounterreasonid' => $this->encounterreasonid]);
	}
}
