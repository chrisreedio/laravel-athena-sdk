<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypeOrder;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListSignedOffOrderChangeSubscriptions
 *
 * Retrieves list of events applicable for signed orders
 */
class ListSignedOffOrderChangeSubscriptions extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/orders/signedoff/subscription';
    }

    public function __construct()
    {
    }
}
