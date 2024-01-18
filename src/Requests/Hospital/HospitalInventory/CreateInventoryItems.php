<?php

namespace ChrisReedIO\AthenaSDK\Requests\Hospital\HospitalInventory;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateInventoryItems
 *
 * Create a record of a new item in the hospital inventory list
 */
class CreateInventoryItems extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/inventory/items';
    }

    /**
     * @param  array  $inventoryitems  An array of JSON objects representing inventory items to add.
     */
    public function __construct(
        protected array $inventoryitems,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter(['inventoryitems' => $this->inventoryitems]);
    }
}
