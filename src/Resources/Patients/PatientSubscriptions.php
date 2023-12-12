<?php

namespace ChrisReedIO\AthenaSDK\Resources\Patients;

use ChrisReedIO\AthenaSDK\Requests\Patient\Patient\CreatePatientChangeSubscription;
use ChrisReedIO\AthenaSDK\Requests\Patient\Patient\ListPatientChangeSubscriptionEvents;
use ChrisReedIO\AthenaSDK\Requests\Patient\Patient\ListPatientChangeSubscriptions;
use ChrisReedIO\AthenaSDK\Resource;
use Saloon\Http\Response;

class PatientSubscriptions extends Resource
{
    public function events(): array
    {
        return $this->connector->send(new ListPatientChangeSubscriptionEvents())->dtoOrFail();
    }

    public function list(): Response
    {
        return $this->connector->send(new ListPatientChangeSubscriptions());
    }

    public function subscribe(?array $departmentIds = null, ?string $eventName = null): Response
    {
        return $this->connector->send(new CreatePatientChangeSubscription($departmentIds, $eventName));
    }
}
