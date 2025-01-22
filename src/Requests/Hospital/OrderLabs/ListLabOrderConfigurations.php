<?php

namespace ChrisReedIO\AthenaSDK\Requests\Hospital\OrderLabs;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListLabOrderConfigurations
 *
 * BETA: Retrieves the configured list of lab orders based on the seach criteria.
 */
class ListLabOrderConfigurations extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/stays/configuration/orders/lab';
    }

    /**
     * @param  string  $searchvalue  A term to search for. Must be at least 2 characters
     */
    public function __construct(
        protected string $searchvalue,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['searchvalue' => $this->searchvalue]);
    }
}
