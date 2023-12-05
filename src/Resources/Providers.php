<?php

namespace ChrisReedIO\AthenaSDK\Resources;

use ChrisReedIO\AthenaSDK\Data\Provider\SpecialtyData;
use ChrisReedIO\AthenaSDK\Requests\Provider\ProviderReference\ListProviders;
use ChrisReedIO\AthenaSDK\Requests\Provider\ProviderSpecialtiesReference\ListProviderSpecialties;
use ChrisReedIO\AthenaSDK\Resource;
use Illuminate\Support\LazyCollection;

class Providers extends Resource
{
    public function list(): LazyCollection
    {
        return $this->connector->paginate(new ListProviders())->collect();
    }

    /**
     * @return LazyCollection<SpecialtyData>
     */
    public function specialities(): LazyCollection
    {
        return $this->connector->paginate(new ListProviderSpecialties())->collect();
    }
}
