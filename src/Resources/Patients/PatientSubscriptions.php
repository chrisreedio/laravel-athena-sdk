<?php

namespace ChrisReedIO\AthenaSDK\Resources\Patients;

use ChrisReedIO\AthenaSDK\Requests\Patient\CreatePatientChangeSubscription;
use ChrisReedIO\AthenaSDK\Requests\Patient\DeletePatientChangeSubscription;
use ChrisReedIO\AthenaSDK\Requests\Patient\ListPatientChanges;
use ChrisReedIO\AthenaSDK\Requests\Patient\ListPatientChangeSubscriptionEvents;
use ChrisReedIO\AthenaSDK\Requests\Patient\ListPatientChangeSubscriptions;
use ChrisReedIO\AthenaSDK\Resource;
use Illuminate\Support\Collection;
use Illuminate\Support\LazyCollection;
use Saloon\Http\Response;

class PatientSubscriptions extends Resource
{
    public function events(): array
    {
        return $this->connector->send(new ListPatientChangeSubscriptionEvents)->dtoOrFail();
    }

    public function list(): Collection
    {
        return $this->connector->send(new ListPatientChangeSubscriptions)->dtoOrFail();
    }

    public function subscribe(?string $eventName = null, ?array $departmentIds = null): Response
    {
        return $this->connector->send(new CreatePatientChangeSubscription($eventName, $departmentIds));
    }

    public function unsubscribe(?string $eventName = null): Response
    {
        return $this->connector->send(new DeletePatientChangeSubscription($eventName));
    }

    public function changes(bool $leaveUnprocessed = false): LazyCollection
    {

        $request = new ListPatientChanges(leaveUnprocessed: $leaveUnprocessed);

        return $this->connector->paginate($request)->collect();
    }
}
