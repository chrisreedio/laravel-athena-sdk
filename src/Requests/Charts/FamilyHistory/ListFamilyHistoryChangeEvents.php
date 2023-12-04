<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\FamilyHistory;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListFamilyHistoryChangeEvents
 *
 * Retrieve the list of events that can be input for this subscription
 */
class ListFamilyHistoryChangeEvents extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/chart/healthhistory/familyhistory/changed/subscription/events';
    }

    public function __construct()
    {
    }
}
