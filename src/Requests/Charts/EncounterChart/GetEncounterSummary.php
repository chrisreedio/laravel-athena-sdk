<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\EncounterChart;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetEncounterSummary
 *
 * Retrieves appointment specific encounter summary. Note: It is an HTML Summary for an encounter
 * wrapped in JSON.
 */
class GetEncounterSummary extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/chart/{$this->patientid}/encounters/{$this->appointmentid}/summary";
    }

    /**
     * @param  int  $patientid patientid
     * @param  int  $appointmentid appointmentid
     * @param  null|bool  $mobile Flag to skip many details to make the html smaller
     * @param  null|bool  $skipamendments Flag to skip encounter amendments
     */
    public function __construct(
        protected int $patientid,
        protected int $appointmentid,
        protected ?bool $mobile = null,
        protected ?bool $skipamendments = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['mobile' => $this->mobile, 'skipamendments' => $this->skipamendments]);
    }
}
