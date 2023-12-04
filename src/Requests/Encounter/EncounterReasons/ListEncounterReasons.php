<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\EncounterReasons;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListEncounterReasons
 *
 * Retrieves the list of reasons or present illness documented during the specific encounter visit
 */
class ListEncounterReasons extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/chart/encounter/{$this->encounterid}/encounterreasons";
    }

    /**
     * @param int $encounterid encounterid
     */
    public function __construct(
        protected int $encounterid,
    )
    {
    }

    public function defaultQuery(): array
    {
        return array_filter([]);
    }
}
