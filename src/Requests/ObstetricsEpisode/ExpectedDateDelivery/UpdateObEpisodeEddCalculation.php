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
     * @param  int  $obepisodeid obepisodeid
     * @param  int  $patientid patientid
     * @param  null|bool  $acceptemptydatefields Whether to accept null values for the date fields in the OB episode. If true, empty date fields will be stored as null values in the episode.
     * @param  null|bool  $definitelmpdate Whether the last menstrual period date is definite.
     * @param  null|string  $finaledd The final expected date of delivery, as calculated using the LMP, the initial exam date, and the late ultrasound date. The OB episode will use this date if available.
     * @param  null|bool  $finaleddconfirmed Whether the final EDD has been reviewed and approved by the provider.
     * @param  null|string  $fundalheightdate The date at which fundal height reaches umbilicus, usually estimated to indicate approximately 20 weeks GA.
     * @param  null|int  $initialdaysgestation Fetus age in days.
     * @param  null|string  $initialedd The expected date of delivery, as calculated using the LMP, initial exam date, and initial ultrasound date. The OB episode will only use this date if the final EDD field is not populated.
     * @param  null|bool  $initialeddconfirmed Whether the initial EDD has been reviewed and approved by the provider.
     * @param  null|string  $initialexamdate The date of the initial exam.
     * @param  null|int  $initialexamproviderid The ID of the provider who performed the initial exam.
     * @param  null|string  $initialultrasounddate The date of the first ultrasound.
     * @param  null|int  $initialweeksgestation Fetus age in weeks.
     * @param  null|string  $lastmenstrualperiod The date of first day of the last menstrual period.
     * @param  null|string  $lateultrasounddate The date of ultrasound for the 18-20 week EDD update.
     * @param  null|string  $quickening The date at which the patient begins to feel fetal movements.
     * @param  null|int  $ultrasounddaysgestation Fetus age in days.
     * @param  null|int  $ultrasoundlatestdaysgestation Gestation period in days.
     * @param  null|int  $ultrasoundlatestweeksgestation Gestation period in weeks.
     * @param  null|int  $ultrasoundweeksgestation Fetus age in weeks.
     */
    public function __construct(
        protected int $obepisodeid,
        protected int $patientid,
        protected ?bool $acceptemptydatefields = null,
        protected ?bool $definitelmpdate = null,
        protected ?string $finaledd = null,
        protected ?bool $finaleddconfirmed = null,
        protected ?string $fundalheightdate = null,
        protected ?int $initialdaysgestation = null,
        protected ?string $initialedd = null,
        protected ?bool $initialeddconfirmed = null,
        protected ?string $initialexamdate = null,
        protected ?int $initialexamproviderid = null,
        protected ?string $initialultrasounddate = null,
        protected ?int $initialweeksgestation = null,
        protected ?string $lastmenstrualperiod = null,
        protected ?string $lateultrasounddate = null,
        protected ?string $quickening = null,
        protected ?int $ultrasounddaysgestation = null,
        protected ?int $ultrasoundlatestdaysgestation = null,
        protected ?int $ultrasoundlatestweeksgestation = null,
        protected ?int $ultrasoundweeksgestation = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'acceptemptydatefields' => $this->acceptemptydatefields,
            'definitelmpdate' => $this->definitelmpdate,
            'finaledd' => $this->finaledd,
            'finaleddconfirmed' => $this->finaleddconfirmed,
            'fundalheightdate' => $this->fundalheightdate,
            'initialdaysgestation' => $this->initialdaysgestation,
            'initialedd' => $this->initialedd,
            'initialeddconfirmed' => $this->initialeddconfirmed,
            'initialexamdate' => $this->initialexamdate,
            'initialexamproviderid' => $this->initialexamproviderid,
            'initialultrasounddate' => $this->initialultrasounddate,
            'initialweeksgestation' => $this->initialweeksgestation,
            'lastmenstrualperiod' => $this->lastmenstrualperiod,
            'lateultrasounddate' => $this->lateultrasounddate,
            'quickening' => $this->quickening,
            'ultrasounddaysgestation' => $this->ultrasounddaysgestation,
            'ultrasoundlatestdaysgestation' => $this->ultrasoundlatestdaysgestation,
            'ultrasoundlatestweeksgestation' => $this->ultrasoundlatestweeksgestation,
            'ultrasoundweeksgestation' => $this->ultrasoundweeksgestation,
        ]);
    }
}
