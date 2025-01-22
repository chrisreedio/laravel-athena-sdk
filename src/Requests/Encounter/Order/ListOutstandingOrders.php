<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\Order;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListOutstandingOrders
 *
 * Retrieves a list of orders for a specific encounter which are yet to be submitted
 */
class ListOutstandingOrders extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/chart/encounter/{$this->encounterid}/orders/outstanding";
    }

    /**
     * @param  int  $encounterid  encounterid
     * @param  null|bool  $showdeclinedorders  If set, include orders that were declined
     */
    public function __construct(
        protected int $encounterid,
        protected ?bool $showdeclinedorders = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['showdeclinedorders' => $this->showdeclinedorders]);
    }
}
