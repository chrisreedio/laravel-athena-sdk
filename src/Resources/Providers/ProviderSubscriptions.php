<?php

namespace ChrisReedIO\AthenaSDK\Resources\Providers;

use ChrisReedIO\AthenaSDK\Requests\Appointments\Appointment\ListAppointmentChangeEvents;
use ChrisReedIO\AthenaSDK\Requests\Appointments\Appointment\ListAppointmentChangeSubscriptions;
use ChrisReedIO\AthenaSDK\Requests\Patient\Patient\ListPatientChangeSubscriptionEvents;
use ChrisReedIO\AthenaSDK\Requests\Patient\Patient\ListPatientChangeSubscriptions;
use ChrisReedIO\AthenaSDK\Requests\Provider\Provider\ListProviderChangeEvents;
use ChrisReedIO\AthenaSDK\Requests\Provider\Provider\ListSubscribedProviderEvents;
use ChrisReedIO\AthenaSDK\Resource;

class ProviderSubscriptions extends Resource
{
    public function events(): array
    {
        return $this->connector->send(new ListProviderChangeEvents())->dtoOrFail();
    }

    public function list(): \Saloon\Http\Response
    {
        return $this->connector->send(new ListSubscribedProviderEvents());
    }
}
