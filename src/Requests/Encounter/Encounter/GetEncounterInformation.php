<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\Encounter;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetEncounterInformation
 *
 * Retrieves information of a specific encounter
 */
class GetEncounterInformation extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/chart/encounter/{$this->encounterid}";
    }

    /**
     * @param  int  $encounterid encounterid
     */
    public function __construct(
        protected int $encounterid,
    ) {
    }
}
