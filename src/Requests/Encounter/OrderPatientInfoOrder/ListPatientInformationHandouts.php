<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\OrderPatientInfoOrder;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListPatientInformationHandouts
 *
 * Retrieves a list of patient info or care information configured in the system
 */
class ListPatientInformationHandouts extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/reference/order/patientinfo';
    }

    /**
     * @param string $searchvalue A term to search for. Must be at least 2 characters
     */
    public function __construct(
        protected string $searchvalue,
    )
    {
    }

    public function defaultQuery(): array
    {
        return array_filter(['searchvalue' => $this->searchvalue]);
    }
}
