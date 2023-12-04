<?php

namespace ChrisReedIO\AthenaSDK\Requests\Hospital\OrderConsult;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListStayConsultOrders
 *
 * BETA: Retrieves a the list of consult orders for a stayid.
 */
class ListStayConsultOrders extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/stays/{$this->stayid}/orders/consult";
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
