<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\DocumentTypeOrder;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateOrderDocumentActionNote
 *
 * Creates an action note for a specific order
 */
class CreateOrderDocumentActionNote extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/documents/order/{$this->orderid}/actions";
    }

    /**
     * @param  int  $orderid orderid
     * @param  string  $actionnote The new action note to add to the document.
     */
    public function __construct(
        protected int $orderid,
        protected string $actionnote,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter(['actionnote' => $this->actionnote]);
    }
}
