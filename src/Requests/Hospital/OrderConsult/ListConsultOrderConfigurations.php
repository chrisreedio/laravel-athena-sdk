<?php

namespace ChrisReedIO\AthenaSDK\Requests\Hospital\OrderConsult;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListConsultOrderConfigurations
 *
 * BETA: Retrieves a list of consult orders configured in the system.
 */
class ListConsultOrderConfigurations extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/stays/configuration/orders/consult';
    }

    /**
     * @param  string  $searchvalue  A term to search for. Must be at least 2 characters
     */
    public function __construct(
        protected string $searchvalue,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['searchvalue' => $this->searchvalue]);
    }
}
