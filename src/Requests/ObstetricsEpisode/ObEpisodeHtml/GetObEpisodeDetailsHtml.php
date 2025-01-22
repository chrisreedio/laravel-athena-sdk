<?php

namespace ChrisReedIO\AthenaSDK\Requests\ObstetricsEpisode\ObEpisodeHtml;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetObEpisodeDetailsHtml
 *
 * BETA: Retrieves specific OB episode information in a HTML format
 */
class GetObEpisodeDetailsHtml extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/chart/{$this->patientid}/obepisodes/{$this->obepisodeid}/html";
    }

    /**
     * @param  int  $obepisodeid  obepisodeid
     * @param  int  $patientid  patientid
     * @param  null|bool  $includewrapper  If true, will include a wrapper with standard HTML tags
     * @param  null|bool  $showhiddenproblems  Designates whether we will also show hidden problems. The default value is false.
     */
    public function __construct(
        protected int $obepisodeid,
        protected int $patientid,
        protected ?bool $includewrapper = null,
        protected ?bool $showhiddenproblems = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter([
            'includewrapper' => $this->includewrapper,
            'showhiddenproblems' => $this->showhiddenproblems,
        ]);
    }
}
