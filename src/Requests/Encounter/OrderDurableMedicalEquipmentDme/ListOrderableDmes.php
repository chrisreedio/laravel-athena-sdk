<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\OrderDurableMedicalEquipmentDme;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListOrderableDmes
 *
 * Retrieves a list of orderable DME
 */
class ListOrderableDmes extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/reference/order/dme';
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
