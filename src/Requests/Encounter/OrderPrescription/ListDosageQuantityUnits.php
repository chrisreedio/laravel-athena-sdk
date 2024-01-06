<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\OrderPrescription;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListDosageQuantityUnits
 *
 * Retrieves a list of dosage units configured in the system
 */
class ListDosageQuantityUnits extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/reference/order/prescription/dosagequantityunits';
    }

    public function __construct()
    {
    }
}
