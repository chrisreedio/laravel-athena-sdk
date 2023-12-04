<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\Order;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListLabTests
 *
 * Retrieves a list of laboratories for CPOT
 */
class ListLabTests extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/reference/clinicalproviderordertype/lab';
    }

    /**
     * @param  string  $searchvalue A term to search for. Must be at least 2 characters
     * @param  int  $facilityid The athena ID of the facility. Get a localized list using /chart/configuration/facilities.
     */
    public function __construct(
        protected string $searchvalue,
        protected int $facilityid,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['searchvalue' => $this->searchvalue, 'facilityid' => $this->facilityid]);
    }
}
