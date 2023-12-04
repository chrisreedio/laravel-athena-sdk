<?php

namespace ChrisReedIO\AthenaSDK\Requests\ObstetricsEpisode\DischargeInfo;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdateObEpisodeDischargeInformation
 *
 * BETA: Modifies the discharge information of an OB Episode
 */
class UpdateObEpisodeDischargeInformation extends Request implements HasBody
{
	use HasFormBody;

	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/chart/{$this->patientid}/obepisodes/{$this->obepisodeid}/dischargeinformation";
	}


	/**
	 * @param int $patientid patientid
	 * @param int $obepisodeid obepisodeid
	 * @param null|string $feedingmethod The method for feeding the baby.
	 * @param null|string $contraceptivemethod The contraceptive method used.
	 * @param null|string $maternalhgbhctlevel The maternal HGB/GCT level upon discharge.
	 */
	public function __construct(
		protected int $patientid,
		protected int $obepisodeid,
		protected ?string $feedingmethod = null,
		protected ?string $contraceptivemethod = null,
		protected ?string $maternalhgbhctlevel = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter([
			'feedingmethod' => $this->feedingmethod,
			'contraceptivemethod' => $this->contraceptivemethod,
			'maternalhgbhctlevel' => $this->maternalhgbhctlevel,
		]);
	}
}
