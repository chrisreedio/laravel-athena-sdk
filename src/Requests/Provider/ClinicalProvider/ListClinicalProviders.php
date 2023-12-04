<?php

namespace ChrisReedIO\AthenaSDK\Requests\Provider\ClinicalProvider;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListClinicalProviders
 *
 * Retrieves a list of Clinical providers based on the search criteria provided
 */
class ListClinicalProviders extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/clinicalproviders/search';
    }

    /**
     * @param  null|string  $firstname First name of the clinical provider. Last name is also required if this field is passed. First name must match exactly.
     * @param  null|int  $distance The distance in miles to filter results by.
     * @param  null|string  $name Name of the provider. This field should be used for non-person entities.
     * @param  null|string  $lastname Last name of the clinical provider. First name is also required if this field is passed. Last name must match exactly.
     * @param  null|string  $phone The phone number of the clinical provider on file.
     * @param  null|int  $clinicalprovidernpi The NPI ID of the provider, if applicable.
     * @param  null|string  $state The state of the clinical provider on file. This should only be the two letter state abbreviation. CITY is also required if this field is passed and ZIP is not specified.
     * @param  null|string  $city The city of the clinical provider on file. STATE is also required if this field is passed and ZIP is not specified.
     * @param  null|int  $zip The zip code of the clinical provider on file. Required if DISTANCE is provided.
     * @param  null|string  $fax The fax phone number of the clinical provider on file.
     * @param  null|string  $address The address of the clinical provider on file. This should only be the street address and not include city/state/zip. This field must also have a minimum of three non-whitespace characters.
     * @param  null|string  $ordertype The type of facility to search for.
     */
    public function __construct(
        protected ?string $firstname = null,
        protected ?int $distance = null,
        protected ?string $name = null,
        protected ?string $lastname = null,
        protected ?string $phone = null,
        protected ?int $clinicalprovidernpi = null,
        protected ?string $state = null,
        protected ?string $city = null,
        protected ?int $zip = null,
        protected ?string $fax = null,
        protected ?string $address = null,
        protected ?string $ordertype = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'firstname' => $this->firstname,
            'distance' => $this->distance,
            'name' => $this->name,
            'lastname' => $this->lastname,
            'phone' => $this->phone,
            'clinicalprovidernpi' => $this->clinicalprovidernpi,
            'state' => $this->state,
            'city' => $this->city,
            'zip' => $this->zip,
            'fax' => $this->fax,
            'address' => $this->address,
            'ordertype' => $this->ordertype,
        ]);
    }
}
