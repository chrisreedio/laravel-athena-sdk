<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\Medication;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListMedicationStopReasons
 *
 * Retrieves a list of medication stop reason configured  in the system
 */
class ListMedicationStopReasons extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/reference/medications/stopreasons';
    }

    public function __construct()
    {
    }
}
