<?php

namespace ChrisReedIO\AthenaSDK\Requests\ObstetricsEpisode\ObFlowsheet;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeleteObEpisodeFlowsheet
 *
 * BETA: Deletes a specified prenatal flowsheet for a given OB Episode
 */
class DeleteObEpisodeFlowsheet extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/chart/{$this->patientid}/obepisodes/{$this->obepisodeid}/flowsheets/{$this->flowsheetid}";
    }

    /**
     * @param  int  $flowsheetid flowsheetid
     * @param  int  $patientid patientid
     * @param  int  $obepisodeid obepisodeid
     */
    public function __construct(
        protected int $flowsheetid,
        protected int $patientid,
        protected int $obepisodeid,
    ) {
    }
}
