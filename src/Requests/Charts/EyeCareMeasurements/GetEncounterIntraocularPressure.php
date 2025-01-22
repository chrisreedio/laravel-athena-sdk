<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\EyeCareMeasurements;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetEncounterIntraocularPressure
 *
 * Retrieves intraocular pressure measurements associated with a given encounter.
 */
class GetEncounterIntraocularPressure extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/chart/encounter/{$this->encounterid}/eyecare/intraocularpressure";
    }

    /**
     * @param  int  $encounterid  encounterid
     */
    public function __construct(
        protected int $encounterid,
    ) {}
}
