<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\Order;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetOrderDenialReasons
 *
 * Retrieves the list of denial reasons for the specific order
 */
class GetOrderDenialReasons extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/chart/encounter/{$this->encounterid}/orders/{$this->orderid}/deny";
    }

    /**
     * @param  int  $encounterid  encounterid
     * @param  int  $orderid  orderid
     * @param  null|string  $username  The username of the person/entity denying the order.  Will return any denial reason that is valid for that user, or error if none exist.  This is NOT used for authentication.
     */
    public function __construct(
        protected int $encounterid,
        protected int $orderid,
        protected ?string $username = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['username' => $this->username]);
    }
}
