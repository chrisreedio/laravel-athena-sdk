<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\OrderPrescription;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListDosageFrequencies
 *
 * Retrieves a list of dosage frequencies configured in the system
 */
class ListDosageFrequencies extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/reference/order/prescription/frequencies';
    }

    public function __construct()
    {
    }
}
