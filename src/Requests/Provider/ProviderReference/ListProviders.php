<?php

namespace ChrisReedIO\AthenaSDK\Requests\Provider\ProviderReference;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListProviders
 *
 * Retrieve a list of all providers available in a specific practice
 */
class ListProviders extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/providers';
    }

    /**
     * @param  null|float|int  $showusualdepartmentguessthreshold There are situations where determining where a provider "normally" practices is desired. Unfortuantely, there is no such concept in athenaNet since providers often practice in multiple locations. However, we can use some intelligence to determine this by looking back over the previous few months (90 days) to see actual practice. To enable this, set this value between 0 and 1; it is highly recommended to be at least .5. This is the ratio of appointments in a given department to the total number of appointments for that provider. A value of .5 means "the provider's appointments are 50% in the department guessed." Setting this to 1 would only return a department if ALL of the provider's appointments were in one department.
     * @param  null|bool  $showallproviderids In athenaNet's internal data structures, a single provider can be represented by multiple IDs. These IDs are used in certain external messages (e.g. HL7) and thus these IDs may need to be known by the API user as well.   When set to true, a list of all of these ancillary IDs will be provided.
     * @param  null|string  $providertype The provider type to filter the results on. Valid provider type values can be found by using GET /reference/providertypes.
     */
    public function __construct(
        protected float|int|null $showusualdepartmentguessthreshold = null,
        protected ?string $name = null,
        protected ?bool $showallproviderids = null,
        protected ?string $providertype = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'showusualdepartmentguessthreshold' => $this->showusualdepartmentguessthreshold,
            'name' => $this->name,
            'showallproviderids' => $this->showallproviderids,
            'providertype' => $this->providertype,
        ]);
    }
}
