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
     * @param int $flowsheetid flowsheetid
     * @param int $obepisodeid obepisodeid
     * @param int $patientid patientid
     */
    public function __construct(
        protected int $flowsheetid,
        protected int $obepisodeid,
        protected int $patientid,
    )
    {
    }
}
