<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\ProcedureCodes;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetProcedureRoles
 *
 * Retrieves Procedure roles entered during the specified procedure encounter through the encounter id.
 */
class GetProcedureRoles extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/chart/encounter/{$this->encounterid}/procedureroles";
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
