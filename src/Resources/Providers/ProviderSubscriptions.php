<?php

namespace ChrisReedIO\AthenaSDK\Resources\Providers;

use ChrisReedIO\AthenaSDK\Requests\Patient\Patient\ListPatientChanges;
use ChrisReedIO\AthenaSDK\Requests\Provider\Provider\CreateProviderSubscription;
use ChrisReedIO\AthenaSDK\Requests\Provider\Provider\DeleteProviderSubscription;
use ChrisReedIO\AthenaSDK\Requests\Provider\Provider\ListProviderChangeEvents;
use ChrisReedIO\AthenaSDK\Requests\Provider\Provider\ListProviderChanges;
use ChrisReedIO\AthenaSDK\Requests\Provider\Provider\ListSubscribedProviderEvents;
use ChrisReedIO\AthenaSDK\Resource;
use Illuminate\Support\Collection;
use Illuminate\Support\LazyCollection;
use Saloon\Http\Response;

class ProviderSubscriptions extends Resource
{
    public function events(): array
    {
        return $this->connector->send(new ListProviderChangeEvents())->dtoOrFail();
    }

    public function list(): Collection
    {
        return $this->connector->send(new ListSubscribedProviderEvents())->dtoOrFail();
    }

    public function subscribe(?string $eventName = null): Response
    {
        return $this->connector->send(new CreateProviderSubscription($eventName));
    }

    public function unsubscribe(?string $eventName = null): Response
    {
        return $this->connector->send(new DeleteProviderSubscription($eventName));
    }

    public function changes(bool $leaveUnprocessed = false): LazyCollection
    {
        return $this->connector
            ->paginate(new ListProviderChanges(leaveUnprocessed: $leaveUnprocessed))
            ->collect();
    }
}
