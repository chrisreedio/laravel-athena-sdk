<?php

namespace ChrisReedIO\AthenaSDK\Resources\Appointments;

use ChrisReedIO\AthenaSDK\Requests\Appointments\Appointment\ListAppointmentChangeEvents;
use ChrisReedIO\AthenaSDK\Requests\Appointments\Appointment\ListAppointmentChangeSubscriptions;
use ChrisReedIO\AthenaSDK\Resource;

class AppointmentSubscriptions extends Resource
{
    public function events(): array
    {
        return $this->connector->send(new ListAppointmentChangeEvents())->dtoOrFail();
    }

    public function list(): \Saloon\Http\Response
    {
        return $this->connector->send(new ListAppointmentChangeSubscriptions());
    }
}
