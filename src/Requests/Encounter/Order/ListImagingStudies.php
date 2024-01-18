<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\Order;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListImagingStudies
 *
 * Retrieves a list of imaging studies for CPOT
 */
class ListImagingStudies extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/reference/clinicalproviderordertype/imaging';
    }

    /**
     * @param  int  $facilityid  The athena ID of the facility. Get a localized list using /chart/configuration/facilities.
     * @param  string  $searchvalue  A term to search for. Must be at least 2 characters
     */
    public function __construct(
        protected int $facilityid,
        protected string $searchvalue,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'facilityid' => $this->facilityid,
            'searchvalue' => $this->searchvalue,
        ]);
    }
}
