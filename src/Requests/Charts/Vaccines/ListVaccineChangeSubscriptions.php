<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\Vaccines;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListVaccineChangeSubscriptions
 *
 * Retrieves list of events for Vaccines
 */
class ListVaccineChangeSubscriptions extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/chart/healthhistory/vaccine/changed/subscription';
    }

    public function __construct() {}
}
