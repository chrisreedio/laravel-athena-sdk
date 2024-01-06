<?php

namespace ChrisReedIO\AthenaSDK\Requests\ObstetricsEpisode\ObFlowsheet;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPrenatalFlowsheetConfiguration
 *
 * BETA: Retrieves the valid fields for a prenatal flowsheet in an OB Episode
 */
class GetPrenatalFlowsheetConfiguration extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/chart/{$this->patientid}/obepisodes/{$this->obepisodeid}/flowsheet/configuration";
    }

    /**
     * @param  int  $obepisodeid obepisodeid
     * @param  int  $patientid patientid
     */
    public function __construct(
        protected int $obepisodeid,
        protected int $patientid,
    ) {
    }
}
