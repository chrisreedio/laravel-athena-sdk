<?php

namespace ChrisReedIO\AthenaSDK\Requests\Hospital\HospitalInventory;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeleteInventoryItems
 *
 * Deletes items matching the criteria from the inventory list. If the operation was successful, this
 * contains the athena item ids that were deleted.
 */
class DeleteInventoryItems extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return '/inventory/items';
    }

    /**
     * @param  array  $athenainventoryitemids  Array of athena inventory item ids to delete
     */
    public function __construct(
        protected array $athenainventoryitemids,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['athenainventoryitemids' => $this->athenainventoryitemids]);
    }
}
