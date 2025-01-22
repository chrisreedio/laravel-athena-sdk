<?php

namespace ChrisReedIO\AthenaSDK\Resources;

use ChrisReedIO\AthenaSDK\Data\Provider\ProviderData;
use ChrisReedIO\AthenaSDK\Data\Provider\SpecialtyData;
use ChrisReedIO\AthenaSDK\Requests\Provider\ProviderReference\ListProviders;
use ChrisReedIO\AthenaSDK\Requests\Provider\ProviderSpecialtiesReference\ListProviderSpecialties;
use ChrisReedIO\AthenaSDK\Resource;
use ChrisReedIO\AthenaSDK\Resources\Providers\ProviderSubscriptions;
use ChrisReedIO\AthenaSDK\Resources\Providers\ReferringProviders;
use Illuminate\Support\LazyCollection;

class Providers extends Resource
{
    /**
     * @return LazyCollection<ProviderData>
     */
    public function list(): LazyCollection
    {
        return $this->connector->paginate(new ListProviders)->collect();
    }

    /**
     * @return LazyCollection<SpecialtyData>
     */
    public function specialities(): LazyCollection
    {
        return $this->connector->paginate(new ListProviderSpecialties)->collect();
    }

    public function subscriptions(): ProviderSubscriptions
    {
        return new ProviderSubscriptions($this->connector);
    }

    public function referring(): ReferringProviders
    {
        return new ReferringProviders($this->connector);
    }
}
