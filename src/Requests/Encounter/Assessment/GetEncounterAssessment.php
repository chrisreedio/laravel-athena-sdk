<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\Assessment;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetEncounterAssessment
 *
 * Retrieves the Assessment /Plan note by the provider for a specific encounter
 */
class GetEncounterAssessment extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/chart/encounter/{$this->encounterid}/assessment";
    }

    /**
     * @param  int  $encounterid  encounterid
     * @param  null|bool  $showstructured  If true, returns assessment note templates as structured data. If false, returns it via lightly-HTML marked up English text, as displayed in the athenanet encounter summary.
     */
    public function __construct(
        protected int $encounterid,
        protected ?bool $showstructured = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['showstructured' => $this->showstructured]);
    }
}
