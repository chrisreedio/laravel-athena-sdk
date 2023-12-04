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
     * @param  int  $obepisodeid obepisodeid
     * @param  int  $patientid patientid
     * @param  null|string  $contraceptivemethod The contraceptive method used.
     * @param  null|string  $feedingmethod The method for feeding the baby.
     * @param  null|string  $maternalhgbhctlevel The maternal HGB/GCT level upon discharge.
     */
    public function __construct(
        protected int $obepisodeid,
        protected int $patientid,
        protected ?string $contraceptivemethod = null,
        protected ?string $feedingmethod = null,
        protected ?string $maternalhgbhctlevel = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'contraceptivemethod' => $this->contraceptivemethod,
            'feedingmethod' => $this->feedingmethod,
            'maternalhgbhctlevel' => $this->maternalhgbhctlevel,
        ]);
    }
}
