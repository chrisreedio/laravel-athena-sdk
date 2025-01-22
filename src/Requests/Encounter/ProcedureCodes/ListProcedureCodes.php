<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\ProcedureCodes;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListProcedureCodes
 *
 * Retrieves a list of procedure codes that can be attached to the billing slip for a given encounter
 */
class ListProcedureCodes extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/encounter/{$this->encounterid}/procedurecodes";
    }

    /**
     * @param  int  $encounterid  encounterid
     * @param  string  $searchvalue  The name of the procedure you want to search for. This can be the code or the description.
     */
    public function __construct(
        protected int $encounterid,
        protected string $searchvalue,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['searchvalue' => $this->searchvalue]);
    }
}
