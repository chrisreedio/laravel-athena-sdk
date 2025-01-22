<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\Order;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListEncounterOrders
 *
 * Retrieves a list of orders based on the diagnosis for a specific encounter
 */
class ListEncounterOrders extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/chart/encounter/{$this->encounterid}/orders";
    }

    /**
     * @param  int  $encounterid  encounterid
     * @param  null|bool  $allowdischargetype  If set, this will allow getting orders for a discharge encounter type.
     * @param  null|bool  $showclinicalprovider  If set, this will show the information about the provider receiving the order.
     * @param  null|bool  $showdeclinedorders  If set, include orders that were declined
     * @param  null|bool  $showdiagnoseswithoutorders  If set, this will return diagnoses with empty orders lists.
     * @param  null|bool  $showexternalcodes  If set, translate the order information to relevant external vocabularies, where available. Examples are medictions to RxNorm and NDC, vaccines to CVX and MVX, labs to LOINC, etc. Our mappings are not exhaustive.
     */
    public function __construct(
        protected int $encounterid,
        protected ?bool $allowdischargetype = null,
        protected ?bool $showclinicalprovider = null,
        protected ?bool $showdeclinedorders = null,
        protected ?bool $showdiagnoseswithoutorders = null,
        protected ?bool $showexternalcodes = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter([
            'allowdischargetype' => $this->allowdischargetype,
            'showclinicalprovider' => $this->showclinicalprovider,
            'showdeclinedorders' => $this->showdeclinedorders,
            'showdiagnoseswithoutorders' => $this->showdiagnoseswithoutorders,
            'showexternalcodes' => $this->showexternalcodes,
        ]);
    }
}
