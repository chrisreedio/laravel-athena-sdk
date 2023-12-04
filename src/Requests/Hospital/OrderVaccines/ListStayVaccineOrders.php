<?php

namespace ChrisReedIO\AthenaSDK\Requests\Hospital\OrderVaccines;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListStayVaccineOrders
 *
 * BETA: Retrieves a list of vaccine orders for a specific patient's stay in the hospital.
 */
class ListStayVaccineOrders extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/stays/{$this->stayid}/orders/vaccine";
    }

    /**
     * @param  int  $stayid stayid
     * @param  null|string  $statusgroup Active: Orders that are not yet completed. Signed orders: Orders that are signed by a doctor. Unsigned orders: Orders that have not yet been signed.
     */
    public function __construct(
        protected int $stayid,
        protected ?string $statusgroup = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['statusgroup' => $this->statusgroup]);
    }
}
