<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\FamilyHistory;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListFamilyHistoryChangeSubscriptions
 *
 * Retrieves list of events applicable for family history
 */
class ListFamilyHistoryChangeSubscriptions extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/chart/healthhistory/familyhistory/changed/subscription';
    }

    public function __construct()
    {
    }
}
