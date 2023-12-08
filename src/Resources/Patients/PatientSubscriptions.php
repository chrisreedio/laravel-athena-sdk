<?php

namespace ChrisReedIO\AthenaSDK\Resources\Patients;

use ChrisReedIO\AthenaSDK\Requests\Appointments\Appointment\ListAppointmentChangeEvents;
use ChrisReedIO\AthenaSDK\Requests\Appointments\Appointment\ListAppointmentChangeSubscriptions;
use ChrisReedIO\AthenaSDK\Requests\Patient\Patient\ListPatientChangeSubscriptionEvents;
use ChrisReedIO\AthenaSDK\Requests\Patient\Patient\ListPatientChangeSubscriptions;
use ChrisReedIO\AthenaSDK\Resource;

class PatientSubscriptions extends Resource
{
    public function events(): array
    {
        return $this->connector->send(new ListPatientChangeSubscriptionEvents())->dtoOrFail();
    }

    public function list(): \Saloon\Http\Response
    {
        return $this->connector->send(new ListPatientChangeSubscriptions());
    }
}
