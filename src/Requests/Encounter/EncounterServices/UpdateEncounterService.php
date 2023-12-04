<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\EncounterServices;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdateEncounterService
 *
 * Modifies information of a specific service of the encounter
 */
class UpdateEncounterService extends Request implements HasBody
{
	use HasFormBody;

	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/encounter/{$this->encounterid}/services/{$this->serviceid}";
	}


	/**
	 * @param int $encounterid encounterid
	 * @param int $serviceid serviceid
	 * @param null|number $units The number of units for this service. This will often be the number of times the service was performed.
	 * @param null|array $modifiers A list of non fee-affecting modifiers to attach to this service. Use GET /encounter/configuration/modifiers to find valid options for this encounter. Input needs to be quoted and passed in an array. Eg. ["E1", "E2", "59"].
	 * @param null|array $icd10codes A list of ICD 10 codes (either as a comma delimited list or multiple POSTed values) to attach to this service. Use GET /chart/encounter/{encounterid}/diagnoses to find valid options for this encounter.
	 * @param null|bool $billforservice True if you want to bill for this service.
	 */
	public function __construct(
		protected int $encounterid,
		protected int $serviceid,
		protected ?\number $units = null,
		protected ?array $modifiers = null,
		protected ?array $icd10codes = null,
		protected ?bool $billforservice = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter([
			'units' => $this->units,
			'modifiers' => $this->modifiers,
			'icd10codes' => $this->icd10codes,
			'billforservice' => $this->billforservice,
		]);
	}
}
