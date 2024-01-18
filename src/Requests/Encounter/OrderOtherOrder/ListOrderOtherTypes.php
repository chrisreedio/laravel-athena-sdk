<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\OrderOtherOrder;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListOrderOtherTypes
 *
 * Retrieves a list of nonstandard  orders  configured in the system
 */
class ListOrderOtherTypes extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/reference/order/other';
    }

    /**
     * @param  string  $searchvalue  A term to search for. Must be at least 2 characters
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
