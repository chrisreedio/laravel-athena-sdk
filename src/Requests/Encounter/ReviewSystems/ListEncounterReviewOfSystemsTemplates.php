<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\ReviewSystems;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListEncounterReviewOfSystemsTemplates
 *
 * BETA: Retrieves the list of Review of Systems templates for this encounter
 */
class ListEncounterReviewOfSystemsTemplates extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/chart/encounter/{$this->encounterid}/reviewofsystems/templates";
    }

    /**
     * @param  int  $encounterid encounterid
     */
    public function __construct(
        protected int $encounterid,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([]);
    }
}
