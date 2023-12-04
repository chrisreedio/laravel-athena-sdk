<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\AppointmentChargeEntryNotRequiredReasons;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListChargeEntryNotRequiredReasons
 *
 * Returns a list of valid reasons to mark an appointment as charge entry not required. These reasons
 * will be valid values for the NOBILLINGSLIPCANCELREASON field when posting.
 */
class ListChargeEntryNotRequiredReasons extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/configuration/appointments/chargeentrynotrequiredreasons';
    }

    public function __construct()
    {
    }

    public function defaultQuery(): array
    {
        return array_filter([]);
    }
}
