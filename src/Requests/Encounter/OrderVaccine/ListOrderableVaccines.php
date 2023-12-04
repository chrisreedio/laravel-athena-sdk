<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\OrderVaccine;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListOrderableVaccines
 *
 * Retrieves a list of orderable vaccines
 */
class ListOrderableVaccines extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/reference/order/vaccine';
    }

    /**
     * @param  null|string  $cvx The CVX code of the vaccine. Matching vaccines will be returned. A list of CVX codes can be retrieved at https://www2a.cdc.gov/vaccines/iis/iisstandards/vaccines.asp?rpt=vg
     * @param  null|string  $searchvalue A term to search for. Must be at least 2 characters
     */
    public function __construct(
        protected ?string $cvx = null,
        protected ?string $searchvalue = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'cvx' => $this->cvx,
            'searchvalue' => $this->searchvalue,
        ]);
    }
}
