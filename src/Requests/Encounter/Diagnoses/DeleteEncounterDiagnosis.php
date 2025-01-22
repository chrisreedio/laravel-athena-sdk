<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\Diagnoses;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeleteEncounterDiagnosis
 *
 * Delete a record of a specific diagnoses
 */
class DeleteEncounterDiagnosis extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/chart/encounter/{$this->encounterid}/diagnoses/{$this->diagnosisid}";
    }

    /**
     * @param  int  $diagnosisid  diagnosisid
     * @param  int  $encounterid  encounterid
     */
    public function __construct(
        protected int $diagnosisid,
        protected int $encounterid,
    ) {}
}
