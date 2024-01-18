<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\EncounterServices;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListEncounterServices
 *
 * Retrieves a list of services associated with the encounter
 */
class ListEncounterServices extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/encounter/{$this->encounterid}/services";
    }

    /**
     * @param  int  $encounterid  encounterid
     */
    public function __construct(
        protected int $encounterid,
    ) {
    }
}
