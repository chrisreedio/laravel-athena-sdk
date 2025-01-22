<?php

namespace ChrisReedIO\AthenaSDK\Requests\Hospital\OrderLabs;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListActiveLabOrders
 *
 * BETA: Retrieves a list of laboratory orders for all patients currently in the hospital.
 */
class ListActiveLabOrders extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/stays/active/orders/lab';
    }

    /**
     * @param  int  $ordertypeid  The athena ID for the type of order being placed. Get the IDs using /stays/configuration/orders/lab.
     * @param  null|string  $statusgroup  Active: Orders that are not yet completed. Signed orders: Orders that are signed by a doctor. Unsigned orders: Orders that have not yet been signed.
     */
    public function __construct(
        protected int $ordertypeid,
        protected ?string $statusgroup = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter([
            'ordertypeid' => $this->ordertypeid,
            'statusgroup' => $this->statusgroup,
        ]);
    }
}
