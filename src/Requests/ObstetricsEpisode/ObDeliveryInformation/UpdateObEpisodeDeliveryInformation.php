<?php

namespace ChrisReedIO\AthenaSDK\Requests\ObstetricsEpisode\ObDeliveryInformation;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdateObEpisodeDeliveryInformation
 *
 * BETA: Modifies the delivery information for an OB Episode
 */
class UpdateObEpisodeDeliveryInformation extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/chart/{$this->patientid}/obepisodes/{$this->obepisodeid}/deliveryinformation";
    }

    /**
     * @param  string  $deliverydate  Date of delivery of termination or pregnancy.
     * @param  int  $obepisodeid  obepisodeid
     * @param  int  $patientid  patientid
     * @param  null|string  $anesthesia  What, if any, anesthesia was used during labor and delivery.
     * @param  null|string  $comments  Any notes on the delivery.
     * @param  null|string  $deliveredby  The name of the provider who delivered the baby.
     * @param  null|int  $deliverysiteid  The location (site) of the delivery. Use GET /chart/configuration/obdeliverysites to get the list of valid site IDs. If the location is not listed then use deliverysiteother. Please note that both cannot be specified.
     * @param  null|string  $deliverysiteother  A freetext field recording the location of the delivery. Cannot be specified along with deliverysiteid.
     * @param  null|string  $dischargedate  The date the mother was discharged.
     * @param  null|array  $fetusdata  The data about the fetuses delivered. The number of items in this array must reflect the number of fetuses in the OB Episode Information section. The input generally reflects the fetusdata output of GET /chart/{patientid}/obepisodes/{obepisodeid} with a couple of exceptions. This uses birthweightlbs and birthweightoz instead of grams. It also uses ID numbers for deliverytype, ethnicity, outcome, and race. See the documentation for those individual inputs for more information. If you update the information for one fetus you must update the information for all fetuses.
     * @param  null|string  $incisiontype  The type of incision.
     * @param  null|string  $labor  The type of labor.
     * @param  null|number  $laborlengthhrs  Length of labor in hours.
     * @param  null|string  $postpartumcomplications  Select any postpartum complications.
     * @param  null|bool  $pretermlabor  Boolean to indicate if the labor was preterm.
     * @param  null|bool  $tubalsterilization  Boolean to indicate tubal sterlization.
     * @param  null|number  $weeksgestation  The gestation time in the format weeks.days (ex: 35.2 is 35 weeks and 2 days.)
     */
    public function __construct(
        protected string $deliverydate,
        protected int $obepisodeid,
        protected int $patientid,
        protected ?string $anesthesia = null,
        protected ?string $comments = null,
        protected ?string $deliveredby = null,
        protected ?int $deliverysiteid = null,
        protected ?string $deliverysiteother = null,
        protected ?string $dischargedate = null,
        protected ?array $fetusdata = null,
        protected ?string $incisiontype = null,
        protected ?string $labor = null,
        protected ?\number $laborlengthhrs = null,
        protected ?string $postpartumcomplications = null,
        protected ?bool $pretermlabor = null,
        protected ?bool $tubalsterilization = null,
        protected ?\number $weeksgestation = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'deliverydate' => $this->deliverydate,
            'anesthesia' => $this->anesthesia,
            'comments' => $this->comments,
            'deliveredby' => $this->deliveredby,
            'deliverysiteid' => $this->deliverysiteid,
            'deliverysiteother' => $this->deliverysiteother,
            'dischargedate' => $this->dischargedate,
            'fetusdata' => $this->fetusdata,
            'incisiontype' => $this->incisiontype,
            'labor' => $this->labor,
            'laborlengthhrs' => $this->laborlengthhrs,
            'postpartumcomplications' => $this->postpartumcomplications,
            'pretermlabor' => $this->pretermlabor,
            'tubalsterilization' => $this->tubalsterilization,
            'weeksgestation' => $this->weeksgestation,
        ]);
    }
}
