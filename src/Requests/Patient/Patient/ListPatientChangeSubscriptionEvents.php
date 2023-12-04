<?php

namespace ChrisReedIO\AthenaSDK\Requests\Patient\Patient;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListPatientChangeSubscriptionEvents
 *
 * Retrieve a list of events for modified patient records
 */
class ListPatientChangeSubscriptionEvents extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/patients/changed/subscription/events';
    }

    public function __construct()
    {
    }
}
