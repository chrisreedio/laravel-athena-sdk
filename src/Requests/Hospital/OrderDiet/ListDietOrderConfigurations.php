<?php

namespace ChrisReedIO\AthenaSDK\Requests\Hospital\OrderDiet;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListDietOrderConfigurations
 *
 * BETA: Retrieve the configured list of stay specific diet orders.
 */
class ListDietOrderConfigurations extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/stays/configuration/orders/diet';
    }

    /**
     * @param  string  $searchvalue A term to search for. Must be at least 2 characters
     */
    public function __construct(
        protected string $searchvalue,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['searchvalue' => $this->searchvalue]);
    }
}
