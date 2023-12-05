<?php

namespace ChrisReedIO\AthenaSDK\Resources\Appointments;

use ChrisReedIO\AthenaSDK\Requests\Appointments\AppointmentTypes\ListAppointmentTypes;
use ChrisReedIO\AthenaSDK\Resource;
use Illuminate\Support\LazyCollection;

class Types extends Resource
{
    public function list(): LazyCollection
    {
        return $this->connector->paginate(new ListAppointmentTypes())->collect();
    }
}
