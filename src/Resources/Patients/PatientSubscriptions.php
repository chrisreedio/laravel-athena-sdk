<?php

namespace ChrisReedIO\AthenaSDK\Resources\Patients;

use ChrisReedIO\AthenaSDK\Requests\Patient\Patient\CreatePatientChangeSubscription;
use ChrisReedIO\AthenaSDK\Requests\Patient\Patient\DeletePatientChangeSubscription;
use ChrisReedIO\AthenaSDK\Requests\Patient\Patient\ListPatientChangeSubscriptionEvents;
use ChrisReedIO\AthenaSDK\Requests\Patient\Patient\ListPatientChangeSubscriptions;
use ChrisReedIO\AthenaSDK\Resource;
use Illuminate\Support\Collection;
use Saloon\Http\Response;

class PatientSubscriptions extends Resource
{
    public function events(): array
    {
        return $this->connector->send(new ListPatientChangeSubscriptionEvents())->dtoOrFail();
    }

    public function list(): Collection
    {
        return $this->connector->send(new ListPatientChangeSubscriptions())->dtoOrFail();
    }

    public function subscribe(?string $eventName = null, ?array $departmentIds = null): Response
    {
        return $this->connector->send(new CreatePatientChangeSubscription($eventName, $departmentIds));
    }

    public function unsubscribe(?string $eventName = null): Response
    {
        return $this->connector->send(new DeletePatientChangeSubscription($eventName));
    }
}
