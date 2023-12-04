<?php

namespace ChrisReedIO\AthenaSDK\Requests\Hospital\OrderVaccines;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListActiveStayVaccineOrders
 *
 * BETA: Retrieves a list of vaccine orders of a particular type for all patients currently in the
 * hospital.
 */
class ListActiveStayVaccineOrders extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/stays/active/orders/vaccine';
    }

    /**
     * @param  null|string  $statusgroup Active: Orders that are not yet completed. Signed orders: Orders that are signed by a doctor. Unsigned orders: Orders that have not yet been signed.
     * @param  int  $ordertypeid The athena ID for the type of order being placed. Get the IDs using /stays/configuration/orders/vaccine.
     */
    public function __construct(
        protected ?string $statusgroup,
        protected int $ordertypeid,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['statusgroup' => $this->statusgroup, 'ordertypeid' => $this->ordertypeid]);
    }
}
