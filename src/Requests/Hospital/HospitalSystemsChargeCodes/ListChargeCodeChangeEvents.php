<?php

namespace ChrisReedIO\AthenaSDK\Requests\Hospital\HospitalSystemsChargeCodes;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListChargeCodeChangeEvents
 *
 * Retrieves the list of events you can subscribe to for when hospital charge codes are updated
 */
class ListChargeCodeChangeEvents extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/chargecodes/changed/subscription/events';
    }

    public function __construct() {}
}
