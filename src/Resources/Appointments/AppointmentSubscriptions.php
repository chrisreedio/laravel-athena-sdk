<?php

namespace ChrisReedIO\AthenaSDK\Resources\Appointments;

use ChrisReedIO\AthenaSDK\Requests\Appointments\Appointment\CreateAppointmentChangeSubscription;
use ChrisReedIO\AthenaSDK\Requests\Appointments\Appointment\DeleteAppointmentChangeSubscription;
use ChrisReedIO\AthenaSDK\Requests\Appointments\Appointment\ListAppointmentChangeEvents;
use ChrisReedIO\AthenaSDK\Requests\Appointments\Appointment\ListAppointmentChanges;
use ChrisReedIO\AthenaSDK\Requests\Appointments\Appointment\ListAppointmentChangeSubscriptions;
use ChrisReedIO\AthenaSDK\Resource;
use Illuminate\Support\Collection;
use Illuminate\Support\LazyCollection;

class AppointmentSubscriptions extends Resource
{
    public function events(): array
    {
        return $this->connector->send(new ListAppointmentChangeEvents())->dtoOrFail();
    }

    public function list(): Collection
    {
        return $this->connector->send(new ListAppointmentChangeSubscriptions())->dtoOrFail();
    }

    public function subscribe(?string $eventName = null): \Saloon\Http\Response
    {
        return $this->connector->send(new CreateAppointmentChangeSubscription($eventName));
    }

    public function unsubscribe(?string $eventName = null): \Saloon\Http\Response
    {
        return $this->connector->send(new DeleteAppointmentChangeSubscription($eventName));
    }

    public function changes(bool $leaveUnprocessed = false): LazyCollection
    {
        $request = new ListAppointmentChanges(
            leaveUnprocessed: $leaveUnprocessed,
            showCopay: true,
            showInsurance: true,
            // showPatientDetail: true,
        );

        return $this->connector
            ->paginate($request)
            ->collect();
    }
}
