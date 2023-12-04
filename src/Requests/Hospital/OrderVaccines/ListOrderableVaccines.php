<?php

namespace ChrisReedIO\AthenaSDK\Requests\Hospital\OrderVaccines;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListOrderableVaccines
 *
 * BETA: Retrieves a list of vaccines configured in the system
 */
class ListOrderableVaccines extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/stays/configuration/orders/vaccine';
    }

    /**
     * @param string $searchvalue A term to search for. Must be at least 2 characters
     */
    public function __construct(
        protected string $searchvalue,
    )
    {
    }

    public function defaultQuery(): array
    {
        return array_filter(['searchvalue' => $this->searchvalue]);
    }
}
