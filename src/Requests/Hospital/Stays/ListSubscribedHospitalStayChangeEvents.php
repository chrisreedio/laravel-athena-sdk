<?php

namespace ChrisReedIO\AthenaSDK\Requests\Hospital\Stays;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListSubscribedHospitalStayChangeEvents
 *
 * BETA: Retrieves list of events applicable for hospital stays changes
 */
class ListSubscribedHospitalStayChangeEvents extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/stays/changed/subscription';
    }

    public function __construct()
    {
    }
}
