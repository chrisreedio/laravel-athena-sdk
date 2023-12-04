<?php

namespace ChrisReedIO\AthenaSDK\Requests\ObstetricsEpisode\ObFlowsheet;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdateObEpisodeFlowsheet
 *
 * BETA: Modifies a specified prenatal flowsheet for a given OB Episode
 */
class UpdateObEpisodeFlowsheet extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/chart/{$this->patientid}/obepisodes/{$this->obepisodeid}/flowsheets/{$this->flowsheetid}";
    }

    /**
     * @param  int  $flowsheetid flowsheetid
     * @param  int  $patientid patientid
     * @param  int  $obepisodeid obepisodeid
     * @param  null|int  $blood Observations of patient's blood values. Options can be found via GET /chart/{patientid}/obepisodes/{obepisodeid}/flowsheet/configuration
     * @param  null|string  $edema Patient's edema values. Options can be found via GET /chart/{patientid}/obepisodes/{obepisodeid}/flowsheet/configuration
     * @param  null|array  $fundus Observations of information about the fundus.
     * @param  null|array  $weight A JSON array of observations of patient's weight.
     * @param  null|int  $albumin Observations of patient's albumin.  Options for albumin values can be found via GET /chart/{patientid}/obepisodes/{obepisodeid}/flowsheet/configuration
     * @param  null|string  $glucose Observations of patient's glucose. Options can be found via GET /chart/{patientid}/obepisodes/{obepisodeid}/flowsheet/configuration
     * @param  null|string  $ketones Observations of ketones. Options can be found via GET /chart/{patientid}/obepisodes/{obepisodeid}/flowsheet/configuration
     * @param  null|string  $nitrite Observations of patient's nitrites. Options can be found via GET /chart/{patientid}/obepisodes/{obepisodeid}/flowsheet/configuration
     * @param  null|int  $protein Observations of patient's protein. Options can be found via GET /chart/{patientid}/obepisodes/{obepisodeid}/flowsheet/configuration
     * @param  null|string  $comments Comments for the encounter
     * @param  null|string  $phofurine Observations of PH of patient's urine.
     * @param  null|array  $cervixexam Information about cervix exams.
     * @param  null|string  $leukocytes Observations of Patient's leukocytes. Options can be found via GET /chart/{patientid}/obepisodes/{obepisodeid}/flowsheet/configuration
     * @param  null|int  $bishopscore Observations of a score that assists in predicting the likelihood that labor will need to be induced.
     * @param  null|string  $gestationage This is a string that includes the number of weeks from the beginning of the gestation followed by a period, followed by the number of days of the gestation.  For example, a string that says 2.3 means 2 weeks and 3 days, or a total of 17 days.  There can be multiple observations of this field.
     * @param  null|array  $presentation Observations of presentation.  Options can be found via GET /chart/{patientid}/obepisodes/{obepisodeid}/flowsheet/configuration
     * @param  null|array  $bloodpressure A JSON array of information about the patient's blood pressure
     * @param  null|array  $fetalmovement A JSON array of observations of fetal movement. Options can be found via GET /chart/{patientid}/obepisodes/{obepisodeid}/flowsheet/configuration
     * @param  null|array  $fetalheartrate A JSON array of observations of information about the fetal heart rate.
     * @param  null|string  $pretermlaborsigns Options for preterm labor can be found via GET /chart/{patientid}/obepisodes/{obepisodeid}/flowsheet/configuration
     * @param  null|int  $modifiedbishopscore Observations of a score that assists in predicting the likelihood that labor will need to be induced, but weights the solution for a number of other factors (such as the existence of pre-eclampsia) that aren't captured by the Bishop Score.
     * @param  null|int  $patientreportofpain Patient report of pain.  This is a string, but it's typically reported on a scale from 1 to 10
     * @param  null|string  $estimatedfetalweight Observations of the estimated weight of fetus. Options can be found via GET /chart/{patientid}/obepisodes/{obepisodeid}/flowsheet/configuration
     * @param  null|string  $specificgravityofurine Observations of the specific gravity of patient's urine.
     */
    public function __construct(
        protected int $flowsheetid,
        protected int $patientid,
        protected int $obepisodeid,
        protected ?int $blood = null,
        protected ?string $edema = null,
        protected ?array $fundus = null,
        protected ?array $weight = null,
        protected ?int $albumin = null,
        protected ?string $glucose = null,
        protected ?string $ketones = null,
        protected ?string $nitrite = null,
        protected ?int $protein = null,
        protected ?string $comments = null,
        protected ?string $phofurine = null,
        protected ?array $cervixexam = null,
        protected ?string $leukocytes = null,
        protected ?int $bishopscore = null,
        protected ?string $gestationage = null,
        protected ?array $presentation = null,
        protected ?array $bloodpressure = null,
        protected ?array $fetalmovement = null,
        protected ?array $fetalheartrate = null,
        protected ?string $pretermlaborsigns = null,
        protected ?int $modifiedbishopscore = null,
        protected ?int $patientreportofpain = null,
        protected ?string $estimatedfetalweight = null,
        protected ?string $specificgravityofurine = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'blood' => $this->blood,
            'edema' => $this->edema,
            'fundus' => $this->fundus,
            'weight' => $this->weight,
            'albumin' => $this->albumin,
            'glucose' => $this->glucose,
            'ketones' => $this->ketones,
            'nitrite' => $this->nitrite,
            'protein' => $this->protein,
            'comments' => $this->comments,
            'phofurine' => $this->phofurine,
            'cervixexam' => $this->cervixexam,
            'leukocytes' => $this->leukocytes,
            'bishopscore' => $this->bishopscore,
            'gestationage' => $this->gestationage,
            'presentation' => $this->presentation,
            'bloodpressure' => $this->bloodpressure,
            'fetalmovement' => $this->fetalmovement,
            'fetalheartrate' => $this->fetalheartrate,
            'pretermlaborsigns' => $this->pretermlaborsigns,
            'modifiedbishopscore' => $this->modifiedbishopscore,
            'patientreportofpain' => $this->patientreportofpain,
            'estimatedfetalweight' => $this->estimatedfetalweight,
            'specificgravityofurine' => $this->specificgravityofurine,
        ]);
    }
}
