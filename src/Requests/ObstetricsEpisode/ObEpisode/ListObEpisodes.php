<?php

namespace ChrisReedIO\AthenaSDK\Requests\ObstetricsEpisode\ObEpisode;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListObEpisodes
 *
 * Retrieves a list of OB Episodes for a specific patient
 */
class ListObEpisodes extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/chart/{$this->patientid}/obepisodes";
    }

    /**
     * @param  int  $patientid patientid
     * @param  int  $departmentid Department ID
     * @param  null|bool  $showclosed Designates whether we will also show closed obepisodes. The default value is false.
     */
    public function __construct(
        protected int $patientid,
        protected int $departmentid,
        protected ?bool $showclosed = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['departmentid' => $this->departmentid, 'showclosed' => $this->showclosed]);
    }
}
