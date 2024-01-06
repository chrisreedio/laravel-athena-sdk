<?php

namespace ChrisReedIO\AthenaSDK\Resources\Appointments;

use ChrisReedIO\AthenaSDK\Resource;
use ChrisReedIO\AthenaSDK\Resources\Appointments\Status\ConfirmationStatus;

class AppointmentStatus extends Resource
{
    public function confirmation(): ConfirmationStatus
    {
        return new ConfirmationStatus($this->connector);
    }
}
