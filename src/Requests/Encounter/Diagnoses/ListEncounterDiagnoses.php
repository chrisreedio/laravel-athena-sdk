<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\Diagnoses;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListEncounterDiagnoses
 *
 * Retrieve a list of diagnoses for a specific encounter
 */
class ListEncounterDiagnoses extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/chart/encounter/{$this->encounterid}/diagnoses";
    }

    /**
     * @param int $encounterid encounterid
     */
    public function __construct(
        protected int $encounterid,
    )
    {
    }
}
