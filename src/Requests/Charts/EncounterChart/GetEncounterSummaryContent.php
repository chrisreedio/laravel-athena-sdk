<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\EncounterChart;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetEncounterSummaryContent
 *
 * Retrieves information about an appointment specific encounter along with diagnoses data.
 */
class GetEncounterSummaryContent extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/chart/encounters/{$this->encounterid}/summary";
    }

    /**
     * @param  int  $encounterid  encounterid
     * @param  null|bool  $mobile  Flag to skip many details to make the html smaller
     * @param  null|bool  $skipamendments  Flag to skip encounter amendments
     */
    public function __construct(
        protected int $encounterid,
        protected ?bool $mobile = null,
        protected ?bool $skipamendments = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter([
            'mobile' => $this->mobile,
            'skipamendments' => $this->skipamendments,
        ]);
    }
}
