<?php

namespace ChrisReedIO\AthenaSDK\Requests\ObstetricsEpisode\ExpectedDateDelivery;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdateObEpisodeEddCalculation
 *
 * BETA: Modifies the expected date of delivery information for an specific OB episode
 */
class UpdateObEpisodeEddCalculation extends Request implements HasBody
{
	use HasFormBody;

	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/chart/{$this->patientid}/obepisodes/{$this->obepisodeid}/eddcalculation";
	}


	/**
	 * @param int $patientid patientid
	 * @param int $obepisodeid obepisodeid
	 * @param null|string $finaledd The final expected date of delivery, as calculated using the LMP, the initial exam date, and the late ultrasound date. The OB episode will use this date if available.
	 * @param null|string $initialedd The expected date of delivery, as calculated using the LMP, initial exam date, and initial ultrasound date. The OB episode will only use this date if the final EDD field is not populated.
	 * @param null|string $quickening The date at which the patient begins to feel fetal movements.
	 * @param null|bool $definitelmpdate Whether the last menstrual period date is definite.
	 * @param null|string $initialexamdate The date of the initial exam.
	 * @param null|string $fundalheightdate The date at which fundal height reaches umbilicus, usually estimated to indicate approximately 20 weeks GA.
	 * @param null|bool $finaleddconfirmed Whether the final EDD has been reviewed and approved by the provider.
	 * @param null|string $lateultrasounddate The date of ultrasound for the 18-20 week EDD update.
	 * @param null|bool $initialeddconfirmed Whether the initial EDD has been reviewed and approved by the provider.
	 * @param null|string $lastmenstrualperiod The date of first day of the last menstrual period.
	 * @param null|int $initialdaysgestation Fetus age in days.
	 * @param null|bool $acceptemptydatefields Whether to accept null values for the date fields in the OB episode. If true, empty date fields will be stored as null values in the episode.
	 * @param null|int $initialexamproviderid The ID of the provider who performed the initial exam.
	 * @param null|string $initialultrasounddate The date of the first ultrasound.
	 * @param null|int $initialweeksgestation Fetus age in weeks.
	 * @param null|int $ultrasounddaysgestation Fetus age in days.
	 * @param null|int $ultrasoundweeksgestation Fetus age in weeks.
	 * @param null|int $ultrasoundlatestdaysgestation Gestation period in days.
	 * @param null|int $ultrasoundlatestweeksgestation Gestation period in weeks.
	 */
	public function __construct(
		protected int $patientid,
		protected int $obepisodeid,
		protected ?string $finaledd = null,
		protected ?string $initialedd = null,
		protected ?string $quickening = null,
		protected ?bool $definitelmpdate = null,
		protected ?string $initialexamdate = null,
		protected ?string $fundalheightdate = null,
		protected ?bool $finaleddconfirmed = null,
		protected ?string $lateultrasounddate = null,
		protected ?bool $initialeddconfirmed = null,
		protected ?string $lastmenstrualperiod = null,
		protected ?int $initialdaysgestation = null,
		protected ?bool $acceptemptydatefields = null,
		protected ?int $initialexamproviderid = null,
		protected ?string $initialultrasounddate = null,
		protected ?int $initialweeksgestation = null,
		protected ?int $ultrasounddaysgestation = null,
		protected ?int $ultrasoundweeksgestation = null,
		protected ?int $ultrasoundlatestdaysgestation = null,
		protected ?int $ultrasoundlatestweeksgestation = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter([
			'finaledd' => $this->finaledd,
			'initialedd' => $this->initialedd,
			'quickening' => $this->quickening,
			'definitelmpdate' => $this->definitelmpdate,
			'initialexamdate' => $this->initialexamdate,
			'fundalheightdate' => $this->fundalheightdate,
			'finaleddconfirmed' => $this->finaleddconfirmed,
			'lateultrasounddate' => $this->lateultrasounddate,
			'initialeddconfirmed' => $this->initialeddconfirmed,
			'lastmenstrualperiod' => $this->lastmenstrualperiod,
			'initialdaysgestation' => $this->initialdaysgestation,
			'acceptemptydatefields' => $this->acceptemptydatefields,
			'initialexamproviderid' => $this->initialexamproviderid,
			'initialultrasounddate' => $this->initialultrasounddate,
			'initialweeksgestation' => $this->initialweeksgestation,
			'ultrasounddaysgestation' => $this->ultrasounddaysgestation,
			'ultrasoundweeksgestation' => $this->ultrasoundweeksgestation,
			'ultrasoundlatestdaysgestation' => $this->ultrasoundlatestdaysgestation,
			'ultrasoundlatestweeksgestation' => $this->ultrasoundlatestweeksgestation,
		]);
	}
}
