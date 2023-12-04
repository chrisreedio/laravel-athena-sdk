<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\OrderVaccine;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListVaccineDeclineReasons
 *
 * Retrieves a list of configured vaccine declined reasons
 */
class ListVaccineDeclineReasons extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/reference/order/vaccine/declinedreasons';
    }

    /**
     * @param  null|bool  $showinactive Include deactivated declined reasons
     */
    public function __construct(
        protected ?bool $showinactive = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['showinactive' => $this->showinactive]);
    }
}
