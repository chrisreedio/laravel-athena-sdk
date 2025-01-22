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
     * @param  int  $flowsheetid  flowsheetid
     * @param  int  $obepisodeid  obepisodeid
     * @param  int  $patientid  patientid
     * @param  null|int  $albumin  Observations of patient's albumin.  Options for albumin values can be found via GET /chart/{patientid}/obepisodes/{obepisodeid}/flowsheet/configuration
     * @param  null|int  $bishopscore  Observations of a score that assists in predicting the likelihood that labor will need to be induced.
     * @param  null|int  $blood  Observations of patient's blood values. Options can be found via GET /chart/{patientid}/obepisodes/{obepisodeid}/flowsheet/configuration
     * @param  null|array  $bloodpressure  A JSON array of information about the patient's blood pressure
     * @param  null|array  $cervixexam  Information about cervix exams.
     * @param  null|string  $comments  Comments for the encounter
     * @param  null|string  $edema  Patient's edema values. Options can be found via GET /chart/{patientid}/obepisodes/{obepisodeid}/flowsheet/configuration
     * @param  null|string  $estimatedfetalweight  Observations of the estimated weight of fetus. Options can be found via GET /chart/{patientid}/obepisodes/{obepisodeid}/flowsheet/configuration
     * @param  null|array  $fetalheartrate  A JSON array of observations of information about the fetal heart rate.
     * @param  null|array  $fetalmovement  A JSON array of observations of fetal movement. Options can be found via GET /chart/{patientid}/obepisodes/{obepisodeid}/flowsheet/configuration
     * @param  null|array  $fundus  Observations of information about the fundus.
     * @param  null|string  $gestationage  This is a string that includes the number of weeks from the beginning of the gestation followed by a period, followed by the number of days of the gestation.  For example, a string that says 2.3 means 2 weeks and 3 days, or a total of 17 days.  There can be multiple observations of this field.
     * @param  null|string  $glucose  Observations of patient's glucose. Options can be found via GET /chart/{patientid}/obepisodes/{obepisodeid}/flowsheet/configuration
     * @param  null|string  $ketones  Observations of ketones. Options can be found via GET /chart/{patientid}/obepisodes/{obepisodeid}/flowsheet/configuration
     * @param  null|string  $leukocytes  Observations of Patient's leukocytes. Options can be found via GET /chart/{patientid}/obepisodes/{obepisodeid}/flowsheet/configuration
     * @param  null|int  $modifiedbishopscore  Observations of a score that assists in predicting the likelihood that labor will need to be induced, but weights the solution for a number of other factors (such as the existence of pre-eclampsia) that aren't captured by the Bishop Score.
     * @param  null|string  $nitrite  Observations of patient's nitrites. Options can be found via GET /chart/{patientid}/obepisodes/{obepisodeid}/flowsheet/configuration
     * @param  null|int  $patientreportofpain  Patient report of pain.  This is a string, but it's typically reported on a scale from 1 to 10
     * @param  null|string  $phofurine  Observations of PH of patient's urine.
     * @param  null|array  $presentation  Observations of presentation.  Options can be found via GET /chart/{patientid}/obepisodes/{obepisodeid}/flowsheet/configuration
     * @param  null|string  $pretermlaborsigns  Options for preterm labor can be found via GET /chart/{patientid}/obepisodes/{obepisodeid}/flowsheet/configuration
     * @param  null|int  $protein  Observations of patient's protein. Options can be found via GET /chart/{patientid}/obepisodes/{obepisodeid}/flowsheet/configuration
     * @param  null|string  $specificgravityofurine  Observations of the specific gravity of patient's urine.
     * @param  null|array  $weight  A JSON array of observations of patient's weight.
     */
    public function __construct(
        protected int $flowsheetid,
        protected int $obepisodeid,
        protected int $patientid,
        protected ?int $albumin = null,
        protected ?int $bishopscore = null,
        protected ?int $blood = null,
        protected ?array $bloodpressure = null,
        protected ?array $cervixexam = null,
        protected ?string $comments = null,
        protected ?string $edema = null,
        protected ?string $estimatedfetalweight = null,
        protected ?array $fetalheartrate = null,
        protected ?array $fetalmovement = null,
        protected ?array $fundus = null,
        protected ?string $gestationage = null,
        protected ?string $glucose = null,
        protected ?string $ketones = null,
        protected ?string $leukocytes = null,
        protected ?int $modifiedbishopscore = null,
        protected ?string $nitrite = null,
        protected ?int $patientreportofpain = null,
        protected ?string $phofurine = null,
        protected ?array $presentation = null,
        protected ?string $pretermlaborsigns = null,
        protected ?int $protein = null,
        protected ?string $specificgravityofurine = null,
        protected ?array $weight = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter([
            'albumin' => $this->albumin,
            'bishopscore' => $this->bishopscore,
            'blood' => $this->blood,
            'bloodpressure' => $this->bloodpressure,
            'cervixexam' => $this->cervixexam,
            'comments' => $this->comments,
            'edema' => $this->edema,
            'estimatedfetalweight' => $this->estimatedfetalweight,
            'fetalheartrate' => $this->fetalheartrate,
            'fetalmovement' => $this->fetalmovement,
            'fundus' => $this->fundus,
            'gestationage' => $this->gestationage,
            'glucose' => $this->glucose,
            'ketones' => $this->ketones,
            'leukocytes' => $this->leukocytes,
            'modifiedbishopscore' => $this->modifiedbishopscore,
            'nitrite' => $this->nitrite,
            'patientreportofpain' => $this->patientreportofpain,
            'phofurine' => $this->phofurine,
            'presentation' => $this->presentation,
            'pretermlaborsigns' => $this->pretermlaborsigns,
            'protein' => $this->protein,
            'specificgravityofurine' => $this->specificgravityofurine,
            'weight' => $this->weight,
        ]);
    }
}
