<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\Order;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * SubmitOrderForEncounter
 *
 * Changes the status of the order to Submit when the order is routed via ATHENAFAX, MANUALFAX,
 * MANUALPRINT, and MANUALPHONE
 */
class SubmitOrderForEncounter extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/chart/encounter/{$this->encounterid}/orders/{$this->orderid}/submit";
    }

    /**
     * @param  int  $encounterid  encounterid
     * @param  int  $orderid  orderid
     * @param  string  $submitvia  The route to submit via (ATHENAFAX, MANUALFAX, MANUALPRINT, and MANUALPHONE are currently the only supported options)
     */
    public function __construct(
        protected int $encounterid,
        protected int $orderid,
        protected string $submitvia,
    ) {}

    public function defaultBody(): array
    {
        return array_filter(['submitvia' => $this->submitvia]);
    }
}
