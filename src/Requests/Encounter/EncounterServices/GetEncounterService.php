<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\EncounterServices;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetEncounterService
 *
 * Retrieves information of a specific service of the encounter
 */
class GetEncounterService extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/encounter/{$this->encounterid}/services/{$this->serviceid}";
    }

    /**
     * @param  int  $encounterid  encounterid
     * @param  int  $serviceid  serviceid
     */
    public function __construct(
        protected int $encounterid,
        protected int $serviceid,
    ) {}
}
