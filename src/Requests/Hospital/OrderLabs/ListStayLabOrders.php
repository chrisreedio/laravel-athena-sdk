<?php

namespace ChrisReedIO\AthenaSDK\Requests\Hospital\OrderLabs;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListStayLabOrders
 *
 * BETA: Retrieves a list of lab orders for a specific patient stay in the hospital.
 */
class ListStayLabOrders extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/stays/{$this->stayid}/orders/lab";
    }

    /**
     * @param int $stayid stayid
     * @param null|string $statusgroup Active: Orders that are not yet completed. Signed orders: Orders that are signed by a doctor. Unsigned orders: Orders that have not yet been signed.
     */
    public function __construct(
        protected int     $stayid,
        protected ?string $statusgroup = null,
    )
    {
    }

    public function defaultQuery(): array
    {
        return array_filter(['statusgroup' => $this->statusgroup]);
    }
}
