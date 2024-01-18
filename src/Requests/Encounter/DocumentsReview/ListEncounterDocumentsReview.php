<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentsReview;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListEncounterDocumentsReview
 *
 * Retrieves a list of document which are in Review status for a specific encounter
 */
class ListEncounterDocumentsReview extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/chart/encounter/{$this->encounterid}/documentsreview";
    }

    /**
     * @param  int  $encounterid  encounterid
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
