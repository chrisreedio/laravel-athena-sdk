<?php

namespace ChrisReedIO\AthenaSDK\Requests\Hospital\OrderIvMedication;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetOrderableIvMedications
 *
 * BETA: Retrieves the configured list of IV medications based on the seach criteria.
 */
class GetOrderableIvMedications extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/stays/configuration/orders/ivmedication';
    }

    /**
     * @param  string  $searchvalue  A term to search for. Must be at least 2 characters
     */
    public function __construct(
        protected string $searchvalue,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['searchvalue' => $this->searchvalue]);
    }
}
