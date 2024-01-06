<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\OrderLab;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListOrderableLabs
 *
 * Retrieves a list of lab orders configured in the system
 */
class ListOrderableLabs extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/reference/order/lab';
    }

    /**
     * @param  string  $searchvalue A term to search for. Must be at least 2 characters
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
