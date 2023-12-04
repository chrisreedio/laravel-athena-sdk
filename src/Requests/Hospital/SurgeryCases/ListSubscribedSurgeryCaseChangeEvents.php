<?php

namespace ChrisReedIO\AthenaSDK\Requests\Hospital\SurgeryCases;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListSubscribedSurgeryCaseChangeEvents
 *
 * BETA: Retrieves list of events applicable for hospital stays changes
 */
class ListSubscribedSurgeryCaseChangeEvents extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/surgerycases/changed/subscription';
    }

    public function __construct()
    {
    }
}
