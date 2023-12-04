<?php

namespace ChrisReedIO\AthenaSDK\Requests\ObstetricsEpisode\ObEpisodeInfo;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdateObEpisodeInfo
 *
 * BETA: Modifies information about a patient's specified OB episode
 */
class UpdateObEpisodeInfo extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/chart/{$this->patientid}/obepisodes/{$this->obepisodeid}/obepisodeinfo";
    }

    /**
     * @param  int  $patientid patientid
     * @param  int  $obepisodeid obepisodeid
     * @param  null|string  $rhtype Populated automatically from a lab result if the OB tab field was not already populated. If the Rh type is populated from a lab result, a link to that lab result appears in athenaNet. If the Rh type is updated directly, the link to the lab result disappears. Updates made directly do not affect the original lab result data. The Rh type on the lab result remains the same.
     * @param  null|string  $bloodtype Populated automatically from a lab result if the OB tab field was not already populated. If the blood type is populated from a lab result, a link to that lab result appears in athenaNet. If the blood type is updated directly, the link to the lab result disappears. Updates made directly do not affect the original lab result data. The blood type on the lab result remains the same.
     * @param  null|string  $fathername Name of the child's father.
     * @param  null|string  $pediatrician The pediatrician can be entered predelivery. Only one pediatrician can be entered per OB episode (even if there is more than one fetus). After delivery, however, the field is available for each fetus, with the original pediatrician as the default.
     * @param  null|int  $numberoffetuses Used to track multiple gestation pregnancies. If more than one fetus is present, additional columns are inserted into the flowsheet to track findings specific to each fetus: presentation, fetal heart rate, and fetal movement.
     * @param  null|string  $fatherphonenumber The phone number of the child's father.
     * @param  null|int  $prepregnancyweightlbs The patient's pre pregnancy weight (lbs)
     * @param  null|string  $husbanddomesticpartner Name of the patient's husband or domestic partner
     * @param  null|string  $husbanddomesticpartnerphonenumber The phone number of the patient's husband or domestic partner.
     */
    public function __construct(
        protected int $patientid,
        protected int $obepisodeid,
        protected ?string $rhtype = null,
        protected ?string $bloodtype = null,
        protected ?string $fathername = null,
        protected ?string $pediatrician = null,
        protected ?int $numberoffetuses = null,
        protected ?string $fatherphonenumber = null,
        protected ?int $prepregnancyweightlbs = null,
        protected ?string $husbanddomesticpartner = null,
        protected ?string $husbanddomesticpartnerphonenumber = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'rhtype' => $this->rhtype,
            'bloodtype' => $this->bloodtype,
            'fathername' => $this->fathername,
            'pediatrician' => $this->pediatrician,
            'numberoffetuses' => $this->numberoffetuses,
            'fatherphonenumber' => $this->fatherphonenumber,
            'prepregnancyweightlbs' => $this->prepregnancyweightlbs,
            'husbanddomesticpartner' => $this->husbanddomesticpartner,
            'husbanddomesticpartnerphonenumber' => $this->husbanddomesticpartnerphonenumber,
        ]);
    }
}
