<?php

namespace ChrisReedIO\AthenaSDK\Requests\Hospital\HospitalInventory;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListInventoryItems
 *
 * Retrieves a list of inventory items that are currently available.
 */
class ListInventoryItems extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/inventory/items';
    }

    /**
     * @param null|array $athenaids An array of Athena IDs.
     * @param null|array $externalinventorysystemids An array of External Inventory System IDs.
     * @param null|bool $showdeleted Whether to return deleted items.
     * @param null|array $skus An array of SKUs
     * @param null|array $vendorids An array of Vendor IDs
     */
    public function __construct(
        protected ?array $athenaids = null,
        protected ?array $externalinventorysystemids = null,
        protected ?bool  $showdeleted = null,
        protected ?array $skus = null,
        protected ?array $vendorids = null,
    )
    {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'athenaids' => $this->athenaids,
            'externalinventorysystemids' => $this->externalinventorysystemids,
            'showdeleted' => $this->showdeleted,
            'skus' => $this->skus,
            'vendorids' => $this->vendorids,
        ]);
    }
}
