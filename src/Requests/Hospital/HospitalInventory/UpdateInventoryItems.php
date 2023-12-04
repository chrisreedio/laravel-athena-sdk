<?php

namespace ChrisReedIO\AthenaSDK\Requests\Hospital\HospitalInventory;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdateInventoryItems
 *
 * Modifies the items in hospital inventory list. On success, API returns athena item-ids for items
 * that were successfully updated.
 */
class UpdateInventoryItems extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return '/inventory/items';
    }

    /**
     * @param array $inventoryitems An array of JSON objects representing inventory items to update.
     */
    public function __construct(
        protected array $inventoryitems,
    )
    {
    }

    public function defaultBody(): array
    {
        return array_filter(['inventoryitems' => $this->inventoryitems]);
    }
}
