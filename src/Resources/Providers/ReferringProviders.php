<?php

namespace ChrisReedIO\AthenaSDK\Resources\Providers;

use ChrisReedIO\AthenaSDK\Requests\Provider\Provider\CreateProviderSubscription;
use ChrisReedIO\AthenaSDK\Requests\Provider\Provider\DeleteProviderSubscription;
use ChrisReedIO\AthenaSDK\Requests\Provider\Provider\ListProviderChanges;
use ChrisReedIO\AthenaSDK\Requests\Provider\ReferringProvider\ListReferringProviders;
use ChrisReedIO\AthenaSDK\Resource;
use Illuminate\Support\LazyCollection;
use Saloon\Http\Response;

class ReferringProviders extends Resource
{
    public function subscriptions(): ReferringProvidersSubscriptions
    {
        return new ReferringProvidersSubscriptions($this->connector);
    }

    public function list(): LazyCollection
    {
        return $this->connector->paginate(new ListReferringProviders)->collect();
    }

    // public function subscribe(?string $eventName = null): Response
    // {
    //     return $this->connector->send(new CreateProviderSubscription($eventName));
    // }
    //
    // public function unsubscribe(?string $eventName = null): Response
    // {
    //     return $this->connector->send(new DeleteProviderSubscription($eventName));
    // }
    //
    // public function changes(bool $leaveUnprocessed = false): LazyCollection
    // {
    //     return $this->connector
    //         ->paginate(new ListProviderChanges(leaveUnprocessed: $leaveUnprocessed))
    //         ->collect();
    // }
}
