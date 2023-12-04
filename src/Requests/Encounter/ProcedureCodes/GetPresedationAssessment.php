<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\ProcedureCodes;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPresedationAssessment
 *
 * Retrieves the Pre-Sedation Assessment associated with a specific encounter.
 */
class GetPresedationAssessment extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/chart/encounter/{$this->encounterid}/presedationassessment";
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
