<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\Order;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * DenyOrderWithReasons
 *
 * Declines an order request with specific reasoning
 */
class DenyOrderWithReasons extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/chart/encounter/{$this->encounterid}/orders/{$this->orderid}/deny";
    }

    /**
     * @param int $denyreasonid The ID of the deny reason.
     * @param int $encounterid encounterid
     * @param int $orderid orderid
     * @param null|string $username The username of the person/entity denying the order.  Use this field to receive a proper error message when the user does not have adequate permission to deny the order.  This is NOT used for authentication.
     */
    public function __construct(
        protected int $denyreasonid,
        protected int $encounterid,
        protected int $orderid,
        protected ?string $username = null,
    )
    {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'denyreasonid' => $this->denyreasonid,
            'username' => $this->username
        ]);
    }
}
