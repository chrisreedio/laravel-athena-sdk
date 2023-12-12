<?php

namespace ChrisReedIO\AthenaSDK\Resources\Providers;

use ChrisReedIO\AthenaSDK\Requests\Provider\Provider\CreateProviderSubscription;
use ChrisReedIO\AthenaSDK\Requests\Provider\Provider\ListProviderChangeEvents;
use ChrisReedIO\AthenaSDK\Requests\Provider\Provider\ListSubscribedProviderEvents;
use ChrisReedIO\AthenaSDK\Resource;
use Saloon\Http\Response;

class ProviderSubscriptions extends Resource
{
    public function events(): array
    {
        return $this->connector->send(new ListProviderChangeEvents())->dtoOrFail();
    }

    public function list(): Response
    {
        return $this->connector->send(new ListSubscribedProviderEvents());
    }

    public function subscribe(string $eventName = null): Response
    {
        return $this->connector->send(new CreateProviderSubscription($eventName));
    }
}
