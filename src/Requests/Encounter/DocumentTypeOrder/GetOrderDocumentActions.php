<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypeOrder;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetOrderDocumentActions
 *
 * Retrieves action note information of a specific order
 */
class GetOrderDocumentActions extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/documents/order/{$this->orderid}/actions";
    }

    /**
     * @param int $orderid orderid
     */
    public function __construct(
        protected int $orderid,
    )
    {
    }

    public function defaultQuery(): array
    {
        return array_filter([]);
    }
}
