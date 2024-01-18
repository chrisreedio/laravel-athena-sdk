<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\OrderImaging;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListOrderableImagingOrders
 *
 * Retrieves a list of imaging orders which can be ordered
 */
class ListOrderableImagingOrders extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/reference/order/imaging';
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
