<?php

namespace ChrisReedIO\AthenaSDK\Requests\Hospital\OrderLabs;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetLabOrderDetails
 *
 * BETA: Retrieves information of a specific laboratory order.
 */
class GetLabOrderDetails extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/stays/orders/lab/{$this->orderid}";
    }

    /**
     * @param int $orderid orderid
     */
    public function __construct(
        protected int $orderid,
    )
    {
    }
}
