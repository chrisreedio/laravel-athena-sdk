<?php

namespace ChrisReedIO\AthenaSDK\Requests\ObstetricsEpisode\ObEpisode;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetObEpisodeDetails
 *
 * Retrieves details of a specific OB Episode
 */
class GetObEpisodeDetails extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/chart/{$this->patientid}/obepisodes/{$this->obepisodeid}";
    }

    /**
     * @param  int  $patientid patientid
     * @param  int  $obepisodeid obepisodeid
     * @param  null|bool  $showhiddenproblems Designates whether we will also show hidden problems. The default value is false.
     * @param  null|bool  $showeddcalculationsdays Designates whether we will also show eddcalucation days. The default value is false.
     */
    public function __construct(
        protected int $patientid,
        protected int $obepisodeid,
        protected ?bool $showhiddenproblems = null,
        protected ?bool $showeddcalculationsdays = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['showhiddenproblems' => $this->showhiddenproblems, 'showeddcalculationsdays' => $this->showeddcalculationsdays]);
    }
}
