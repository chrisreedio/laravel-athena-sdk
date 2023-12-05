<?php

namespace ChrisReedIO\AthenaSDK\Resources;

use ChrisReedIO\AthenaSDK\Resource;
use ChrisReedIO\AthenaSDK\Resources\Appointments\Booked;
use ChrisReedIO\AthenaSDK\Resources\Appointments\Subscriptions;
use ChrisReedIO\AthenaSDK\Resources\Appointments\Types;

class Appointments extends Resource
{
    public function booked(): Booked
    {
        return new Booked($this->connector);
    }

    public function subscriptions(): Subscriptions
    {
        return new Subscriptions($this->connector);
    }

    public function types(): Types
    {
        return new Types($this->connector);
    }
}
