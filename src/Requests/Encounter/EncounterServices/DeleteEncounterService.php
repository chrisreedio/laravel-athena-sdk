<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\EncounterServices;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeleteEncounterService
 *
 * Deletes the preexisting record of the service of the encounter
 */
class DeleteEncounterService extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/encounter/{$this->encounterid}/services/{$this->serviceid}";
	}


	/**
	 * @param int $encounterid encounterid
	 * @param int $serviceid serviceid
	 */
	public function __construct(
		protected int $encounterid,
		protected int $serviceid,
	) {
	}
}
