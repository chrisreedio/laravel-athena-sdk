<?php

namespace ChrisReedIO\AthenaSDK\Resources\Appointments\Status;

use ChrisReedIO\AthenaSDK\Requests\Appointments\AppointmentConfirmationStatus\ListAppointmentConfirmationStatuses;
use ChrisReedIO\AthenaSDK\Resource;
use Illuminate\Support\Collection;

class ConfirmationStatus extends Resource
{
    public function list(): Collection
    {
        return $this->connector->send(new ListAppointmentConfirmationStatuses())->dtoOrFail();
    }
}
