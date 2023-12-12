<?php

namespace ChrisReedIO\AthenaSDK\Resources;

use ChrisReedIO\AthenaSDK\Resource;
use ChrisReedIO\AthenaSDK\Resources\Appointments\AppointmentStatus;
use ChrisReedIO\AthenaSDK\Resources\Appointments\AppointmentSubscriptions;
use ChrisReedIO\AthenaSDK\Resources\Appointments\Booked;
use ChrisReedIO\AthenaSDK\Resources\Appointments\Types;

class Appointments extends Resource
{
    public function booked(): Booked
    {
        return new Booked($this->connector);
    }

    public function subscriptions(): AppointmentSubscriptions
    {
        return new AppointmentSubscriptions($this->connector);
    }

    public function types(): Types
    {
        return new Types($this->connector);
    }

    public function status(): AppointmentStatus
    {
        return new AppointmentStatus($this->connector);
    }
}
