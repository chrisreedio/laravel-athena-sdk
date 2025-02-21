<?php

namespace ChrisReedIO\AthenaSDK\Resources\Providers;

use ChrisReedIO\AthenaSDK\Requests\Provider\ReferringProvider\CreateReferringProviderSubscription;
use ChrisReedIO\AthenaSDK\Requests\Provider\ReferringProvider\DeleteReferringProviderSubscription;
use ChrisReedIO\AthenaSDK\Requests\Provider\ReferringProvider\ListReferringProviderChangeEvents;
use ChrisReedIO\AthenaSDK\Requests\Provider\ReferringProvider\ListReferringProviderChanges;
use ChrisReedIO\AthenaSDK\Requests\Provider\ReferringProvider\ListReferringProviderSubscriptions;
use ChrisReedIO\AthenaSDK\Resource;
use Illuminate\Support\Collection;
use Illuminate\Support\LazyCollection;
use Saloon\Http\Response;

class ReferringProvidersSubscriptions extends Resource
{
    public function events(): array
    {
        return $this->connector->send(new ListReferringProviderChangeEvents)->dtoOrFail();
    }

    public function list(): Collection
    {
        return $this->connector->send(new ListReferringProviderSubscriptions)->dtoOrFail();
    }

    public function subscribe(?string $eventName = null): Response
    {
        return $this->connector->send(new CreateReferringProviderSubscription($eventName));
    }

    public function unsubscribe(?string $eventName = null): Response
    {
        return $this->connector->send(new DeleteReferringProviderSubscription($eventName));
    }

    public function changes(bool $leaveUnprocessed = false): LazyCollection
    {
        return $this->connector
            ->paginate(new ListReferringProviderChanges(leaveUnprocessed: $leaveUnprocessed))
            ->collect();
    }
}
