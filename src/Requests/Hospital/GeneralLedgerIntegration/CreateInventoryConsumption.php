<?php

namespace ChrisReedIO\AthenaSDK\Requests\Hospital\GeneralLedgerIntegration;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateInventoryConsumption
 *
 * Create a recordin the general ledger on the consumption of inventory
 */
class CreateInventoryConsumption extends Request implements HasBody
{
	use HasFormBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/generalledger/inventory/consumption";
	}


	/**
	 * @param array $inventory An array of inventory that has been consumed.
	 * @param string $datecreated Date of the consumption. Formatted as MM/DD/YYYY.
	 */
	public function __construct(
		protected array $inventory,
		protected string $datecreated,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter(['inventory' => $this->inventory, 'datecreated' => $this->datecreated]);
	}
}
