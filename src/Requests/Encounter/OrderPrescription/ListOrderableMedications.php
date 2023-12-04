<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\OrderPrescription;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListOrderableMedications
 *
 * Retrieves a list of medications configured in the system
 */
class ListOrderableMedications extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/reference/order/prescription';
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
