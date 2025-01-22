<?php

namespace ChrisReedIO\AthenaSDK\Requests\PracticeConfiguration\PatientLocationsReference;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListPatientLocations
 *
 * Retrieves a list of practice-specific patient locations
 */
class ListPatientLocations extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/misc/patientlocations';
    }

    public function __construct() {}
}
