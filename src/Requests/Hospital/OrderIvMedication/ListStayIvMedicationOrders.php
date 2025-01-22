<?php

namespace ChrisReedIO\AthenaSDK\Requests\Hospital\OrderIvMedication;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListStayIvMedicationOrders
 *
 * BETA: Retrieves a list of IV medication orders for a specific patient stay in the hospital.
 */
class ListStayIvMedicationOrders extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/stays/{$this->stayid}/orders/ivmedication";
    }

    /**
     * @param  int  $stayid  stayid
     * @param  null|string  $statusgroup  Active: Orders that are not yet completed. Signed orders: Orders that are signed by a doctor. Unsigned orders: Orders that have not yet been signed.
     */
    public function __construct(
        protected int $stayid,
        protected ?string $statusgroup = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['statusgroup' => $this->statusgroup]);
    }
}
