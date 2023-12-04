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
		return "/inventory/items";
	}


	/**
	 * @param null|bool $showdeleted Whether to return deleted items.
	 * @param null|array $vendorids An array of Vendor IDs
	 * @param null|array $externalinventorysystemids An array of External Inventory System IDs.
	 * @param null|array $skus An array of SKUs
	 * @param null|array $athenaids An array of Athena IDs.
	 */
	public function __construct(
		protected ?bool $showdeleted = null,
		protected ?array $vendorids = null,
		protected ?array $externalinventorysystemids = null,
		protected ?array $skus = null,
		protected ?array $athenaids = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter([
			'showdeleted' => $this->showdeleted,
			'vendorids' => $this->vendorids,
			'externalinventorysystemids' => $this->externalinventorysystemids,
			'skus' => $this->skus,
			'athenaids' => $this->athenaids,
		]);
	}
}
