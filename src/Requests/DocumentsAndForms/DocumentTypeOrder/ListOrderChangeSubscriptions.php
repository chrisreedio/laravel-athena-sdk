<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\DocumentTypeOrder;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListOrderChangeSubscriptions
 *
 * Retrieves list of events applicable for orders
 */
class ListOrderChangeSubscriptions extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/orders/changed/subscription';
    }

    public function __construct() {}
}
