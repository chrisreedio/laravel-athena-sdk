<?php

namespace ChrisReedIO\AthenaSDK\Requests\ObstetricsEpisode\ProblemList;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdateObEpisodeProblemsList
 *
 * BETA: Modifies the problem list of OB Episode
 */
class UpdateObEpisodeProblemsList extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/chart/{$this->patientid}/obepisodes/{$this->obepisodeid}/problemslist";
    }

    /**
     * @param  int  $obepisodeid  obepisodeid
     * @param  int  $patientid  patientid
     * @param  null|string  $note  Free text notes for the entire problems list.
     * @param  null|array  $problems  A list of problems that should be updated.
     */
    public function __construct(
        protected int $obepisodeid,
        protected int $patientid,
        protected ?string $note = null,
        protected ?array $problems = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter([
            'note' => $this->note,
            'problems' => $this->problems,
        ]);
    }
}
