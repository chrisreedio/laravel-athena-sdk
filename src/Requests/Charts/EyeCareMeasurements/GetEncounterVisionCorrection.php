<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\EyeCareMeasurements;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetEncounterVisionCorrection
 *
 * Retrieves vision correction measurements entered during a given encounter.
 */
class GetEncounterVisionCorrection extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/chart/encounter/{$this->encounterid}/eyecare/visioncorrection";
    }

    /**
     * @param  int  $encounterid  encounterid
     */
    public function __construct(
        protected int $encounterid,
    ) {
    }
}
