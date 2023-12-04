<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\Order;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListOrderTypes
 *
 * Retrieves a list of all orderable COTs and CPOTs
 */
class ListOrderTypes extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/configuration/ordertype';
    }

    /**
     * @param null|int $encounterid The athena ID of the encounter in which the order will be placed.
     * @param null|int $imagingfacilityid The athena ID of the imaging facility that would be responsible for filling any imaging orders. Get a localized list using /chart/configuration/facilities
     * @param null|int $labfacilityid The athena ID of the lab facility that would be responsible for filling any lab orders. Get a localized list using /chart/configuration/facilities
     * @param null|int $providerid The athena ID of the provider making the search.
     * @param null|string $searchterm The term to search for.
     * @param null|string $snomedcode The SNOMED code for a diagnosis. If this is passed in, the API will take the SNOMED code into account while determining which order types are more relevant. If this field is passed in, both the encounter id and the provider id must also be passed in, or the search query must be at least 2 characters long.
     */
    public function __construct(
        protected ?int    $encounterid = null,
        protected ?int    $imagingfacilityid = null,
        protected ?int    $labfacilityid = null,
        protected ?int    $providerid = null,
        protected ?string $searchterm = null,
        protected ?string $snomedcode = null,
    )
    {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'encounterid' => $this->encounterid,
            'imagingfacilityid' => $this->imagingfacilityid,
            'labfacilityid' => $this->labfacilityid,
            'providerid' => $this->providerid,
            'searchterm' => $this->searchterm,
            'snomedcode' => $this->snomedcode,
        ]);
    }
}
