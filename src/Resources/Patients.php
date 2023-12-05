<?php

namespace ChrisReedIO\AthenaSDK\Resources;

use ChrisReedIO\AthenaSDK\Requests\Patient\Patient\ListPatients;
use ChrisReedIO\AthenaSDK\Resource;
use Illuminate\Support\LazyCollection;

class Patients extends Resource
{
    public function list(
        ?string $departmentId = null,
    ): LazyCollection
    {
        return $this->connector->paginate(new ListPatients(departmentid: $departmentId))->collect();
    }
}
