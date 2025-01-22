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
        return '/generalledger/inventory/consumption';
    }

    /**
     * @param  string  $datecreated  Date of the consumption. Formatted as MM/DD/YYYY.
     * @param  array  $inventory  An array of inventory that has been consumed.
     */
    public function __construct(
        protected string $datecreated,
        protected array $inventory,
    ) {}

    public function defaultBody(): array
    {
        return array_filter([
            'datecreated' => $this->datecreated,
            'inventory' => $this->inventory,
        ]);
    }
}
