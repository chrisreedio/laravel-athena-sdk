<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\ProcedureCodes;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetProcedureVitals
 *
 * Retrieves vitals entered during the specified procedure stage associated with a given encounter.
 */
class GetProcedureVitals extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/chart/encounter/{$this->encounterid}/procedurevitals";
    }

    /**
     * @param  int  $encounterid  encounterid
     * @param  string  $stage  Procedure stage to the retrieve the procedure vitals for.
     * @param  null|bool  $showunits  Show units on vitals where applicable.
     */
    public function __construct(
        protected int $encounterid,
        protected string $stage,
        protected ?bool $showunits = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'stage' => $this->stage,
            'showunits' => $this->showunits,
        ]);
    }
}
