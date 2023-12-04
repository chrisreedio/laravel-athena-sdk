<?php

namespace ChrisReedIO\AthenaSDK\Requests\ObstetricsEpisode\ExpectedDateDelivery;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdateObEpisodeEddFromWeeks1820
 *
 * BETA: Modifies the expected date of delivery calculations based on the OB episode information during
 * the 18 to 20 week window
 */
class UpdateObEpisodeEddFromWeeks1820 extends Request implements HasBody
{
	use HasFormBody;

	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/chart/{$this->patientid}/obepisodes/{$this->obepisodeid}/18to20weekeddupdate";
	}


	/**
	 * @param int $patientid patientid
	 * @param int $obepisodeid obepisodeid
	 * @param null|string $finaledd The final expected date of delivery, as calculated using the LMP, the initial exam date, and the late ultrasound date. The OB episode will use this date if available.
	 * @param null|string $quickening The date at which the patient begins to feel fetal movements.
	 * @param null|string $fundalheightdate The date at which fundal height reaches umbilicus, usually estimated to indicate approximately 20 weeks GA.
	 * @param null|bool $finaleddconfirmed Whether the final EDD has been reviewed and approved by the provider.
	 * @param null|string $lateultrasounddate The date of ultrasound for the 18-20 week EDD update.
	 * @param null|int $ultrasoundlatestdaysgestation Gestation period in days.
	 * @param null|int $ultrasoundlatestweeksgestation Gestation period in weeks.
	 */
	public function __construct(
		protected int $patientid,
		protected int $obepisodeid,
		protected ?string $finaledd = null,
		protected ?string $quickening = null,
		protected ?string $fundalheightdate = null,
		protected ?bool $finaleddconfirmed = null,
		protected ?string $lateultrasounddate = null,
		protected ?int $ultrasoundlatestdaysgestation = null,
		protected ?int $ultrasoundlatestweeksgestation = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter([
			'finaledd' => $this->finaledd,
			'quickening' => $this->quickening,
			'fundalheightdate' => $this->fundalheightdate,
			'finaleddconfirmed' => $this->finaleddconfirmed,
			'lateultrasounddate' => $this->lateultrasounddate,
			'ultrasoundlatestdaysgestation' => $this->ultrasoundlatestdaysgestation,
			'ultrasoundlatestweeksgestation' => $this->ultrasoundlatestweeksgestation,
		]);
	}
}
