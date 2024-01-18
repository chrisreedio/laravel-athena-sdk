<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DictationStatus;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListEncounterDictatableSections
 *
 * Retrieve a list of sections available for dictation for a specific encounter
 */
class ListEncounterDictatableSections extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/chart/encounter/{$this->encounterid}/dictatablesections";
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
