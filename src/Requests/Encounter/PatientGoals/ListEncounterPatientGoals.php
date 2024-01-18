<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\PatientGoals;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListEncounterPatientGoals
 *
 * Retrieves the list of patient goals for a specific encounter
 */
class ListEncounterPatientGoals extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/chart/encounter/{$this->encounterid}/patientgoals";
    }

    /**
     * @param  int  $encounterid  encounterid
     */
    public function __construct(
        protected int $encounterid,
    ) {
    }
}
