<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\EyeCareMeasurements;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetEncounterVisualAcuity
 *
 * Retrieves visual acuity measurements associated with the given encounter id.
 */
class GetEncounterVisualAcuity extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/chart/encounter/{$this->encounterid}/eyecare/visualacuity";
    }

    /**
     * @param  int  $encounterid  encounterid
     */
    public function __construct(
        protected int $encounterid,
    ) {
    }
}
