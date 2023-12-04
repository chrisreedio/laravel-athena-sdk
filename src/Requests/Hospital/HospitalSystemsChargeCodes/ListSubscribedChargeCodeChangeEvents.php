<?php

namespace ChrisReedIO\AthenaSDK\Requests\Hospital\HospitalSystemsChargeCodes;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListSubscribedChargeCodeChangeEvents
 *
 * Retrieves list of events applicable for hospital charge codes changes
 */
class ListSubscribedChargeCodeChangeEvents extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/chargecodes/changed/subscription';
    }

    public function __construct()
    {
    }
}
