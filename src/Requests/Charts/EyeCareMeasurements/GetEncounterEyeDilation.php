<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\EyeCareMeasurements;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetEncounterEyeDilation
 *
 * Retrieve the eye dilation readings associated with the given encounter id.
 */
class GetEncounterEyeDilation extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/chart/encounter/{$this->encounterid}/eyecare/eyedilation";
    }

    /**
     * @param  int  $encounterid  encounterid
     */
    public function __construct(
        protected int $encounterid,
    ) {
    }
}
