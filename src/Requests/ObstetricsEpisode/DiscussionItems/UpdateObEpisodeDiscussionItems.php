<?php

namespace ChrisReedIO\AthenaSDK\Requests\ObstetricsEpisode\DiscussionItems;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdateObEpisodeDiscussionItems
 *
 * BETA: Modifies the discussion notes of an OB Episode
 */
class UpdateObEpisodeDiscussionItems extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/chart/{$this->patientid}/obepisodes/{$this->obepisodeid}/discussionitems";
    }

    /**
     * @param  array  $discussions  This is a JSON array of objects that is used to update the question specific information. Note that while DISCUSSIONNOTES and DISCUSSEDBY are not required, they will be reset if you update the question and do not pass them in.
     * @param  int  $obepisodeid  obepisodeid
     * @param  int  $patientid  patientid
     */
    public function __construct(
        protected array $discussions,
        protected int $obepisodeid,
        protected int $patientid,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter(['discussions' => $this->discussions]);
    }
}
