<?php

namespace ChrisReedIO\AthenaSDK\Requests\ObstetricsEpisode\MenstrualHistory;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdateMenstrualHistory
 *
 * BETA: Modifies the patients menstrual history data for the patient's OB episode
 */
class UpdateMenstrualHistory extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/chart/{$this->patientid}/obepisodes/{$this->obepisodeid}/menstrualhistory";
    }

    /**
     * @param  int  $patientid patientid
     * @param  int  $obepisodeid obepisodeid
     * @param  null|bool  $definite True if the date given for Last Menstral Period is definite or not.
     * @param  null|int  $menarche Age at which first mensturation occurred.
     * @param  null|int  $frequency The number of days between periods
     * @param  null|string  $priormenses Additional field to document date of last menstual period.
     * @param  null|bool  $onbcpconcept Indicates whether or not the patient was on hormonal birth control at conception.
     * @param  null|bool  $mensesmonthly Indicates whether or not the patient has a monthly menstrual cycle.
     * @param  null|string  $hcgpositivedate Date on which patient had positive urine or serum pregnancy test.
     * @param  null|string  $lastmenstrualperiod The date of the first day of the patient's last menstrual period. Use the Definite date field to record whether the date is definite.
     */
    public function __construct(
        protected int $patientid,
        protected int $obepisodeid,
        protected ?bool $definite = null,
        protected ?int $menarche = null,
        protected ?int $frequency = null,
        protected ?string $priormenses = null,
        protected ?bool $onbcpconcept = null,
        protected ?bool $mensesmonthly = null,
        protected ?string $hcgpositivedate = null,
        protected ?string $lastmenstrualperiod = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'definite' => $this->definite,
            'menarche' => $this->menarche,
            'frequency' => $this->frequency,
            'priormenses' => $this->priormenses,
            'onbcpconcept' => $this->onbcpconcept,
            'mensesmonthly' => $this->mensesmonthly,
            'hcgpositivedate' => $this->hcgpositivedate,
            'lastmenstrualperiod' => $this->lastmenstrualperiod,
        ]);
    }
}
