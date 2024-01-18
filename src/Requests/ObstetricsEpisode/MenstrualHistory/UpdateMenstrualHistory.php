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
     * @param  int  $obepisodeid  obepisodeid
     * @param  int  $patientid  patientid
     * @param  null|bool  $definite  True if the date given for Last Menstral Period is definite or not.
     * @param  null|int  $frequency  The number of days between periods
     * @param  null|string  $hcgpositivedate  Date on which patient had positive urine or serum pregnancy test.
     * @param  null|string  $lastmenstrualperiod  The date of the first day of the patient's last menstrual period. Use the Definite date field to record whether the date is definite.
     * @param  null|int  $menarche  Age at which first mensturation occurred.
     * @param  null|bool  $mensesmonthly  Indicates whether or not the patient has a monthly menstrual cycle.
     * @param  null|bool  $onbcpconcept  Indicates whether or not the patient was on hormonal birth control at conception.
     * @param  null|string  $priormenses  Additional field to document date of last menstual period.
     */
    public function __construct(
        protected int $obepisodeid,
        protected int $patientid,
        protected ?bool $definite = null,
        protected ?int $frequency = null,
        protected ?string $hcgpositivedate = null,
        protected ?string $lastmenstrualperiod = null,
        protected ?int $menarche = null,
        protected ?bool $mensesmonthly = null,
        protected ?bool $onbcpconcept = null,
        protected ?string $priormenses = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'definite' => $this->definite,
            'frequency' => $this->frequency,
            'hcgpositivedate' => $this->hcgpositivedate,
            'lastmenstrualperiod' => $this->lastmenstrualperiod,
            'menarche' => $this->menarche,
            'mensesmonthly' => $this->mensesmonthly,
            'onbcpconcept' => $this->onbcpconcept,
            'priormenses' => $this->priormenses,
        ]);
    }
}
