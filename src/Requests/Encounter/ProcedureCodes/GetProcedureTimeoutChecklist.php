<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\ProcedureCodes;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetProcedureTimeoutChecklist
 *
 * Retrieves the procedure checklist event times associated with a specific encounter
 */
class GetProcedureTimeoutChecklist extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/chart/encounter/{$this->encounterid}/proceduretimeoutchecklist";
    }

    /**
     * @param  int  $encounterid encounterid
     */
    public function __construct(
        protected int $encounterid,
    ) {
    }
}
