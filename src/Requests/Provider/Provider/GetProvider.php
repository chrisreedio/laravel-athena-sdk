<?php

namespace ChrisReedIO\AthenaSDK\Requests\Provider\Provider;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetProvider
 *
 * Retrieves information of the specific provider
 */
class GetProvider extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/providers/{$this->providerid}";
    }

    /**
     * @param  int  $providerid  providerid
     * @param  null|bool  $showallproviderids  In athenaNet's internal data structures, a single provider can be represented by multiple IDs. These IDs are used in certain external messages (e.g. HL7) and thus these IDs may need to be known by the API user as well.   When set to true, a list of all of these ancillary IDs will be provided.
     * @param  null|bool  $showdeletedproviders  When set to true, deleted providers will be included.
     * @param  null|float|int  $showfederalidnumber  Include the provider's federal ID number in results.
     * @param  null|float|int  $showusualdepartmentguessthreshold  There are situations where determining where a provider "normally" practices is desired. Unfortuantely, there is no such concept in athenaNet since providers often practice in multiple locations. However, we can use some intelligence to determine this by looking back over the previous few months (90 days) to see actual practice. To enable this, set this value between 0 and 1; it is highly recommended to be at least .5. This is the ratio of appointments in a given department to the total number of appointments for that provider. A value of .5 means "the provider's appointments are 50% in the department guessed." Setting this to 1 would only return a department if ALL of the provider's appointments were in one department.
     */
    public function __construct(
        protected int $providerid,
        protected ?bool $showallproviderids = null,
        protected ?bool $showdeletedproviders = null,
        protected float|int|null $showfederalidnumber = null,
        protected float|int|null $showusualdepartmentguessthreshold = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'showallproviderids' => $this->showallproviderids,
            'showdeletedproviders' => $this->showdeletedproviders,
            'showfederalidnumber' => $this->showfederalidnumber,
            'showusualdepartmentguessthreshold' => $this->showusualdepartmentguessthreshold,
        ]);
    }
}
