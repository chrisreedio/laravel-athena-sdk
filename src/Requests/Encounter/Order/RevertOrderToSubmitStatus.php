<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\Order;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * RevertOrderToSubmitStatus
 *
 * Changes the order status to "Submit" if they are currently in the SUBMITTED status
 */
class RevertOrderToSubmitStatus extends Request
{
    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/chart/encounter/{$this->encounterid}/orders/{$this->orderid}/returntosubmit";
    }

    /**
     * @param int $encounterid encounterid
     * @param int $orderid orderid
     */
    public function __construct(
        protected int $encounterid,
        protected int $orderid,
    )
    {
    }
}
