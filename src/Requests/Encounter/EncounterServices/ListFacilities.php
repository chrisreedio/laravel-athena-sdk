<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\EncounterServices;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListFacilities
 *
 * Retrieve a list of facilities based on the search criteria provided.
 */
class ListFacilities extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/chart/configuration/facilities';
    }

    /**
     * @param  int  $departmentid Used to help determine both whether to include which practice-configured facilities as well as help sort the results.
     * @param  string  $name The facility to search for. This can include the name or address of the facility, in space delimited form
     * @param  string  $ordertype The type of facility to search for.
     * @param  null|int  $patientid Used to help determine which matches to return based on distance to patient and practice.
     */
    public function __construct(
        protected int $departmentid,
        protected string $name,
        protected string $ordertype,
        protected ?int $patientid = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'name' => $this->name,
            'ordertype' => $this->ordertype,
            'patientid' => $this->patientid,
        ]);
    }
}
