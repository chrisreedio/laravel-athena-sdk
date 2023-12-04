<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\Order;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateOrderActionNote
 *
 * Creates an action note for a specific existing order
 */
class CreateOrderActionNote extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/chart/encounter/{$this->encounterid}/orders/{$this->orderid}/actions";
    }

    /**
     * @param  int  $encounterid encounterid
     * @param  int  $orderid orderid
     * @param  string  $actionnote The action note to add to the order.
     */
    public function __construct(
        protected int $encounterid,
        protected int $orderid,
        protected string $actionnote,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter(['actionnote' => $this->actionnote]);
    }
}
